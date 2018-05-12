<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModeloBase extends EntidadBase {

    private $tabla;

    public function __construct($tabla) {
        $this->tabla =(string)$tabla;
        parent::__construct($tabla);
    }

    public function ejecutarSql($query) {
        $query = $this->db()->query($query);
        if ($query) {
            if ($query->num_rows > 1) {
                while ($row = $query->fetch_object()) {
                    $resultSet[] = $row;
                }
            } elseif ($query->num_rows == 1) {
                while ($row = $query->fetch_object()) {
                    $resultSet[] = $row;
                }
            }else{
                $resultSet[] = false;
            }
            return $resultSet;
        }
    }

}
