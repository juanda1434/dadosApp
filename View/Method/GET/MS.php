<?php

require_once RAIZ . 'Controller/ControllerGET.php';
header('Content-Type: application/json');
if (isset($_GET["codigo"])) {
    $estos = (new ControllerGET())->getListaEstudiantesParticipantes(intval($_GET["codigo"]));
    echo json_encode($estos, JSON_UNESCAPED_UNICODE);
}
        