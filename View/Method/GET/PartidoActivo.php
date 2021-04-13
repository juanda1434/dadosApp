<?php

require_once RAIZ.'Controller/ControllerGET.php';
if (isset($_GET["codigo"])) {
    $respuesta=(new ControllerGET())->getPartidoActivo($_GET["codigo"]);

echo json_encode($respuesta);
}


