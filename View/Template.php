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

<!--<textarea cols="50" rows="20" id="resultado" >
        



    </textarea>
    <input id="mensaje" >
    <button id="enviar">Enviar</button>-->
    
    <?php
    
    include_once RAIZ . '/View/Modules/' . (new ControllerView())->getView(isset($_GET["ubicacion"]) ? $_GET["ubicacion"] : "Inicio");
    
    ?>

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>-->


