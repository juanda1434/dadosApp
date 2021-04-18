<?php

 if (isset($_GET["codigo"])) {
     require_once RAIZ.'Controller/ControllerGET.php';
     $cuadros=(new ControllerGET())->getCuadros($_GET["codigo"]);
     echo json_encode($cuadros);
}

