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

        
        <?php  try {
            require_once('db_connection.php');
            $fecha1 = $_POST['desde'];
            $fecha2 = $_POST['hasta'];

            $sql = "SELECT COUNT(*) FROM info_venta WHERE fecha_venta BETWEEN CAST('$fecha1' AS DATE) AND CAST('$fecha2' AS DATE)";
            $resultado = $conn->query($sql);
            $eventos = $resultado->fetch_assoc();

            if($eventos['COUNT(*)'] > 0) { ?>
                <h1>Detalle de venta</h1>
                <table class="table">
                    <tr class="thead-dark text-center fz-14">
                        <th class="align-middle col-4">ID</th>
                        <th class="align-middle col-4">Fecha de venta</th>
                        <th class="align-middle col-4">Total</th>
                        <th class="align-middle col-4">Acciones</th>
                    </tr>
                    
                        <?php
                        $sql2 = "SELECT * FROM info_venta WHERE fecha_venta BETWEEN CAST('$fecha1' AS DATE) AND CAST('$fecha2' AS DATE)";
                        $resultado2 = $conn->query($sql2);

                        while($eventos2=$resultado2->fetch_assoc()) { ?>
                            <tr class="table-bordered fz-13">
                                <td class="text-center align-middle"><?php echo $eventos2['id_venta']; ?></td>
                                <td class="text-center align-middle"><?php echo $eventos2['fecha_venta']; ?></td>
                                <td class="text-center align-middle"><?php echo "$".$eventos2['total_venta']; ?></td>
                                <td class="text-center align-middle col-3">
                                    <div class="d-flex justify-content-around">
                                        <form action="detalles_venta.php" method="post">
                                            <button type="submit" class="btn btn-lg btn-outline-dark boton-negro" name="id_ven" value="<?php echo $eventos2['id_venta']?>">Detalles</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                </table>

            <?php }

                else { ?>
                <h1 class="mt-5 ml-5">No se encontraron coincidencias con los parámetros seleccionados.</h1>
                    
                <?php }
                


            }
            
            catch(Exception $e) {
                echo $e->getMessage();
            } 
                
            mysqli_close($conn);?>

        <div class="d-flex flex-row-reverse mt-4">
            <a href="ventas.php" class="btn btn-lg btn-outline-secondary boton-negro ml-1">Regresar</a>
        </div>

    
    </section>
    

</body>
</html>