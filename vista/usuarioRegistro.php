<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Registro de nuevo Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Estilos para la ventana emergente */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            max-width: 80%;
            text-align: center;
        }

        .popup img {
            max-width: 100%;
            height: auto;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        /* Estilos para los tutoriales dentro de la ventana emergente */
        .tutorial {
            margin-bottom: 20px;
        }

        .tutorial img {
            max-width: 100%;
            height: auto;
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Mostrar el mensaje de error si existe -->
        <?php if (!empty($errorMsg)) : ?>
            <div class="alert alert-danger">
                <?php
                 echo $errorMsg; ?>
            </div>
        <?php endif; ?>
        <form action="" method="POST">
            <h1 class="mb-4">Bienvenido al Registro de Usuarios</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ci" class="form-label">Escriba Ci:</label>
                        <input type="text" class="form-control" name="ci" id="ci" require>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Escriba Nombres:</label>
                        <input type="text" class="form-control" name="nombre_completo" id="nom" require>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Escriba Apellido Paterno:</label>
                        <input type="text" class="form-control" name="apePaterno" id="nom" require>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Escriba Apellido Materno:</label>
                        <input type="text" class="form-control" name="apeMaterno" id="nom" require>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Escriba Fecha Nacimiento:</label>
                        <input type="Date" class="form-control" name="fechaNaci" id="nom" require>
                    </div>
                </div>
                <div class="col-md-6">
                <label for="sexo" class="form-label">Seleccione el Sexo:</label>
                    <select class="form-select" id="sexo" name="sexo" require>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Escriba Direccion:</label>
                        <input type="text" class="form-control" name="direccion" id="nom">
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Escriba Estado Civil:</label>
                        <input type="text" class="form-control" name="estado_civil" id="nom" require>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Escriba Profesion:</label>
                        <input type="text" class="form-control" name="profesion" id="nom" >
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Escriba Numero Telefonico:</label>
                        <input type="text" class="form-control" name="numero_telefono" id="nom" require>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Nombre de Usuario:</label>
                <input type="text" class="form-control" name="nombre_usuario" id="nom" require >
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Contraseña:</label>
                <input type="password" class="form-control" name="contrasenia" id="nom" require>
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Correo:</label>
                <input type="text" class="form-control" name="correo" id="nom" placeholder="example@example.com" require>
            </div>
            <h4>Contraseña de aplicación<a href="#" id="showTutorials" class="btn btn-primary">Ver Tutorial</a>
            </h4>
            <div class="mb-3">
                <label for="app" class="form-label">Ingrese su contraseña de aplicación:</label>
                <input type="text" class="form-control" name="app" id="app" required>
            </div>
            <!-- Enlace para mostrar los tutoriales -->
            
            <button type="submit" class="btn btn-success" name="RegistrarUsuario">Registrar Usuario</button>
            <button type="button" class="btn btn-danger" onclick="goBack()">Volver</button>

            
            <script>
            function goBack() {
                window.history.back();
            }
            </script>
            
        </form>
    </div>

    <script>
        // Función para abrir la ventana emergente de tutoriales
        function openTutorialsPopup() {
            // URL de la página de tutoriales o un archivo HTML que contenga los tutoriales
            var tutorialURL = 'tutoriales.php'; // Cambia esto por la URL correcta

            // Configuración de la ventana emergente
            var popupWidth = window.innerWidth * 0.8; // Ancho del 80% del ancho de la ventana
            var popupHeight = window.innerHeight * 0.8; // Altura del 80% de la altura de la ventana
            var popupLeft = (window.innerWidth - popupWidth) / 2; // Centrado horizontalmente
            var popupTop = (window.innerHeight - popupHeight) / 2; // Centrado verticalmente

            // Abre la ventana emergente
            var popupWindow = window.open(
                tutorialURL,
                'Tutoriales',
                'width=' + popupWidth + ',height=' + popupHeight + ',left=' + popupLeft + ',top=' + popupTop
            );

            // Si la ventana emergente se bloquea por un bloqueador de ventanas emergentes, muestra el enlace alternativo
            if (!popupWindow) {
                document.getElementById('openTutorialsInNewWindow').style.display = 'inline'; // Muestra el enlace alternativo
            }
        }

        // Agregar un controlador de eventos al enlace "Ver Tutoriales"
        document.getElementById('showTutorials').addEventListener('click', openTutorialsPopup);
    </script>
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="errorMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
        function goBack() {
            window.history.back();
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Función para mostrar un mensaje de error en el modal de error
            function showErrorModal(message) {
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'), {
                    backdrop: 'static',
                    keyboard: false
                });
                var errorMessage = document.getElementById('errorMessage');
                errorMessage.textContent = message;
                errorModal.show();
            }

            document.getElementById('RegistrarUsuario').addEventListener('click', function (e) {
                var ci = document.getElementById('ci').value;
                var nombreUsuario = document.getElementById('nombre_usuario').value;
                var contrasenia = document.getElementById('contrasenia').value;
                var contraseniaApp = document.getElementById('app').value;
                var correo = document.getElementById('correo').value;

                // Realizar alguna validación adicional aquí si es necesario

                if (ci === '' || nombreUsuario === '' || contrasenia === '' || contraseniaApp === '' || correo === '') {
                    e.preventDefault(); // Evitar que el formulario se envíe
                    showErrorModal('<?php echo $errorMsg; ?>'); // Mostrar el mensaje de error PHP
                }
            });
        });
    </script>
</body>
</html>
