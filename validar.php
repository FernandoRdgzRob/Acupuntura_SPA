<?php session_start();
    require 'admin/config.php';
    require 'functions.php';
    //comprobar sesión
    if (isset($_SESSION['usuario'])) {

        $conexion = conexion($bd_config);
        $usuario = iniciarSession('usuarios', $conexion);

        if ($usuario['tipo_usuario'] == 'Administrador') {
            header('Location: '.RUTA.'admin.php');
        }elseif ($usuario['tipo_usuario'] == 'Empleado') {
            header('Location: '.RUTA.'usuario.php');
        }else {
            header('Location: '.RUTA.'index.php');
        }

    } else {

        header('Location: '.RUTA.'index.php');
    }
?>