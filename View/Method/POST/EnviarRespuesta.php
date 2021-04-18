<?php

if (isset($_POST["operacion"]) && strlen($_POST["operacion"]) <= 11 && strlen($_POST["operacion"]) >= 7 && isset($_POST["numerouno"]) && ctype_digit($_POST["numerouno"]) && isset($_POST["numerodos"])&& ctype_digit($_POST["numerodos"]) && isset($_POST["numerotres"]) && ctype_digit($_POST["numerotres"]) && isset($_POST["numerocuatro"]) && ctype_digit($_POST["numerocuatro"]) && isset($_POST["codigo"])) {
     
    $operacion = $_POST["operacion"];
    $valido = preg_match('/(\({0,1}[1-6]{1}\){0,1}([+]|[-]|[\/]|[*])\({0,1}[1-6]{1}\){0,1})([+]|[-]|[\/]|[*])(\({0,1}[1-6]{1}\){0,1}([+]|[-]|[\/]|[*])\({0,1}[1-6]{1}\){0,1})/', $operacion, $operacionCorrecta);
    if ($valido !== false && $valido == 1) {
        $operacion = $operacionCorrecta[0];
        require_once RAIZ.'Controller/ControllerRegistro.php';
        $exito=(new ControllerRegistro())->registrarRespuesta($operacion,$_POST["numerouno"],$_POST["numerodos"],$_POST["numerotres"],$_POST["numerocuatro"],$_POST["codigo"]);
      if($exito["exito"]){
          echo json_encode($exito);         
      }else{
          echo json_encode($exito);
      }
        
    }
}




