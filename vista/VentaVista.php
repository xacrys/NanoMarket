<?php

$accion = ''; //Buscar, Crear, Modificar
$resultado = false; //true Exitoso, false Fallido
 //Buscar, Crear, Modificar
$productoIngresado = false;
$codigo = '';
$detalle = '';
$precio = '';
$stock = '';

// Estos resultados vienen desde el Controlador

if (isset($nuevoProducto)) {
    $producto = $nuevoProducto;
}
if (isset($resultadoP)) {
    $productoIngresado = $resultadoP;
}
if (isset($productoBuscado)) {
    $codigo = $productoBuscado[0]->idproducto;
    $categoria = $productoBuscado[0]->idcategoria;
    $detalle = $productoBuscado[0]->detalle;
    $precio = $productoBuscado[0]->precio_venta;
    $stock = $productoBuscado[0]->stock;    
}

$idcliente = '';
$nombre = '';
$apellido = '';

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
        <script src="./js/jquery-3.3.1.min.js"></script>
        <script src="./js/validaciones.js"></script>
        <script src="./js/validacionesVenta.js"></script>
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
                        <li><a href="<?php echo $helper->url("Producto", "index"); ?>">Productos</a></li>
                        <li class="active"><a href="<?php echo $helper->url("Venta", "index"); ?>">Ventas</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">
                        <?php if(isset($_SESSION['user'])) { 
                            echo "Bienvenido ".$_SESSION['user'];
                        } ?>
                        </a>
                        </li>

                        <li><a href="
                        <?php 
                        if(isset($_SESSION['user'])) {
                            echo $helper->url("Usuario", "logout");
                        } else {
                            echo $helper->url("Usuario", "index");
                        }
                        ?>
                        "><span class="glyphicon glyphicon-log-in"></span>
                        <?php if(isset($_SESSION['user'])) { ?>
                        Logout
                        <?php } else { ?>
                        Login
                        <?php } ?>                         
                        </a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid text-center">    
            <div class="row content">
                <div class="col-sm-2 sidenav">
                </div>
                <div class="col-sm-8 text-center"> 
                    <h1>Registro de Venta</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">Datos de la Venta</div>
                        <div class="panel-body">
                        <form action="" method="post" name="VentaVista" id="VentaVista">
                        <input type="hidden" name="accion" value="ninguno"/>
                                <div class="form-group">
                                <label for="idcliente">Cédula del Cliente</label>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="idcliente" name="idcliente" value="<?php print($idcliente); ?>" placeholder="Cédula del Cliente" maxlength="10" onkeypress="return isNumericKey(event)" required> 
                                    </div>
                                    <div class="col-md-6 mb-3">     
                                        <input id="btnBuscar" class="btn btn-primary" type="button" onclick="buscarCliente($('#idcliente').val());" value="Buscar" class="btn btn-primary"/>
                                    </div>  
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6 mb-3">
                                 <div class="form-group">
                                      <label  for="inputNombre">Nombre</label>                                    
                                      <input type="text" name="nombre" value="<?php print($nombre); ?>" class="form-control" id="nombre" disabled>                                                             
                                </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label  for="inputNombre">Apellido</label>                                    
                                    <input type="text" name="apellido" value="<?php print($apellido); ?>" class="form-control" id="apellido" disabled>                                                             
                                </div>
                                </div>
                        </form>                         
                                <div class="form-group">
                                    <label for="selectTipo">Tipo de Pago</label>
                                    <select class="form-control" id="selectTipo">                                       
                                        <option value="credito">Crédito</option>
                                        <option value="contado">Contado</option>
                                    </select>
                                </div>    

                                <h3>Detalle de la venta</h3>
                            <!-- segundo formulario para cargar el producto-->                        
                        <form action="" method="post" name="VentaVista1" id="VentaVista1">       
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="inputProducto">Producto</label>
                                            <input type="text" class="form-control" id="codigo" value="<?php print($codigo);?>" name= "codigo" placeholder="Codigo del Producto" >
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputProducto">Stock</label>
                                            <input type="text" class="form-control" id="stock" value="5" name= "stock" placeholder="Stock" disabled>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputProducto">P. Venta</label>
                                            <input type="text" class="form-control" id="precio_venta" value="2.30" name= "precio_venta" placeholder="Stock" disabled>
                                        </div>
                                        <div class="col-md-6 mb-3"> 
                                            <label for="inputProducto">Cantidad</label>                                                           
                                            <input type="text" class="form-control"  id="cantidad" name= "cantidad" onkeypress="return isNumericKey(event)" maxlength="3" placeholder="Cantidad del Producto">                                                            
                                        </div>
                                    </div> 
                                </div>
                                <div class="mb-3">                                    
                                    <input type="button" id="add-row" name="add-row" class="btn btn-success" value="Agregar">                                    
                                </div>
                                    <table id="tDetalleVenta" class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Precio Unitario</th>
                                                <th>Cantidad</th>
                                                <th>Total</th>
                                                <th>Seleccionar</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr id="tfootId">
                                                <td colspan="2">Total</td>
                                                <td colspan="3">0</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"> <button type="button" class="delete-row">Eliminar</button></td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           
                                        </tbody>
                                    </table>                                    
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="reset" value="Nuevo">
                                    <input class="btn btn-success" type="submit" value="Registrar">

                                </div>
                        </form>

                        </div>
                    </div>                

                </div>
                <div class="col-sm-2 sidenav">

                </div>

            </div>
        </div>

        <!-- <footer class="container-fluid text-center">
            <p>&copy; 2018 Dominguez G., Tintin C., Mieles S.</p>
        </footer> -->

    </body>
</html>

