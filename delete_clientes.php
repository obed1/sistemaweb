<?php

include 'config.php';
$id = $_GET['id'];
$sql = "Delete from clientes where md5(idcliente) = '$id'";

if ($db_link->query($sql) === true) {
    echo "Registro borrado correctamente";
    header('location:clientes.php');
} else {
    echo "Ups algun error";
}
$db_link->close();
?>