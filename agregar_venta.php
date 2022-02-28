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

        <h1>Agregar venta</h1>
        <form class="pl-5 pr-5" action="confirmar_venta.php" method="post">
            <div class="form-group">
                <label for="f_venta" class="fz-16">Fecha en que se está realizando la venta</label>
                <input required type="date" name="f_venta" class="form-control" placeholder="Ingrese la fecha en que se está realizando la venta">
            </div>

            <h2 class="fz-16">Artículos vendidos</h2>
            <table class="table">
                <tr class="thead-light text-center fz-14">
                    <th class="align-middle col-2">Vendido</th>
                    <th class="align-middle col-2">ID</th>
                    <th class="align-middle col-4">Nombre</th>
                    <th class="align-middle col-4">Precio de venta</th>
                </tr>

                <?php 
                try {
                    require_once('db_connection.php');
                    $sql = "SELECT * FROM detalles_producto INNER JOIN info_producto ON detalles_producto.id_producto=info_producto.id_producto WHERE vendido=FALSE";
                    $resultado = $conn->query($sql);
                    while ($eventos = $resultado->fetch_assoc()) { ?>
                        <tr class="table-bordered fz-13">
                            <td class="align-middle">
                                <div class="form-check ml-5">
                                    <input class="form-check-input" type="checkbox" name="vendido[]" value="<?php echo $eventos['id_detalles_prod']; ?>">
                                </div>
                            
                            </td>
                            <td class="text-center align-middle"><?php echo $eventos['id_detalles_prod']; ?></td>
                            <td class="text-center align-middle"><?php echo $eventos['nombre_producto']; ?></td>
                            <td class="text-center align-middle col-2"><?php echo $eventos['precio_venta']; ?></td>
                        </tr>
                    <?php }

                }

                catch(Exception $e) {
                    echo $e->getMessage();
                } ?>

            </table>
            
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-dark btn-lg ">Agregar venta</button>
            </div>
        </form>
    
    </section>
    

</body>
</html>