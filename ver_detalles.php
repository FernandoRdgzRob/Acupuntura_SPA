<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Ver detalles</title>
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
        <div class="ml-5">
            <h1>Detalles del producto</h1>

            <?php try {
                require_once('db_connection.php');
                $id = $_POST['id_prod'];

                $sql = "SELECT * FROM info_producto INNER JOIN info_marca ON info_producto.id_marca=info_marca.id_marca INNER JOIN info_proveedor ON info_producto.id_proveedor=info_proveedor.id_proveedor WHERE id_producto='$id'";
                $resultado = $conn->query($sql);
                $eventos = $resultado->fetch_assoc(); ?>

                <h2 class="mt-3 ml-5">Nombre: <?php echo $eventos['nombre_producto']; ?>  </h2>
                <h2 class="mt-4 ml-5">Marca: <?php echo $eventos['nombre_marca']; ?>  </h2>
                <h2 class="mt-4 ml-5">Uso: <?php echo $eventos['uso_producto']; ?>  </h2>
                <h2 class="mt-4 ml-5">Presentación: <?php echo $eventos['presentacion']; ?>  </h2>
                <h2 class="mt-4 ml-5">Cantidad en existencia: <?php echo $eventos['cantidad_existencia']; ?>  </h2>
                <h2 class="mt-4 ml-5">Precio de venta: $<?php echo $eventos['precio_venta']; ?>  </h2>
                <h2 class="mt-4 ml-5">Proveedor: <?php echo $eventos['nombre_proveedor']; ?>  </h2>
                <h2 class="mt-4 ml-5">Principio(s) activo(s):</h2>
                
                <?php
                $sql2 = "SELECT * FROM lista_principios INNER JOIN info_principio_activo ON lista_principios.id_principio=info_principio_activo.id_principio WHERE id_producto='$id'";
                $resultado2 = $conn->query($sql2);

                while($eventos = $resultado2->fetch_assoc()) { ?>
                    <h2 class="ml-10 mb-2"><?php echo $eventos   ['nombre_sustancia']; ?>  </h2>
                <?php }      

            }

            catch(Exception $e) {
                echo $e->getMessage();
            }
            
            mysqli_close($conn); 
            ?>

            <div class="mb-5"></div>


        </div>

    </section>
    

</body>
</html>