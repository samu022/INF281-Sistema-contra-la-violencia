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
    </style>
</head>