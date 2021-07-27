<?php

if (isset($_POST["codigo"]) && isset($_POST["id"]) && ($_POST["id"]=="1" || $_POST["id"]=="2" )) {
    require_once RAIZ."Controller/ControllerEdit.php";
    try {
    echo json_encode(["exito"=>(new ControllerEdit())->ganadorEnfrentamiento($_POST["codigo"], $_POST["id"])]);    
    } catch (Exception $ex) {
        echo json_encode(["exito"=>false,"error"=>$ex->getMessage()]);  
    }    
}

