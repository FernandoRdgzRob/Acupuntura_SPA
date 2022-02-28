<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Inicio</title>
</head>
<body>

    <header class="container d-flex justify-content-between mt-4">
        <a href="inicio.php"> <img src="img/logo.png" alt="Logo" class="logo"> </a>
        <div class="d-flex align-items-center">
            <a href="agregar.php" class="btn btn-lg btn-outline-dark boton-negro">Agregar</a>
            <a href="marca.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Marcas</a>
            <a href="proveedor.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Proveedores</a>
            <a href="principio_activo.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Principios activos</a>
            <a href="ventas.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Ventas</a>
            <a href="index.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Cerrar sesión</a>
        </div>  
    
    </header>

    <main class="container mt-5">

        <table class="table">
			<tr class="thead-dark text-center fz-14">
				<th class="align-middle">Producto</th>
				<th class="align-middle">Marca</th>
                <th class="align-middle">Precio de venta</th>
                <th class="align-middle">Cantidad en existencia</th>
                <th class="align-middle">Presentación</th>
                <th class="align-middle col-4">Acciones</th>
			</tr>

            
            <?php 
            try {
                require_once('db_connection.php');
                $sql = "SELECT * FROM info_producto INNER JOIN info_marca ON info_producto.id_marca = info_marca.id_marca";
                $resultado = $conn->query($sql);
                while ($eventos = $resultado->fetch_assoc()) { ?>
                    <tr class="table-bordered fz-13">
						<td class="align-middle"><?php echo $eventos['nombre_producto']; ?></td>
                        <td class="align-middle"><?php echo $eventos['nombre_marca']; ?></td>
                        <td class="text-center align-middle"><?php echo "$".$eventos['precio_venta']; ?></td>
                        <td class="text-center align-middle"><?php echo $eventos['cantidad_existencia']; ?></td>
                        <td class="align-middle"><?php echo $eventos['presentacion']; ?></td>
                        <td class="align-middle">
                            <div class="d-flex justify-content-around">
                                <form action="ver_detalles.php" method="post">
                                    <button type="submit" class="btn btn-lg btn-outline-dark boton-negro" name="id_prod" value="<?php echo $eventos['id_producto']?>">Detalles</button>
                                </form>
                                <form action="ver_todos.php" method="post">
                                    <button type="submit" class="btn btn-lg btn-outline-dark boton-negro" name="id_prod" value="<?php echo $eventos['id_producto']?>">Ver todos</button>
                                </form>
                                <form action="eliminar_clase.php" method="post" onsubmit="return confirm('¿Está seguro de que desea eliminar la información seleccionada?');">
                                    <button type="submit" class="btn btn-lg btn-outline-danger boton-negro" name="id_prod" value="<?php echo $eventos['id_producto']?>">Eliminar</button>
                                </form>
                            </div>
                        </td>
					</tr>
                <?php }

            }

            catch(Exception $e) {
                echo $e->getMessage();
            } 
            
            mysqli_close($conn);
            ?>
			
		</table>
    
    </main>
</body>
</html>