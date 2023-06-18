function enviarCorreo() {
    var cur_id = $('#cur_id').val();
    $.post("../../controller/email.php?op=enviarCorreo",{ cur_id : cur_id },function(data){
        Swal.fire({
            title: 'Correcto!',
            text: 'Se Enviaron los Correos Correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        })
    });
}