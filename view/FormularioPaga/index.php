<!DOCTYPE html>
<html lang="es" class="pos-relative">
  <head>
  <?php require_once("../html/MainHead.php"); ?>
  </head>

  <body class="pos-relative">

  <div class="br-mainpanel">
     
  <div class="signin-logo tx-left tx-28 tx-bold tx-inverse"><span class="tx-normal"></span> <img src="../../public/img/logo2022.png" alt=""> <span class="tx-normal"></span></div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Registro</h6>
          <p class="mg-b-30 tx-gray-600">Ingrese sus Datos Personales</p>
          <form method="post" id="usuariof_form">
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">CI: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="usu_dni" type="text" name="usu_dni" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Ingrese el Nombre y Apellido como se vera en su certificado: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="usu_nomapm" type="text" name="usu_nomapm" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Correo Electronico: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-lowercase" id="usu_correo" type="text" name="usu_correo" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Telefono: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="usu_telf" type="text" name="usu_telf" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Residencia: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" style="width:100%" name="usu_ciudad" id="usu_ciudad" data-placeholder="Seleccione">
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
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Grado Academico: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" style="width:100%" name="usu_grado" id="usu_grado" data-placeholder="Seleccione">
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
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">Imagen Foto Carnet: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" id="usu_img" name="usu_img"/>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="action" value="add" class="btn btn-outline-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"><i class="fa fa-check"></i> Guardar</button>
                    
                </div>
            </form>
          
        
        </div>
      </div>
    </div>

    <?php require_once("../html/MainJs.php"); ?>
    <script type="text/javascript" src="formpaga.js"></script>
  </body>
</html>
