

<?php
require '../vendor/autoload.php';

//usamos las clases que vamos a utilizar
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];
$asunto = "Consulta desde la web";
// instanciamos el objeto de la clase phpmailer

$mail = new PHPMailer(true);

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1462348.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "consultas@nicolasjofre.com.ar";  // Mi cuenta de correo
$smtpClave = "Marcelus660*";  // Mi contraseña
// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "info@nicolasjofre.com.ar";

$mail->Host = $smtpHost;
$mail->Username = $smtpUsuario;
$mail->Password = $smtpClave;
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true);
$mail->CharSet = "utf-8";
$mail->setFrom($email,$nombre);
$mail->addAddress('info@nicolasjofre.com.ar');
$mail->Subject= $asunto;
$mensajeHtml = nl2br($mensaje);
$mail->Body = "<h1>Form enviado desde la web</h1><h3>Consulta al nombre de: $nombre con la cuenta de mail de $email y la consulta es: </h3><h4>{$mensajeHtml}</h4>"; // Texto del email en formato HTML
$mail->AltBody = "$nombre - $email - {$mensaje}"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 

$estadoEnvio = $mail->Send();
if ($estadoEnvio) {
    header("Location:../exito.html");
} else {
    echo "Ocurrió un error inesperado.";
}

?>