<?php

require_once RAIZ.'Controller/ControllerGET.php';

$sedesgrados= ControllerGET::getSedeEstudiante();

echo json_encode($sedesgrados,JSON_UNESCAPED_UNICODE);