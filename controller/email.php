<?php
require_once("../models/Email.php");
$email = new Email();

switch ($_GET["op"]) {
    case "enviarCorreo":
        $datos=$email->enviar_correo($_POST["cur_id"]);
        echo json_encode($datos);
        break;
}
?>
