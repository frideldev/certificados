var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');

/* Inicializamos la imagen */
var image = new Image();
var imageqr = new Image();
var imageusu = new Image();
function splitbywords(variable, empieza, termina) {
    var s = variable+' ',
        largo = s.length,
        posStart = Math.max(0, empieza == 0 ? 0 : s.indexOf(' ', empieza)),
        posEnd = Math.max(0, termina > largo ? largo : s.indexOf(' ', termina)),
        cadena = s.substring(posStart, posEnd);
    if (cadena.charAt(cadena.length-1) === ',') {
        cadena = cadena.substring(0, cadena.length-1);
    }
    return cadena;
  }
function lengthwords(palabra,dimensionpalabra){
    datalong=palabra.length;
    if (datalong/dimensionpalabra<1){
       dimension=1;
    }
    else{
        if (datalong/(dimensionpalabra*2)<1){
            dimension=2;
        }
        else{
            dimension=3;
        }
       
    }
    return dimension;
}

$(document).ready(function(){
    var curd_id = getUrlParameter('curd_id');

    $.post("../../controller/usuario.php?op=mostrar_curso_detalle", { curd_id : curd_id }, function (data) {
       
        data = JSON.parse(data);
        var parrafo = document.getElementById("descripcion_final");
        parrafo.innerText = "El siguiente certificado que corresponde a: " + data.usu_nomapm.toUpperCase() + ", con código de certificado: " + data.curd_folio+ ", La academia Líder acredita para fines convenientes al interesado";
        /* Ruta de la Imagen */
        image.src = data.cur_img_fir;
        /* Dimensionamos y seleccionamos imagen */
        image.onload = function() {
            ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
            /* Definimos tamaño de la fuente */
            nombredimension=data.usu_nomapm.length;
            if (nombredimension>30){
                if(nombredimension>35){
                    ctx.font = '23px Arial';
                }
                else{
                    ctx.font = '25px Arial';
                }
                
            }
            else{
                ctx.font = '30px Arial';
            }
            ctx.textAlign = "center";
            ctx.textBaseline = 'middle';
            var x = (canvas.width-10) / 2;
            y=245;
            ctx.fillText(data.usu_nomapm.toUpperCase(), x, y);
            ctx.font = 'normal 16px Arial';
            ctx.textAlign = "center";
            ctx.textBaseline = 'middle';
            cordenada=62;
            dimension=lengthwords(data.cur_memb,cordenada);
            posicion=0;
            for (let index = 0; index < dimension; index++) {
                ctx.fillText(splitbywords(data.cur_memb,cordenada*(index),cordenada*(index+1)), x, (y+50)+posicion);
             posicion=posicion+20;   
            }
               
            
            ctx.font = 'bold 22px Arial';
            ctx.textAlign = "center";
            ctx.textBaseline = 'middle';
            ctx.fillStyle = "orange";
            cordenada=40;
            dimensioncurso=lengthwords(data.cur_nom,cordenada);
            posicion=0;
            for (let index = 0; index < dimensioncurso; index++) {
                ctx.fillText(splitbywords("",cordenada*(index),cordenada*(index+1)), x, (y+100)+posicion);
             posicion=posicion+20;   
            }
            ctx.font = 'normal 16px Arial';
            ctx.textAlign = "center";
            ctx.textBaseline = 'middle';
            ctx.fillStyle = "gray";
            cordenada=60;
            dimensiondesc=lengthwords(data.cur_descrip,cordenada);
            posicion=0;
            for (let index = 0; index < dimensiondesc; index++) {
                ctx.fillText(splitbywords(data.cur_descrip,cordenada*(index),cordenada*(index+1)), x, ((y+110)+(20*dimensioncurso))+posicion);
             posicion=posicion+20;   
            }
            ctx.font = 'normal 9px Arial';
            ctx.textAlign = "center";
            ctx.textBaseline = 'middle';
            ctx.fillStyle = "gray";
            ctx.fillText("Codigo de Certificado: "+data.curd_folio, 770,90 );
            /* Ruta de la Imagen */
            imageusu.src = data.usu_img;
            /* Dimensionamos y seleccionamos imagen */
            imageusu.onload = function() {
                ctx.drawImage(imageusu, 739, 100, 100, 100);
            }
            /* Ruta de la Imagen */
            imageqr.src = "../../public/qr/"+curd_id+".png";
            /* Dimensionamos y seleccionamos imagen */
            imageqr.onload = function() {
                ctx.drawImage(imageqr, 15, 500, 100, 100);
            }
            

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
    doc.addImage(imgData, 'PNG', -3, -5,302,220);
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
