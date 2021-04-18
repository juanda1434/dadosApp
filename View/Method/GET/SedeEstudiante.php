<?php

require_once RAIZ.'Controller/ControllerGET.php';

$sedesgrados= (new ControllerGET())->getSedeEstudiante();

echo json_encode($sedesgrados,JSON_UNESCAPED_UNICODE);