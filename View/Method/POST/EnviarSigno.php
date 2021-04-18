<?php

if (isset($_POST["x"]) && isset($_POST["y"]) && isset($_POST["i"]) && isset($_POST["tipo"])) {
    
    require_once RAIZ.'Controller/ControllerEdit.php';
    try {
         if ((new ControllerEdit())->enviarSigno($_POST["x"],$_POST["y"],$_POST["i"],$_POST["tipo"])) {
        echo json_encode(["exito"=>true]);
    }else{
         echo json_encode(["exito"=>false]);
    }
    } catch (Exception $ex) {
        echo json_encode(["exito"=>false,"error"=>$ex->getMessage()]);
    }
    
     
}