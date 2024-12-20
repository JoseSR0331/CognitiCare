<?php
// Comprobar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Obtener información completa del usuario desde la tabla `usuarios`
$user_id = $_SESSION['user_id'];
if($stmt = $conn->prepare("SELECT usuario, email, fecha_registro FROM usuarios WHERE id_us = ?"))
{
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($nombreUsuario, $email, $fecha_registro);
$stmt->fetch();
$stmt->close();
}else{
    echo "No disponible";
}
if($stmt = $conn->prepare("SELECT nombre, apellidos, edad FROM info_p WHERE id_us = ?"))
{
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($nombre, $apellidos, $edad);
$stmt->fetch();
$stmt->close();
}else{
    echo "No disponible";
}
if($stmt = $conn->prepare("SELECT pr.id_prueba, p.descripcion, pr.fecha_completada
                            FROM pruebas_realizadas pr 
                            INNER JOIN pruebas p ON pr.id_prueba = p.id_p 
                            WHERE pr.id_usuario = ?"
                            ))
{
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($idprueba,$descripcionPrueba, $fecha);
$pruebas = [];

while($stmt->fetch()){
    $pruebas[] = [
    'idPrueba' => $idprueba,
    'descripcion' => $descripcionPrueba,
    'fecha' => $fecha
    ];
}
$stmt->close();
}else{
    echo "No disponible";
}
?>