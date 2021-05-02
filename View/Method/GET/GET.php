<?php

function GET($ubicacion) {
    $ubicaciones = ["PartidoActivo","PuntajesPrimeraRonda","CampoActual","Time","GanadoresCuadro",
        "Cuadros","SedesGrados","PartidosDocente","EstadoRegistro","PuntajesGrupo","CampoVersus",
        "EstudiantesVersus","CampoEnfrentamiento","PartidoActivoEnfrentamiento","Sede","SedeEstudiante",
        "CuadrosEstudiante","MS","CampoDiagnostico","LinkPrueba"];
    $r = "";
    foreach ($ubicaciones as $ubica) {
        if ($ubica == $ubicacion) {
            $r = RAIZ . "View/Method/GET/" . $ubica . ".php";
        }
    }
    return $r;
}

if (isset($_GET["ubicacionget"]) && GET($_GET["ubicacionget"]) != "") {
        include_once GET($_GET["ubicacionget"]);
    }