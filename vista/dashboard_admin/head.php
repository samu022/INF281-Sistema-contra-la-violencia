<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Descripción de la página">
    <meta name="author" content="Nombre del autor">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Agrega Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo personalizado para asegurarse de que la barra lateral ocupe toda la altura de la pantalla */
        .full-height {
            min-height: 100vh;
        }
        h2 {
            font-size: 34px; /* Tamaño de fuente más grande */
            font-weight: bold; /* Hace que el título sea negrita */
            color: #333; /* Color de texto negro */
            text-align: center; /* Centra el título en la página */
            padding: 10px; /* Añade espacio alrededor del título para resaltarlo */
            background-color: #ffff66; /* Fondo gris claro */
            border-radius: 10px; /* Borde redondeado */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Agrega una sombra */
            margin-top: 20px; /* Espacio superior para separar del contenido anterior */
            margin-bottom: 20px; /* Espacio inferior para separar del contenido siguiente */
        }
        /* Estilo para filas pares */
        table tr:nth-child(even) {
            background-color: #33cc33;
        }

        /* Estilo para filas impares */
        table tr:nth-child(odd) {
            background-color: #66ff33;
        }
        /* Cambia el color del texto en las celdas de la tabla */
        .table-dark th,
        .table-dark td {
            color: #000; /* Cambia el color del texto a negro (#000) */
        }
        /* Cambia el color de fondo del body */
        body {
            background-color: #66ccff; /* Puedes cambiar el color a tu preferencia */
        }
        #eventos {
            background-color: #99ccff; /* Color de fondo que desees */
        }
        #eventos h1 {
            font-size: 90px; /* Tamaño de fuente */
            color: #ffffff; /* Color del texto */
            text-align: center; /* Alineación del texto */
            margin-bottom: 20px; /* Margen inferior para separar el título del contenido */
        }
        /* Estilos para los botones personalizados */
        /* Estilo para los botones */
        /* Contenedor de botones */
        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px; /* Espacio entre las filas de botones */
        }

        /* Filas de botones */
        .button-row {
            display: flex;
            justify-content: center;
            gap: 5px; /* Espacio entre los botones en la misma fila */
        }

        /* Estilo para los botones */
        .custom-button {
            background-color: #007bff;
            border: none;
            padding: 10px; /* Ajusta el tamaño del botón */
            color: #fff;
            text-align: center;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0px 16px 20px rgba(0, 0, 0, 0.9); /* Sombra tipo 3D */
        }

        .custom-button-image {
            width: 180px; /* Tamaño de la imagen */
            height: 140px; /* Tamaño de la imagen */
            margin-bottom: 5px; /* Espaciado entre la imagen y el texto */
        }
    </style>
</head>