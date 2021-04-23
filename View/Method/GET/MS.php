<?php

require_once RAIZ.'Controller/ControllerGET.php';
        header('Content-Type: application/json');
        $estos=(new ControllerGET())->getListaEstudiantesParticipantes();
        echo json_encode($estos,JSON_UNESCAPED_UNICODE);