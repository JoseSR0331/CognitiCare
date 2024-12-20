<?php
session_start();

if (!empty($_SESSION['user_id'])) {
    header("Location: perfil.php");
    exit();
}

$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CognitiCare - Inicio de Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Estilos/styles.css">
    <style>
        body {
            background: url('./imgs/loginWall.jpg') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body class="h-100 gradient-form">

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
            <div class="card rounded-3 shadow-lg text-black">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">
                            <div class="text-center mb-4">
                                <img src="./imgs/logo-removebg.png" alt="Logo" class="img-fluid" style="max-height: 100px;">
                                <h4 class="mt-3">Bienvenido a CognitiCare</h4>
                            </div>

                            <?php if ($error): ?>
                                <div class="alert alert-danger text-center">
                                    <?= htmlspecialchars($error); ?>
                                </div>
                            <?php endif; ?>

                            <form action="./componentes/procesa_login.php" method="POST">
                                <div class="form-outline mb-4">
                                    <input type="text" id="username" name="username" class="form-control" required
                                           placeholder="Ingresa tu usuario" 
                                           value="<?= isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : ''; ?>">
                                    <label class="form-label" for="username">Usuario</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="password" name="password" class="form-control" required
                                           placeholder="Ingresa tu contraseña">
                                    <label class="form-label" for="password">Contraseña</label>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" name="rememberMe"
                                           <?= isset($_COOKIE['username']) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="rememberMe">Recordar usuario</label>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-block gradient-custom-2">Iniciar Sesión</button>
                                </div>
                            </form>

                            <div class="d-flex align-items-center justify-content-center mt-4">
                                <p class="mb-0">¿No tienes una cuenta?</p>
                                <a href="registro.php" class="btn btn-link">Regístrate aquí</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                        <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                            <h4 class="mb-4">Somos más que una empresa</h4>
                            <p class="small mb-0">En CognitiCare, trabajamos para mejorar tu experiencia digital para acceso a información sobre deterioro cognitivo y herramientas de autoevaluación.</p>
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
