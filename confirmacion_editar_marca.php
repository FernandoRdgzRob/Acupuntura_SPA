<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <a href="inicio.php"><meta name="viewport" content="width=device-width, initial-scale=1.0"></a>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Confirmación</title>
</head>
<body>

<header class="container d-flex justify-content-between mt-4">
        <a href="inicio.php"><img src="img/logo.png" alt="Logo" class="logo"></a>
        <div class="d-flex align-items-center">
        <a href="inicio.php" class="btn btn-lg btn-outline-dark boton-negro">Inicio</a>
            <a href="agregar.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Agregar</a>
            <a href="marca.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Marcas</a>
            <a href="proveedor.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Proveedores</a>
            <a href="principio_activo.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Principios activos</a>
            <a href="ventas.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Ventas</a>
        </div>  
    
    </header>

    <section class="container mt-5">

        <?php try {
            require_once('db_connection.php');
				
            $id = htmlspecialchars($_POST['id_mar']);

            $nombre = htmlspecialchars($_POST['nombre_m']);

            $sql = "UPDATE info_marca SET nombre_marca='$nombre' WHERE id_marca='$id'";
				
            $resultado = $conn->query($sql); ?>

            <div class="pt-4 pl-5 mb-5">
                <h1>Se modificó la información de manera exitosa</h1>
                <h2 class="mt-5 pl-5">Nombre de la marca: <?php echo $nombre; ?></h2>
            </div>

        <?php }

        catch(Exception $e) {
            echo $e->getMessage();
        }
            
        mysqli_close($conn); ?>

    </section>

</body>
</html>