<?php

class VentaControlador extends ControladorBase {


    private $accionC;
    private $resultadoC;

    public function __construct() {
        parent::__construct();
        $this->accionC = '';
        $this->productoBuscado = '';
        $this->resultadoC = false;
    }

    // acción por default
    public function index(){
      // echo'index controlador';
        $producto = new VentaModelo();        
        $this->productoBuscado = $producto->buscarProducto();
        //$categoriaModelo= new CategoriaModelo();
        //$this->listaCategorias=$categoriaModelo->obtenerCategoria();
        $this->view("venta", array("productoBuscado" => $this->productoBuscado));
       // $this->view("Venta", array("Venta" => ""));
    }

  public function nuevo(){
        $this->flagNuevo = false;
        $catModelo= new CategoriaModelo();
        $this->listaCategorias=$catModelo->obtenerCategoria();
        $this->view("Producto", array("flagNuevo"=>$this->flagNuevo,"listaCategorias" => $this->listaCategorias));
       
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

    public function valores(){
      //echo $_POST["idproducto"]."/";
        if(isset($_POST["idproducto"])){
            $idproducto = (int)$_POST["idproducto"];

            //set new Cliente
            $producto = new ProductoModelo();
            $productoBuscado = $producto->buscarProducto($idproducto);            
            
            //$this->accionC = "buscar";

            //Si existen resultados
            if(isset($productoBuscado) && isset($productoBuscado[0]->idproducto) && count($productoBuscado)>=1) {
                $this->resultadoC = true;

                //$arr = array();               
                $json = "{";
                foreach ($productoBuscado[0] as $id_assoc => $valor) {
                    //$arr[$id_assoc] = $valor;
                    if ($id_assoc == 'idcategoria' || $id_assoc == 'precio_venta' || $id_assoc == 'stock') {
                        $json = $json . "\"" . $id_assoc . "\":" . $valor . ",";                        
                    } else {
                        $json = $json . "\"" . $id_assoc . "\":\"" . $valor . "\",";                        
                    }
                }                    
                $json = substr($json, 0, strlen($json)-1);
                $json = $json."}";
                echo json_encode($json); //Enviar respuesta en formato JSON.
                
                //echo json_encode($arr); //No sirve transformar el array a JSON.
                //transforma a esto----> {a: 1, b: 2, c: 3, d: 4, e: 5}
                //lo correcto debería ser -------> {"a":1,"b":2,"c":3,"d":4,"e":5}                
            } else {                
                $json = "{\"idproducto\":\"UNDEFINED\"}";
                echo json_encode($json); //Enviar respuesta en formato JSON.
            }
        }
    }



    // Crear nuevo Cliente

     // Crear nuevo Producto
     public function crear() {
        
        if(isset($_POST["categoria"])){    
           
            
            $idcliente = $_POST["idcliente"];
            $idusuario = $_SESSION['user'];
            $forma_pago = $_POST["selectTipo"];
           // $fecha_hora = date()      
            $total_venta = document.getElementById(x);              
           
           // //set new Cliente
            //$producto = new ProductoModelo();

            //$producto->setIdproducto($codigo);
            //$producto->setIdcategoria($categoria);
            //$producto->setDetalle($detalle);
            //$producto->setPrecio($precio); 
            //$producto->setStock($stock);  
            //$save = $producto->guardar();
            if ($save) {
               $this->resultadoP = true;
           }  
        }
        $this->view("Producto", array("resultadoP"=>$this->resultadoP));
      
       
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
