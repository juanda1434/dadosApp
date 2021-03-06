<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SedeDAO
 *
 * @author USUARIO
 */
class SedeDAO {

    private $conexion;

    public function __construct() {
        require_once RAIZ . 'Model/Database/Database.php';
        $this->conexion = (new Database())->connect();
    }

    public function getSede() {

        $sedes = [];
        try {
            $stmGetSedes = $this->conexion->prepare("select sede.idsede,sede.nombre,sede.puntaje,COUNT(puntajes.idsede)puntajeminimo from sede LEFT JOIN ( select idsede from puntajesede GROUP BY idestudiante)puntajes on puntajes.idsede=sede.idsede GROUP by sede.idsede");
            if ($stmGetSedes->execute() && $stmGetSedes->rowCount() > 0) {
                $sedesSQL = $stmGetSedes->fetchAll();


                foreach ($sedesSQL as $sede) {
                    $sedes[] = ["id" => $sede["idsede"], "sede" => $sede["nombre"], "puntaje" => $sede["puntaje"], "puntajeminimo" => $sede["puntajeminimo"]];
                }
            }
        } catch (Exception $ex) {
            
        }

        return $sedes;
    }

    public function getSedeEstudiante($sedeDTO) {
        $estudianteDTO = $sedeDTO->getEstudiantesDTO();
        $id = $estudianteDTO->getIdEstudiante();
        $sedes = [];
        try {
            $stmGetSedes = $this->conexion->prepare("select  if(SUM(if(puntajesede.correcto,1,0)) is null,0,SUM(if(puntajesede.correcto,1,0))) correcto,sede.idsede,sede.nombre,sede.puntaje from sede inner join estudiante on estudiante.idsede=sede.idsede INNER JOIN puntajesede on puntajesede.idestudiante=estudiante.idestudiante where estudiante.idestudiante=:idestudiante");
            $stmGetSedes->bindParam(":idestudiante", $id, PDO::PARAM_INT);
            if ($stmGetSedes->execute() && $stmGetSedes->rowCount() > 0) {
                $sedesSQL = $stmGetSedes->fetch();
                $sedes = ["id" => $sedesSQL["idsede"], "sede" => $sedesSQL["nombre"], "puntaje" => $sedesSQL["puntaje"],"correcto"=>$sedesSQL["correcto"]];
            }
        } catch (Exception $ex) {
            
        }

        return $sedes;
    }

    public function getPuntaje(SedeDTO $sedeDTO) {
        $sede = $sedeDTO->getNombre();
        $puntaje = -1;
        try {
            $stmGetSedes = $this->conexion->prepare("select puntaje from sede where nombre=:nombre");
            $stmGetSedes->bindParam(":nombre", $sede, PDO::PARAM_STR);
            if ($stmGetSedes->execute() && $stmGetSedes->rowCount() > 0) {
                $puntaje = intval($stmGetSedes->fetch()["puntaje"]);
            }
        } catch (Exception $ex) {
            
        }
        return $puntaje;
    }

    public function getPuntajeMinimo(SedeDTO $sedeDTO) {
        $sede = $sedeDTO->getNombre();
        $puntaje = -1;
        try {
            $stmGetSedes = $this->conexion->prepare("select COUNT(puntajes.idsede)participantes from sede LEFT JOIN ( select idsede from puntajesede GROUP BY idestudiante)puntajes on puntajes.idsede=sede.idsede where sede.nombre=:nombre");
            $stmGetSedes->bindParam(":nombre", $sede, PDO::PARAM_STR);
            if ($stmGetSedes->execute() && $stmGetSedes->rowCount() > 0) {
                $puntaje = intval($stmGetSedes->fetch()["participantes"]);
            }
        } catch (Exception $ex) {
            
        }
        return $puntaje;
    }

    public function enviarPunto(SedeDTO $sedeDTO, $correcto) {
        $idEstudiante = $sedeDTO->getEstudiantesDTO()->getIdEstudiante();
        $exito = false;
        try {
            $this->conexion->beginTransaction();
            $stmGetSede = $this->conexion->prepare("select s.idsede from sede s inner join estudiante e on e.idsede=s.idsede where e.idestudiante=:idestudiante");
            $stmGetSede->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
            $idSede = -1;
            if ($stmGetSede->execute() && $stmGetSede->rowCount() > 0) {
                $idSede = $stmGetSede->fetch()["idsede"];
            } else {
                throw new Exception("no se pudo obtener informacion de la sede.");
            }

            if ($correcto) {
                $stmSumarPunto = $this->conexion->prepare("UPDATE sede s set s.puntaje=s.puntaje+1 where s.idsede=:idsede");
                $stmSumarPunto->bindParam(":idsede", $idSede, PDO::PARAM_INT);
                if (!$stmSumarPunto->execute() || $stmSumarPunto->rowCount() <= 0) {
                    throw new Exception("Error al sumar punto a la sede.");
                }
            }

            $stmActualizarPuntajeSede = $this->conexion->prepare("insert into puntajesede (idsede,idestudiante,fecharegistro,correcto) values(:idsede,:idestudiante," . TIEMPO . ",:correcto)");
            $stmActualizarPuntajeSede->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
            $stmActualizarPuntajeSede->bindParam(":idsede", $idSede, PDO::PARAM_INT);
            $stmActualizarPuntajeSede->bindParam(":correcto", $correcto, PDO::PARAM_BOOL);
            if (!$stmActualizarPuntajeSede->execute() || $stmActualizarPuntajeSede->rowCount() <= 0) {
                throw new Exception("Error al sumar punto a la sede. No se pudo registrar puntaje en la sede");
            }

            $exito = $this->conexion->commit();
        } catch (Exception $ex) {
            $this->conexion->rollBack();
            throw new Exception($ex->getMessage());
        }
        return $exito;
    }

}
