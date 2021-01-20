<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br>Correo: ". $correo . "<br>Telefono: " . $telefono . "<br>Mensaje" . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exeption;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
try {
    //Opciones del servidor.
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';

    //Servidor
    $mail->SMTPAuth = true;
    $mail->Username = 'micorreo';
    $mail->Password = 'clave';
    $mail->SMTPSecure = 'tls';

    $mail->Port = 587;

    //Recipientes
    $mail->setFrom('micorreo', $nombre);
    $mail->addAdress('gerardosilv.89@gmail.com');

    //Contenido
    $mail->isHTML(true);
    $mail->Subject = 'Hola estoy enviando el correo desde local host';
    $mail->Body = $body;

    $mail->senf();
    echo '<script>
        alert("El mensaje se envio correctamente") window.history.go(-1);
        </script>
        ';
}

catch(Exception $e){
    echo 'Hubo un error al enviar el mensaje: ', $mail->ErrorInfo;
}
?>