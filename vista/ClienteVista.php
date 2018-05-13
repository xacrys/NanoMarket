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
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cliente</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <script language="javascript" type="text/javascript">
            // Función de JavaScript para enviar el formulario a la página indicada.
            function saltar(pagina){                
                document.ClienteVista.action=pagina;
                document.ClienteVista.submit();
            }
        </script>

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
        <form action="" method="post" class="col-lg-5" name="ClienteVista" id="ClienteVista">
            <h3>Gestión de Clientes</h3>
            Cédula:<input type="text" name="idcliente" value="<?php print($idcliente); ?>" class="form-control"/>
            Nombre:<input type="text" name="nombre" value="<?php print($nombre); ?>" class="form-control"/>
            Apellido:<input type="text" name="apellido" value="<?php print($apellido); ?>" class="form-control"/>
            Teléfono:<input type="text" name="telefono" value="<?php print($telefono); ?>" class="form-control"/>
            Teléfono Celular:<input type="text" name="celular" value="<?php print($celular); ?>" class="form-control"/>
            Correo:<input type="text" name="email" value="<?php print($email); ?>" class="form-control"/>
            Tipo:<select name="tipo_cliente" class="form-control">
            <?php
            for ($i=1;$i<=2;$i++){                 
                if ($tipo_cliente == 'Cliente_'.$i)
                    echo "<OPTION VALUE='Cliente_".$i."' selected='selected'>Cliente_".$i."</OPTION>";                    
                else
                    echo "<OPTION VALUE='Cliente_".$i."'>Cliente_".$i."</OPTION>";                    
            }
            ?>
            </select>
            Dirección:<input type="text" name="direccion" value="<?php print($direccion); ?>" class="form-control"/>
            <br>            
            <input type="submit" value="Registrar" onclick="saltar('<?php echo $helper->url("Cliente", "crear"); ?>');" class="btn btn-success"/>
            <input type="submit" value="Buscar" onclick="saltar('<?php echo $helper->url("Cliente", "buscar"); ?>');" class="btn btn-success"/>
            <input type="submit" value="Actualizar" onclick="saltar('<?php echo $helper->url("Cliente", "actualizar"); ?>');" class="btn btn-success"/>
        </form>    
    </body>
</html>

