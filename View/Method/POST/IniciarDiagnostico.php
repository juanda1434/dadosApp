<?php

require_once RAIZ . 'Controller/ControllerEdit.php';
header('Content-Type: application/json');
try {
    echo json_encode(["exito" => (new ControllerEdit())->iniciarDiagnostico()]);
} catch (Exception $ex) {
    echo json_encode(["exito" => false, "error" => $ex->getMessage()]);
}
