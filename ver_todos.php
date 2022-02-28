<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Ver todos</title>
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
        <table class="table">
            <tr class="thead-dark text-center fz-14">
                <th class="align-middle">Piso</th>
                <th class="align-middle">Ubicación</th>
                <th class="align-middle">Vendido</th>
                <th class="align-middle">Fecha de compra</th>
                <th class="align-middle">Fecha de caducidad</th>
                <th class="align-middle">Precio de compra</th>
                <th class="align-middle col-3">Acciones</th>
            </tr>

            <?php try {
                require_once('db_connection.php');
                $id = $_POST['id_prod'];
                $sql = "SELECT * FROM info_producto INNER JOIN detalles_producto ON info_producto.id_producto = detalles_producto.id_producto WHERE info_producto.id_producto =".$id;
                $resultado = $conn->query($sql);
                
                while ($eventos = $resultado->fetch_assoc()) { ?>
                    <tr class="table-bordered fz-13">
                        <td class="text-center align-middle"><?php echo utf8_encode($eventos['piso']); ?></td>
                        <td class="align-middle"><?php echo utf8_encode($eventos['ubicacion']); ?></td>
                        <td class="text-center align-middle">
                            <?php if($eventos['vendido'] == TRUE) {
                                echo "Sí";
                            }
                            else {
                                echo "No";  
                            } ?>                     
                        </td>
                        <td class="text-center align-middle"><?php echo $eventos['fecha_compra']; ?></td>
                        <td class="text-center align-middle"><?php echo $eventos['fecha_caducidad']; ?></td>
                        <td class="text-center align-middle"><?php echo "$".$eventos['precio_compra']; ?></td>
                        <td class="align-middle">
                            <div class="d-flex justify-content-around">
                                <form action="editar_producto.php" method="post" onsubmit="return confirm('¿Está seguro de que desea editar el producto seleccionado?');">
                                    <button type="submit" class="btn btn-lg btn-outline-primary boton-negro" name="id_prod"value="<?php echo $eventos['id_detalles_prod']?>">Editar</button>
                                </form>

                                <form action="eliminar_producto.php" method="post" onsubmit="return confirm('¿Está seguro de que desea eliminar el producto seleccionado?');">
                                    <button type="submit" class="btn btn-lg btn-outline-danger boton-negro" name="id_prod" value="<?php echo $eventos['id_detalles_prod']?>">Eliminar</button>
                                </form>
                            </div>
                        </td>
                        
                    </tr>
                <?php } 
                            

            }

            catch(Exception $e) {
                echo $e->getMessage();
            }
                
            mysqli_close($conn); ?>

        </table>

        





    </section>
    

</body>
</html>