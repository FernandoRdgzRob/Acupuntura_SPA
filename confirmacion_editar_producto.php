<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Confirmación</title>
</head>
<body>

<header class="container d-flex justify-content-between mt-4">
        <img src="img/logo.png" alt="Logo" class="logo">
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
				
            $id = htmlspecialchars($_POST['id_detalles_prod']);
            
            $ubicacion = htmlspecialchars($_POST['ubic']);

            $piso = htmlspecialchars($_POST['pi']);

            $fechaCompra = htmlspecialchars($_POST['f_compra']);

            $fechaCaducidad = htmlspecialchars($_POST['f_caduc']);

            $precioCompra = htmlspecialchars($_POST['p_compra']);

            $sql = "UPDATE detalles_producto SET ubicacion='$ubicacion', piso='$piso', fecha_compra='$fechaCompra', fecha_caducidad='$fechaCaducidad', precio_compra='$precioCompra' WHERE id_detalles_prod='$id'";
				
            $resultado = $conn->query($sql); ?>

            <div class="pt-4 pl-5 mb-5">
                <h1>Se modificó la información de manera exitosa</h1>
                <h2 class="mt-5 pl-5">Ubicación: <?php echo $ubicacion; ?></h2>
                <h2 class="mt-5 pl-5">Piso: <?php echo $piso; ?></h2>
                <h2 class="mt-5 pl-5">Fecha de compra: <?php echo $fechaCompra; ?></h2>
                <h2 class="mt-5 pl-5">Fecha de caducidad: <?php echo $fechaCaducidad; ?></h2>
                <h2 class="mt-5 pl-5">Precio de compra: <?php echo $precioCompra; ?></h2>
            </div>   

        <?php }

        catch(Exception $e) {
            echo $e->getMessage();
        }
            
        mysqli_close($conn); ?>

    </section>

</body>
</html>