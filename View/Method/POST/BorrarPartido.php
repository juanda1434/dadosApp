<?php

if ($_POST["codigo"]) {
    
    require_once RAIZ.'Controller/ControllerDelete.php';
    $codigo=$_POST["codigo"];
    if((new ControllerDelete())->borrarPartido($codigo)){
        echo json_encode(array("exito"=>true));
    }else{
        echo json_encode(array("exito"=>false));
    }
}