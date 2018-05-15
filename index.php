<?php
session_start();
require_once './config/global.php';
require_once './core/ControladorBase.php';
require_once './core/ControladorFrontal.func';

//Validar sesion activa
if(!isset($_SESSION["user"])) { 
    $controladorObj=cargarControlador(CONTROLADOR_DEFECTO);        
} else {
    if (isset($_GET['controlador'])) {
        $controladorObj=cargarControlador($_GET["controlador"]);
    }
    else {
    
        $controladorObj=cargarControlador(CONTROLADOR_DEFECTO);
    }
}
lanzarAccion($controladorObj);

