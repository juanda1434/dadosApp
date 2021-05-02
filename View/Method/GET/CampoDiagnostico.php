<?php
require_once RAIZ . 'Controller/ControllerGET.php';
header('Content-Type: application/json');
echo json_encode((new ControllerGET())->getCampoDiagnostico());
