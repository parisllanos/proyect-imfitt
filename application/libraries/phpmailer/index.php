<?php
require("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "mail.quierosushi.cl"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "contacto@quierosushi.cl"; // Correo completo a utilizar
$mail->Password = "hotmail00"; // Contraseña
$mail->Port = 25; // Puerto a utilizar
$mail->From = "contacto@quierosushi.cl"; // Desde donde enviamos (Para mostrar)
$mail->FromName = "Contacto";
$mail->AddAddress("favoritez@gmail.com", "Jaime"); // Esta es la dirección a donde enviamos
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = "Titulo"; // Este es el titulo del email.
$body = "Hola mundo. Esta es la primer línea<br />";
$body .= "Acá continuo el <strong>mensaje</strong>";
$mail->Body = $body; // Mensaje a enviar
$mail->AltBody = "Hola mundo. Esta es la primer línea\n Acá continuo el mensaje"; // Texto sin html
$exito = $mail->Send(); // Envía el correo.
 
if($exito){
echo 'El correo fue enviado correctamente.';
}else{
echo 'Hubo un inconveniente. Contacta a un administrador.';
}
?>