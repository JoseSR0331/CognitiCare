<?php
session_start();
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Asegúrate de usar la ruta correcta -->
</head>
<body class="d-flex align-items-center justify-content-center no-padding-top" style="height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm custom-card"> <!-- Clase personalizada -->
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <img src="./imgs/logo.jpg" alt="Logo" class="img-fluid" style="max-height: 100px;">
                        </div>

                        <h3 class="card-title text-center mb-4">Iniciar Sesión</h3>

                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form action="procesa_login.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="username" name="username" required placeholder="Ingresa tu usuario" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Ingresa tu contraseña">
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="rememberMe" name="rememberMe" <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="rememberMe">Recordar usuario</label>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-dark">Iniciar Sesión</button>
                            </div>
                        </form>

                        <div class="text-center">
                            <p class="mb-0">¿No tienes una cuenta?</p>
                            <a href="registro.php" class="btn btn-link">Regístrate aquí</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
