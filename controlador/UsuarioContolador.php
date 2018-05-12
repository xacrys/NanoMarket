<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioControlador extends ControladorBase{
    
    public function construct() {
        parent::construct();
    }
    
    public function index() {
        $usuario=new Usuario();
        $todosUsuarios=$usuario->getAll();
        
        $this->view("index", array("todosusuarios"=>$todosUsuarios,"Hola"=>"Hola Cris"));
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
}