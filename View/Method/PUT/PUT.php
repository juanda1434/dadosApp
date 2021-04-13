<?php

function PUT($ubicacion) {
    $ubicaciones = ["CerrarPregunta","IniciarPartida","SaltarNumero"];
    $r = "";
    foreach ($ubicaciones as $ubica) {
        if ($ubica == $ubicacion) {
            $r = RAIZ . "View/Method/PUT/" . $ubica . ".php";
        }
    }
    return $r;
}

if (isset($_GET["ubicacionput"]) && PUT($_GET["ubicacionput"]) != "") {
    if ($_SERVER["REQUEST_METHOD"] === "PUT") {
        parse_str(file_get_contents("php://input"), $put_vars);
        $_PUT=$put_vars;
    }
    include_once PUT($_GET["ubicacionput"]);
}