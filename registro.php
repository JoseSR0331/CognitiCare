<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="d-flex align-items-center justify-content-center no-padding-top" style="height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm custom-card">
                    <div class="card-body text-center">
                        <!-- Logo de cognitiCare -->
                        <div class="mb-4">
                            <img src="./imgs/logo.jpg" alt="Logo" class="img-fluid" style="max-height: 100px;">
                        </div>

                        <h3 class="card-title text-center mb-4">Registro de Usuario</h3>

                        <!-- Formulario de Registro -->
                        <form action="./componentes/procesa_registro.php" method="POST">
                            <!-- Campo de Nombre -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Ingresa tu nombre">
                            </div>

                            <!-- Campo de Apellido(s) -->
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellido(s)</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required placeholder="Ingresa tus apellidos">
                            </div>

                            <!-- Campo de Edad -->
                            <div class="mb-3">
                                <label for="edad" class="form-label">Edad</label>
                                <input type="number" class="form-control" id="edad" name="edad" required placeholder="Ingresa tu edad">
                            </div>

                            <!-- Campo de E-mail -->
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Ingresa tu correo electrónico">
                            </div>

                            <!-- Campo de Contraseña -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Crea una contraseña">
                            </div>

                            <!-- Campo de Confirmar Contraseña -->
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required placeholder="Confirma tu contraseña">
                            </div>

                            <!-- Botón de Registro -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-dark">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>