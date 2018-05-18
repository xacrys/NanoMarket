<?php
class VentaModelo extends ModeloBase {

    //Campos de la tabla VENTA
    private $idventa, $idcliente, $idusuario, $forma_pago, $fecha_hora, $total_venta;

    // Constructor
    public function __construct() {
        $tabla="venta";
        parent::__construct($tabla);        
    }

    // Destructor
    public function __destruct() {

    }

    // getters
    public function get_idventa() {
        return $this->idventa;
    }
    public function get_idcliente() {
        return $this->idcliente;
    }
    public function get_idusuario() {
        return $this->idusuario;
    }
    public function get_forma_pago() {
        return $this->forma_pago;
    }
    public function get_fecha_hora() {
        return $this->fecha_hora;
    }
    public function get_total_venta() {
        return $this->total_venta;
    }
       
    //setters
    public function set_idventa($value) {
        $this->idventa = $value;
    }
    public function set_idcliente($value) {
        $this->idcliente = $value;
    }
    public function set_idusuario($value) {
        $this->idusuario = $value;
    }
    public function set_forma_pago($value) {
        $this->forma_pago = $value;
    }
    public function set_fecha_hora($value) {
        $this->fecha_hora = $value;
    }
    public function set_total_venta($value) {
        $this->total_venta = $value;
    }       

    // Agregar / Registrar una Venta
    public function addVenta() {        
        $sql = "INSERT INTO Venta (idcliente,idusuario,forma_pago,total_venta) 
                values (
                    '".$this->idcliente."',
                    '".$this->idusuario."',
                    '".$this->forma_pago."',
                    ".$this->total_venta.");";
        $save = $this->db()->query($sql);
        
        //Devuelve el id autogenerado que se utilizó en la última consulta
        $this->idventa = $this->db()->insert_id;

        return $save;
    }
}
?>