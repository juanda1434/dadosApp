<?php

require_once RAIZ.'Controller/ControllerGET.php';
if (isset($_GET["codigo"])) {
    $respuesta=(new ControllerGET())->getPartidoActivoEnfrentamiento($_GET["codigo"]);

echo json_encode($respuesta);
}


