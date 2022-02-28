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

        <h1>Editar marca</h1>

        <?php try {
            require_once('db_connection.php');
				
			$id = htmlspecialchars($_POST['id_mar']);

            $sql = " SELECT * FROM info_marca WHERE id_marca=".$id;
				
            $resultado = $conn->query($sql) ?>          
            
            <?php while ($eventos = $resultado->fetch_assoc()) { ?>
                <form class="pl-5 pr-5" action="confirmacion_editar_marca.php" method="post">
                    <input type="hidden" name="id_mar" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="nombre_m" class="fz-16">Nombre</label>
                        <input required type="text" value="<?php echo $eventos['nombre_marca']; ?>" name="nombre_m" class="form-control">
                    </div>

                    <div class="d-flex d-flex flex-row-reverse mb-5">
                        <button type="submit" class="btn btn-dark btn-lg ">Editar marca</button>
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