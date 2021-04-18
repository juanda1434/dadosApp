<?php


if (isset($_POST["estudiante1"]) && isset($_POST["estudiante2"]) && isset($_POST["codigo"])) {    
    require_once RAIZ.'Controller/ControllerEdit.php';        
    
    try {
         if ((new ControllerEdit())->seleccionarVersus($_POST["estudiante1"],$_POST["estudiante2"],$_POST["codigo"])) {
        echo json_encode(["exito"=>true]);
    }else{
         echo json_encode(["exito"=>false]);
    }
        
    } catch (Exception $ex) {
        echo json_encode(["exito"=>false,"error"=>$ex->getMessage()]);
    }
    
}

