<?php
session_start();
require_once 'conexion.php'; // Archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']); // Verifica si se seleccionó la casilla de recordar

    // Verificación del usuario en la base de datos
    $sql = "SELECT id, password FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $password_hashed);
        $stmt->fetch();
        
        if (password_verify($password, $password_hashed)) {
            // Configura las variables de sesión
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $email;

            // Si se seleccionó "recordar usuario", guarda el email en una cookie
            if ($remember) {
                setcookie('remember_email', $email, time() + (86400 * 30), "/"); // Expira en 30 días
            } else {
                // Si no se seleccionó, elimina la cookie si existía previamente
                setcookie('remember_email', "", time() - 3600, "/");
            }

            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error'] = "Contraseña incorrecta.";
        }
    } else {
        $_SESSION['error'] = "Usuario no encontrado.";
    }
    header("Location: login.php");
    exit();
}
?>
