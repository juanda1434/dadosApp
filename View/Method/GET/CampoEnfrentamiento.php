<?php


require_once RAIZ . 'Controller/ControllerGET.php';
if (isset($_GET["codigo"])) {
    echo json_encode((new ControllerGET())->getCampoEnfrentamiento($_GET["codigo"]));
}
