<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Detalles</title>
</head>
<body>

    <header class="container d-flex justify-content-between mt-4">
        <a href="inicio.php"> <img src="img/logo.png" alt="Logo" class="logo"> </a>
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

        <h1>Detalle de venta</h1>
            
        <?php 
        try {
            require_once('db_connection.php');
            $id = $_POST['id_ven'];
            $sql = "SELECT * FROM detalles_venta INNER JOIN info_venta ON detalles_venta.id_venta = info_venta.id_venta INNER JOIN detalles_producto ON detalles_venta.id_detalles_prod=detalles_producto.id_detalles_prod INNER JOIN info_producto ON detalles_producto.id_producto = info_producto.id_producto WHERE info_venta.id_venta='$id'";
            $resultado = $conn->query($sql); 
            
            
            $sql2 = "SELECT * FROM detalles_venta INNER JOIN info_venta ON detalles_venta.id_venta = info_venta.id_venta INNER JOIN detalles_producto ON detalles_venta.id_detalles_prod=detalles_producto.id_detalles_prod INNER JOIN info_producto ON detalles_producto.id_producto = info_producto.id_producto WHERE info_venta.id_venta='$id'";
            $resultado2 = $conn->query($sql2);
            $eventos2 = $resultado2->fetch_assoc();
            ?>
            
            <div class="ml-5 mt-4">
                <h2>Fecha en que se realizó la venta</h2>
                <h3 class="ml-5"> <?php echo utf8_encode($eventos2['fecha_compra']); ?> </h3>
            </div>

            <div class="ml-5 mt-4">
                <h2>Productos vendidos</h2>
                <?php while ($eventos = $resultado->fetch_assoc()) { ?>
                    <h3 class="ml-5">
                        <?php echo utf8_encode($eventos['nombre_producto']) . ": $" . utf8_encode($eventos['precio_venta']); ?>
                    </h3>
                <?php } ?>
            </div>

            <div class="ml-5 mt-4">
                <h2>Total</h2>
                <h3 class="ml-5"> <?php echo "$" . utf8_encode($eventos2['total_venta']); ?> </h3>
            </div>


        <?php }

            catch(Exception $e) {
                echo $e->getMessage();
            } 
            
            mysqli_close($conn);?>

    
    </section>
    

</body>
</html>