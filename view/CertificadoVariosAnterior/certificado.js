//var canvas = document.getElementById('canvas');


/* Inicializamos la imagen */
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
function GenerarCertificado(cur_img,usu_nomapm,cur_memb,cur_nom,cur_descrip,curd_folio,curd_id,usu_img,doc){
    var canvas = document.createElement('canvas');
            
            canvas.width = 900;
            canvas.height = 650;
            var ctx = canvas.getContext('2d');
            var image = new Image();
            var imageqr = new Image();
            var imageusu = new Image();
            
            
            image.src = cur_img;
            /* Dimensionamos y seleccionamos imagen */
            image.onload = function() {
                ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
            /* Definimos tamaño de la fuente */
            nombredimension=usu_nomapm.length;
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
            ctx.fillText(usu_nomapm.toUpperCase(), x, 275);
            ctx.font = 'normal 16px Arial';
            ctx.textAlign = "center";
            ctx.textBaseline = 'middle';
            cordenada=62;
            dimension=lengthwords(cur_memb,cordenada);
            posicion=0;
            for (let index = 0; index < dimension; index++) {
                ctx.fillText(splitbywords(cur_memb,cordenada*(index),cordenada*(index+1)), x, 280+posicion);
             posicion=posicion+20;   
            }
            ctx.font = 'bold 22px Arial';
            ctx.textAlign = "center";
            ctx.textBaseline = 'middle';
            ctx.fillStyle = "orange";
            cordenada=40;
            dimensioncurso=lengthwords(cur_nom,cordenada);
            posicion=0;
            for (let index = 0; index < dimensioncurso; index++) {
                ctx.fillText(splitbywords("",cordenada*(index),cordenada*(index+1)), x, 330+posicion);
             posicion=posicion+20;   
            }
            ctx.font = 'normal 16px Arial';
            ctx.textAlign = "center";
            ctx.textBaseline = 'middle';
            ctx.fillStyle = "gray";
            cordenada=60;
            dimensiondesc=lengthwords(cur_descrip,cordenada);
            posicion=0;
            for (let index = 0; index < dimensiondesc; index++) {
                ctx.fillText(splitbywords(cur_descrip,cordenada*(index),cordenada*(index+1)), x, (330+(20*dimensioncurso))+posicion,doc);
             posicion=posicion+20;   
            }
            ctx.font = 'normal 9px Arial';
            ctx.textAlign = "center";
            ctx.textBaseline = 'middle';
            ctx.fillStyle = "gray";
            ctx.fillText("Codigo de Certificado: "+curd_folio, 770,90 );
                /* Ruta de la Imagen */
                imageqr.src = "../../public/qr/"+curd_id+".png";
                /* Dimensionamos y seleccionamos imagen */
                imageqr.onload = function() {
                    ctx.drawImage(imageqr, 45, 503, 100, 100);
                    imageusu.src = usu_img;
                    /* Dimensionamos y seleccionamos imagen */
                    imageusu.onload = function() {
                        ctx.drawImage(imageusu, 739, 100, 100, 100);
                        var imageData = canvas.toDataURL('image/png'); 
                        var certificadoHTML = '<div>' +
                          '<img src="' + imageData + '">' +
                          '<div id="qrcode"></div>'+
                          '</div>'; 
                        document.getElementById('certificados').innerHTML += certificadoHTML;
                        doc.addImage(imageData, "PNG", 30, 15);
                        
                    }
                   
                    
                }
                
                 
            };
}
$(document).ready(function(){
    var cur_id = getUrlParameter('cur_id');

    $.post("../../controller/usuario.php?op=mostrar_curso_detalle_varios", { cur_id : cur_id }, function (data) {
        var doc = new jsPDF('l', 'px','letter');
        data = JSON.parse(data);
        data.map((datos,index)=>{
            if (index !== 0) {
                doc.addPage('letter','l');
              }
              GenerarCertificado(datos.cur_img,datos.usu_nomapm,datos.cur_memb,datos.cur_nom,datos.cur_descrip,datos.curd_folio,datos.curd_id,datos.usu_img,doc)   
           
        })
        /* Ruta de la Imagen */
        doc.save('Certificado2.pdf');  
        
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
