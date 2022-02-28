<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Agregar</title>
</head>
<body>

<header class="container d-flex justify-content-between mt-4">
        <a href="inicio.php "> <img src="img/logo.png" alt="Logo" class="logo"> </a>
        <div class="d-flex align-items-center">
            <a href="inicio.php" class="btn btn-lg btn-outline-dark boton-negro">Inicio</a>
            <a href="agregar.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Agregar</a>
            <a href="marca.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Marcas</a>
            <a href="proveedor.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Proveedores</a>
            <a href="principio_activo.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Principios activos</a>
            <a href="ventas.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Ventas</a>
        </div>  
    
    </header>

    <section class="container mt-5 mb-5">
        
        <?php try {
            require_once('db_connection.php');
            $nombre = $_POST['n_producto'];
            $uso = $_POST['u_producto'];
            $presentacion = $_POST['p_producto'];
            $precio = $_POST['precio_prod'];
            $marca = $_POST['m_producto'];
            $proveedor = $_POST['prov_prod'];

            $sql = "INSERT INTO info_producto(nombre_producto, id_marca, presentacion, uso_producto, precio_venta, id_proveedor, cantidad_existencia) VALUES('$nombre', (SELECT id_marca FROM info_marca WHERE id_marca='$marca'), '$presentacion', '$uso', '$precio', (SELECT id_proveedor FROM info_proveedor WHERE id_proveedor='$proveedor'), 0)";
            $resultado = $conn->query($sql);

            $sql2 = "SELECT * FROM info_marca WHERE id_marca='$marca'";
            $resultado2 = $conn->query($sql2);
            $evento = $resultado2->fetch_assoc();
            $nombre_m = $evento['nombre_marca'];

            $principio_activo = $_POST['id_prin'];

            foreach($principio_activo as $prin_act) {
                $sql3 = "SELECT MAX(id_producto) FROM info_producto";
                $resultado3 = $conn->query($sql3);
                $evento3 = $resultado3->fetch_assoc();
                $id_prod = $evento3['MAX(id_producto)'];

                $sql4 ="INSERT INTO lista_principios(id_producto, id_principio) VALUES((SELECT id_producto FROM info_producto WHERE id_producto='$id_prod'), (SELECT id_principio FROM info_principio_activo WHERE id_principio='$prin_act'))";
                $resultado4 = $conn->query($sql4);
            }
            
            ?>
            
            <div class="ml-5">
                <h1>Se ha agregado de manera exitosa el producto</h1>
                <h2 class="ml-5 mt-3">Nombre: <?php echo $nombre ?> </h2>
                <h2 class="ml-5 mt-4">Uso: <?php echo $uso ?></h2>
                <h2 class="ml-5 mt-4">Presentación: <?php echo $presentacion ?> </h2>
                <h2 class="ml-5 mt-4">Precio: <?php echo $precio ?> </h2>
                <h2 class="ml-5 mt-4">Marca: <?php echo $nombre_m ?> </h2>
                <h2 class="ml-5 mt-4">Principio(s) activo(s): </h2>
            
            
            <?php

            $sql5 = "SELECT * FROM info_principio_activo INNER JOIN lista_principios ON info_principio_activo.id_principio=lista_principios.id_principio WHERE id_producto='$id_prod'";
            $resultado5 = $conn->query($sql5); ?>
            <div class="ml-5 mb-1">

                <?php while($eventos5 = $resultado5->fetch_assoc()) { ?>
                    <h2 class="ml-5"><?php echo $eventos5['nombre_sustancia']; ?> </h2>
                <?php } ?>

            </div>

            </div>

        <?php }

        catch(Exception $e) {
            echo $e->getMessage();
        }
        
        mysqli_close($conn);
        
        ?>

    </section>
    

</body>
</html>