<?php
class VentaModelo extends ModeloBase {
    private $idcliente;
    private $nombre;
    private $apellido;


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
   

    // Buscar un Cliente Activo según idcliente
    public function find() {        
        $sql = "SELECT idcliente, nombre, apellido from cliente where idcliente = '$this->idcliente' and activo=1;";
        $resultSetCliente = $this->ejecutarSql($sql);   
        echo "puto";    
       
        return $resultSetCliente;
    }

    public function buscarProducto($codigo) {
        $query = $this->db()->query("SELECT * FROM producto WHERE idproducto = $codigo");
        if ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }


    public function buscarCliente($idcliente) {
        echo "modelo";
        $query = $this->db()->query("SELECT idcliente, nombre, apellido from cliente where idcliente = $idcliente and activo=1");
        if ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return $resultSet;
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
        $save = $this->db()->query($sql);
        return $save;
    }

    // Modificar / Actualizar un cliente 
    public function updateCliente() {
        $sql = "UPDATE cliente set nombre='$this->nombre',apellido='$this->apellido',telefono='$this->telefono',celular='$this->celular',email='$this->email', 
                direccion='$this->direccion',tipo_cliente='$this->tipo_cliente',valor_credito='$this->valor_credito' 
                where idcliente = '$this->idcliente';";        
        $this->db()->query($sql);

        //Obtiene el número de filas afectadas en la última operación MySQL
        if ($this->db()->affected_rows > 0) {
            $update = true;
        } else {
            $update = false;
        }
        return $update;
    }

    // Eliminar / Desactivar un cliente 
    public function deleteCliente() {        
        $sql = "update cliente set activo=0 where idcliente = '$this->idcliente';";
        $this->db()->query($sql);        
    }
}
?>