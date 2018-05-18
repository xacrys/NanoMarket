<?php

//Variables que interactuan con el controlador
$categorias = '';
$producto = ''; //Buscar, Crear, Modificar
$productoIngresado = false;
$nuevo = true;
$flagActualizar = false;
$codigo = '';
$categoria = '';
$detalle = '';
$precio = '';
$stock = '';
$error = false;

// Lista de Categorias consultados al controlador
if (isset($listaCategorias)) {
    $categorias = $listaCategorias;
}

// Nuevo producto para registrar
if (isset($nuevoProducto)) {
    $producto = $nuevoProducto;
}

//Bandera utilizada para saber si el producto ha sido registrado
if (isset($resultadoP)) {
    $productoIngresado = $resultadoP;
}
//Bandera utilizada para saber si el producto es nuevo
if (isset($flagNuevo)) {
    $nuevo = $flagNuevo;
}
//Proceso para saber si existe un producto creado para consultar y actualizar informacion
if (isset($productoConsultado)) {
    if (isset($listaCategoriasDos)) {
        $categorias = $listaCategoriasDos;
    }
    if ($encontrado==true) {
        $error = !$encontrado;
        $codigo = $productoConsultado[0]->idproducto;
        $categoria = $productoConsultado[0]->idcategoria;
        $detalle = $productoConsultado[0]->detalle;
        $precio = $productoConsultado[0]->precio_venta;
        $stock = $productoConsultado[0]->stock;
    }
    else{
        $error = true;
    }

    $nuevo = false;
    $flagActualizar = true;
}
if (isset($resultadoA)) {
    $productoActualizado = $resultadoA;
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Nano Market</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/validaciones.js"></script>
        <script src="js/validacionesProducto.js"></script>

        <style>
            /* Remove the navbar's default margin-bottom and rounded borders */ 
            .navbar {
                margin-bottom: 0;
                border-radius: 0;
            }

            /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
            .row.content {height: 768px}

            /* Set gray background color and 100% height */
            .sidenav {
                padding-top: 20px;
                background-color: #f1f1f1;
                height: 100%;
            }

            /* Set black background color, white text and some padding */
            footer {
                background-color: #555;
                color: white;
                padding: 15px;
                bottom: 0px;
                position: absolute;
                width: 100%;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {height:auto;} 
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-inverse">

            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#"><img src="img/Icono.png" alt="Icono" width="120" style="margin-top: -5px" ></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">

                        <li><a href="<?php echo $helper->url("Cliente", "index"); ?>">Clientes</a></li>
                        <li class="active"><a href="<?php echo $helper->url("Producto", "index"); ?>">Productos</a></li>
                        <li><a href="<?php echo $helper->url("Venta", "index"); ?>">Ventas</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo $helper->url("Usuario", "index"); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid text-center">    
            <div class="row content">
                <div class="col-sm-2 sidenav">
                </div>
                <div class="col-sm-8 text-center"> 
                    <h1>Registro de Producto</h1>
                    <div class="alert alert-success" style="display:<?php echo $productoIngresado ? 'block' : 'none'; ?>">Producto Ingresado correctamente</div>
                    <div class="alert alert-success" style="display:<?php echo $productoActualizado ? 'block' : 'none'; ?>">Producto Actualizado correctamente</div>
                    <div class="alert alert-danger" style="display:<?php echo $error ? 'block' : 'none'; ?>">Producto no encontrado</div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Datos del Producto</div>
                        <div class="panel-body">
                            <form  action="" method="post" name="ProductoVista" id="ProductoVista">
                                <div class="form-group">  
                                    <label for="inputCodigo">Codigo</label>
                                    <input type="text" class="form-control" id="inputCodigo" placeholder="Codigo del Producto" name="codigo" value="<?php print($codigo); ?>" > 
                                    <div class="invalid-feedback">Ingresa datos</div>                                    
                                    <div class="input-group-append">
                                        <button id="btnBuscar" class="btn btn-primary" type="submit" onclick="validarBuscar('<?php echo $helper->url("Producto", "buscarProducto"); ?>', 'ProductoVista', this);"  <?php echo $nuevo ? '' : 'disabled'; ?>>Buscar</button>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label for="selectCategoria">Categoria</label>

                                    <select class="form-control" id="selectCategoria" name="categoria" <?php echo $nuevo ? 'disabled' : ''; ?>>
                                        <option value="0">--Seleccione Categoria--</option>
                                        <?php
                                        foreach ($categorias as $cat) {
                                            if ($cat->idcategoria == $categoria) {
                                                echo '<option value="' . $cat->idcategoria . '" selected>' . $cat->nombre . '</option>';
                                            } else {
                                                echo '<option value="' . $cat->idcategoria . '">' . $cat->nombre . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>                            

                                <div class="form-group">
                                    <label  for="inputDetalle">Detalle</label>
                                    <input type="text" class="form-control" id="inputDetalle" placeholder="Detalle del producto" name="detalle" value="<?php print($detalle); ?>" <?php echo $nuevo ? 'disabled' : ''; ?>>                                        

                                </div>
                                <div class="form-group">
                                    <label  for="inputPrecio">Precio</label>                                    
                                    <input id="inputPrecio" class="form-control"    type="text" placeholder="Precio" name="precio"  onkeypress="return soloFlotantes(event, this);" value="<?php print($precio); ?>" <?php echo $nuevo ? 'disabled' : ''; ?>>                                                                   

                                </div>
                                <div class="form-group">
                                    <label  for="inputStock">Stock</label>                                    
                                    <input id="inputStock" class="form-control"    type="text" placeholder="Stock" name="stock" onkeypress="return soloNumeros(event)" maxlength="2" value="<?php print($stock); ?>" <?php echo $nuevo ? 'disabled' : '' ?>>

                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Nuevo" onclick="nuevoProducto('<?php echo $helper->url("Producto", "nuevo"); ?>', 'ProductoVista');">
                                    <input class="btn btn-success" type="submit" value="Registar" onclick="validarNuevo('<?php echo $helper->url("Producto", "guardar"); ?>', 'ProductoVista', this);" <?php echo $flagActualizar ? 'disabled' : ''; ?>>
                                    <input class="btn btn-success" type="submit" value="Actualizar" onclick="validarNuevo('<?php echo $helper->url("Producto", "actualizar"); ?>', 'ProductoVista', this);" <?php echo $flagActualizar ? '' : 'disabled'; ?>>
                                    <input class="btn btn-primary" type="submit" value="Cancelar" onclick="saltar('<?php echo $helper->url("Producto", "index"); ?>', 'ProductoVista');">
                                </div>
                            </form>

                        </div>
                    </div>                

                </div>
                <div class="col-sm-2 sidenav">

                </div>

            </div>
        </div>
    </body>
</html>

