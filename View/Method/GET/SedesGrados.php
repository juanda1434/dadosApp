<?php

require_once RAIZ.'Controller/ControllerGET.php';

$sedesgrados= ControllerGET::getSedesGrados();

echo json_encode($sedesgrados,JSON_UNESCAPED_UNICODE);