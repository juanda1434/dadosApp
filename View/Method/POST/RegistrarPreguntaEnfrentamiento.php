<?php

if (isset($_POST["dadouno"]) && isset($_POST["dadodos"]) && isset($_POST["dadotres"]) && isset($_POST["dadocuatro"]) && isset($_POST["numero"])) {
    
    require_once RAIZ.'Controller/ControllerRegistro.php';
    try {
    if((new ControllerRegistro())->registrarPreguntaEnfrentamiento($_POST["dadouno"], $_POST["dadodos"], $_POST["dadotres"], $_POST["dadocuatro"],$_POST["numero"],$_POST["codigo"])){
        echo json_encode(array("exito"=>true));
    }else{
         echo json_encode(array("exito"=>false));
    }    
    } catch (Exception $ex) {
         echo json_encode(array("exito"=>false,"error"=>$ex->getMessage()));
    }
    
}