<?php




function POST($ubicacion){
    $ubicaciones=["RegistrarPartido","LoginEstudiante","UnirsePartida","EnviarRespuesta",
        "RegistrarPregunta","IniciarPartida","SaltarNumero","CerrarPregunta","SegundaRonda",
        "BorrarPartido","NuevaRonda","FinalizarRonda","PuntoSede","SeleccionarEnfrentamiento",
        "RegistrarPreguntaEnfrentamiento","EnviarSigno","FinalizarEnfrentamiento","ResponderEnfrentamiento",
        "ActualizarEstado"];    
    $r="";
    foreach ($ubicaciones as $ubica) {
        if ($ubica==$ubicacion) {
            $r=RAIZ."View/Method/POST/".$ubica.".php";
        }
    }
    return $r;
}

if (isset($_GET["ubicacionpost"]) && POST($_GET["ubicacionpost"])!="") {
    include_once POST($_GET["ubicacionpost"]);
    
}