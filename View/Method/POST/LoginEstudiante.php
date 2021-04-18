<?php

if (isset($_POST["user"]) && isset($_POST["contrasenia"])) {
    require_once RAIZ.'Controller/ControllerLogin.php';
    try {
     if ((new ControllerLogin())->LoginEstudiante($_POST["user"],$_POST["contrasenia"])) {
        echo json_encode(array("exito"=>true));
    }else{
        echo json_encode(array("exito"=>false,"error"=>"Codigo o contraseña incorrectos"));
    }    
    } catch (Exception $ex) {
        echo json_encode(array("exito"=>false,"error"=>$ex->getMessage()));
    }
}
