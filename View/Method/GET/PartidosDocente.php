<?php

require_once RAIZ.'Controller/ControllerGET.php';

echo json_encode(array("grupos"=>(new ControllerGET())->getPartidos()));
