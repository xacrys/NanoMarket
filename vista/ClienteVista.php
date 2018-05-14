<?php

$idcliente = '';
$nombre = '';
$apellido = '';
$telefono = '';
$celular = '';
$email = '';
$direccion = '';
$tipo_cliente = '';

//Validar si existe unCliente desde el ClienteControlador
if(isset($unCliente) && count($unCliente)>=1) {
    $idcliente = $unCliente[0]->idcliente;
    $nombre = $unCliente[0]->nombre;
    $apellido = $unCliente[0]->apellido;
    $telefono = $unCliente[0]->telefono;
    $celular = $unCliente[0]->celular;
    $email = $unCliente[0]->email;
    $direccion = $unCliente[0]->direccion;
    $tipo_cliente = $unCliente[0]->tipo_cliente;
    unset($unCliente);
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
        <script src="./recursos/validaciones.js"></script>
        <script>            
            // Función de JavaScript para enviar el formulario a la página indicada.
            function saltar(pagina,accion){                
                    document.ClienteVista.action=pagina;
                    document.ClienteVista.submit();
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
                        
                        <li class="active"><a href="<?php echo $helper->url("Cliente", "index"); ?>">Clientes</a></li>
                        <li><a href="<?php echo $helper->url("Producto", "index"); ?>">Productos</a></li>
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
                    <h1>Gestión de Clientes</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">Datos de Cliente</div>
                        <div class="panel-body">                            
                            <form action="" method="post" name="ClienteVista" id="ClienteVista">
                                <div class="form-group">
                                    <label  for="nombre">Cédula: </label>                                    
                                    <input type="text" name="idcliente" value="<?php print($idcliente); ?>" id="idcliente" placeholder="Número de Cédula" maxlength="10" onkeypress="return isNumericKey(event)" required>                                                                                                 
                                    <input id="buttonB" type="submit" value="Buscar" onclick="saltar('<?php echo $helper->url("Cliente", "buscar"); ?>','buscar');" class="btn btn-primary"/>
                                </div>
                                <div class="form-group">
                                    <label  for="nombre">Nombres</label>
                                    <input type="text" name="nombre" value="<?php print($nombre); ?>" class="form-control" id="nombre" placeholder="Nombres">
                                </div>
                                <div class="form-group">
                                    <label  for="apellido">Apellidos</label>
                                    <input type="text" name="apellido" value="<?php print($apellido); ?>" class="form-control" id="apellido" placeholder="Apellidos">                                        
                                </div>
                                <div class="form-group">
                                    <label  for="telefono">Telefono</label>                                    
                                    <input type="text" name="telefono" value="<?php print($telefono); ?>" class="form-control" id="telefono" placeholder="Telefono" onkeypress="return isNumericKey(event)">
                                </div>
                                <div class="form-group">
                                    <label  for="celular">Celular</label>                                    
                                    <input type="text" name="celular" value="<?php print($celular); ?>" class="form-control" id="celular" placeholder="Celular" onkeypress="return isNumericKey(event)">
                                </div>
                                <div class="form-group">
                                    <label  for="email">Correo</label>                                    
                                    <input type="email" name="email" value="<?php print($email); ?>" class="form-control" id="email" placeholder="Correo electronico" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                </div>
                                <div class="form-group">
                                    <label  for="direccion">Direccion</label>                                    
                                    <input type="text" name="direccion" value="<?php print($direccion); ?>" class="form-control" id="direccion" placeholder="Direccion">
                                </div>
                                <div class="form-group">
                                    <label for="tipo_cliente">Tipo</label>
                                    <select name="tipo_cliente" class="form-control" id="tipo_cliente">
                                        <<OPTION VALUE='0'>--Seleccione Tipo--</OPTION>
                                        <?php
                                        for ($i=1;$i<=3;$i++){                 
                                            if ($tipo_cliente == $i)
                                                echo "<OPTION VALUE='".$i."' selected='selected'>".$i."</OPTION>";                    
                                            else
                                                echo "<OPTION VALUE='".$i."'>".$i."</OPTION>";                    
                                        }
                                        ?>
                                    </select>                                   
                                </div>  
                                <div class="form-group">
                                    <input class="btn btn-primary" type="reset" value="Nuevo">                                    
                                    <input type="submit" value="Registrar" onclick="saltar('<?php echo $helper->url("Cliente", "crear"); ?>');" class="btn btn-success"/>                                    
                                    <input type="submit" value="Actualizar" onclick="saltar('<?php echo $helper->url("Cliente", "actualizar"); ?>');" class="btn btn-success"/>                                    
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

