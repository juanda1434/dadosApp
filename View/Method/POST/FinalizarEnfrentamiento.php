
<?php

if(isset($_POST["codigo"])){
    
    require_once RAIZ.'Controller/ControllerEdit.php';
    try {
        if( (new ControllerEdit())->finalizarEnfrentamiento($_POST["codigo"])){
        echo json_encode(array("exito"=>true));
    }else{
        echo json_encode(array("exito"=>false));
    }
    } catch (Exception $exc) {
       echo json_encode(array("exito"=>false,"error"=>$exc->getMessage()));
    }

    
}