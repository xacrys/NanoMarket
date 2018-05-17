<?php

class ProductoControlador extends ControladorBase {

    private $listaCategorias;
    private $listaCategoriasDos;
    private $productoConsultado;
    private $nuevoProducto;
    private $resultadoP;
    private $resultadoA;
    private $flagNuevo;

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
    // Crear nuevo Producto
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

    public function nuevo() {
        $this->flagNuevo = false;
        $catModelo = new CategoriaModelo();
        $this->listaCategorias = $catModelo->obtenerCategoria();
        $this->view("Producto", array("flagNuevo" => $this->flagNuevo, "listaCategorias" => $this->listaCategorias));
    }

    // Buscar Cliente
    public function buscarProducto() {
        if (isset($_POST["codigo"])) {
            $codigo = (int) $_POST["codigo"];
            $producto = new ProductoModelo();
            $this->productoConsultado= $producto->buscarProductoModelo($codigo);
            $this->listaCategoriasDos= $producto->obtenerCategoria();
            $this->view("Producto", array("productoConsultado" => $this->productoConsultado, "listaCategoriasDos" => $this->listaCategoriasDos));
        }
    }
   
    // Modificar Cliente
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
