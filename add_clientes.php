<?php

session_start();
require('config.php');
$names = $_POST['name'];
$addres= $_POST['contact'];
$date = $_POST['address'];
$register = "INSERT INTO clientes(nombres,direccion,fecha_registro) VALUES('$names','$addres','$date',)" or die("error" . mysqli_errno($db_link));
$result = mysqli_query($db_link, $register);
header('location:customers.php');
mysqli_close($db_link);
?>
