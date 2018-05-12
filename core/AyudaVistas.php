<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AyudaVistas{
    public function url($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO) {
        $urlString="index.php?controlador=".$controlador."&accion=".$accion;
        return $urlString;
    }
}