<?php
     include("../modelo/conexion.php");
     //include("../modelo/administrador.php");
 
     //include("control_cookies.php");
 
     include("../vista/dashboard_admin/head.php");
     include("../vista/dashboard_admin/sidebar.php");
?>
<?php

require 'vendor/autoload.php'; // Carga las bibliotecas de Google API

// Configura las credenciales
$client = new Google_Client();
$client->setAuthConfig('path/to/your/credentials.json');
$client->setAccessType('offline');

// Autoriza la aplicación
$client->setRedirectUri('http://localhost/your-redirect-url.php'); // Debes configurar un URI de redireccionamiento válido
$client->addScope(Google_Service_Gmail::MAIL_GOOGLE_COM);

// Verifica si ya tienes un token de acceso almacenado
if (file_exists('token.json')) {
    $accessToken = json_decode(file_get_contents('token.json'), true);
    $client->setAccessToken($accessToken);
}

// Si no tienes un token de acceso, genera uno
if (!$client->isAccessTokenExpired()) {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
} else {
    // Carga la API de Gmail
    $service = new Google_Service_Gmail($client);

    // Realiza operaciones con la bandeja de entrada
    // Ejemplo: obtener los últimos 10 correos electrónicos
    $results = $service->users_messages->listUsersMessages('me', ['maxResults' => 10]);
    $messages = $results->getMessages();

    foreach ($messages as $message) {
        $messageInfo = $service->users_messages->get('me', $message->getId());
        echo 'Asunto: ' . $messageInfo->getSubject() . '<br>';
        echo 'De: ' . $messageInfo->getFrom() . '<br>';
        echo 'Mensaje: ' . $messageInfo->getSnippet() . '<br>';
        echo '<hr>';
    }
}
