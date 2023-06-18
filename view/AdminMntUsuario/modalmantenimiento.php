<div id="modalmantenimiento" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="lbltitulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
            </div>
            <!-- Formulario Mantenimiento -->
            <form method="post" id="usuario_form">
                <div class="modal-body">
                    <input type="hidden" name="usu_id" id="usu_id"/>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Nombre y Apellido: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="usu_nomapm" type="text" name="usu_nomapm" required/>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Correo: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-lowercase" id="usu_correo" type="email" name="usu_correo" required/>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="usu_pass" type="text" name="usu_pass" required/>
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
                            <label class="form-control-label">Telefono: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="usu_telf" type="text" name="usu_telf" required/>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Rol: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" style="width:100%" name="rol_id" id="rol_id" data-placeholder="Seleccione">
                                <option label="Seleccione"></option>
                                <option value="1">Usuario</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">CI: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="usu_dni" type="text" name="usu_dni" required/>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="action" value="add" class="btn btn-outline-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"><i class="fa fa-check"></i> Guardar</button>
                    <button type="reset" class="btn btn-outline-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" aria-label="Close" aria-hidden="true" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>