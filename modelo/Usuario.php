<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Usuario extends EntidadBase{
    private $idusuario, $nombre, $password;
    public function contructor($tabla) {
        $tabla="usuario";
        parent::contructor($tabla);
    }
    public function getIdusuario() {
        return $this->idusuario;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function guardar(){
        $query="INSERT INTO usuario (idusuario, nombre, password) VALUES (NULL,"
                ."'".$this->nombre."','"
                .$this->password."')"; 
        $guardar= $this->db()->query($query);
        return $guardar;
    }
}
