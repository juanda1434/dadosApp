<?php

require_once RAIZ . 'Controller/ControllerEdit.php';
header('Content-Type: application/json');
if (isset($_POST["operacion"]) && strlen($_POST["operacion"]) <= 11 && strlen($_POST["operacion"]) >= 7 && isset($_POST["numerouno"]) && ctype_digit($_POST["numerouno"]) && isset($_POST["numerodos"]) && ctype_digit($_POST["numerodos"]) && isset($_POST["numerotres"]) && ctype_digit($_POST["numerotres"]) && isset($_POST["numerocuatro"]) && ctype_digit($_POST["numerocuatro"])) {

    $operacion = $_POST["operacion"];
    $valido = preg_match('/(\({0,1}[1-6]{1}\){0,1}([+]|[-]|[\/]|[*])\({0,1}[1-6]{1}\){0,1})([+]|[-]|[\/]|[*])(\({0,1}[1-6]{1}\){0,1}([+]|[-]|[\/]|[*])\({0,1}[1-6]{1}\){0,1})/', $operacion, $operacionCorrecta);
    if ($valido !== false && $valido == 1) {
        try {
    echo json_encode(["exito" => (new ControllerEdit())->enviarRespuestaDiagnostico($_POST["numerouno"],$_POST["numerodos"],$_POST["numerotres"],$_POST["numerocuatro"],$_POST["operacion"])]);
} catch (Exception $ex) {
    echo json_encode(["exito" => false, "error" => $ex->getMessage()]);
}
    }
    
}else{
    echo json_encode(["exito"=>false,"error"=>"Has enviado un formato de respuesta incorrecto"]);
}

