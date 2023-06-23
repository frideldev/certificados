<?php
require_once("Curso.php");
    class Usuario extends Conectar{
        /*TODO: Funcion para login de acceso del usuario */
        public function login(){
            $conectar=parent::conexion();
            parent::set_names();
            if(isset($_POST["enviar"])){
                $correo = $_POST["usu_correo"];
                $pass = $_POST["usu_pass"];
                if(empty($correo) and empty($pass)){
                    /*TODO: En caso esten vacios correo y contraseña, devolver al index con mensaje = 2 */
                    header("Location:".conectar::ruta()."index.php?m=2");
					exit();
                }else{
                    $sql = "SELECT * FROM tm_usuario WHERE usu_correo=? and usu_pass=? and est=1";
                    $stmt=$conectar->prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->bindValue(2, $pass);
                    $stmt->execute();
                    $resultado = $stmt->fetch();
                    if (is_array($resultado) and count($resultado)>0){
                        $_SESSION["usu_id"]=$resultado["usu_id"];
                        $_SESSION["usu_nomapm"]=$resultado["usu_nomapm"];
                        $_SESSION["usu_correo"]=$resultado["usu_correo"];
                        $_SESSION["rol_id"]=$resultado["rol_id"];
                        /*TODO: Si todo esta correcto indexar en home */
                        header("Location:".Conectar::ruta()."view/UsuHome/");
                        exit();
                    }else{
                        /*TODO: En caso no coincidan el usuario o la contraseña */
                        header("Location:".conectar::ruta()."index.php?m=1");
                        exit();
                    }
                }
            }
        }

        /*TODO: Mostrar todos los cursos en los cuales esta inscrito un usuario */
        public function get_cursos_x_usuario($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                td_curso_usuario.curd_id,
                tm_curso.cur_id,
                tm_curso.cur_nom,
                tm_curso.cur_descrip,
                tm_curso.cur_fechini,
                tm_curso.cur_fechfin,
                tm_usuario.usu_id,
                tm_usuario.usu_nomapm,
                tm_usuario.usu_dni,
                tm_instructor.inst_id,
                tm_instructor.inst_nom,
                tm_instructor.inst_apep,
                tm_instructor.inst_apem
                FROM td_curso_usuario INNER JOIN 
                tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id INNER JOIN
                tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id INNER JOIN
                tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
                WHERE 

                td_curso_usuario.usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function get_cursos_x_usuario_vigente($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_curso
            WHERE
            tm_curso.cur_id NOT IN(
                SELECT td_curso_usuario.cur_id 
                FROM td_curso_usuario 
                WHERE td_curso_usuario.usu_id= ? 
                AND td_curso_usuario.est=1)
            AND
            tm_curso.vigencia='VIGENTE'
            AND
            tm_curso.est=1
            ";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        /*TODO: Mostrar todos los cursos en los cuales esta inscrito un usuario */
        public function get_cursos_x_usuario_top10($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                td_curso_usuario.curd_id,
                tm_curso.cur_id,
                tm_curso.cur_nom,
                tm_curso.cur_descrip,
                tm_curso.cur_fechini,
                tm_curso.cur_fechfin,
                tm_usuario.usu_id,
                tm_usuario.usu_nomapm,
                tm_usuario.usu_dni,
                tm_instructor.inst_id,
                tm_instructor.inst_nom,
                tm_instructor.inst_apep,
                tm_instructor.inst_apem
                FROM td_curso_usuario INNER JOIN 
                tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id INNER JOIN
                tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id INNER JOIN
                tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
                WHERE 
                td_curso_usuario.usu_id = ?
                AND td_curso_usuario.est = 1
                LIMIT 10";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public  function get_cursos_usuario_x_id($cur_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                td_curso_usuario.curd_id,
                tm_curso.cur_id,
                tm_curso.cur_nom,
                tm_curso.cur_descrip,
                tm_curso.cur_fechini,
                tm_curso.cur_fechfin,
                tm_usuario.usu_id,
                tm_usuario.usu_nomapm,
                tm_usuario.usu_correo,
                tm_usuario.usu_dni,
                tm_instructor.inst_id,
                tm_instructor.inst_nom,
                tm_instructor.inst_apep,
                tm_instructor.inst_apem
                FROM td_curso_usuario INNER JOIN 
                tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id INNER JOIN
                tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id INNER JOIN
                tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
                WHERE 
                tm_curso.cur_id = ?
                AND td_curso_usuario.est = 1";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cur_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public  function get_cursos_usuario_x_id_x_usuario($cur_id,$usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                td_curso_usuario.curd_id,
                tm_curso.cur_id,
                tm_curso.cur_nom,
                tm_curso.cur_descrip,
                tm_curso.cur_fechini,
                tm_curso.cur_fechfin,
                tm_usuario.usu_id,
                tm_usuario.usu_nomapm,
                tm_usuario.usu_dni,
                tm_instructor.inst_id,
                tm_instructor.inst_nom,
                tm_instructor.inst_apep,
                tm_instructor.inst_apem
                FROM td_curso_usuario INNER JOIN 
                tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id INNER JOIN
                tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id INNER JOIN
                tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
                WHERE 
                tm_curso.cur_id = ?
                AND
                tm_usuario.usu_id= ?
                AND td_curso_usuario.est = 1";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cur_id);
            $sql->bindValue(2, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Mostrar todos los datos de un curso por su id de detalle */
        public function get_curso_x_id_detalle($curd_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                td_curso_usuario.curd_id,
                td_curso_usuario.curd_folio,
                td_curso_usuario.curd_comprobante,
                tm_curso.cur_id,
                tm_curso.cur_nom,
                tm_curso.cur_memb,
                tm_curso.cur_descrip,
                tm_curso.cur_fechini,
                tm_curso.cur_fechfin,
                tm_usuario.usu_id,
                tm_usuario.usu_img,
                tm_usuario.usu_nomapm,
                tm_curso.cur_img,
                tm_curso.cur_img_fir,
                tm_instructor.inst_id,
                tm_instructor.inst_nom,
                tm_instructor.inst_apep,
                tm_instructor.inst_apem,
                tm_categoria.cat_nom,
                tm_categoria.cat_codigo
                FROM td_curso_usuario INNER JOIN 
                tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id INNER JOIN
                tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id INNER JOIN
                tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id INNER JOIN
                tm_categoria ON tm_curso.cat_id = tm_categoria.cat_id
                WHERE 
                td_curso_usuario.curd_id = ?";
                
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $curd_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
            echo $resultado;
        }
 /*TODO: Mostrar todos los datos de un curso por su id de detalle */
 public function get_curso_x_id_curso_detalle($cur_id){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="SELECT 
        td_curso_usuario.curd_id,
        td_curso_usuario.curd_folio,
        tm_curso.cur_id,
        tm_curso.cur_nom,
        tm_curso.cur_memb,
        tm_curso.cur_descrip,
        tm_curso.cur_fechini,
        tm_curso.cur_fechfin,
        tm_usuario.usu_id,
        tm_usuario.usu_img,
        tm_usuario.usu_nomapm,
        tm_curso.cur_img,
        tm_instructor.inst_id,
        tm_instructor.inst_nom,
        tm_instructor.inst_apep,
        tm_instructor.inst_apem,
        tm_categoria.cat_nom,
                tm_categoria.cat_codigo
        FROM td_curso_usuario INNER JOIN 
        tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id INNER JOIN
        tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id INNER JOIN
        tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id INNER JOIN
        tm_categoria ON tm_curso.cat_id = tm_categoria.cat_id
        WHERE 
        td_curso_usuario.cur_id = ?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $cur_id);
    $sql->execute();
    return $resultado=$sql->fetchAll();
}

        /*TODO: Cantidad de Cursos por Usuario */
        public function get_total_cursos_x_usuario($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT count(*) as total FROM td_curso_usuario WHERE usu_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
         /*TODO: Cantidad de Cursos por Usuario */
         public function get_total_cursos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT count(*) as total FROM tm_curso";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
         /*TODO: Cantidad de Cursos por Usuario */
         public function get_total_alumnos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT count(*) as total FROM tm_usuario WHERE tm_usuario.est=1 AND tm_usuario.rol_id=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
         /*TODO: Cantidad de Cursos por Usuario */
         public function get_total_cursos_x_usuario_curso($cur_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT count(*) as total FROM td_curso_usuario WHERE cur_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cur_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Mostrar los datos del usuario segun el ID */
        public function get_usuario_x_id($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario WHERE est=1 AND usu_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Mostrar los datos del usuario segun el DNI */
        public function get_usuario_x_dni($usu_dni){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario WHERE est=1 AND usu_dni=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_dni);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Actualizar la informacion del perfil del usuario segun ID */
        public function update_usuario_perfil($usu_id,$usu_nomapm,$usu_pass,$usu_grado,$usu_ciudad,$usu_telf){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario 
                SET
                    usu_nomapm = ?,
                    usu_pass = ?,
                    usu_grado = ?,
                    usu_telf = ?,
                    usu_ciudad = ?
                WHERE
                    usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_nomapm);
            $sql->bindValue(2, $usu_pass);
            $sql->bindValue(3, $usu_grado);
            $sql->bindValue(4, $usu_telf);
            $sql->bindValue(5, $usu_ciudad);
            $sql->bindValue(6, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Funcion para insertar usuario */
        public function insert_usuario($usu_nomapm,$usu_correo,$usu_pass,$usu_grado,$usu_ciudad,$usu_telf,$usu_img,$rol_id,$usu_dni){
            $conectar= parent::conexion();
            parent::set_names();
            $usux = new Usuario();
            if ($_FILES["usu_img"]["name"]!=''){
                $usu_img = $usux->upload_file();
            }
            else{
                if($usu_img!=''){
                   $usu_img=$usu_img;
                }
                else{
                    $usu_img="../../public/img/usuarios/blank.png";
                }
                
            }
            $sql="INSERT IGNORE INTO tm_usuario (usu_id,usu_nomapm,usu_correo,usu_pass,usu_grado,usu_ciudad,usu_telf,usu_img,rol_id,usu_dni,fech_crea, est) VALUES (NULL,?,?,?,?,?,?,?,?,?,now(),'1') ON DUPLICATE KEY UPDATE usu_id=LAST_INSERT_ID(usu_id);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_nomapm);
            $sql->bindValue(2, $usu_correo);
            $sql->bindValue(3, $usu_pass);
            $sql->bindValue(4, $usu_grado);
            $sql->bindValue(5, $usu_ciudad);
            $sql->bindValue(6, $usu_telf);
            $sql->bindValue(7, $usu_img);
            $sql->bindValue(8, $rol_id);
            $sql->bindValue(9, $usu_dni);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
         /*TODO: Funcion para insertar usuario */
         public function insert_usuario_curso_usuario($usu_nomapm,$usu_correo,$usu_pass,$usu_grado,$usu_ciudad,$usu_telf,$usu_img,$rol_id,$usu_dni,$cur_id){
            $curso = new Curso();
            $conectar= parent::conexion();
            parent::set_names();
            $usux = new Usuario();
            if ($_FILES["usu_img"]["name"]!=''){
                $usu_img = $usux->upload_file();
            }
            else{
                if($usu_img!=''){
                   $usu_img=$usu_img;
                }
                else{
                    $usu_img="../../public/img/usuarios/blank.png";
                }
                
            }
            $sql="INSERT IGNORE INTO tm_usuario (usu_id,usu_nomapm,usu_correo,usu_pass,usu_grado,usu_ciudad,usu_telf,usu_img,rol_id,usu_dni,fech_crea, est) VALUES (NULL,?,?,?,?,?,?,?,?,?,now(),'1') ON DUPLICATE KEY UPDATE usu_id=LAST_INSERT_ID(usu_id);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_nomapm);
            $sql->bindValue(2, $usu_correo);
            $sql->bindValue(3, $usu_pass);
            $sql->bindValue(4, $usu_grado);
            $sql->bindValue(5, $usu_ciudad);
            $sql->bindValue(6, $usu_telf);
            $sql->bindValue(7, $usu_img);
            $sql->bindValue(8, $rol_id);
            $sql->bindValue(9, $usu_dni);
            $sql->execute();
            $sql1 = "SELECT usu_id FROM tm_usuario ORDER BY usu_id DESC LIMIT 1";
            $sql1 = $conectar->prepare($sql1);
            $sql1->execute();
            $usu_id = $sql1->fetchColumn();
            print_r($usu_id);
            $curso->insert_curso_usuario($cur_id,$usu_id,'');
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Funcion para actualizar usuario */
        public function update_usuario($usu_id,$usu_nomapm,$usu_correo,$usu_pass,$usu_grado,$usu_ciudad,$usu_telf,$rol_id,$usu_dni){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario
                SET
                    usu_nomapm = ?,
                    usu_correo = ?,
                    usu_pass = ?,
                    usu_grado = ?,
                    usu_ciudad = ?,
                    usu_telf = ?,
                    rol_id = ?,
                    usu_dni = ?
                WHERE
                    usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_nomapm);
            $sql->bindValue(2, $usu_correo);
            $sql->bindValue(3, $usu_pass);
            $sql->bindValue(4, $usu_grado);
            $sql->bindValue(5, $usu_ciudad);
            $sql->bindValue(6, $usu_telf);
            $sql->bindValue(7, $rol_id);
            $sql->bindValue(8, $usu_dni);
            $sql->bindValue(9, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Eliminar cambiar de estado a la categoria */
        public function delete_usuario($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario
                SET
                    est = 0
                WHERE
                    usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Listar todas las categorias */
        public function get_usuario(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario WHERE est = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function update_imagen_usuario($usu_id,$usu_img){
            $conectar= parent::conexion();
            parent::set_names();
            require_once("Usuario.php");
            $usux = new Usuario();
            $usu_img = '';
            if ($_FILES["usu_img"]["name"]!=''){
                $usu_img = $usux->upload_file();
            }
            else{
                print_r("No hay dato de imagen");
            }
            $sql="UPDATE tm_usuario
                SET
                    usu_img = ?
                WHERE
                    usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_img);
            $sql->bindValue(2, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        /*TODO: Listar todas las categorias */
        public function get_usuario_modal($cur_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario 
                WHERE est = 1
                AND rol_id=1
                AND usu_id not in (select usu_id from td_curso_usuario where cur_id=? AND est=1)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cur_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function upload_file(){
            if(isset($_FILES["usu_img"])){
                $extension = explode('.', $_FILES['usu_img']['name']);
                $new_name = rand() . '.' . $extension[1];
                $destination = '../public/img/usuarios/' . $new_name;
                move_uploaded_file($_FILES['usu_img']['tmp_name'], $destination);
                return "../../public/img/usuarios/".$new_name;
            }
        }

    }
?>