<?php

if (isset($_POST["codigo"]) ) {
    
    require_once RAIZ.'Controller/ControllerEdit.php';
    if(ControllerEdit::SaltarPregunta($_POST["codigo"])){
        echo json_encode(array("exito"=>true));
    }else{
        echo json_encode(array("exito"=>false));
    }
}