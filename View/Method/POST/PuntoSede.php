<?php

if (isset($_POST["punto"])) {
    require_once RAIZ . 'Controller/ControllerEdit.php';
    
    try{
        if((new ControllerEdit())->enviarPuntoSede(filter_input(INPUT_POST, "punto",FILTER_VALIDATE_BOOLEAN))){
        echo json_encode(["exito"=>true]);
    }else{
        echo json_encode(["exito"=>false]);
    }
    } catch (Exception $ex){
        echo json_encode(["exito"=>false,"error"=>$ex->getMessage()]);
    }
}