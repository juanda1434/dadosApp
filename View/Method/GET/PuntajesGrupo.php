<?php

if (isset($_GET["codigo"])) {
    require_once RAIZ.'Controller/ControllerGET.php';
    
    $puntajes=(new ControllerGET())->getPuntajes($_GET["codigo"]);
    
    echo json_encode(["puntajes"=>$puntajes[0],"ide"=> isset($puntajes["ide"])?$puntajes["ide"]:null]);
}