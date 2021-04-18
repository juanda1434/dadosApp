<?php

require_once RAIZ.'Controller/ControllerGET.php';

try {

    $estadoRegistro = (new ControllerGET())->getEstadoRegistro();
    echo json_encode(array("exito" => true, "estadoRegistro" => $estadoRegistro));
} catch (Exception $ex) {
    echo json_encode(array("error" => $ex->getMessage()));
}

