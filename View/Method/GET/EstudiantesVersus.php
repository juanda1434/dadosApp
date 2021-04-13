<?php

if (isset($_GET["codigo"])) {
    require_once RAIZ.'Controller/ControllerGET.php';
    
    try {
     $estudiantes= ControllerGET::getEstudianteVersus($_GET["codigo"]);
      echo json_encode($estudiantes);
    } catch (Exception $ex) {
     echo json_encode(["exito"=>false,"error"=>$ex->getMessage()]);   
    }
   
}
