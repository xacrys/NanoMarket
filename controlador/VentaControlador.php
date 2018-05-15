<?php

class VentaControlador extends ControladorBase {


    private $accionC;
    private $resultadoC;

    public function __construct() {
        parent::__construct();
        $this->accionC = '';
        $this->resultadoC = false;
    }

    // acción por default
    public function index(){
        
        $this->view("Venta", array("Venta" => ""));
    }



  // Buscar Cliente
    public function buscarcli(){
        echo $_POST["idcliente"]."/";
        if(isset($_POST["idcliente"])){
            $idcliente = $_POST["idcliente"];
        
            //set new Cliente
            $cliente = new VentaModelo();        
            $clienteBuscado = $cliente->buscarCliente($idcliente);

                       
            //Cargamos la vista Cliente y enviar resultados
            $this->view("venta", array("clienteBuscado"=>$clienteBuscado));

        }
       
    }
    public function buscarPro(){
        echo $_POST["codigo"]."/";
        if(isset($_POST["codigo"])){
            $codigo = $_POST["codigo"];
        
            //set new Cliente
            $producto = new VentaModelo();        
            $productoBuscado = $producto->buscarProducto($codigo);

                       
            //Cargamos la vista Cliente y enviar resultados
            $this->view("venta", array("productoBuscado"=>$productoBuscado));

        }
       
    }

    // Crear nuevo Cliente
    public function crear() {

//        if(isset($_POST["idcliente"])){
//
//            $idcliente = $_POST["idcliente"];
//            $nombre = $_POST["nombre"];
//            $apellido = $_POST["apellido"];
//            $telefono = $_POST["telefono"];
//            $celular = $_POST["celular"];
//            $email = $_POST["email"];
//            $direccion = $_POST["direccion"];
//            $tipo_cliente = $_POST["tipo_cliente"];
//            
//            //set new Cliente
//            $cliente = new ClienteModelo();
//            $cliente->set_idcliente($idcliente);
//            $cliente->set_nombre($nombre);
//            $cliente->set_apellido($apellido);
//            $cliente->set_telefono($telefono);
//            $cliente->set_celular($celular);
//            $cliente->set_email($email);
//            $cliente->set_direccion($direccion);
//            $cliente->set_tipo_cliente($tipo_cliente);            
//            
//            $save = $cliente->addCliente();
//            
//        }
//        
//        $this->redirect("Cliente","index");
    }

    // Eliminar Cliente
    public function borrar() {
//        if(isset($_POST["idcliente"])){
//            $idcliente=$_POST["idcliente"];            
//            $cliente = new ClienteModelo();
//            $cliente->deleteBy('idcliente',$idcliente);
//            $this->redirect();
//        }
    }

    // Buscar Cliente
    public function buscar() {
//        if(isset($_POST["idcliente"])){
//            $idcliente = $_POST["idcliente"];
//
//            //set new Cliente
//            $cliente = new ClienteModelo();        
//            $cliente->set_idcliente($idcliente);
//            $unCliente = $cliente->find();
//
//            //Cargamos la vista Cliente y enviar resultados
//            $this->view("Cliente", array("unCliente"=>$unCliente));
//        }
    }

    // Modificar Cliente
    public function actualizar() {
//        if(isset($_POST["idcliente"])){
//            $idcliente = $_POST["idcliente"];
//            $nombre = $_POST["nombre"];
//            $apellido = $_POST["apellido"];
//            $telefono = $_POST["telefono"];
//            $celular = $_POST["celular"];
//            $email = $_POST["email"];
//            $direccion = $_POST["direccion"];
//            $tipo_cliente = $_POST["tipo_cliente"];
//            
//            //set new Cliente
//            $cliente = new ClienteModelo();
//            $cliente->set_idcliente($idcliente);
//            $cliente->set_nombre($nombre);
//            $cliente->set_apellido($apellido);
//            $cliente->set_telefono($telefono);
//            $cliente->set_celular($celular);
//            $cliente->set_email($email);
//            $cliente->set_direccion($direccion);
//            $cliente->set_tipo_cliente($tipo_cliente);
//
//            $cliente->updateCliente();
//            $unCliente = $cliente->find();
//
//            //Cargamos la vista Cliente y enviar resultados
//            $this->view("Cliente", array("unCliente"=>$unCliente));
//        }
//    }
    }

}
