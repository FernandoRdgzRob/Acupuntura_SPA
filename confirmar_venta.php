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

        <?php 
            try {
                require_once('db_connection.php');

                $fecha = $_POST['f_venta'];
                $id_detalles = $_POST['vendido'];
                
                $sql1 = "INSERT INTO info_venta(fecha_venta) VALUES('$fecha')";
                $resultado1 = $conn->query($sql1);

                $sql2 = "SELECT MAX(id_venta) FROM info_venta";
                $resultado2 = $conn->query($sql2);
                $eventos2 = $resultado2->fetch_assoc();
                $id_v = $eventos2['MAX(id_venta)'];

                foreach ($id_detalles as $id_d) {
                    $sql0 = "SELECT * FROM detalles_producto WHERE id_detalles_prod='$id_d'";
                    $resultado0 = $conn->query($sql0);
                    $eventos0 = $resultado0->fetch_assoc();
                    $id_p = $eventos0['id_producto'];
                    
                    $sql3 = "INSERT INTO detalles_venta(id_venta, id_detalles_prod) VALUES ((SELECT id_venta FROM info_venta WHERE id_venta='$id_v'), (SELECT id_detalles_prod FROM detalles_producto WHERE id_detalles_prod='$id_d'))";
                    $resultado3 = $conn->query($sql3);

                    $sql4 = "UPDATE detalles_producto SET vendido = TRUE WHERE id_detalles_prod='$id_d'";
                    $resultado4 = $conn->query($sql4);

                    $sql5 = "UPDATE info_producto SET cantidad_existencia = (SELECT SUM(NOT vendido) FROM detalles_producto WHERE id_producto = '$id_p') WHERE id_producto = '$id_p'";
                    $resultado5 = $conn->query($sql5);
                }

                $sql6 = "UPDATE info_venta SET total_venta=(SELECT SUM(precio_venta) FROM info_producto INNER JOIN detalles_producto ON info_producto.id_producto = detalles_producto.id_producto INNER JOIN detalles_venta ON detalles_producto.id_detalles_prod = detalles_venta.id_detalles_prod WHERE id_venta = '$id_v') WHERE id_venta='$id_v'";
                $resultado6 = $conn->query($sql6);

                $sql7 = "SELECT SUM(precio_venta) FROM info_producto INNER JOIN detalles_producto ON info_producto.id_producto = detalles_producto.id_producto INNER JOIN detalles_venta ON detalles_producto.id_detalles_prod = detalles_venta.id_detalles_prod WHERE id_venta = '$id_v'";
                $resultado7 = $conn->query($sql7); 
                $eventos7 = $resultado7->fetch_assoc();
                $total = $eventos7['SUM(precio_venta)'];

                ?>
                
                <div>
                    <h1>Se ha registrado la venta de manera exitosa</h1>
                    <h2 class="ml-5 mt-5">Fecha de venta: <?php echo $fecha?> </h2>
                    <h2 class="ml-5 mt-5">Total: <?php echo $total?> </h2>
                </div>
            <?php }

            catch(Exception $e) {
                echo $e->getMessage();
            } ?>
        
    
    </section>
    

</body>
</html>