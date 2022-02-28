<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Ventas</title>
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
            <a href="index.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Cerrar sesión</a>
        </div>  
    
    </header>

    <section class="container mt-5">

        <h1>Registro de ventas</h1>

        <table class="table">
            <tr class="thead-dark text-center fz-14">
                <th class="align-middle">ID</th>
                <th class="align-middle">Fecha de venta</th>
                <th class="align-middle">Total</th>
                <th class="align-middle">Acciones</th>
            </tr>
            
            <?php 
            try {
                require_once('db_connection.php');
                $sql = "SELECT * FROM info_venta";
                $resultado = $conn->query($sql);
                while ($eventos = $resultado->fetch_assoc()) { ?>
                    <tr class="table-bordered fz-13">
                        <td class="text-center align-middle col-2"><?php echo utf8_encode($eventos['id_venta']); ?></td>
                    	<td class="text-center align-middle col-4"><?php echo utf8_encode($eventos['fecha_venta']); ?></td>
                        <td class="text-center align-middle col-3"><?php echo utf8_encode("$".$eventos['total_venta']); ?></td>
                        <td class="text-center align-middle col-3">
                            <div class="d-flex justify-content-around">
                                <form action="detalles_venta.php" method="post">
                                    <button type="submit" class="btn btn-lg btn-outline-dark boton-negro" name="id_ven" value="<?php echo $eventos['id_venta']?>">Detalles</button>
                                </form>
                            </div>
                        </td>
					</tr>
                <?php }

            }

            catch(Exception $e) {
                echo $e->getMessage();
            } ?>

        </table>
        <div class="d-flex flex-row-reverse mt-4">
            <a href="agregar_venta.php" class="btn btn-lg btn-outline-secondary boton-negro ml-1">Agregar nueva venta</a>
            <a href="consultar_venta.php" class="btn btn-lg btn-outline-secondary boton-negro ml-1">Consultar venta por fecha</a>
        </div>
    
    </section>
</body>
</html>