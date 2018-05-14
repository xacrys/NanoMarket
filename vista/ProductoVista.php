<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Nano Market</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            function isNumericKey(evt)
            {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode != 46 && charCode > 31
                        && (charCode < 48 || charCode > 57))
                    return true;
                return false;
            }
        </script>
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
                    <a class="navbar-brand" href="#"><img src="Recursos/img/Icono.png" alt="Icono" width="60" style="margin-top: -10px" ></a>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">Datos del Producto</div>
                        <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <label for="selectCategoria">Categoria</label>
                                    <select class="form-control" id="selectCategoria">
                                        <option>--Seleccione Categoria--</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>                            
                                <div class="form-group">
                                    <label  for="inputCodigo">Codigo</label>                                    
                                    <input type="text" class="form-control" id="inputCodigo" placeholder="Codigo del Producto">                                                             
                                </div>
                                <div class="form-group">
                                    <label  for="inputDetalle">Detalle</label>
                                    <input type="text" class="form-control" id="inputDetalle" placeholder="Detalle del producto">                                        
                                </div>
                                <div class="form-group">
                                    <label  for="inputPrecio">Precio</label>                                    
                                    <input id="inputPrecio" class="form-control" onkeypress="return isNumericKey(event)"   type="text" placeholder="Precio">                                                                  
                                </div>
                                <div class="form-group">
                                    <label  for="inputStock">Stock</label>                                    
                                    <input id="inputStock" class="form-control" onkeypress="return isNumericKey(event)"   type="text" placeholder="Stock">
                                </div>
                                <div class="form-group">
                                     <input class="btn btn-primary" type="reset" value="Nuevo">
                                   <input class="btn btn-success" type="submit" value="Registar">
                                   
                                </div>
                            </form>

                        </div>
                    </div>                

                </div>
                <div class="col-sm-2 sidenav">

                </div>

            </div>
        </div>

        <footer class="container-fluid text-center">
            <p>&copy; 2018 Dominguez G., Tintin C., Mieles S.</p>
        </footer>

    </body>
</html>

