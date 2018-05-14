<?php

class ProductoModelo extends ModeloBase{
    private $idproducto, $idcategoria, $detalle, $stock, $precio;
    
    
    public function __construct() {
        $tabla="producto";
        parent::__construct($tabla);
    }

    public function getIdproducto() {
        return $this->idproducto;
    }

    public function getIdcategoria() {
        return $this->idcategoria;
    }

    public function getDetalle() {
        return $this->detalle;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setIdproducto($idproducto) {
        $this->idproducto = $idproducto;
    }

    public function setIdcategoria($idcategoria) {
        $this->idcategoria = $idcategoria;
    }

    public function setDetalle($detalle) {
        $this->detalle = $detalle;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    
    public function guardar(){
        $query="INSERT INTO categoria (nombre, descripcion) VALUES (
            '".$this->nombre."',
            '".$this->descripcion."'            
            )"; 
        $this->db()->query($query);        
    }
    
     public function obtenerCategoria() {        
        $sql = "SELECT * from categoria where activo=1;";
        $resultSetCliente = $this->ejecutarSql($sql);
        return $resultSetCliente;
    }
}
