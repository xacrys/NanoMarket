<?php

class ProductoControlador extends ControladorBase {

    private $listaCategorias;
    private $listaCategoriasDos;
    private $productoConsultado;
    private $nuevoProducto;
    private $resultadoP;
    private $resultadoA;
    private $flagNuevo;

    //cosntrutor de la clase
    public function __construct() {
        $this->listaCategorias = '';
        $this->nuevoProducto = '';
        $this->listaCategoriasDos = '';
        $this->productoConsultado = '';
        $this->resultadoP = false;
        $this->resultadoA = false;
        $this->flagNuevo = false;
        parent::__construct();
    }

    // acción por default
    public function index() {
        $categoriaModelo = new CategoriaModelo();
        $this->listaCategorias = $categoriaModelo->obtenerCategoria();
        $this->view("Producto", array("listaCategorias" => $this->listaCategorias));
    }
   
    // Registrar nuevo Producto
    public function guardar() {
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
            $save = $producto->guardar();
            if ($save) {
                $this->resultadoP = true;
            }
        }
        $this->view("Producto", array("resultadoP" => $this->resultadoP));
    }
    
    // Me permite ejecutar la pagina nueva enlistando las categorias
    public function nuevo() {
        $this->flagNuevo = false;
        $catModelo = new CategoriaModelo();
        $this->listaCategorias = $catModelo->obtenerCategoria();
        $this->view("Producto", array("flagNuevo" => $this->flagNuevo, "listaCategorias" => $this->listaCategorias));
    }

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
        }
    }
   
    // Modificar Producto
    public function actualizar() {
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
    }

}
