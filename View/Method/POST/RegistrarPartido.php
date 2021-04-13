<?php

if (isset($_POST["sede"]) && isset($_POST["grado"]) && isset($_POST["numero"])) {
    require_once RAIZ."Controller/ControllerRegistro.php";
    
    try {
         if(ControllerRegistro::registrarPartido($_POST["sede"],$_POST["grado"],$_POST["numero"])){
        echo json_encode(array("exito"=>true));
        
    }else{
        echo json_encode(array("exito"=>false));
    }
    } catch (Exception $ex) {
        echo json_encode(array("exito"=>false,"error"=>$ex->getMessage()));
    }
   
    
}
