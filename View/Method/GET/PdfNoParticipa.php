<?php
require_once RAIZ.'Controller/ControllerGET.php';
        header('Content-Type: application/json');
        $estos=(new ControllerGET())->getListaEstudiantesNoParticipantes();
        echo json_encode($estos,JSON_UNESCAPED_UNICODE);