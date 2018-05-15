<?php
    $accion = ''; //login
    $resultado = false; //true Exitoso, false Fallido 
    
    // Estos resultados vienen desde el Controlador
    if(isset($accionC)) {
        $accion = $accionC;
    }
    if(isset($resultadoC)) {
        $resultado = $resultadoC;
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
                        <li><a href="<?php echo $helper->url("Venta", "index"); ?>">Ventas</a></li>                   
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

                <!-- Inicio Separador -->
                <div class="col-sm-8 text-center"> 
                    <h1>Login</h1>

                    <form action="<?php echo $helper->url("Usuario", "login"); ?>" method="post">
                                            
                        <hr/>
                        <div class="form-group">
                            <label  for="inputNombre">Nombre</label>                                    
                            <input type="text"  class="form-control" name="inputNombre" id="inputNombre" placeholder="Nombre de Usuario">                                                             
                        </div>
                        <div class="form-group">
                            <label  for="inputPass">Password</label>                                    
                            <input type="password"  class="form-control" name="inputPass" id="inputPass" placeholder="Contraseña">                                                             
                        </div>                        
                        <div class="form-group">
                        <?php                        
                        if(!$resultado && isset($unUsuario) && $unUsuario["nombre"] == "UNDEFINED")
                        { ?>
                            El usuario introducido no existe.
                        <?php
                        } ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Login" />
                        </div>
                    </form>
                </div>
                <!-- Fin Separador -->

                <div class="col-sm-2 sidenav">

                </div>
            </div>
        </div>

        <footer class="container-fluid text-center">
            <p>&copy; 2018 Dominguez G., Tintin C., Mieles S.</p>
        </footer>

    </body>
</html>

