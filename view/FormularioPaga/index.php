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
                            <label class="form-control-label">Número de C.I.: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="usu_dni" type="text" name="usu_dni" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Nombre y Apellido con grado académico si corresponde, ej.: Lic. Valentina Salvatierra Flores
Si usted es estudiante o egresado, sólo debe colocar su nombre completo.: <span class="tx-danger">*</span></label>
                            <input class="form-control" id="usu_nomapm" type="text" name="usu_nomapm" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Correo electrónico: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-lowercase" id="usu_correo" type="text" name="usu_correo" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Número de Celular con WhatsApp: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="usu_telf" type="text" name="usu_telf" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Residencia: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" style="width:100%" name="usu_ciudad" id="usu_ciudad" data-placeholder="Seleccione">
                                <option label="Seleccione"></option>
                                
                                <option value="La Paz">La Paz</option>
                                <option value="El Alto">El Alto</option>
                                <option value="Santa Cruz">Santa Cruz</option>
                                <option value="Cochabamba">Cochabamba</option>
                                <option value="Oruro">Oruro</option>
                                <option value="Sucre">Sucre</option>
                                <option value="Potosi">Potosi</option>
                                <option value="Tarija">Tarija</option>
                                <option value="Pando">Pando</option>
                                <option value="Beni">Beni</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">PROFESIÓN/CARRERA: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" style="width:100%" name="usu_grado" id="usu_grado" data-placeholder="Seleccione">
                                <option label="Seleccione"></option>
                                <option value="Bachiller">Bachiller</option>
                                <option value="Técnico Medio">Técnico Medio</option>
                                <option value="Técnico Superior">Técnico Superior</option>
                                <option value="Universitario">Universitario</option>
                                <option value="Abogacia">Abogacia</option>
                                <option value="Profesionales en Salud">Profesionales en Salud</option>
                                <option value="Profesionales en la Construcción">Profesionales en la Construcción</option>
                                <option value="Profesionales en los Negocios">Profesionales en los Negocios</option>
                                <option value="Profesionales en Educación">Profesionales en Educación</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label class="form-control-label">¿Deseás que tú certificado tenga tu fotografía? Cárgala aquí; foto 4x4 , fondo rojo, azul o plomo: </label>
                            <input class="form-control" type="file" id="usu_img" name="usu_img"/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="">
                        <p class="font-weight-bold">¡¡Muchas Gracias por tu Confianza en LÍDER Academia de Capacitación!!</p>
                        <p>
Estamos comprometidos en proporcionarte una formación de alta calidad con contenido actualizado y relevante,
basado en casos prácticos y ejemplos reales, de la mano de Reconocidos Profesionales, expertos en el Área.
¡Te deseamos un taller exitoso y enriquecedor!</p>
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
