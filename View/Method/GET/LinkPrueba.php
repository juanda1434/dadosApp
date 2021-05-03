<?php

function connect() {
//    $usuario = "root";
//    $contrasenia = "";
//    $baseDatos = "pruebaoff";
//    $host = "localhost";

         $usuario="u603952219_sucesora";
        $contrasenia="D9a1oo30____";
        $baseDatos="u603952219_noconexion";
        $host="localhost";
//        $usuario="u603952219_iesapostoles";
//        $contrasenia="Santosapostoles1494";
//        $baseDatos="u603952219_dadosprimaria";
//        $host="localhost";
    $link = new PDO("mysql:host=$host;dbname=$baseDatos", $usuario, $contrasenia);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $link;
}


//header("Content-Type: application/json");
if (isset($_GET["codigo"])) {
    $identidad=$_GET["codigo"];
    $conn = connect();
    $stm = $conn->prepare("select link from nino where identidad = :identidad");
    $stm->bindParam(":identidad", $identidad, PDO::PARAM_STR);
    if ($stm->execute() && $stm->rowCount() > 0) {
        $link= $stm->fetch()["link"];
        echo json_encode(["link"=>$link]);
    }else{
        echo json_encode(["error"=>"No se encuentra registrado"]);
    }
}
