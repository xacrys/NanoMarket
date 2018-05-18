<?php

class ProductoControlador extends ControladorBase {

    private $listaCategorias;
    private $listaCategoriasDos;
    private $productoConsultado;
    private $nuevoProducto;
    private $resultadoP;
    private $flagNuevo;
<<<<<<< HEAD
    
    
    public function __construct() {
        $this->listaCategorias = '';
        $this->nuevoProducto = '';
        $this->listaCategoriasDos= '';
=======

    //cosntrutor de la clase
    public function __construct() {
        $this->listaCategorias = '';
        $this->nuevoProducto = '';
        $this->listaCategoriasDos = '';
        $this->productoConsultado = '';
>>>>>>> efc2d6afbd33073ea4b6ff3e65e3743d7e20ce8e
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
   
    // Registrar nuevo Producto
    public function guardar() {
<<<<<<< HEAD
        
        if(isset($_POST["categoria"])){    
           
=======
        if (isset($_POST["categoria"])) {

>>>>>>> efc2d6afbd33073ea4b6ff3e65e3743d7e20ce8e
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
    
<<<<<<< HEAD
    public function nuevo(){
=======
    // Me permite ejecutar la pagina nueva enlistando las categorias
    public function nuevo() {
>>>>>>> efc2d6afbd33073ea4b6ff3e65e3743d7e20ce8e
        $this->flagNuevo = false;
        $catModelo= new CategoriaModelo();
        $this->listaCategorias=$catModelo->obtenerCategoria();
        $this->view("Producto", array("flagNuevo"=>$this->flagNuevo,"listaCategorias" => $this->listaCategorias));
       
    }

<<<<<<< HEAD


    // Buscar Cliente
    public function buscar() {
        if(isset($_POST["codigo"])){
            $codigo= (int)$_POST["codigo"];
            //set new Cliente
            $producto = new ProductoModelo();
            $productoBuscado = $producto->buscarProducto($codigo);
            $caModelo= new CategoriaModelo();
            $this->listaCategoriasDos=$caModelo->obtenerCategoria();
            print_r($this->listaCategoriasDos);
            print_r( $this->listaCategoriasDos);
            //Cargamos la vista Cliente y enviar resultados
            $this->view("Producto", array("productoBuscado" => $productoBuscado, "listaCategoriasDos" => $this->listaCategoriasDos));
=======
    // Buscar Producto
    public function buscarProducto() {
        if (isset($_POST["codigo"])) {
            $codigo = (int) $_POST["codigo"];
            $producto = new ProductoModelo();
            $encontrado = false; 
            $this->productoConsultado= $producto->buscarProductoModelo($codigo);
            if($this->productoConsultado[0]){
            $encontrado = true;   
            }
            $this->listaCategoriasDos= $producto->obtenerCategoria();
            $this->view("Producto", array("productoConsultado" => $this->productoConsultado, "listaCategoriasDos" => $this->listaCategoriasDos, "encontrado"=>$encontrado));
>>>>>>> efc2d6afbd33073ea4b6ff3e65e3743d7e20ce8e
        }
    }
   
    // Modificar Producto
    public function actualizar() {
<<<<<<< HEAD
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
=======
        if (isset($_POST["categoria"])) {
            
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
            $save = $producto->actualizar();
            if ($save) {
                $this->resultadoA = true;
            }
        }
        $this->view("Producto", array("resultadoA" => $this->resultadoA));
>>>>>>> efc2d6afbd33073ea4b6ff3e65e3743d7e20ce8e
    }

}
