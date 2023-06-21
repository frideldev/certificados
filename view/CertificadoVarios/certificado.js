var canvasArray=[];
function mostrarCertificado(data) {
        var canvasmostrar = document.getElementById('canvasmostrar');
        var ctx = canvasmostrar.getContext('2d');
        canvasmostrar.width = 900;
        canvasmostrar.height = 650;
        var image = new Image();
        var imageqr = new Image();
        var imageusu = new Image();
        image.src = data[0].cur_img;
        imageqr.src = "../../public/qr/" + data[0].curd_id + ".png";
        imageusu.src = data[0].usu_img;
        /* Dimensionamos y seleccionamos imagen */
        image.onload = function () {
            ctx.drawImage(image, 0, 0, canvasmostrar.width, canvasmostrar.height);   
        };
        imageqr.onload = function () {
            ctx.drawImage(imageqr, 15, 500, 100, 100);
        };
        imageusu.onload = function () {
            ctx.drawImage(imageusu, 739, 100, 100, 100);    
        }; 
    
}
function GenerarCertificado(data) {
    data.forEach((datos,index) => {
        canvasArray[index]=document.createElement('canvas');
        canvasArray[index].width = 900;
        canvasArray[index].height = 650;
        var ctx = canvasArray[index].getContext('2d');
        var image = new Image();
        var imageqr = new Image();
        var imageusu = new Image();
        image.src = datos.cur_img;
        imageqr.src = "../../public/qr/" + datos.curd_id + ".png";
        imageusu.src = datos.usu_img;
        /* Dimensionamos y seleccionamos imagen */
       
        image.onload = function () {
            ctx.drawImage(image, 0, 0, canvasArray[index].width, canvasArray[index].height);   
        };
        imageqr.onload = function () {
            ctx.drawImage(imageqr, 15, 500, 100, 100);
        };
        imageusu.onload = function () {
            ctx.drawImage(imageusu, 739, 100, 100, 100);    
        }; 
    });
}
$(document).ready(function () {
    var cur_id = getUrlParameter('cur_id');
    $.post("../../controller/usuario.php?op=mostrar_curso_detalle_varios", { cur_id: cur_id }, function (data) {
        data = JSON.parse(data);
        mostrarCertificado(data)
        GenerarCertificado(data);
    });
});
$(document).on("click","#btnpdf", function(){
    var doc = new jsPDF('l', 'mm');
    for (let index = 0; index < 9; index++) {
        if (index !== 0) {
            doc.addPage('letter','l');
          }
        console.log(canvasArray[index]);
        const canvas = canvasArray[index];
        var imgData = canvas.toDataURL('image/png');
        doc.addImage(imgData, 'PNG', -3, -5,302,220); 
    }
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
