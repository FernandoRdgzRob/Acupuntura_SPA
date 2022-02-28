<?php session_start();

require 'admin/config.php';
require 'functions.php';

$errores = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);

    $conexion = conexion($bd_config);
    $statement = $conexion->prepare('SELECT * from usuarios WHERE nombre_usuario = :usuario AND password = :password');
    $statement->execute([
        ':usuario' => $usuario,
        ':password' => $password
    ]);

    $resultado = $statement->fetch();

    if($resultado !== false) {
        $_SESSION['usuario'] = $usuario;
        header('Location: '.RUTA.'validar.php');
    } else {
        $errores .= '<li class="error">Tu usuario y/o contraseña son incorrectos</li>';
    }
}

require 'views/login.view.php';

?>