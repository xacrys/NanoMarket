<?php

class ProductoControlador extends ControladorBase {

    private $listaCategorias;
    private $listaCategoriasDos;
    private $nuevoProducto;
    private $resultadoP;
    private $flagNuevo;
    
    
    public function __construct() {
        $this->listaCategorias = '';
        $this->nuevoProducto = '';
        $this->listaCategoriasDos= '';
        $this->resultadoP = false;
        $this->flagNuevo = false;
        parent::__construct();
    }

    // acción por default
    public function index(){
        $categoriaModelo= new CategoriaModelo();
        $this->listaCategorias=$categoriaModelo->obtenerCategoria();
        $this->view("Producto", array("listaCategorias" => $this->listaCategorias));
        
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
            $producto->setStock($stock);  
            $save = $producto->guardar();
            if ($save) {
                $this->resultadoP = true;
            }  
        }
        $this->view("Producto", array("resultadoP"=>$this->resultadoP));
      
       
    }
    
    public function nuevo(){
        $this->flagNuevo = false;
        $catModelo= new CategoriaModelo();
        $this->listaCategorias=$catModelo->obtenerCategoria();
        $this->view("Producto", array("flagNuevo"=>$this->flagNuevo,"listaCategorias" => $this->listaCategorias));
       
    }



    // Buscar Cliente
    public function buscar() {
        if(isset($_POST["codigo"])){
            $codigo= (int)$_POST["codigo"];
            //set new Cliente
            $producto = new ProductoModelo();
            $productoBuscado = $producto->buscarProducto($codigo);
            $caModelo= new CategoriaModelo();
            $this->listaCategoriasDos=$caModelo->obtenerCategoria();
            
            print_r( $this->listaCategoriasDos);
            //Cargamos la vista Cliente y enviar resultados
            $this->view("Producto", array("productoBuscado" => $productoBuscado, "listaCategoriasDos" => $this->listaCategoriasDos));
        }
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
