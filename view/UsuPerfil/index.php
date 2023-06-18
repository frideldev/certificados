<?php
  /* Llamamos al archivo de conexion.php */
  require_once("../../config/conexion.php");
  if(isset($_SESSION["usu_id"])){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once("../html/MainHead.php"); ?>

    <title>Academia Lider::Perfil</title>
  </head>

  <body>

    <?php require_once("../html/MainMenu.php"); ?>

    <?php require_once("../html/MainHeader.php"); ?>

    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Perfil</a>
        </nav>
      </div>
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Perfil</h4>
        <p class="mg-b-0">Pantalla Perfil</p>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Perfil</h6>
          <p class="mg-b-30 tx-gray-600">Actualize sus datos</p>

          <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nombre y Apellido: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="usu_nomapm" id="usu_nomapm" placeholder="Nombre" required>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Correo Electronico: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="usu_correo" id="usu_correo" readonly>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Contraseña: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="password" name="usu_pass" id="usu_pass" placeholder="Ingrese Contraseña">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Grado Academico: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" name="usu_grado" id="usu_grado" data-placeholder="Seleccione">
                                <option label="Seleccione"></option>
                                <option value="Bachiller">Bachiller</option>
                                <option value="Tecnico Medio">Tecnico Medio</option>
                                <option value="Tecnico Superior">Tecnico Superior</option>
                                <option value="Universitario">Universitario</option>
                                <option value="Licenciatura">Licenciatura</option>
                                <option value="Maestria">Maestria</option>
                                <option value="Doctorado">Doctorado</option>
                            </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Telefono: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="usu_telf" id="usu_telf" placeholder="Ingrese Telefono">
                </div>
              </div>
              <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Residencia: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" name="usu_ciudad" id="usu_ciudad" data-placeholder="Seleccione">
                                <option label="Seleccione"></option>
                                <option value="Tarija">Tarija</option>
                                <option value="La Paz">La Paz</option>
                                <option value="Cochabamba">Cochabamba</option>
                                <option value="Santa Cruz">Santa Cruz</option>
                                <option value="Chuquisaca">Chuquisaca</option>
                                <option value="Potosi">Potosi</option>
                                <option value="Beni">Beni</option>
                                <option value="Pando">Pando</option>
                                <option value="Otro LATAM">Otro LATAM</option>
                                <option value="USA">USA</option>
                                <option value="Otro Norteamerica">Otro Norteamerica</option>
                                <option value="Otro Europa">Otro Europa</option>
                                <option value="Otro Asia">Otro Asia</option>
                                <option value="Otro Oceania">Otro Oceania</option>
                            </select>
                        </div>
                    </div>
            </div>

            <div class="form-layout-footer">
              <button class="btn btn-info" id="btnactualizar">Actualizar</button>
            </div>
          </div>

        </div>
      </div>
    </div>

    <?php require_once("../html/MainJs.php"); ?>
    <script type="text/javascript" src="usuperfil.js"></script>
  </body>
</html>
<?php
  }else{
    /* Si no a iniciado sesion se redireccionada a la ventana principal */
    header("Location:".Conectar::ruta()."view/404/");
  }
?>