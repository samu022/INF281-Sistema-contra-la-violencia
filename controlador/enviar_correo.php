<?php
    $mensaje=$_POST['mensaje'];
    $asunto=$_POST['asunto'];
    require 'vendor/autoload.php';
    //composer require phpmailer/phpmailer;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer(true);
    //Server settings
    $mail->SMTPDebug=0;                                         // Pon en 1 para ver debug de si se ha enviado o no el correo
    $mail->isSMTP();                                            // Enviar con SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Servidor SMTP
    $mail->SMTPAuth   = true;                                   // Habilitar SMTP authentication
    $mail->Username   = 'samuelalegre2002@gmail.com';                     // SMTP usuario
    $mail->Password   = 'ebgk gkxv kjmk wmkg';                     // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
    $mail->CharSet = 'UTF-8';

    //Recipients
    $mail->setFrom('samuelalegre2002@gmail.com', 'Nombre Ejemplo');
    $to='Inflab121@gmail.com';
    $mail->addAddress($to);     // Añadir destinatario
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ),
    );
    
    // Contenido
    $mail->isHTML(true);                                  	// Enviar en HTML
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje;

    if ($mail->send()) {
        // El correo se envió correctamente, puedes mostrar un mensaje de éxito
        echo 'El correo se ha enviado con éxito.';
    } else {
        // Hubo un error al enviar el correo, muestra un mensaje de error
        echo 'Hubo un error al enviar el correo. Por favor, inténtalo de nuevo más tarde.';
    }
    
?>

