<?php
class ClienteModelo extends ModeloBase {
    private $idcliente;
    private $nombre;
    private $apellido;
    private $telefono;
    private $celular;
    private $email;
    private $direccion;
    private $tipo_cliente;
    private $valor_credito;
    private $activo;

    // Constructor
    public function __construct() {
        $tabla="cliente";
        parent::__construct($tabla);        
    }

    // Destructor
    public function __destruct() {

    }

    // getters
    public function get_idcliente() {
        return $this->idcliente;
    }
    public function get_nombre() {
        return $this->nombre;
    }
    public function get_apellido() {
        return $this->apellido;
    }
    public function get_telefono() {
        return $this->telefono;
    }
    public function get_celular() {
        return $this->celular;
    }
    public function get_email() {
        return $this->email;
    }
    public function get_direccion() {
        return $this->direccion;
    }
    public function get_tipo_cliente() {
        return $this->tipo_cliente;
    }
    public function get_valor_credito() {
        return $this->valor_credito;
    }
    
    //setters
    public function set_idcliente($value) {
        $this->idcliente = $value;
    }
    public function set_nombre($value) {
        $this->nombre = $value;
    }
    public function set_apellido($value) {
        $this->apellido = $value;
    }
    public function set_telefono($value) {
        $this->telefono = $value;
    }
    public function set_celular($value) {
        $this->celular = $value;
    }
    public function set_email($value) {
        $this->email = $value;
    }
    public function set_direccion($value) {
        $this->direccion = $value;
    }
    public function set_tipo_cliente($value) {
        $this->tipo_cliente = $value;
    }
    public function set_valor_credito($value) {
        $this->valor_credito = $value;
    }

    // Buscar un Cliente Activo según idcliente
    public function find() {        
        $sql = "SELECT * from cliente where idcliente = '$this->idcliente' and activo=1;";
        $resultSetCliente = $this->ejecutarSql($sql);
        return $resultSetCliente;
    }

    // Agregar / Insertar un cliente 
    public function addCliente() {        
        $sql = "INSERT INTO cliente (idcliente,nombre,apellido,telefono,celular,email,direccion,tipo_cliente) 
                values (
                    '".$this->idcliente."',
                    '".$this->nombre."',
                    '".$this->apellido."',
                    '".$this->telefono."',
                    '".$this->celular."',
                    '".$this->email."',
                    '".$this->direccion."',
                    '".$this->tipo_cliente."');";      
        $this->db()->query($sql);            
    }

    // Modificar / Actualizar un cliente 
    public function updateCliente() {
        $sql = "UPDATE cliente set nombre='$this->nombre',apellido='$this->apellido',telefono='$this->telefono',celular='$this->celular',email='$this->email', 
                direccion='$this->direccion',tipo_cliente='$this->tipo_cliente',valor_credito='$this->valor_credito' 
                where idcliente = '$this->idcliente';";
        $this->db()->query($sql);
    }

    // Eliminar / Desactivar un cliente 
    public function deleteCliente() {        
        $sql = "update cliente set activo=0 where idcliente = '$this->idcliente';";
        $this->db()->query($sql);        
    }
}
?>