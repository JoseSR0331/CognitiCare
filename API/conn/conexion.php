<?php
//Servidor, usuario, password, bd
$mysqli = new mysqli("127.0.0.1", "root", "12345678","bd");
if(mysqli_connect_errno()){
    echo "ERORR";
} 
?>