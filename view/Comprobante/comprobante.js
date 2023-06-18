var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');

/* Inicializamos la imagen */
var image = new Image();
$(document).ready(function(){
    var curd_id = getUrlParameter('curd_id');

    $.post("../../controller/usuario.php?op=mostrar_comprobante_detalle", { curd_id : curd_id }, function (data) {
        data = JSON.parse(data);
        console.log(data.usu_nomapm);
        console.log(data.curd_comprobante);
        /* Ruta de la Imagen */
        image.src = data.curd_comprobante;
        /* Dimensionamos y seleccionamos imagen */
        image.onload = function() {
            ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
        };

    });

});

$(document).on("click","#btnpng", function(){
    let lblpng = document.createElement('a');
    lblpng.download = "Certificado.png";
    lblpng.href = canvas.toDataURL();
    lblpng.click();
});

$(document).on("click","#btnpdf", function(){
    var imgData = canvas.toDataURL('image/png');
    var doc = new jsPDF('l', 'mm');
    doc.addImage(imgData, 'PNG', 30, 15);
    doc.save('Certificado.pdf');
});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
