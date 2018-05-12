<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioModelo extends ModeloBase{
    private $tabla;
    
    public function __construct($tabla) {
        $this->tabla="usuario";
        parent::construct($this->tabla);
    }
    
    public function getUnUsuario(){
        $query = "SELECT * FROM usuario where nombre='cristian'";
        $usuario = $this->ejecutarSql($query);
        return $usuario;
    }
    
}