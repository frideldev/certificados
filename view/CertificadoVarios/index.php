<!DOCTYPE html>
<html lang="es" class="pos-relative">
    <head>
        <?php require_once("../html/MainHead.php"); ?>
        <title>Certificado</title>
    </head>

  <body >
  <div class="align-items-center justify-content-center" id="certificados">
  <canvas id="canvasmostrar" class="img-fluid" alt="Responsive image"></canvas>
  </div>
  <div class="form-layout-footer">
            <button class="btn btn-outline-success" id="btnpdf"><i class="fa fa-send mg-r-10"></i> Imprimir Todos los Certificados en PDF</button>
        </div>

    <?php require_once("../html/MainJs.php"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script type="text/javascript" src="certificado.js"></script>
  </body>
</html>
