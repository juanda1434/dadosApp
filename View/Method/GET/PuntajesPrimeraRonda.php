<?php

require_once RAIZ.'Controller/ControllerGET.php';

if (isset($_GET["codigo"])) {
   
    $puntajes = (new ControllerGET())->getPuntajesPrimeraRonda($_GET["codigo"]);
    echo json_encode($puntajes);
    
}
