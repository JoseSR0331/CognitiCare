<?php
session_start();
require_once '../API/conn/conexion.php';// Archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $nombreUsuario = $_POST['nombreUsuario'];
    $contra = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $confirm_password = $_POST['confirm_password'];

    $conn->begin_transaction();
    
    try{

        if($stmt1 = $conn->prepare("INSERT INTO usuarios (usuario,email,contra,fecha_registro) VALUES (?,?,?, NOW());"))
        {
            $stmt1->bind_param("sss",$nombreUsuario,$email,$contra);  
            $stmt1->execute(); 
            $id_us = $conn->insert_id;

            if($stmt2 = $conn->prepare("INSERT INTO info_p (id_us,nombre,apellidos,edad) VALUES (?,?,?,?);"))
            {
                $stmt2->bind_param("sssi", $id_us,$nombre,$apellidos,$edad);
                $stmt2->execute();
                $conn->commit();
                $_SESSION['success'] = "Registro exitoso. Por favor, inicia sesión.";
                    echo "<script>
                    alert('" . addslashes($_SESSION['success']) . "');
                    window.location.href = '../login.php';
                    </script>";
                exit();
            }
            else{
                echo "no disponible";
            }
        }
        else{
            echo "No disponible";
        }


    } catch(Exception $e){
        $conn->rollback();
        echo "Error en el registro: ".$e->getMessage();
    }
   $conn->close();
}
?>
