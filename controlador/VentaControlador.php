<?php

class VentaControlador extends ControladorBase {

    // Variables para determinar la accion a realizar por el controlador y el resultado
    private $accionC;
    private $resultadoC;

    public function __construct() {
        parent::__construct();
        $this->accionC = '';
        $this->resultadoC = false;
    }

    // acción por default
    public function index(){
        $productoModelo = new ProductoModelo();
        $this->listaProductos = $productoModelo->getAll();
        $this->view("Venta", array("listaProductos" => $this->listaProductos));        
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

    // Registrar nueva Venta (Venta y Venta Detalle)
    public function crear() {
        
        //json_decode — Decodifica un string de JSON
        $myArray = isset($_POST['dvArray']) ? json_decode($_POST['dvArray']) : false;        

        //Get arreglo DetalleVenta
        if ($myArray) {
            
            //Get sesion User
            $usuario=new UsuarioModelo();
            $usuario->set_nombre('admin');
            $unUsuario = $usuario->getBy('nombre', $usuario->get_nombre());
            //Destruir el objeto
            unset($usuario);

            $cont = 0;
            //Recorrer y recuperar valores de un objeto JSON con foreach
            foreach($myArray as $obj){
                if ($cont==0) {
                    $idcliente = $obj->idcliente;
                    $forma_pago = $obj->forma_pago;
                    $total_venta = $obj->total_venta;
                    
                    //set new Venta
                    $venta = new VentaModelo();
                    $venta->set_idcliente($idcliente);
                    $venta->set_idusuario($unUsuario[0]->idusuario);
                    $venta->set_forma_pago($forma_pago);
                    $venta->set_total_venta($total_venta);                    
                    $save = $venta->addVenta();
                    if ($save) {
                        $this->resultadoC = true;
                        $idventa = $venta->get_idventa();                        
                    } else {
                        $this->resultadoC = false;
                    }
                    unset($venta);

                } else {

                    if ($this->resultadoC && isset($idventa)) {
                        $idproducto = $obj->dvCodProducto;
                        $precio = (float) $obj->dvPUnitario;
                        $cantidad = (int) $obj->dvCantidad;
                        $total = round($precio*$cantidad,2);

                        $values[] = "('{$idventa}', '{$idproducto}', '{$cantidad}', '{$total}')";

                        /*//set new DetalleVenta
                        $dVenta = new DetalleVentaModelo();
                        $dVenta->set_idventa($idventa);
                        $dVenta->set_idproducto($idproducto);
                        $dVenta->set_cantidad($cantidad);
                        $dVenta->set_total($total);
                        $save = $dVenta->addDetalleVenta();
                        if (!$save) {
                            $this->resultadoC = false;
                        }
                        unset($dVenta);*/

                        // Actualizar PRODUCTO
                        //set new Producto
                        $producto = new ProductoModelo();
                        $unProducto= $producto->buscarProductoModelo($idproducto);

                        $producto->setIdproducto($unProducto[0]->idproducto);
                        $producto->setIdcategoria($unProducto[0]->idcategoria);
                        $producto->setDetalle($unProducto[0]->detalle);
                        $producto->setPrecio($unProducto[0]->precio_venta);
                        $producto->setStock((int) ($unProducto[0]->stock - $cantidad));
                        $save = $producto->actualizar();
                        if (!$save) {
                            $this->resultadoC = false;
                        }
                        unset($producto);
                    }
                }
                $cont++;
            }

            if (isset($values)) {
                //set new DetalleVenta
                $dVenta = new DetalleVentaModelo();
                $save = $dVenta->addDetalleVentaArray($values);
                /*if (!$save) {
                    $this->resultadoC = false;
                }*/
                unset($dVenta);      
            }

            echo $save; //Este mensaje devolverá a la llamada AJAX            

        } else {
            echo "false";
        }                
    }
    
    public function getProducto(){
        if(isset($_POST["idproducto"])){
            $idproducto = $_POST["idproducto"];
            
            //set new Producto
            $producto = new ProductoModelo();
            $productoBuscado = $producto->buscarProductoModelo($idproducto);            
            
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

}
