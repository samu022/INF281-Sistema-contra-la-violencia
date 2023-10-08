<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
    <style>
        /* Estilos personalizados */
        body {
            background: linear-gradient(#141e30, #243b55);
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        .title {
            text-align: center;
        }

        .card {
            background: rgba(0, 0, 0, 0.5);
            box-shadow: 0 15px 25px rgba(0,0,0,.6);
            padding: 20px;
        }

        .btn-cyan {
            background: #03e9f4;
            color: #fff;
            border: none;
            outline: none;
            transition: background 0.3s ease;
            position: relative;
        }

        .btn-cyan:hover {
            background: #03c3df;
            cursor: pointer;
        }

        .btn-cyan::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(90deg, transparent, #03e9f4);
            transition: width 0.3s ease;
        }

        .btn-cyan:hover::before {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="title">Sistema de apoyo a víctimas de violencia</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Iniciar Sesión</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de usuario</label>
                            <input type="text" class="form-control" id="username" name="usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="contrasenia" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-cyan" name="login">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p style="margin-bottom: 0;">¿No tiene cuenta? <a href="../controlador/usuarioRegistro.php">Regístrese aquí</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts de Bootstrap (asegúrate de incluirlos) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-b9qOV5n35SO9TRLfCx6o5T9z2wD9sv7T+KqFMzeA3Fz5/z8f5yeNQ/vvOkc2oq8Mp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-jZR7Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYlT" crossorigin="anonymous"></script>

</body>
</html>
