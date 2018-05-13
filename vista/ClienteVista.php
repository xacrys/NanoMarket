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
                    <a class="navbar-brand" href="#"><img src="../Recursos/img/Icono.png" alt="Icono" width="60" style="margin-top: -10px" ></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Inicio</a></li>
                        <li><a href="#">Clientes</a></li>
                        <li><a href="#">Productos</a></li>
                        <li><a href="#">Ventas</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid text-center">    
            <div class="row content">
                <div class="col-sm-2 sidenav">
                </div>
                <div class="col-sm-8 text-center"> 
                    <h1>Ingreso de Clientes</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">Datos de Productos</div>
                        <div class="panel-body">
                            <form>

                                <div class="form-group">
                                    <label  for="inputCedula">Cedula:</label>                                    
                                    <input type="text" class="form-control" id="inputCedula" placeholder="Numero de Cedula">                                                             
                                </div>
                                <div class="form-group">
                                    <label  for="inputApellidos">Apellidos</label>
                                    <input type="text" class="form-control" id="inputApellidos" placeholder="Apellidos">                                        
                                </div>
                                <div class="form-group">
                                    <label  for="inputNombres">Nombres</label>
                                    <input type="text" class="form-control" id="inputNombres" placeholder="Nombres">                                        
                                </div>
                                <div class="form-group">
                                    <label  for="inputTelefono">Telefono</label>                                    
                                    <input id="inputTelefono" class="form-control" onkeypress="return isNumericKey(event)"   type="text" placeholder="Telefono">                                                                  
                                </div>
                                <div class="form-group">
                                    <label  for="inputCelular">Celular</label>                                    
                                    <input id="inputCelular" class="form-control" onkeypress="return isNumericKey(event)"   type="text" placeholder="Celular">                                                                  
                                </div>
                                <div class="form-group">
                                    <label  for="inputCorreo">Correo</label>                                    
                                    <input id="inputCorreo" class="form-control" onkeypress="return isNumericKey(event)"   type="email" placeholder="Correo electronico">
                                </div>
                                <div class="form-group">
                                    <label  for="inputDireccion">Direccion</label>                                    
                                    <input id="inputCorreo" class="form-control" onkeypress="return isNumericKey(event)"   type="text" placeholder="Direccion">
                                </div>
                                <div class="form-group">
                                    <label for="selectTipo">Tipo</label>
                                    <select class="form-control" id="selectCategoria">
                                        <option>--Seleccione Tipo--</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Guardar">
                                    <input class="btn btn-primary" type="reset" value="Nuevo">
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

