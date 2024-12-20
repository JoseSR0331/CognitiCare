<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the index page if not logged in
    header("Location: ../login.php");
    exit;
}

$id_usuario = $_SESSION['user_id'];

require_once __DIR__ . '/../API/conn/conexion.php'; // Ensure the connection file is included

$query = "SELECT id_prueba FROM pruebas_realizadas WHERE id_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_usuario); 
$stmt->execute();

$result = $stmt->get_result();

$pruebas_realizadas = [];
while ($row = $result->fetch_assoc()) {
    $pruebas_realizadas[] = $row['id_prueba'];  
}

if (isset($_SESSION['prueba_ya_realizada'])): ?>
    <script type="text/javascript">
        // Mostrar el mensaje de la sesión usando alert()
        alert("<?php echo $_SESSION['prueba_ya_realizada']; ?>");
    </script>
    <?php 
    // Eliminar el mensaje de la sesión para evitar que se muestre de nuevo
    unset($_SESSION['prueba_ya_realizada']);
endif;

?>