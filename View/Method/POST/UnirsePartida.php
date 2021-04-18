<?php

if (isset($_POST["codigo"])) {
    require_once RAIZ.'Controller/ControllerRegistro.php';
    
    try {
     if((new ControllerRegistro())->unirsePartida($_POST["codigo"])){
      echo  json_encode(array("exito"=>true));
    }else{
    echo    json_encode(array("exito"=>false));
    }    
    } catch (Exception $ex) {
        echo json_encode(array("exito"=>false,"error"=>$ex->getMessage()));
    }
    
}

