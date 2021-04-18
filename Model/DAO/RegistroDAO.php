<?php

class RegistroDAO {

    private $conexion;

    public function __construct() {
        require_once RAIZ . 'Model/Database/Database.php';
        $this->conexion = (new Database())->connect();
    }

    public function unirsePartida($registroDTO) {
        $idPartido = ($registroDTO->getPartidoDTO())->getIdPartido();
        $idEstudiante = ($registroDTO->getEstudianteDTO())->getIdEstudiante();
        $exito = -1;
        try {
            $stmUnirsePartida = $this->conexion->prepare("insert into registro(idpartido,idestudiante) values(:idpartido,:idestudiante)");
            $stmUnirsePartida->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
            $stmUnirsePartida->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
            if ($stmUnirsePartida->execute()) {
                $exito = $this->conexion->lastInsertId();
            }
        } catch (Exception $ex) {
            
        }
        return $exito;
    }

    public function validarRegistroExistente($registroDTO) {
        $idEstudiante = ($registroDTO->getEstudianteDTO())->getIdEstudiante();
        $idRegistro = -1;
        try {
            $stmValidarRegistro = $this->conexion->prepare("select idregistro from registro INNER JOIN partido p on p.idpartido=registro.idpartido where idestudiante=:idestudiante and not p.finalizado");
           
            $stmValidarRegistro->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
            if ($stmValidarRegistro->execute() && $stmValidarRegistro->rowCount() > 0) {
                $idRegistro = ($stmValidarRegistro->fetch())["idregistro"];
            }
        } catch (Exception $ex) {
            
        }
        return $idRegistro;
    }

    public function getEstadoRegistro(RegistroDTO $registroDTO) {
        $idestudiante = $registroDTO->getEstudianteDTO()->getIdEstudiante();
        $estadoRegistro = [];
        try {
            $stmGetEstadoRegistro = $this->conexion->prepare("select partido.codigo,if(not partido.finalizado,if(not partido.enjuego and not partido.estaactivo,'Registro',if(partido.enjuego and not partido.estaactivo,'Pausa',if(partido.estaactivo and not partido.enjuego,'Siguiente','Jugando'))),'Finalizado')estado,sede.nombre sede,concat(grado.nombre,' ',partido.numero)grado from registro INNER JOIN partido on partido.idpartido=registro.idpartido INNER JOIN sede on sede.idsede=partido.idsede INNER JOIN grado on grado.idgrado=partido.idgrado  where registro.idestudiante=:idestudiante and not partido.finalizado");
            $stmGetEstadoRegistro->bindParam("idestudiante", $idestudiante, PDO::PARAM_INT);
            if ($stmGetEstadoRegistro->execute() && $stmGetEstadoRegistro->rowCount() > 0) {
                $estadoRegistro = $stmGetEstadoRegistro->fetch();
                $estadoRegistro = array("codigo" => $estadoRegistro["codigo"], "estado" => $estadoRegistro["estado"], "grado" => $estadoRegistro["grado"]);
            }
        } catch (Exception $ex) {
            
        }
        return $estadoRegistro;
    }

}
