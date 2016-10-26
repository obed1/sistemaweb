<?php

session_start();
if (!isset($_SESSION['idusuario']) || (trim($_SESSION['idusuario']) == '')) {
    header('location:productos.php');
    exit();
}
$session_id = $_SESSION['idusuario'];
$session_id = $_SESSION['usuario'];
?>