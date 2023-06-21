function init(){

}

$(document).ready(function(){
    $("#divpanel").hide();
});
$(document).on("click","#btnconsultar", function(){
    var usu_dni = $("#usu_dni").val();
    if (usu_dni.length == 0){
        Swal.fire({
            title: 'Error!',
            text: 'DNI Vacio',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        })
    }else{
        
        $.post("../../controller/usuario.php?op=consulta_dni",{usu_dni : usu_dni}, function (data) {
            if (data.length>0){
                data = JSON.parse(data);

                $("#lbldatos").html("Listado de Cursos : "+data.usu_nomapm);

                $('#cursos_data').DataTable({
                    "aProcessing": true,
                    "aServerSide": true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                    ],
                    "ajax":{
                        url:"../../controller/usuario.php?op=listar_cursos_registro_vigente",
                        type:"post",
                        data:{usu_id:data.usu_id},
                    },
                    "bDestroy": true,
                    "responsive": true,
                    "bInfo":true,
                    "iDisplayLength": 10,
                    "order": [[ 0, "desc" ]],
                    "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    },
                });

                $("#divpanel").show();
            }else{
                Swal.fire({
                    title: 'Error!',
                    text: 'No Existe Usuario',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                })
            }
        });

    }

});

function registrardetalle(){
    
    table = $('#cursos_data').DataTable();
    var cur_id =[];
    var pago=[];
    var usu_dni = $("#usu_dni").val();
    var curd_comprobante = document.getElementById('curd_comprobante').files[0]; 
    var curd_comprobante_dato = document.getElementById('curd_comprobante');
    table.rows().every(function(rowIdx, tableLoop, rowLoop) {
        cell1 = table.cell({ row: rowIdx, column: 0 }).node();
        cell2 = table.cell({ row: rowIdx, column: 4 }).data();
        if ($('input', cell1).prop("checked") == true) {
            id = $('input', cell1).val();
            cur_id.push([id]);
            pago.push([cell2]);
        }
        
    });
    var validadorpago=1;
    pago.forEach(element => {
      if(element=="PAGO" && curd_comprobante_dato.files.length==0){
        validadorpago=0;
      }
    });
    if (validadorpago==0 || cur_id==0 ){
        Swal.fire({
            title: 'Error!',
            text: 'Seleccionar los cursos o el deposito bancario',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        })
    }else{
        $.post("../../controller/usuario.php?op=consulta_dni",{usu_dni : usu_dni}, function (datausu) {
            datausu = JSON.parse(datausu);
            const formData = new FormData($("#form_detalle")[0]);
            formData.append('cur_id',cur_id);
            formData.append('usu_id',datausu.usu_id);
            formData.append('curd_comprobante',curd_comprobante);
            $.ajax({
                url: "../../controller/curso.php?op=insert_usuario_curso",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success : function(data) {
                    data = JSON.parse(data);
                    Swal.fire({
                        title: 'Correcto!',
                        text: 'Se Registro Correctamente',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                    data.forEach(e => {
                        e.forEach(i => {
                            $.ajax({
                                type: "POST",
                                url: "../../controller/curso.php?op=generar_qr",
                                data: {curd_id : i['curd_id']},
                                dataType: "json"
                            });
                        });
                    });
                }
            });
    
            $('#cursos_data').DataTable().ajax.reload();
            
        
    });
      

    }
}


function certificado(curd_id){
    console.log(curd_id);
    window.open('../Certificado/index.php?curd_id='+ curd_id +'','_blank');
}