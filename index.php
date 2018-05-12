<?php
require_once './config/global.php';
require_once './core/ControladorBase.php';
require_once './core/ControladorFrontal.func';
if (isset($GET_["controlador"])) {
    $controladorObj=cargarControlador($_GET["controlador"]);
}
 else {
    $controladorObj=cargarControlador(CONTROLADOR_DEFECTO);
}
lanzarAccion($controladorObj);

