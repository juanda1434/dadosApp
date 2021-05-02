<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DiagnosticoDAO
 *
 * @author Anillos
 */
class DiagnosticoDAO {

    private PDO $conexion;

    public function __construct() {
        require_once RAIZ . 'Model/Database/Database.php';
        $this->conexion = (new Database())->connect();
    }

    public function validarDiagnosticoOff(DiagnosticoDTO $diagnosticoDTO): bool {
        $idEstudiante = ($diagnosticoDTO->getEstudianteDTO())->getIdEstudiante();
        try {
            $stmValidar = $this->conexion->prepare("select * from diagnostico where fechainicio is null and fechafin is null and idestudiante=:idestudiante");
            $stmValidar->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
            if ($stmValidar->execute() && $stmValidar->rowCount() > 0) {
                return true;
            }
        } catch (Exception $ex) {
            
        }
        return false;
    }

    public function validarEnDiagnostico(DiagnosticoDTO $diagnosticoDTO): bool {
        $idEstudiante = ($diagnosticoDTO->getEstudianteDTO())->getIdEstudiante();
        try {
            $stmValidar = $this->conexion->prepare("select * from diagnostico where not fechafin is null and idestudiante=:idestudiante");
            $stmValidar->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
            if ($stmValidar->execute() && $stmValidar->rowCount() > 0) {
                return true;
            }
        } catch (Exception $ex) {
            
        }
        return false;
    } 
    
    public function validarTiempoDiagnostico(DiagnosticoDTO $diagnosticoDTO): bool {
        $idEstudiante = ($diagnosticoDTO->getEstudianteDTO())->getIdEstudiante();
        try {
            $stmValidar = $this->conexion->prepare("select * from diagnostico d INNER JOIN diagnosticopregunta dp on dp.iddiagnostico=d.iddiagnostico where dp.idpreguntabase=10 and dp.fechafin is null and CURRENT_TIMESTAMP < d.fechafin and d.idestudiante=:idestudiante");
            $stmValidar->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
            if ($stmValidar->execute() && $stmValidar->rowCount() > 0) {
                return true;
            }
        } catch (Exception $ex) {
            
        }
        return false;
    }

    public function iniciarDiagnostico(DiagnosticoDTO $diagnosticoDTO): bool {
        $idEstudiante = ($diagnosticoDTO->getEstudianteDTO())->getIdEstudiante();
        try {
            $this->conexion->beginTransaction();
            $stmIniciar = $this->conexion->prepare("update diagnostico set fechainicio=" . TIEMPO . ", fechafin=date_add(" . TIEMPO . ",interval (60*20) SECOND) where idestudiante=:idestudiante");
            $stmIniciar->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
            if (!$stmIniciar->execute() || $stmIniciar->rowCount() <= 0) {
                throw new Exception("Error al intentar empezar la prueba diagnostica : iniciar");
            }
            $stmIniciarPregunta = $this->conexion->prepare("update diagnosticopregunta dp INNER JOIN diagnostico d on (dp.iddiagnostico=d.iddiagnostico ) set dp.fechainicio=" . TIEMPO . "  where d.idestudiante=:idestudiante and dp.idpreguntabase=1");
            $stmIniciarPregunta->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
            if (!$stmIniciarPregunta->execute() || $stmIniciarPregunta->rowCount() <= 0) {
                throw new Exception("Error al intentar empezar la prueba diagnostica : iniciar pregunta");
            }
            return $this->conexion->commit();
        } catch (Exception $ex) {
            $this->conexion->rollBack();
        }
        return false;
    }

    public function enviarRespuestaDiagnostico(DiagnosticoDTO $diagnosticoDTO): bool {
        $exito = false;
        $idEstudiante = ($diagnosticoDTO->getEstudianteDTO())->getIdEstudiante();
        try {
            $this->conexion->beginTransaction();
            $stmGetIdDiagnosticoPregunta = $this->conexion->prepare("SELECT dp.iddiagnosticopregunta,dp.idpreguntabase from preguntabase pb INNER JOIN diagnosticopregunta dp on pb.idpreguntabase=dp.idpreguntabase INNER JOIN diagnostico d on d.iddiagnostico=dp.iddiagnostico WHERE not dp.fechainicio is null and dp.fechafin is null and d.idestudiante=:idestudiante");
            $stmGetIdDiagnosticoPregunta->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
            if (!$stmGetIdDiagnosticoPregunta->execute() || $stmGetIdDiagnosticoPregunta->rowCount() <= 0) {
                throw new Exception("Error al responder diagnostico : seleccionar pregunta.");
            }
            $pregunta = $stmGetIdDiagnosticoPregunta->fetch();
            $idDiagnosticoPregunta = $pregunta["iddiagnosticopregunta"];
            $idPreguntaBase = intval($pregunta["idpreguntabase"]) + 1;
            $correcto = ($diagnosticoDTO->getFirtDiagnosticoPreguntaDTO())->getCorrecto();
            $stmResponder = $this->conexion->prepare("update diagnosticopregunta dp set dp.correcta=:correcto,dp.fechafin=" . TIEMPO . " where  dp.iddiagnosticopregunta=:iddiagnosticopregunta");
            $stmResponder->bindParam(":iddiagnosticopregunta", $idDiagnosticoPregunta, PDO::PARAM_INT);
            $stmResponder->bindParam(":correcto", $correcto, PDO::PARAM_BOOL);
            if (!$stmResponder->execute() || $stmResponder->rowCount() <= 0) {
                throw new Exception("Error al responder diagnostico : responder pregunta");
            }
            if ($idPreguntaBase <= 10) {
                $stmSetPregunta = $this->conexion->prepare("update diagnosticopregunta dp INNER JOIN diagnostico d on (dp.iddiagnostico=d.iddiagnostico ) set dp.fechainicio=" . TIEMPO . "  where d.idestudiante=:idestudiante and dp.idpreguntabase=:idpreguntabase");
                $stmSetPregunta->bindParam(":idestudiante", $idEstudiante,PDO::PARAM_INT);
                $stmSetPregunta->bindParam(":idpreguntabase", $idPreguntaBase,PDO::PARAM_INT);
                if(!$stmSetPregunta->execute() || $stmSetPregunta->rowCount()<=0){
                    throw new Exception("Error al responder diagnostico : actualizar pregunta");
                }
            }
            $exito=$this->conexion->commit();
        } catch (Exception $ex) {
            $this->conexion->rollBack();
        }
        return $exito;
    }

    public function functionName($param) {
        
    }

}
