<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Consulta</title>
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

        <h1>Consulta de ventas por rango de fecha</h1>

        <form class="pl-5 pr-5" action="confirmacion_consultar_venta.php" method="post">
            <div class="form-group">
                <label for="desde" class="fz-16">Desde la fecha:</label>
                <input required type="date" name="desde" class="form-control">
            </div>

            <div class="form-group">
                <label for="hasta" class="fz-16">Hasta la fecha:</label>
                <input required type="date" name="hasta" class="form-control">
            </div>

            <div class="d-flex d-flex flex-row-reverse mb-5">
                <button type="submit" class="btn btn-dark btn-lg ">Enviar consulta</button>
            </div>
        </form>

        
    
    </section>
</body>
</html>