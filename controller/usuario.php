<?php
    /*TODO: Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*TODO: Llamando a la clase */
    require_once("../models/Usuario.php");
    function limitar_cadena($cadena, $limite, $sufijo){
        // Si la longitud es mayor que el límite...
        if(strlen($cadena) > $limite){
            // Entonces corta la cadena y ponle el sufijo
            return substr($cadena, 0, $limite) . $sufijo;
        }
        
        // Si no, entonces devuelve la cadena normal
        return $cadena;
    }
    /*TODO: Inicializando Clase */
    $usuario = new Usuario();

    /*TODO: Opcion de solicitud de controller */
    switch($_GET["op"]){
        /*TODO: MicroServicio para poder mostrar el listado de cursos de un usuario con certificado */
        case "listar_cursos":
            $datos=$usuario->get_cursos_x_usuario($_POST["usu_id"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cur_nom"];
                $sub_array[] = $row["cur_fechini"];
                $sub_array[] = $row["cur_fechfin"];
                $sub_array[] = $row["inst_nom"]." ".$row["inst_apep"];
                $sub_array[] = '<button type="button" onClick="certificado('.$row["curd_id"].');"  id="'.$row["curd_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

            break;

        /*TODO: MicroServicio para poder mostrar el listado de cursos de un usuario con certificado */
        case "listar_cursos_top10":
            $datos=$usuario->get_cursos_x_usuario_top10($_POST["usu_id"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cur_nom"];
                $sub_array[] = $row["cur_fechini"];
                $sub_array[] = $row["cur_fechfin"];
                $sub_array[] = $row["inst_nom"]." ".$row["inst_apep"];
                $sub_array[] = '<button type="button" onClick="certificado('.$row["curd_id"].');"  id="'.$row["curd_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';
                $data[] = $sub_array;
            }
             
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

            break;

        /*TODO: Microservicio para mostar informacion del certificado con el curd_id */
        case "mostrar_curso_detalle":
            $datos = $usuario->get_curso_x_id_detalle($_POST["curd_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["curd_id"] = $row["curd_id"];
                    $output["cur_id"] = $row["cur_id"];
                    $output["cur_nom"] = $row["cur_nom"];
                    $output["cur_memb"] = $row["cur_memb"];
                    $output["curd_folio"] = $row["curd_folio"];
                    $output["cur_descrip"] = $row["cur_descrip"];
                    $output["cur_fechini"] = $row["cur_fechini"];
                    $output["cur_fechfin"] = $row["cur_fechfin"];
                    $output["cur_img"] = $row["cur_img"];
                    $output["cur_img_fir"] = $row["cur_img_fir"];
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_img"] = $row["usu_img"];
                    $output["usu_nomapm"] = $row["usu_nomapm"];
                    $output["inst_id"] = $row["inst_id"];
                    $output["inst_nom"] = $row["inst_nom"];
                    $output["inst_apep"] = $row["inst_apep"];
                    $output["inst_apem"] = $row["inst_apem"];
                    $output["cat_nom"] = $row["cat_nom"];
                    $output["cat_codigo"] = $row["cat_codigo"];
                }
                
                echo json_encode($output);
            }
            break;
         /*TODO: Microservicio para mostar informacion del certificado con el curd_id */
         case "mostrar_comprobante_detalle":
            $datos = $usuario->get_curso_x_id_detalle($_POST["curd_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["curd_id"] = $row["curd_id"];
                    $output["cur_id"] = $row["cur_id"];
                    $output["cur_nom"] = $row["cur_nom"];
                    $output["cur_memb"] = $row["cur_memb"];
                    $output["curd_folio"] = $row["curd_folio"];
                    $output["cur_descrip"] = $row["cur_descrip"];
                    $output["cur_fechini"] = $row["cur_fechini"];
                    $output["cur_fechfin"] = $row["cur_fechfin"];
                    $output["cur_img"] = $row["cur_img"];
                    $output["cur_img_fir"] = $row["cur_img_fir"];
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_img"] = $row["usu_img"];
                    $output["usu_nomapm"] = $row["usu_nomapm"];
                    $output["inst_id"] = $row["inst_id"];
                    $output["inst_nom"] = $row["inst_nom"];
                    $output["inst_apep"] = $row["inst_apep"];
                    $output["inst_apem"] = $row["inst_apem"];
                    $output["curd_comprobante"] = $row["curd_comprobante"];
                    $output["cat_nom"] = $row["cat_nom"];
                    $output["cat_codigo"] = $row["cat_codigo"];
                }
                
                echo json_encode($output);
            }
            break;
        /*TODO: Microservicio para mostar informacion de varios certificados con el cur_id */
        case "mostrar_curso_detalle_varios":
            $datos = $usuario->get_curso_x_id_curso_detalle($_POST["cur_id"]);
            $data= Array();
                foreach($datos as $row){
                    $output["curd_id"] = $row["curd_id"];
                    $output["cur_id"] = $row["cur_id"];
                    $output["cur_nom"] = $row["cur_nom"];
                    $output["cur_memb"] = $row["cur_memb"];
                    $output["curd_folio"] = $row["curd_folio"];
                    $output["cur_descrip"] = $row["cur_descrip"];
                    $output["cur_fechini"] = $row["cur_fechini"];
                    $output["cur_fechfin"] = $row["cur_fechfin"];
                    $output["cur_img"] = $row["cur_img"];
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nomapm"] = $row["usu_nomapm"];
                    $output["usu_img"] = $row["usu_img"];
                    $output["inst_id"] = $row["inst_id"];
                    $output["inst_nom"] = $row["inst_nom"];
                    $output["inst_apep"] = $row["inst_apep"];
                    $output["inst_apem"] = $row["inst_apem"];
                    $data[]=$output;
                }
                
                echo json_encode($data);
            
            break;
        /*TODO: Total de Cursos por usuario para el dashboard */
        case "total":
            $datos=$usuario->get_total_cursos_x_usuario($_POST["usu_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["total"] = $row["total"];
                }
                echo json_encode($output);
            }
            break;
         /*TODO: Total de Cursos por usuario para el dashboard */
         case "total_cursos":
            $datos=$usuario->get_total_cursos();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["total"] = $row["total"];
                }
                echo json_encode($output);
            }
            break;
         /*TODO: Total de Cursos por usuario para el dashboard */
         case "total_alumnos":
            $datos=$usuario->get_total_alumnos();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["total"] = $row["total"];
                }
                echo json_encode($output);
            }
            break;
        /*TODO: Total de Registros por Cursos en Curso Usuario */
            case "totalcursosusuario":
                $datos=$usuario->get_total_cursos_x_usuario_curso($_POST["cur_id"]);
                if(is_array($datos)==true and count($datos)>0){
                    foreach($datos as $row)
                    {
                        $output["total"] = $row["total"];
                    }
                    echo json_encode($output);
                }
                break;
        /*TODO: Mostrar informacion del usuario en la vista perfil */
        case "mostrar":
            $datos = $usuario->get_usuario_x_id($_POST["usu_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nomapm"] = $row["usu_nomapm"];
                    $output["usu_correo"] = $row["usu_correo"];
                    $output["usu_grado"] = $row["usu_grado"];
                    $output["usu_ciudad"] = $row["usu_ciudad"];
                    $output["usu_pass"] = $row["usu_pass"];
                    $output["usu_telf"] = $row["usu_telf"];
                    $output["rol_id"] = $row["rol_id"];
                    $output["usu_dni"] = $row["usu_dni"];
                }
                echo json_encode($output);
            }
            break;
        /*TODO: Mostrar informacion segun DNI del usuario registrado */
        case "consulta_dni":
            $datos = $usuario->get_usuario_x_dni($_POST["usu_dni"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nomapm"] = $row["usu_nomapm"];
                    $output["usu_correo"] = $row["usu_correo"];
                    $output["usu_pass"] = $row["usu_pass"];
                    $output["usu_telf"] = $row["usu_telf"];
                    $output["rol_id"] = $row["rol_id"];
                    $output["usu_dni"] = $row["usu_dni"];
                }
                echo json_encode($output);
            }
            break;
        /*TODO: Actualizar datos de perfil */
        case "update_perfil":
            $usuario->update_usuario_perfil(
                $_POST["usu_id"],
                $_POST["usu_nomapm"],
                $_POST["usu_pass"],
                $_POST["usu_grado"],
                $_POST["usu_ciudad"],
                $_POST["usu_telf"]
            );
            break;
        /*TODO: Guardar y editar cuando se tenga el ID */
        case "guardaryeditar":
            if(empty($_POST["usu_id"])){
                if(empty($_POST["usu_pass"]) and empty($_POST["rol_id"])){
                    $usuario->insert_usuario($_POST["usu_nomapm"],$_POST["usu_correo"],"123456",$_POST["usu_grado"],$_POST["usu_ciudad"],$_POST["usu_telf"],$_POST["usu_img"],1,$_POST["usu_dni"]);
                }
                else{
                    $usuario->insert_usuario($_POST["usu_nomapm"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["usu_grado"],$_POST["usu_ciudad"],$_POST["usu_telf"],'',$_POST["rol_id"],$_POST["usu_dni"]);
                }
                
            }else{
                $usuario->update_usuario($_POST["usu_id"],$_POST["usu_nomapm"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["usu_grado"],$_POST["usu_ciudad"],$_POST["usu_telf"],$_POST["rol_id"],$_POST["usu_dni"]);
            }
            break;
        /*TODO: Eliminar segun ID */
        case "eliminar":
            $usuario->delete_usuario($_POST["usu_id"]);
            break;
        /*TODO:  Listar toda la informacion segun formato de datatable */
        case "listar":
                $datos=$usuario->get_usuario();
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    $sub_array[] = $row["usu_nomapm"];
                    $sub_array[] = $row["usu_correo"];
                    $sub_array[] = $row["usu_telf"];
                    if ($row["rol_id"]==1) {
                        $sub_array[] = "Usuario";
                    }else{
                        $sub_array[] = "Admin";
                    }
                    $sub_array[] = '<button type="button" onClick="editar('.$row["usu_id"].');"  id="'.$row["usu_id"].'" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="eliminar('.$row["usu_id"].');"  id="'.$row["usu_id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="imagen('.$row["usu_id"].');"  id="'.$row["usu_id"].'" class="btn btn-outline-success btn-icon"><div><i class="fa fa-file"></i></div></button>';
                    $data[] = $sub_array;
                }

                $results = array(
                    "sEcho"=>1,
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data);
                echo json_encode($results);
                break;
        /*TODO: Listar todos los usuarios pertenecientes a un curso */
        case "listar_cursos_usuario":
            $datos=$usuario->get_cursos_usuario_x_id($_POST["cur_id"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cur_nom"];
                $sub_array[] = $row["usu_nomapm"];
                $sub_array[] = $row["cur_fechini"];
                $sub_array[] = $row["cur_fechfin"];
                $sub_array[] = $row["usu_correo"];
                $sub_array[] = '<button type="button" onClick="certificado('.$row["curd_id"].');"  id="'.$row["curd_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="comprobante('.$row["curd_id"].');"  id="'.$row["curd_id"].'" class="btn btn-outline-success btn-icon"><div><i class="fa fa-file-o"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["curd_id"].');"  id="'.$row["curd_id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
          /*TODO: MicroServicio para poder mostrar el listado de cursos de un usuario con certificado */
        case "listar_cursos_registro_vigente":
            $datos=$usuario->get_cursos_x_usuario_vigente($_POST["usu_id"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = "<input type='checkbox' name='detallecheck[]' value='". $row["cur_id"] ."'>";
                $sub_array[] = limitar_cadena($row["cur_nom"], 35, "...");
                $sub_array[] = $row["cur_fechini"];
                $sub_array[] = $row["cur_fechfin"];
                $sub_array[] = $row["cur_pago"];
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
        case "listar_detalle_usuario":
            $datos=$usuario->get_usuario_modal($_POST["cur_id"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = "<input type='checkbox' name='detallecheck[]' value='". $row["usu_id"] ."'>";
                $sub_array[] = $row["usu_nomapm"];
                $sub_array[] = $row["usu_correo"];
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

        case "guardar_desde_excel":
            $usuario->insert_usuario($_POST["usu_nomapm"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["usu_grado"],$_POST["usu_ciudad"],$_POST["usu_telf"],$_POST["usu_img"],$_POST["rol_id"],$_POST["usu_dni"]);
            break;
        case "update_imagen_usuario":
            $usuario->update_imagen_usuario($_POST["usux_idx"],$_POST["usu_img"]);
            break;

    }
?>