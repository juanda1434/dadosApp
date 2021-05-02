<?php
if (isset($_GET["post"]) && $_GET["post"] == "post" && isset($_GET["ubicacionpost"])) {
    include_once RAIZ . '/View/Method/POST/POST.php';
    return;
}

if (isset($_GET["get"]) &&  $_GET["get"]=="get" && isset($_GET["ubicacionget"])) {   
    include_once RAIZ . '/View/Method/GET/GET.php';
    return;
}
if (isset($_GET["put"]) && $_GET["put"]=="put" && isset($_GET["ubicacionput"])) {
    include_once RAIZ.'View/Method/PUT/PUT.php';
    return;
}
?>

    
    <?php
    
    include_once RAIZ . '/View/Modules/' . (new ControllerView())->getView(isset($_GET["ubicacion"]) ? $_GET["ubicacion"] : "Inicio");
    
    ?>

   