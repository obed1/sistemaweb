<?php

include 'config.php';
$id = $_GET['id'];
$sql = "Delete from productos where md5(idproducto) = '$id'";
if ($db_link->query($sql) === true) {
    echo "Registro borrado con exito";
    header('location:productos.php');
} else {
    echo "Ups algun error";
}
$db_link->close();
?>