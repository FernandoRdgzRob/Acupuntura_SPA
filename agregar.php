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
        <a href="inicio.php "> <img src="img/logo.png" alt="Logo" class="logo"> </a>
        <div class="d-flex align-items-center">
        <a href="inicio.php" class="btn btn-lg btn-outline-dark boton-negro">Inicio</a>
            <a href="marca.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Marcas</a>
            <a href="proveedor.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Proveedores</a>
            <a href="principio_activo.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Principios activos</a>
            <a href="ventas.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Ventas</a>
            <a href="index.php" class="btn btn-lg btn-outline-dark boton-negro ml-1">Cerrar sesión</a>
        </div>  
    
    </header>

    <section class="container mt-5">
        
        <h1>Producto</h1>
        <form class="pl-5 pr-5" action="agregar_producto.php" method="post">
            <div class="form-group">
                <label for="n_producto" class="fz-16">Nombre</label>
                <input required type="text" name="n_producto" class="form-control" placeholder="Ingrese el nombre del producto que desea añadir">
            </div>
            <div class="form-group">
                <label for="u_producto" class="fz-16">Uso</label>
                <input required type="text" name="u_producto" class="form-control" placeholder="Ingrese una breve descripción del uso del producto">
            </div>
            <div class="form-group">
                <label for="p_producto" class="fz-16">Presentación</label>
                <input required type="text" name="p_producto" class="form-control" placeholder="Solución, tabletas, jarabe, comprimidos, etc.">
            </div>
            <div class="form-group">
                <label for="precio_prod" class="fz-16">Precio de venta</label>
                <input required type="number" name="precio_prod" class="form-control" placeholder="Ingrese el precio de venta del producto">
            </div>
            <div class="form-group">
                <label for="m_producto" class="fz-16">Marca</label>
                <select class="form-control" name="m_producto" id="m_producto" autocomplete="off">
                    <option disabled selected="selected">Seleccione una marca</option>
                    <?php try {
                        require_once('db_connection.php');
                        $sql = "SELECT * FROM info_marca";
                        $resultado = $conn->query($sql);
                        while( $eventos = $resultado->fetch_assoc() ) { ?>
                        
                            <option value="<?php echo $eventos['id_marca'] ?>">
                                <?php echo $eventos['nombre_marca'] ?> 
                            </option>

                        <?php }
                    }

                    catch(Exception $e) {
                        echo $e->getMessage();
                    } 
                    
                    
                    
                    ?>
                    
                </select>
            </div>

            
                <h2 class="fz-16">Principio activo</h2>
                    <?php try {
                        require_once('db_connection.php');
                        $sql = "SELECT * FROM info_principio_activo";
                        $resultado = $conn->query($sql);
                        while( $eventos = $resultado->fetch_assoc() ) { ?>
                            <div class="form-check ml-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="<?php echo $eventos['id_principio'] ?>" name="id_prin[]">
                                <label class="form-check-label" for="prin_activo">
                                    <?php echo $eventos['nombre_sustancia'] ?> 
                                </label>
                            </div>

                        <?php }
                    }

                    catch(Exception $e) {
                        echo $e->getMessage();
                    } 
                    
                    
                    
                    ?>
                    
            

            <div class="form-group">
                <label for="prov_prod" class="fz-16">Proveedor</label>
                <select class="form-control" name="prov_prod" id="prov_prod" autocomplete="off">
                    <option disabled selected="selected">Seleccione un proveedor</option>
                    <?php try {
                        
                        $sql2 = "SELECT * FROM info_proveedor";
                        $resultado2 = $conn->query($sql2);
                        
                        while($eventos2 = $resultado2->fetch_assoc()) { ?>
                            <option value="<?php echo $eventos2['id_proveedor'] ?>">
                                <?php echo $eventos2['nombre_proveedor'] ?> 
                            </option>
                        <?php }
                    }

                    catch(Exception $e) {
                        echo $e->getMessage();
                    } 
                    
                    mysqli_close($conn);
                    ?>
                    
                </select>
            
            </div>

                    
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-dark btn-lg ">Agregar producto</button>
            </div>
        </form>






        <h1>Marca</h1>
        <form class="pl-5 pr-5" action="agregar_marca.php" method="post">
            <div class="form-group">
                <label for="n_marca" class="fz-16">Nombre</label>
                <input required type="text" name="n_marca" class="form-control" placeholder="Ingrese el nombre de la marca que desea añadir">
            </div>
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-dark btn-lg ">Agregar marca</button>
            </div>
        </form>

        <h1 class="mt-3">Principio activo</h1>
        <form class="pl-5 pr-5" action="agregar_principio_activo.php" method="post">
            <div class="form-group">
                <label for="n_principio" class="fz-16">Nombre</label>
                <input required type="text" name="n_principio" class="form-control" placeholder="Ingrese el nombre del principio activo que desea añadir">
            </div>
            <div class="form-group">
                <label for="u_principio" class="fz-16">Uso</label>
                <input required type="text" name="u_principio" class="form-control" placeholder="Ingrese una breve descripción del uso del principio activo">
            </div>
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-dark btn-lg ">Agregar principio activo</button>
            </div>
        </form>

        <h1 class="mt-3">Proveedor</h1>
        <form class="pl-5 pr-5 mb-5" action="agregar_proveedor.php" method="post">
            <div class="form-group">
                <label for="n_proveedor" class="fz-16">Nombre</label>
                <input required type="text" name="n_proveedor" class="form-control" placeholder="Ingrese el nombre del proveedor que desea añadir">
            </div>
            <div class="form-group">
                <label for="dir_proveedor" class="fz-16">Dirección</label>
                <input required type="text" name="dir_proveedor" class="form-control" placeholder="Ingrese la dirección del proveedor">
            </div>
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-dark btn-lg ">Agregar proveedor</button>
            </div>
        </form>
    </section>
    

</body>
</html>