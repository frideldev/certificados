var usu_id = $('#usu_idx').val();

$(document).ready(function(){
    $.post("../../controller/usuario.php?op=mostrar", { usu_id : usu_id }, function (data) {
        data = JSON.parse(data);
        $('#usu_nomapm').val(data.usu_nomapm);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_telf').val(data.usu_telf);
        $('#usu_pass').val(data.usu_pass);
        $('#usu_grado').val(data.usu_grado).trigger("change");
        $('#usu_ciudad').val(data.usu_ciudad).trigger("change");
    });
});


$(document).on("click","#btnactualizar", function(){

    $.post("../../controller/usuario.php?op=update_perfil", { 
        usu_id : usu_id,
        usu_nomapm : $('#usu_nomapm').val(),
        usu_pass : $('#usu_pass').val(),
        usu_telf : $('#usu_telf').val(),
        usu_grado : $('#usu_grado').val(),
        usu_ciudad : $('#usu_ciudad').val()
     }, function (data) {
    });

    Swal.fire({
        title: 'Correcto!',
        text: 'Se actualizo Correctamente',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    })
});