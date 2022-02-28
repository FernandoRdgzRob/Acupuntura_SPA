<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" type="image/png" href="img/faviconc.png"/>
    <title>Registro</title>
</head>
<body class="bg-image">
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <div class="input-group">
                <i class="fas fa-user icons"></i>
                <input type="text" name="usuario" placeholder="Usuario" class="form-control">
            </div>
            <div class="input-group">
                <i class="fa fa-lock icons"></i>
                <input type="password" name="password" placeholder="Contraseña" class="form-control">
            </div>
            <div class="input-group">
                <i class="fas fa-user-tag icons"></i>
                <select class="form-control" name="rol">
                    <option value="">Selecciona tipo de usuario</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Empleado">Empleado</option>
                </select>
            </div>
            <ul>
            <?php if (!empty($errores)): ?>
                <?php echo $errores; ?>
            <?php endif; ?>
            </ul>
            <button type="submit" name="submit" class="btn btn-flat-pink">Agregar usuario</button>
        </form>
        <a href="<?php echo RUTA.'index.php' ?>" class="login-link">¿Ya tienes cuenta?</a>
    </div>
</body>
</html>