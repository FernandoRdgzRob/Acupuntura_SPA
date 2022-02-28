<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Marcas</title>
</head>
<body>

    <header class="container d-flex justify-content-between mt-4">
        <a href="inicio.php"> <img src="img/logo.png" alt="Logo" class="logo"> </a>
        <div class="d-flex align-items-center">
        <a href="inicio.php" class="btn btn-lg btn-outline-dark boton-negro">Inicio</a>
            <a href="agregar.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Agregar</a>
            <a href="proveedor.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Proveedores</a>
            <a href="principio_activo.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Principios activos</a>
            <a href="ventas.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Ventas</a>
            <a href="index.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Cerrar sesión</a>
        </div>
    
    </header>

    <main class="container mt-5">
        <div class="ml-5 mr-5">
            <table class="table margin-table mb-5">
                <tr class="thead-dark text-center fz-14">
                    <th class="align-middle">Nombre de la marca</th>
                    <th class="align-middle">Acciones</th>
                </tr>

                
                <?php 
                try {
                    require_once('db_connection.php');
                    $sql = "SELECT * FROM info_marca";
                    $resultado = $conn->query($sql);
                    while ($eventos = $resultado->fetch_assoc()) { ?>
                        <tr class="table-bordered fz-13">
                            <td class="align-middle col-5">
                                <div class="text-center">
                                    <?php echo $eventos['nombre_marca']; ?>
                                </div>
                            </td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-around">
                                    <form action="editar_marca.php" method="post" onsubmit="return confirm('¿Está seguro de que desea editar la marca seleccionada?');">
                                        <button type="submit" class="btn btn-lg btn-outline-primary boton-negro" name="id_mar" value="<?php echo $eventos['id_marca']?>">Editar</button>
                                    </form>
                                    <form action="confirmacion_eliminar_marca.php" method="post" onsubmit="return confirm('¿Está seguro de que desea eliminar la marca seleccionada?');">
                                        <button type="submit" class="btn btn-lg btn-outline-danger boton-negro" name="id_mar" value="<?php echo $eventos['id_marca']?>">Eliminar</button>
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
        </div>
    
    </main>
    

</body>
</html>