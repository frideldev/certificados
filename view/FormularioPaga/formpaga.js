function init(){
    $("#usuariof_form").on("submit",function(e){
        guardaryeditar(e);
    });
}
$(document).ready(function(){
    
});
function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#usuariof_form")[0]);
    $.ajax({
        url: "../../controller/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            Swal.fire({
                title: 'Correcto!',
                text: 'Se Registro Correctamente',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(function() {
                window.location = "../Registro";
            });
        }
    });
}

init();