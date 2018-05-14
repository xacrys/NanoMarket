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
                    <a class="navbar-brand" href="#"><img src="img/Icono.png" alt="Icono" width="120" style="margin-top: -5px" ></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">

                        <li><a href="<?php echo $helper->url("Cliente", "index"); ?>">Clientes</a></li>
                        <li><a href="<?php echo $helper->url("Producto", "index"); ?>">Productos</a></li>
                        <li class="active"><a href="#">Ventas</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo $helper->url("Venta", "index"); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
                        <div class="panel-heading">Datos del Cliente</div>
                        <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <label for="inputCedula">Cedula del Cliente</label>
                                    <input type="text" class="form-control" id="inputCedula" placeholder="Cedula del Cliente"> 
                                    <input class="btn btn-primary" type="reset" value="Nuevo">
                                </div>                            
                                <div class="form-group">
                                    <label  for="inputNombre">Nombre</label>                                    
                                    <input type="text" class="form-control" id="inputNombre" placeholder="Nombre del Cliente">                                                             
                                </div>
                                <div class="form-group">
                                    <label  for="inputNombre">Apellido</label>                                    
                                    <input type="text" class="form-control" id="inputNombre" placeholder="Nombre del Cliente">                                                             
                                </div>
                                <div class="form-group">
                                    <label for="selectTipo">Tipo de Pago</label>
                                    <select class="form-control" id="selectTipo">
                                        <option>--Seleccione Tipo-</option>
                                        <option>Credito</option>
                                        <option>Contado</option>
                                    </select>
                                </div>                            
                                <h3>Detalle de la venta</h3>
                                <div class="form-group">
                                    <label for="inputProducto">Producto</label>
                                    <select class="form-control" id="selectTipo">
                                        <option>--Seleccione Producto-</option>
                                        <option>Producto1</option>
                                        <option>Producto2</option>
                                    </select>
                                    <input class="btn btn-primary" type="submit" value="Agregar">
                                </div>  
                                <div>
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Precio Unitario</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>John</td>
                                                <td>Doe</td>
                                                <td>john@example.com</td>
                                            </tr>
                                        </tbody>
                                    </table>
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

