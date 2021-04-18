<?php

if(isset($_POST["actualizar"])){
    
    try {
        require_once RAIZ.'Controller/ControllerEdit.php';
        echo json_encode(["exito"=>(new ControllerEdit)->actualizarEstado()]);
        
    } catch (Exception $ex) {
        echo json_encode(["exito"=>false]);
    }
    
}