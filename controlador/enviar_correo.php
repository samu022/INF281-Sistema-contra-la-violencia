<?php
    session_start();
    $ci_usuario=$_SESSION['ci'];
    include("../modelo/conexion.php"); 
    include("../modelo/usuarioClase.php"); 
    $car = new Usuario($ci_usuario,"","","",""); // Proporciona el valor de $ci_usuario como argumento
    $res = $car->lista_especifica();
    $reg = mysqli_fetch_array($res);
    $correoO = $reg['correo'];
    $contrasenia = $reg['contrasena_app'];

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
    $mail->Username   = $correoO;                     // SMTP usuario
    $mail->Password   = $contrasenia;                     // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
    $mail->CharSet = 'UTF-8';

    //Recipients
    $mail->setFrom($correoO, 'Nombre Ejemplo');
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
    $enviado=false;
    if ($mail->send()) {
        // El correo se envió correctamente, puedes mostrar un mensaje de éxito
        echo 'El correo se ha enviado con éxito.';
        $enviado=true;
    } else {
        // Hubo un error al enviar el correo, muestra un mensaje de error
        echo 'Hubo un error al enviar el correo. Por favor, inténtalo de nuevo más tarde.';
    }
    //GUARDAR
    include("../modelo/mensaje.php");
    $fecha_actual = date("Y-m-d"); // Obtiene la fecha en formato AAAA-MM-DD
    $hora_actual = date("H:i:s"); // Obtiene la hora en formato HH:MM:SS
    $car2 = new Mensaje("",$fecha_actual,$hora_actual,$mensaje,$ci_usuario); // Proporciona el valor de $ci_usuario como argumento
    $res2 = $car2->insertar();
    include ("../modelo/administrador.php");
    $carAdm=new Administrador("","","","");
    $resAdm = $carAdm->obtenerCIRandom();
    echo $resAdm;
    include("../modelo/recibe.php");
    $car3 = new Recibe($car2->getCodMensaje(),$resAdm); // Proporciona el valor de $ci_usuario como argumento
    $res3 = $car3->insertar();

  
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Agrega tus enlaces a Bootstrap y jQuery aquí -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Modal de resultado -->
    <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultModalLabel">Resultado del envío de correo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    if (isset($enviado) && $enviado) {
                        echo '<p class="text-success">El correo se ha enviado con éxito.</p>';
                    } else {
                        echo '<p class="text-danger">Hubo un error al enviar el correo. Por favor, inténtalo de nuevo más tarde.</p>';
                    }
                    ?>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="window.location.href='panelweb.php'">Aceptar</button>
                    <?php
                    if (isset($enviado) && !$enviado) {
                        // Si hubo un error, muestra un botón para volver a intentar
                        echo '<button type="button" class="btn btn-secondary" onclick="window.location.href=\'panelweb.php\'">Volver a Enviar</button>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Agrega tus enlaces a jQuery y Bootstrap JS aquí -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Agrega este script para mostrar el modal automáticamente -->
    <script>
        $(document).ready(function() {
            // Muestra el modal cuando la página se cargue completamente
            $('#resultModal').modal('show');
        });
    </script>
</body>
</html>