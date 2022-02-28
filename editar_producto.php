<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Editar</title>
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

        <h1>Editar producto</h1>

        <?php try {
            require_once('db_connection.php');
				
			$id = htmlspecialchars($_POST['id_prod']);

            $sql = " SELECT * FROM detalles_producto WHERE id_detalles_prod=".$id;
				
            $resultado = $conn->query($sql) ?>          
            
            <?php while ($eventos = $resultado->fetch_assoc()) { ?>
                <form class="pl-5 pr-5" action="confirmacion_editar_producto.php" method="post">
                    <input type="hidden" name="id_detalles_prod" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="ubic" class="fz-16">Ubicación</label>
                        <input required type="text" value="<?php echo $eventos['ubicacion']; ?>" name="ubic" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="pi" class="fz-16">Piso</label>
                        <input required type="number" value="<?php echo $eventos['piso']; ?>" name="pi" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="f_compra" class="fz-16">Fecha de compra</label>
                        <input required type="date" value="<?php echo $eventos['fecha_compra']; ?>" name="f_compra" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="f_caduc" class="fz-16">Fecha de caducidad</label>
                        <input required type="date" value="<?php echo $eventos['fecha_caducidad']; ?>" name="f_caduc" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="p_compra" class="fz-16">Precio de compra</label>
                        <input required type="number" value="<?php echo $eventos['precio_compra']; ?>" name="p_compra" class="form-control">
                    </div>

                    <div class="d-flex d-flex flex-row-reverse mb-5">
                        <button type="submit" class="btn btn-dark btn-lg ">Editar producto</button>
                    </div>
                </form>
            <?php }

        }

        catch(Exception $e) {
            echo $e->getMessage();
        }
            
        mysqli_close($conn); ?>

    </section>

</body>
</html>