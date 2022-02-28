<?php session_start();

require 'admin/config.php';
require 'functions.php';


if (!isset($_SESSION['usuario'])) {
    header('Location: '.RUTA.'index.php');
}

$conexion = conexion($bd_config);
$user = iniciarSession('usuarios', $conexion);

if ($user['tipo_usuario'] == 'Empleado') {
    require 'views/usuario.view.php';
} else {
    header('Location :'.RUTA.'validar.php');
}
?>