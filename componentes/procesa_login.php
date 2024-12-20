<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../API/conn/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreUsuario = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['rememberMe']);

    $sql = "SELECT id_us, contra FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nombreUsuario);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($us_id, $password_hashed);
        $stmt->fetch();

        if (password_verify($password, $password_hashed)) {
            $_SESSION['user_id'] = $us_id;
            $_SESSION['username'] = $nombreUsuario;
            $_SESSION['loggedin'] = true;

            if ($remember) {
                setcookie('username', $nombreUsuario, time() + (86400 * 30), "/");
            } else {
                setcookie('username', '', time() - 3600, "/");
            }

            header("Location: ../pruebas.php");
            exit;
        } else {
            $_SESSION['error'] = "Contraseña incorrecta.";
        }
    } else {
        $_SESSION['error'] = "Usuario no encontrado.";
    }

    $stmt->close();
    $conn->close();

    header("Location: ../login.php");
    exit;
}
?>
