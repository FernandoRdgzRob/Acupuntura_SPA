<?php session_start();


require 'admin/config.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);
    $rol = $_POST['rol'];

    $errores = '';
    if(empty($usuario) || empty($password) || empty($rol)) {
        $errores .= '<li class="error">Rellene todos los campos</li>';
    } else {
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE nombre_usuario = :usuario LIMIT 1');
        $statement -> execute ([
            ':usuario' => $usuario
        ]);

        $resultado = $statement->fetch();
        if ($resultado != false) {
            $errores .= '<li class="error">Este usuario ya existe</li>';
        }
    }

    if ($errores == '') {
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('INSERT INTO usuarios (id_usuarios, nombre_usuario, password, tipo_usuario)
        VALUES(null,:usuario,:password, :tipo_usuario)');
        $statement->execute([
            ':usuario' => $usuario,
            ':password' => $password,
            ':tipo_usuario' => $rol
        ]);
        header('Location: '.RUTA.'index.php');
    }
    
}
require 'views/registro.view.php';
?>