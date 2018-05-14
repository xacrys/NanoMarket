<?php

class ProductoControlador extends ControladorBase {

    private $listaCategorias;
    private $nuevoProducto;
    
    
    public function __construct() {
        $this->listaCategorias = '';
        $this->nuevoProducto = '';
        parent::__construct();
    }

    // acción por default
    public function index(){
        $categoriaModelo= new CategoriaModelo();
        $this->listaCategorias=$categoriaModelo->obtenerCategoria();
        $this->view("Producto", array("listaCategorias" => $this->listaCategorias, "nuevoProducto"=> $this->nuevoProducto));
    }

    // Crear nuevo Producto
    public function guardar() {
        if(isset($_POST["categoria"])){                    
            $codigo = $_POST["codigo"];
            $categoria = $_POST["categoria"];
            $detalle = $_POST["detalle"];
            $precio = $_POST["precio"];
            $stock = $_POST["stock"];                        
            //set new Cliente
            $producto = new ProductoModelo();
            $producto->setIdproducto($codigo);
            $producto->setIdcategoria($categoria);
            $producto->setDetalle($detalle);
            $producto->setPrecio($precio); 
            $producto->setPrecio($precio);  
            $save = $producto->guardar();
        }
        print_r($producto);
        $this->redirect("Producto","index");
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
