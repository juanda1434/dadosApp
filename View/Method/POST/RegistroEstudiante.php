<?php
require_once RAIZ . "Model/DAO/RegistroEstudianteDAO.php";


if (isset($_POST["name"]) && isset($_POST["code"]) && isset($_POST["pass"]) && isset($_POST["sede"])) {
    try {
        $dao = (new RegistroEstudianteDAO);
        if ($dao->habilitado() && $dao->registrar($_POST["name"],$_POST["code"],$_POST["pass"],$_POST["sede"])) {
        echo json_encode(array("exito"=>true));
    }else{
         echo json_encode(array("exito"=>false));
    }
    } catch (Exception $ex) {
        echo json_encode(array("exito"=>false,"error"=>$ex->getMessage()));
    }
    
}else {
    echo json_encode(array("exito"=>false));
}
