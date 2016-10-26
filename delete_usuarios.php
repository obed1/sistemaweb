<?php

include 'config.php';
$id = $_GET['id'];
$sql = "Delete from usuarios where md5(idusuario) = '$id'";
if ($db_link->query($sql) === true) {
    echo "Registro Borrado con exito";
    header('location:usuarios.php');
} else {
    echo "Ups algun error! ";
}
$db_link->close();
?>