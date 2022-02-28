<?php session_start();

require 'admin/config.php';
require 'functions.php';


if (!isset($_SESSION['usuario'])) {
    header('Location: '.RUTA.'index.php');
}

$conexion = conexion($bd_config);
$admin = iniciarSession('usuarios', $conexion);

if ($admin['tipo_usuario'] == 'Administrador') {
    require 'inicio.php';
} else {
    header('Location: '.RUTA.'validar.php');
}


?>