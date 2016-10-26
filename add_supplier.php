<?php

session_start();
require('config.php');
$usuarios = $_POST['usuarios'];
$claves = $_POST['claves'];
$nombres = $_POST['nombres'];
$correos = $_POST['correos'];
$accesos = $_POST['accesos'];
$register = "INSERT INTO usuario(usuario,clave,nombre,correo,access) VALUES('$usuarios', '$claves', '$nombres',  '$correos', '$accesos')" or die("error" . mysqli_errno($db_link));
$result = mysqli_query($db_link, $register);
header('location:supplier.php');
mysqli_close($db_link);
?>
