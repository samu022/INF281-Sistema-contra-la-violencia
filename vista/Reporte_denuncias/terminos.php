<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terminos y Condiciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0; /* Elimina el margen predeterminado del cuerpo para ocupar toda la pantalla */
            padding: 0; /* Elimina el relleno predeterminado del cuerpo */
            background-color: #57d2db; /* Establece el color de fondo para todo el cuerpo */
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
	        background-color: #fff; /* Establece el color de fondo para el formulario */
        }

        h2 {
            color: #555;
            text-align: center;
        }

	    h4 {
            color: #555;
        }

        p {
            margin-bottom: 15px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 8px;
            padding-left: 20px; /* Agregado para dar espacio al texto */
            position: relative;
        }

        li::before {
            content: '\2022';
            color: #4CAF50;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
            position: absolute;
            left: 1.5em; /* Ajusta la posición de las viñetas */
        }

        label {
            display: block;
            margin: 10px 0;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>

</head>
<body>

    <h2><center>Términos y Condiciones</center></h2>

    <form action="/procesar-denuncia" method="post">

        <div>
           
            <h4>Datos del Formulario:</h4>
            Incluye campos para recopilar información relacionada con el incidente, como detalles del agresor, descripción de la violencia, pruebas disponibles y geolocalización si es pertinente.
            
            <h4>Confidencialidad y Uso de la Información:</h4>
            <ul>
                <li>Informa sobre la confidencialidad de la información proporcionada.</li>
                <li>Asegura que la información recopilada se utilizará únicamente con fines de investigación y no se compartirá con terceros sin consentimiento.</li>
            </ul>
                
            <h4>Compromiso contra la Desinformación:</h4>
            Establece que la presentación de información falsa con el propósito de difamar o perjudicar a otra persona no será tolerada.
            <p>Al utilizar este formulario, aceptas los siguientes términos y condiciones:</p>
            <ul>
                <li>La información proporcionada es veraz, completa y actualizada.</li>
                <li>El uso indebido de este formulario puede resultar en acciones legales.</li>
                <li>No se tolerará la presentación de información falsa con el propósito de difamar o perjudicar a otra persona.</li>
                <li>La información recopilada se utilizará únicamente con fines de investigación y no será compartida con terceros sin consentimiento.</li>
                <li>La presente denuncia no garantiza acciones inmediatas, pero se investigará de acuerdo con los procedimientos establecidos.</li>
            </ul>

            <h4>Base Legal</h4>
            <P>LEGISLACION NACIONAL</P>
            <ul>
            <li>Constitución Política del Estado</li>
            <li>Código de Procedimiento Penal, de 25 de marzo de 1999, Ley N° 1970.</li>
            <li>Ley Marco de Autonomías y Descentralización “Andrés Ibáñez”, de 19 de julio de 2010, Ley N°031.</li>
            <li>Ley Contra el Acoso y Violencia Política Hacia las Mujeres, de 28 de mayo de 2012, Ley ° 243.</li>
            <li>Ley del Sistema Nacional de Seguridad Ciudadana “Para una Vida Segura”, de 31 de julio de 2012, Ley N° 264.</li>
            <li>Ley Integral Contra la Trata y Tráfco de Personas, de 31 de julio de 2012</li>
            <li>Ley N° 263.</li>
            <li>Ley Integral para Garantizar a las Mujeres una Vida Libre de Violencia, de 09 de marzo de 2013</li>
            <li>Ley N° 348.</li>
            </ul>

            <P>PROTOCOLOS, GUÍAS Y MANUALES</P>
            <ul> 
            <li>Guía de Acción Directa en hechos de violencia contra las mujeres, de la Fuerza Especial de lucha Contra la Violencia “Genoveva Ríos”, Comando General de la Policía Boliviana, Resolución Administrativa del 02 de abril de 2015, publicado en noviembre de 2018.</li>
            <li>Guía para el funcionamiento los Servicios Legales Municipales, Ministerio de Justicia, publicado en 2015.</li>
            <li>Guía de declaratoria de alerta contra la violencia en razón de género, Ministerio de Justicia, publicado en 2015.</li>
            </ul>  
        </div>
        <?php
            if (isset($_SERVER['HTTP_REFERER'])) {
                echo '<a href="' . $_SERVER['HTTP_REFERER'] . '" class="btn btn-danger float-right">Volver</a>';
            } else {
                echo 'No hay página anterior.';
            }
            ?>



    </form>
    
</body>
</html>
