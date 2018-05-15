<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioModelo extends ModeloBase{
    private $nombre;
    private $password;
    
    public function __construct() {
        $tabla="usuario";        
        parent::__construct($tabla);
    }

    // Destructor
    public function __destruct() {

    }

    // getters
    public function get_nombre() {
        return $this->nombre;
    }    
    public function get_password() {
        return $this->password;
    }

    //setters
    public function set_nombre($value) {
        $this->nombre = $value;
    }
    public function set_password($value) {
        $this->password = $value;
    }
    
    // Buscar un Usuario según nombre y contraseña
    public function find() {        
        $sql = "SELECT * from usuario where nombre = '$this->nombre' and password='$this->password';";
        $resultSetUsuario = $this->ejecutarSql($sql);       
        return $resultSetUsuario;
    }
}