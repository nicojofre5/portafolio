<?php

    require '../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];
    $asunto = "Consulta desde la web";

    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $secretkey = "6LcaZ9EoAAAAAHdnATnLQk16h7DXehwDuWdJYgLv";

    $respuesta= file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha");
    $atributos = json_decode($respuesta,TRUE);
  
    $mail = new PHPMailer(true);

    $smtpHost = "c1452366.ferozo.com";
    $smtpUsuario = "consultas@nicolasjofre.com.ar";
    $smtpClave= "Marcelus660*";
    $emailDestino = "info@nicolasjofre.com.ar";
    $mail->Host =  $smtpHost;
    $mail->Username=$smtpUsuario;
    $mail->Password=$smtpClave;
    $mail->isSMTP();
    $mail->Port=465;
    $mail->SMTPSecure='ssl';
    $mail->isHTML(true);
    $mail->CharSet="utf-8";

    $mail->setFrom($email,$nombre);
    $mail->addAddress('info@nicolasjofre.com.ar');
    $mail->isHTML(true);
    $mail->Subject= $asunto;
    $mensajeHtml = nl2br($mensaje);
    $mail->Body = "<h1>Form enviado desde la web</h1><h3>Consulta al nombre de: $nombre con la cuenta de mail de $email y la consulta es: </h3><h4>{$mensajeHtml}</h4>"; // Texto del email en formato HTML
    $mail->AltBody = "$nombre - $email - {$mensaje}";
    if ($estadoEnvio) {
        header("Location:../exito.html");
    } else {
        echo "Ocurrió un error inesperado.";
    }
?>