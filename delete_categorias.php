<?php

include 'config.php';
$id = $_GET['id'];
$sql = "Delete from categorias where md5(idcategoria) = '$id'";
if ($db_link->query($sql) === true) {
    echo "Registro Borrado con exito";
    header('location:categorias.php');
} else {
    echo "Ups algun error! ";
}
$db_link->close();
?>