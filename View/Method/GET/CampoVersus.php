<?php

if (isset($_GET["codigo"])) {
    require_once RAIZ.'Controller/ControllerGET.php';
    
    try {
        $campos=ControllerGET::getCampoVersus($_GET["codigo"]);
        
        echo json_encode($campos);
    } catch (Exception $ex) {
        
        echo json_encode(["exito"=>false,"error"=>$ex->getMessage()]);
    }
    
}