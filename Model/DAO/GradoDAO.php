<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GradoDAO
 *
 * @author USUARIO
 */
class GradoDAO {
  
    
    private $conexion;

    public function __construct() {
        require_once RAIZ . 'Model/Database/Database.php';
        $this->conexion = (new Database())->connect();
    }
    
    
    public function getGrado() {
        
        $grados=[];
        try {
            $stmGetGrados= $this->conexion->prepare("select idgrado,nombre from grado");
            if ($stmGetGrados->execute() && $stmGetGrados->rowCount()>0) {
                $gradosSQL=$stmGetGrados->fetchAll();
                
                foreach ($gradosSQL as $grado) {
                    $grados[]=["id"=>$grado["idgrado"],"grado"=>$grado["nombre"]];
                }
            }
        } catch (Exception $ex) {
            
        }
        
        return $grados;
        
    }
}
