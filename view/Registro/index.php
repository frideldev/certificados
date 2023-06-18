<!DOCTYPE html>
<html lang="es" class="pos-relative">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracket">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracket/img/bracket-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Consulta</title>

    <!-- vendor css -->
    <link href="../../public/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../public/lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <link href="../../public/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../../public/css/bracket.css">
  </head>

  <body class="pos-relative">
  
    <div class="ht-100v d-flex align-items-center justify-content-center">

      <div class="wd-lg-70p wd-xl-50p tx-center">
      <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal"></span> <img src="../../public/img/logo2022.png" alt=""> <span class="tx-normal"></span></div>
        <h1 class="tx-60 tx-xs-80 tx-normal tx-inverse tx-roboto mg-b-0">Registro</h1>
        <h5 class="tx-xs-24 tx-normal tx-info mg-b-30 lh-5">Ingrese su CI para Inscribirse a los Cursos que les ofertamos</h5>
       
        <div class="d-flex justify-content-center">
          <div class="input-group wd-xs-300">
            <input type="text" id="usu_dni" name="usu_dni" class="form-control" placeholder="CI...">
            <div class="input-group-btn">
              <button class="btn btn-info" id="btnconsultar"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
        <h6 class="tx-xs-16 tx-normal tx-info mg-b-30 lh-5"><a href="../FormularioPaga/">Si eres nuevo haz click aqui</a></h6>
        <div class="row row-sm mg-t-20" id="divpanel">
          <div class="col-12">
            <div class="card pd-0 bd-0 shadow-base">
              <div class="pd-x-30 pd-t-30 pd-b-15">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1" id="lbldatos">Listado de Cursos</h6>
                    <p class="mg-b-0">Aqui podra inscribirse a los cursos disponibles</p>
                  </div>
                </div>
              </div>
              <div class="pd-x-15 pd-b-15">
                <div class="table-wrapper">
                  <table id="cursos_data" class="table display responsive nowrap">
                    <thead>
                      <tr>
                      <th class="wd-10p"></th>
                        <th class="wd-15p">Curso</th>
                        <th class="wd-15p">Fecha Inicio</th>
                        <th class="wd-15p">Fecha Fin</th>
                        <th class="wd-15p">Tipo Pago</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">

          <div class="form-group">
                        <label class="form-control-label">Comprobante Deposito Bancario: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" id="curd_comprobante" name="curd_comprobante"/>
                        </div>
          </div>
          <div class="col-12">
          <button name="action" onclick="registrardetalle()" class="btn btn-outline-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"><i class="fa fa-check"></i> Guardar</button>
          </div>
        </div>

      </div>
    </div>

    <script src="../../public/lib/jquery/jquery.js"></script>
    <script src="../../public/lib/popper.js/popper.js"></script>
    <script src="../../public/lib/bootstrap/bootstrap.js"></script>

    <script src="../../public/lib/datatables/jquery.dataTables.js"></script>
    <script src="../../public/lib/datatables-responsive/dataTables.responsive.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="registro.js"></script>
  </body>
</html>
