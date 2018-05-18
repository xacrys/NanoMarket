<?php
class DetalleVentaModelo extends ModeloBase {

    //Campos de la tabla DETALLEVENTA
    private $idventa, $idproducto, $cantidad, $total;

    // Constructor
    public function __construct() {
        $tabla="detalle_venta";
        parent::__construct($tabla);        
    }

    // Destructor
    public function __destruct() {

    }

    // getters
    public function get_idventa() {
        return $this->idventa;
    }
    public function get_idproducto() {
        return $this->idproducto;
    }
    public function get_cantidad() {
        return $this->cantidad;
    }
    public function get_total() {
        return $this->total;
    }    
       
    //setters
    public function set_idventa($value) {
        $this->idventa = $value;
    }
    public function set_idproducto($value) {
        $this->idproducto = $value;
    }
    public function set_cantidad($value) {
        $this->cantidad = $value;
    }
    public function set_total($value) {
        $this->total = $value;
    }

    // Agregar / Registrar un DetalleVenta
    public function addDetalleVenta() {        
        $sql = "INSERT INTO detalle_venta (idventa,idproducto,cantidad,total) 
                values (
                    ".$this->idventa.",
                    '".$this->idproducto."',
                    ".$this->cantidad.",
                    ".$this->total.");";
        $save = $this->db()->query($sql);
        return $save;
    }

    // Agregar / Registrar un DetalleVenta
    public function addDetalleVentaArray($values) {
        //Une elementos de un array en un string
        $values = implode(", ", $values);

        $sql = "INSERT INTO detalle_venta (idventa,idproducto,cantidad,total) VALUES  {$values};";
        $save = $this->db()->query($sql);
        return $sql;
    }
}
?>