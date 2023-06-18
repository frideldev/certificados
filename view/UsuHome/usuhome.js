var usu_id = $('#usu_idx').val();

$(document).ready(function(){

    $.post("../../controller/usuario.php?op=total_cursos", function (data) {
        data = JSON.parse(data);
        $('#lbltotal').html(data.total);
    });
    $.post("../../controller/usuario.php?op=total_alumnos", function (data) {
        data = JSON.parse(data);
        $('#lbltotalalumnos').html(data.total);
    });
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
            url:"../../controller/curso.php?op=listar_dashboard",
            type:"post"
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "order": [[ 4, "desc" ]],
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

});
function certificadovarios(cur_id){
        window.open('../CertificadoVarios/index.php?cur_id='+ cur_id +'','_blank');   
}
function enviarCorreo(cur_id) {
    $.post("../../controller/email.php?op=enviarCorreo",{ cur_id : cur_id },function(data){
        Swal.fire({
            title: 'Correcto!',
            text: 'Se Enviaron los Correos Correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        })
    });
}
function certificado(curd_id){
    console.log(curd_id);
    window.open('../Certificado/index.php?curd_id='+ curd_id +'','_blank');
}
