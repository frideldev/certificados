var canvasArray = [];
function mostrarCertificado(data) {
    var canvasmostrar = document.getElementById('canvasmostrar');
    var ctx = canvasmostrar.getContext('2d');
    canvasmostrar.width = 792;
    canvasmostrar.height = 612;
    var image = new Image();
    var imageqr = new Image();
    var imageusu = new Image();
    image.src = data[0].cur_img;
    imageqr.src = "../../public/qr/" + data[0].curd_id + ".png";
    imageusu.src = data[0].usu_img;

    /* Dimensionamos y seleccionamos imagen */
    image.onload = function () {
        ctx.drawImage(image, 0, 0, canvasmostrar.width, canvasmostrar.height);
        nombredimension = data[0].usu_nomapm.length;
        if (nombredimension > 30) {
            if (nombredimension > 35) {
                ctx.font = '23px Arial';
            }
            else {
                ctx.font = '25px Arial';
            }

        }
        else {
            ctx.font = '30px Arial';
        }
        ctx.textAlign = "center";
        ctx.textBaseline = 'middle';
        var x = (canvasmostrar.width - 10) / 2;
        ctx.fillText(data[0].usu_nomapm.toUpperCase(), x, 245);
        ctx.font = 'normal 9px Arial';
            ctx.textAlign = "center";
            ctx.textBaseline = 'middle';
            ctx.fillStyle = "gray";
            ctx.fillText("Codigo de Certificado: "+data[0].curd_folio, 690,90 );
    };
    imageqr.onload = function () {
        ctx.drawImage(imageqr, 15, 460, 100, 100);
    };
    imageusu.onload = function () {
        ctx.drawImage(imageusu, 670, 100, 100, 100);
    };

}
function GenerarCertificado(data) {
    data.forEach((datos, index) => {
        canvasArray[index] = document.createElement('canvas');
        canvasArray[index].width = 792;
        canvasArray[index].height = 612;
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
            nombredimension = datos.usu_nomapm.length;
            if (nombredimension > 30) {
                if (nombredimension > 35) {
                    ctx.font = '23px Arial';
                }
                else {
                    ctx.font = '25px Arial';
                }

            }
            else {
                ctx.font = '30px Arial';
            }
            ctx.textAlign = "center";
            ctx.textBaseline = 'middle';
            var x = (canvasArray[index].width - 10) / 2;
            ctx.fillText(datos.usu_nomapm.toUpperCase(), x, 245);
            ctx.font = 'normal 9px Arial';
            ctx.textAlign = "center";
            ctx.textBaseline = 'middle';
            ctx.fillStyle = "gray";
            ctx.fillText("Codigo de Certificado: "+datos.curd_folio, 690,90 );
        };
        imageqr.onload = function () {
            ctx.drawImage(imageqr, 15, 460, 100, 100);
        };
        imageusu.onload = function () {
            ctx.drawImage(imageusu, 670, 100, 100, 100);
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
$(document).on("click", "#btnpdf", function () {
    var doc = new jsPDF('l', 'px','letter');
    var cur_id = getUrlParameter('cur_id');
    const contadorElemento = document.getElementById('conteo');
    $.post("../../controller/usuario.php?op=mostrar_curso_detalle_varios", { cur_id: cur_id }, function (data) {
        data = JSON.parse(data);
        data.map((datos, index) => {
            if (index !== 0) {
                doc.addPage('letter', 'l');
            }
            contadorElemento.textContent = index + 1 + " Certificados Enviados Exitosamente";
            const canvas = canvasArray[index];
            var imgData = canvas.toDataURL('image/png');
            doc.addImage(imgData, 'PNG', -3, -5, 592,457);
        });
        doc.save('Certificado.pdf');
    });
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
