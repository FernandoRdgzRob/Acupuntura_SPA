<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Eliminar</title>
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

    <section class="container mt-5">
        
        <h1 class="ml-5">Eliminar producto</h1>
        <?php try {
            require_once('db_connection.php');
            $id = $_POST['id_prod'];

            $sql = "SELECT vendido FROM detalles_producto WHERE id_detalles_prod='$id'";
            $resultado = $conn->query($sql);
            $eventos = $resultado->fetch_assoc();

            $sql3 = "SELECT id_producto FROM detalles_producto WHERE id_detalles_prod='$id'";
            $resultado3 = $conn->query($sql3);
            $eventos3 = $resultado3->fetch_assoc();
            $id_producto = $eventos3['id_producto'];

            if($eventos['vendido']) { ?>
                <h2 class="mx-5 mt-4">No es posible eliminar este producto debido a que aparece en la sección de ventas realizadas.</h2>
            <?php }
            else {
                $sql2 = "DELETE FROM detalles_producto WHERE id_detalles_prod='$id'";
                $resultado2 = $conn->query($sql2); 

                $sql5 = "SELECT SUM(NOT vendido) FROM detalles_producto WHERE id_producto = '$id_producto')";
                $resultado5 = $conn->query($sql5);
                $eventos5 = $resultado5['SUM(NOT vendido)'];

                if($eventos5 == NULL) {
                    $sql4 = "UPDATE info_producto SET cantidad_existencia = 0 WHERE id_producto = '$id_producto'";
                    $resultado4 = $conn->query($sql4);
                }

                else {
                    $sql4 = "UPDATE info_producto SET cantidad_existencia = (SELECT SUM(NOT vendido) FROM detalles_producto WHERE id_producto = '$id_producto') WHERE id_producto = '$id_producto'";
                    $resultado4 = $conn->query($sql4); 
                } ?>
                
                    

                <h2 class="mx-5 mt-4">Se ha eliminado el producto seleccionado de manera exitosa.</h2>
            
            <?php }

        }

        catch(Exception $e) {
            echo $e->getMessage();
        }
        
        mysqli_close($conn);
        
        ?>

    </section>
    

</body>
</html>