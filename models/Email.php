<?php
require('class.phpmailer.php');
include("class.smtp.php");
require_once("../config/conexion.php");
require_once("../models/Usuario.php");
class Email extends PHPMailer{
    protected $gCorreo="frideldev@gmail.com";//Correo Electronico 
    protected $gContrasena="zdvgszmtpuciluro";//Contraseña del la cuenta de correo
    public function enviar_correo($cur_id){
       
        $usuario = new Usuario();
       
        $datos2 = $usuario->get_cursos_usuario_x_id($cur_id);

        $this->IsSMTP();
        $this->Host = 'smtp.gmail.com';
        $this->Port = 587;
        $this->SMTPAuth = true;
        $this->SMTPSecure = 'tls';

        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gCorreo;
        $this->FromName = "Academia Lider-Entrega de Certificado";
        $this->CharSet = 'UTF8';
        foreach ($datos2 as $row2){
       
            $tbody = "";
            $tbody .=
            '
            <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
         <tr style="border-collapse:collapse">
          <td align="center" style="padding:0;Margin:0">
           <table class="es-content-body" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
             <tr style="border-collapse:collapse">
              <td align="left" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:40px;padding-bottom:40px">
               <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                 <tr style="border-collapse:collapse">
                  <td align="center" style="padding:0;Margin:0;border-radius:12px;overflow:hidden;width:580px">
                   <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-left:1px solid #e1effc;border-right:1px solid #e1effc;border-top:1px solid #e1effc;border-bottom:1px solid #e1effc;background-color:#ffffff;border-radius:12px;box-shadow:0 20px 20px #cccccc" role="presentation">
                     <tr style="border-collapse:collapse">
                      <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-top:30px;padding-left:30px;padding-right:30px"><h2 style="Margin:0;line-height:34px;mso-line-height-rule:exactly;font-family:"Roboto Condensed", "Arial Narrow", Arial, sans-serif;font-size:28px;font-style:normal;font-weight:normal;color:#151D41">Felicidades completaste exitosamente tu curso '. $row2["cur_nom"].'</h2></td>
                     </tr>
                     <tr style="border-collapse:collapse">
                      <td align="left" style="padding:0;Margin:0;padding-top:15px;padding-left:30px;padding-right:30px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, "helvetica neue", helvetica, arial, sans-serif;line-height:24px;color:#6C7083;font-size:16px">Al apretar el boton podras visualizar tu certificado digital , Te agradecemos por la confianza que tuviste con nuestra academia.<br><br></p></td>
                     </tr>
                     <tr style="border-collapse:collapse">
                      <td align="left" style="Margin:r0;padding-top:25px;padding-bottom:30px;padding-left:30px;padding-right:30px"><!--[if mso]><a href="https://academialider.com.bo/certificados/view/CertificadoFirmado/index.php?curd_id='.$row2["curd_id"].'" target="_blank" hidden>
    <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" esdevVmlButton href="https://academialider.com.bo/certificados/view/CertificadoFirmado/index.php?curd_id='.$row2["curd_id"].'" 
                style="height:37px; v-text-anchor:middle; width:195px" arcsize="32%" strokecolor="#2f80ed" strokeweight="2px" fillcolor="#e1effc">
        <w:anchorlock></w:anchorlock>
        <center style="color:#2f80ed; font-family:roboto, "helvetica neue", helvetica, arial, sans-serif; font-size:13px; font-weight:400; line-height:13px;  mso-text-raise:1px">Ve tu Certificado!</center>
    </v:roundrect></a>
  <![endif]--><!--[if !mso]><!-- --><span class="msohide es-button-border" style="border-style:solid;border-color:#2F80ED;background:#E1EFFC;border-width:0px 0px 2px 0px;display:inline-block;border-radius:12px;width:auto;mso-hide:all"><a href="https://academialider.com.bo/certificados/view/CertificadoFirmado/index.php?curd_id='.$row2["curd_id"].'" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#2F80ED;font-size:16px;padding:10px 25px 10px 25px;display:inline-block;background:#E1EFFC;border-radius:12px;font-family:roboto, "helvetica neue", helvetica, arial, sans-serif;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center;mso-padding-alt:0;mso-border-alt:10px solid #E1EFFC">Vea su Certificado Aqui!</a></span><!--<![endif]--></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
       </table>
            ';
          $this->addAddress($row2["usu_correo"]);
          $this->WordWrap = 50;
          $this->IsHTML(true);
          $this->Subject = "Entrega de Certificados-".$row2["usu_nomapm"];
          $cuerpo = file_get_contents('../public/templates/Template_Certificado.html');
          $cuerpo = str_replace('$tbldetalle', $tbody, $cuerpo);
          $this->Body = $cuerpo;
          if ($this->Send()) {
            echo 'Correo enviado correctamente'.$row2["usu_nomapm"];
        } else {
            echo 'Error al enviar el correo: ' . $this->ErrorInfo;
        }
          $this->ClearAllRecipients();
        }
         
        
    }
}
?>