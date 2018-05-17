<?php

class CategoriaModelo extends ModeloBase{
    private $idcategoria, $nombre, $descripcion, $activo;
    
    
    public function __construct() {
        $tabla="categoria";
        parent::__construct($tabla);
    }

    //getters
    public function getIdcategoria() {
        return $this->idcategoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }    

    //setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function guardar(){
        $query="INSERT INTO categoria (nombre, descripcion) VALUES (
            '".$this->nombre."',
            '".$this->descripcion."'            
            )"; 
        $this->db()->query($query);        
    }
    
     public function obtenerCategoria() {   
         echo 'si entreaasd-----------------';
        $sql = "SELECT * from categoria where activo=1;";
        $resultSetCliente = $this->ejecutarSql($sql);
        print_r($resultSetCliente);
        echo 'si en2-----------------';
        return $resultSetCliente;
    }
}
