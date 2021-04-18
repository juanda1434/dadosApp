<?php

if (isset($_POST["punto"])) {
    require_once RAIZ . 'Controller/ControllerEdit.php';
    
    try{
        if((new ControllerEdit())->enviarPuntoSede()){
        echo json_encode(["exito"=>true]);
    }else{
        echo json_encode(["exito"=>false]);
    }
    } catch (Exception $ex){
        echo json_encode(["exito"=>false,"error"=>$ex->getMessage()]);
    }
}