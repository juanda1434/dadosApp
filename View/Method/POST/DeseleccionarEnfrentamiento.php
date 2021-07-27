<?php

if (isset($_POST["codigo"])) {
    require_once RAIZ."Controller/ControllerEdit.php";
    try {
    echo json_encode(["exito"=>(new ControllerEdit())->deseleccionarEnfrentamiento($_POST["codigo"])]);    
    } catch (Exception $ex) {
        echo json_encode(["exito"=>false,"error"=>$ex->getMessage()]);  
    }    
}

