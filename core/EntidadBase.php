<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EntidadBase{
  private $tabla, $db, $conectar;

  public function contructor($tabla){
      $this->tabla=(string)$tabla;
      require_once './Conectar.php';
      $this->conectar=new Conectar();
      $this->db= $this->conectar->conexion();
      
  }
  public function getConectar() {
      return $this->conectar;
  }
  public function db() {
      return $this->db;
  }
  public function getAll() {
      $query = $this->db->query("SELECT * FROM $this->tabla ORDER BY id DESC");
      while ($row = $query->fetch_object()) {
          $resultSet[]=$row;
      }
      return $resultSet;
  }
  
  public function getById($id) {
      $query = $this->db->query("SELECT * FROM $this->tabla WHERE id = $id");
      if($row = $query->fetch_object()){
          $resultSet[]=$row;
      }
      return $resultSet;
  }
  
  public function getBy($column, $value) {
      $query = $this->db->query("SELECT * FROM $this->tabla WHERE $column = '$value'");
      while ($row = $query->fetch_object()) {
          $resultSet[]=$row;
      }
      return $resultSet;
  }
  
  public function deleteById($id) {
      $query = $this->db->query("DELETE FROM $this->tabla WHERE id = $id");
      return $query;
  }
  
  public function deleteBy($column, $value) {
      $query = $this->db->query("DELETE FROM $this->tabla WHERE $column = '$value'");
      return $query;
  }
}


