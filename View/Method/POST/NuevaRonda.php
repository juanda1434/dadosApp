<?php

if ($_POST["codigo"]) {

    require_once RAIZ . 'Controller/ControllerEdit.php';
    $exito = (new ControllerEdit())->nuevaRonda($_POST["codigo"]);

    if ($exito) {
        echo json_encode(array("exito" => true));
    } else {
       echo json_encode(array("exito" => false));
    }
}