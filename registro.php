<?php
session_start();

// Protección: Redirige si ya está logueado
if (!empty($_SESSION['user_id'])) {
    header("Location: perfil.php");
    exit(); // Detener la ejecución
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cogniticare - Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Estilos/styles.css">
    <style>
        /* Fondo con imagen */
        body {
            background: url('./imgs/loginWall.jpg') no-repeat center center fixed;
            background-size: cover; /* Asegura que la imagen cubra todo el fondo */
        }
    </style>
</head>
<body class="h-100 gradient-form">

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 shadow-lg text-black">
                    <div class="row g-0">
                        <!-- Información lateral -->
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">¡Únete a CognitiCare!</h4>
                                <p class="small mb-0">Regístrate y accede a nuestras herramientas para ayudarte a diagnosticar deterioros cognitivos.</p>
                            </div>
                        </div>

                        <!-- Formulario -->
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <!-- Logo -->
                                <div class="text-center mb-4">
                                    <img src="./imgs/logo-removebg.png" alt="Logo" class="img-fluid" style="max-height: 100px;">
                                    <h4 class="mt-3">Registro de Usuario</h4>
                                </div>

                                <form action="./componentes/procesa_registro.php" method="POST" onsubmit="return validarFormulario();">
                                    <!-- Campo de Nombre -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="nombre" name="nombre" class="form-control" required placeholder="Ingresa tu nombre">
                                        <label class="form-label" for="nombre">Nombre</label>
                                    </div>

                                    <!-- Campo de Apellido(s) -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="apellidos" name="apellidos" class="form-control" required placeholder="Ingresa tus apellidos">
                                        <label class="form-label" for="apellidos">Apellido(s)</label>
                                    </div>

                                    <!-- Campo de Edad -->
                                    <div class="form-outline mb-4">
                                        <input type="number" id="edad" name="edad" class="form-control" required placeholder="Ingresa tu edad">
                                        <label class="form-label" for="edad">Edad</label>
                                    </div>

                                    <!-- Campo de E-mail -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control" required placeholder="Ingresa tu correo electrónico">
                                        <label class="form-label" for="email">E-mail</label>
                                    </div>

                                    <!-- Campo Nombre de Usuario -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control" required placeholder="Ingresa tu nombre de usuario">
                                        <label class="form-label" for="nombreUsuario">Nombre de Usuario</label>
                                    </div>

                                    <!-- Campo de Contraseña -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control" required placeholder="Crea una contraseña">
                                        <label class="form-label" for="password">Contraseña</label>
                                    </div>

                                    <!-- Campo de Confirmar Contraseña -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" required placeholder="Confirma tu contraseña">
                                        <label class="form-label" for="confirm_password">Confirmar Contraseña</label>
                                    </div>

                                    <!-- Botón de Registro -->
                                    <div class="d-grid mb-4">
                                        <button type="submit" class="btn btn-primary btn-block gradient-custom-2">Registrar</button>
                                    </div>
                                </form>

                                <div class="d-flex align-items-center justify-content-center mt-4">
                                    <p class="mb-0">¿Ya tienes una cuenta?</p>
                                    <a href="login.php" class="btn btn-link">Inicia sesión aquí</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
