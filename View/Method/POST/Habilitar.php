<?php

require_once RAIZ . "Model/DAO/RegistroEstudianteDAO.php";

try {
    $ok = (new RegistroEstudianteDAO)->habilitar();
    if ($ok[0]) {
    echo json_encode(array("exito"=>true,"message"=>$ok[1]==1?"HABILITADO":"DESHABILITADO"));
}else{
     echo json_encode(array("exito"=>false));
}
} catch (Exception $ex) {
    echo json_encode(array("exito"=>false,"error"=>$ex->getMessage()));
}
