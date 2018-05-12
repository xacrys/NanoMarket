<!DOCTYPE HTML>

<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Nano Market</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>
        <form action="<?php echo $helper->url("usuario","crear");?>" method="post" class="col-lg-5">
            <h3>Anadir Usuario</h3>
            <hr/>
            Nombre:<input type="text" name="nombre" class="form-control"/>
            Password:<input type="text" name="password" class="form-control"/>
            <input type="submit" value="value" class="btn btn-success"/>;
                
        </form>
    </body>
</html>