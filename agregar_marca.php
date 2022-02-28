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
        <img src="img/logo.png" alt="Logo" class="logo">
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

        <?php try {
			require_once('db_connection.php');
				
			$nombre = htmlspecialchars($_POST['n_marca']);

            $sql = "INSERT INTO info_marca(nombre_marca) VALUES('$nombre')";
				
            $resultado = $conn->query($sql); ?>

            <div class="pt-4 pl-5">

                <h1>Se agregó exitosamente la siguiente marca:</h1>

                <h2 class="mt-5 pl-5">Nombre: <?php echo $nombre; ?></h2>

            </div>    
                        
            
				


        <?php }

        catch(Exception $e) {
            echo $e->getMessage();
		}
			
		mysqli_close($conn); ?>





    </section>
    

</body>
</html>