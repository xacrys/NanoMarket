<?php
class ClienteControlador extends ControladorBase{
    
    // Variables para determinar la accion a realizar por el controlador y el resultado
    private $accionC;
    private $resultadoC;

    public function __construct() {
        parent::__construct();
        $this->accionC = '';
        $this->resultadoC = false;
    }
    
    // acción por default
    public function index() {
        $this->view("Cliente", array("ninguo"=>"ninguno"));
    }
    
    // Crear nuevo Cliente
    public function crear(){
        
        if(isset($_POST["idcliente"])){

            $idcliente = $_POST["idcliente"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $telefono = $_POST["telefono"];
            $celular = $_POST["celular"];
            $email = $_POST["email"];
            $direccion = $_POST["direccion"];
            $tipo_cliente = $_POST["tipo_cliente"];
            
            //set new Cliente
            $cliente = new ClienteModelo();
            $cliente->set_idcliente($idcliente);
            $cliente->set_nombre($nombre);
            $cliente->set_apellido($apellido);
            $cliente->set_telefono($telefono);
            $cliente->set_celular($celular);
            $cliente->set_email($email);
            $cliente->set_direccion($direccion);
            $cliente->set_tipo_cliente($tipo_cliente);            
            
            $this->accionC = "crear";
            $save = $cliente->addCliente();
            if ($save) {
                $this->resultadoC = true;
            }            
        }
        
        $this->view("Cliente", array("accionC"=>$this->accionC, "resultadoC"=>$this->resultadoC));
    }
    
    // Eliminar Cliente
    public function borrar(){
        if(isset($_POST["idcliente"])){
            $idcliente=$_POST["idcliente"];            
            $cliente = new ClienteModelo();
            $cliente->deleteBy('idcliente',$idcliente);
            $this->redirect();
        }
    }

    // Buscar Cliente
    public function buscar(){
        if(isset($_POST["idcliente"])){
            $idcliente = $_POST["idcliente"];

            //set new Cliente
            $cliente = new ClienteModelo();        
            $cliente->set_idcliente($idcliente);
            $unCliente = $cliente->find();            
            
            $this->accionC = "buscar";

            //Si existen resultados
            if(isset($unCliente) && isset($unCliente[0]->idcliente) && count($unCliente)>=1) {
                $this->resultadoC = true;
            }

            //Cargamos la vista Cliente y enviar resultados
            $this->view("Cliente", array("unCliente"=>$unCliente, "accionC"=>$this->accionC, "resultadoC"=>$this->resultadoC));
        }
    }

    // Modificar Cliente
    public function actualizar(){        
        if(isset($_POST["idcliente"])){
            $idcliente = $_POST["idcliente"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $telefono = $_POST["telefono"];
            $celular = $_POST["celular"];
            $email = $_POST["email"];
            $direccion = $_POST["direccion"];
            $tipo_cliente = $_POST["tipo_cliente"];
            
            //set new Cliente
            $cliente = new ClienteModelo();
            $cliente->set_idcliente($idcliente);
            $cliente->set_nombre($nombre);
            $cliente->set_apellido($apellido);
            $cliente->set_telefono($telefono);
            $cliente->set_celular($celular);
            $cliente->set_email($email);
            $cliente->set_direccion($direccion);
            $cliente->set_tipo_cliente($tipo_cliente);

            $this->accionC = "actualizar";
            $update = $cliente->updateCliente();            
            $unCliente = $cliente->find();
            if ($update) {
                $this->resultadoC = true;
            }

            //Cargamos la vista Cliente y enviar resultados            
            $this->view("Cliente", array("unCliente"=>$unCliente, "accionC"=>$this->accionC, "resultadoC"=>$this->resultadoC));
        }
    }

}