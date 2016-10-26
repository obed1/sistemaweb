<?php

$username = "root";
$password = "";
$host = "localhost";
$database = "bd_farmacia";
$db_link = mysqli_connect($host, $username, $password, $database)or die("ERROR" . mysqli_error($db_link));
if (mysqli_connect_error()) {
    echo "No se pudo realizar la conexion a MYSQL. Porfavor contacte al Ingeniero";
    exit();
}
?>
