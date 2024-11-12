<?php
session_start();
require_once 'conexion.php'; // Archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validación de contraseñas
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Las contraseñas no coinciden.";
        header("Location: registro.php");
        exit();
    }

    // Hash de la contraseña
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Insertar en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellidos, edad, email, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $nombre, $apellidos, $edad, $email, $password_hashed);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registro exitoso. Por favor, inicia sesión.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Error al registrar el usuario.";
        header("Location: registro.php");
        exit();
    }
}
?>
