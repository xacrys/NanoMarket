<?php

class UsuarioControlador extends ControladorBase{
    
    // Variables para determinar la accion a realizar por el controlador y el resultado
    private $accionC;
    private $resultadoC;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() { 
        $usuario=new Usuario();
        $todosUsuarios=$usuario->getAll();
        $this->view("Usuario", array("todosusuarios"=>$todosUsuarios,"Hola"=>"Hola Cris"));
    }
    
    public function crear(){
        if(isset($_POST["nombre"])){
            $usuario = new Usuario();
            $nombre=$_POST["nombre"];
            $password=$_POST["password"];
            $usuario->setNombre($nombre);
            $usuario->setPassword($password);
            $guardar=$usuario->guardar();
            
        }
        
        $this->redirect("Usuario","index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){
            $id=(int)$_GET["id"];
            $usuario = new Usuario();
            $usuario->deleteById($id);
            $this->redirect();
        }
    }

    //Validar Inicio de Sesion
    public function login(){
        if(isset($_POST["inputNombre"]) && isset($_POST["inputPass"])){
            $nombre = $_POST["inputNombre"];
            $password = $_POST["inputPass"];

            $usuario=new UsuarioModelo();
            $usuario->set_nombre($nombre);
            $usuario->set_password($password);

            $unUsuario = $usuario->find();
            $this->accionC = "login";

            //Si existen resultados
            if(isset($unUsuario) && isset($unUsuario[0]->nombre) && count($unUsuario)>=1) {
                $this->resultadoC = true;
                $_SESSION['user'] = $unUsuario[0]->nombre;                
                $this->redirect("Cliente","index");
            } else {
                $this->resultadoC = false;
                $unUsuario = array("nombre" => "UNDEFINED");
                //Cargamos la vista Usuario y enviar resultados
                $this->view("Usuario", array("unUsuario"=>$unUsuario, "accionC"=>$this->accionC, "resultadoC"=>$this->resultadoC));
            }                        
        }
    }

    //Cerrar Sesion
    public function logout() {        
        session_destroy();
        $this->redirect("Usuario","index");
    }
}