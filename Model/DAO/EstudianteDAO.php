<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstudianteDAO
 *
 * @author USUARIO
 */
class EstudianteDAO {

    private $conexion;

    public function __construct() {
        require_once RAIZ . 'Model/Database/Database.php';
        $this->conexion = (new Database())->connect();
    }

    public function login($estudianteDTO) {
        $usuario = $estudianteDTO->getUsuario();
        $contrasenia = $estudianteDTO->getContrasenia();
        $exito = [];

        try {
            $stmLogin = $this->conexion->prepare("select estudiante.idestudiante,estudiante.nombre,sede.nombre sede,sede.idsede from estudiante INNER JOIN sede ON sede.idsede=estudiante.idsede where estudiante.usuario=:usuario and estudiante.contrasenia=:contrasenia");
            $stmLogin->bindParam(":usuario", $usuario, PDO::PARAM_INT);
            $stmLogin->bindParam(":contrasenia", $contrasenia, PDO::PARAM_STR);
            if ($stmLogin->execute() && $stmLogin->rowCount() > 0) {
                $exito = $stmLogin->fetch();
                $stmEstaConectado = $this->conexion->prepare("SELECT estudiante.idestudiante from estudiante WHERE estudiante.idestudiante=:idestudiante and UNIX_TIMESTAMP(" . TIEMPO . ")-UNIX_TIMESTAMP(estudiante.logeado)>=10");
                $idestudiante = intval($exito["idestudiante"]);
                $stmEstaConectado->bindParam(":idestudiante", $idestudiante, PDO::PARAM_INT);
                if (!$stmEstaConectado->execute() || $stmEstaConectado->rowCount() <= 0) {
                    throw new Exception("La cuenta esta siendo usada en este momento");
                }
                $hash=$estudianteDTO->getHash();
                $stmSetHash = $this->conexion->prepare("update estudiante set hash=:hash where idestudiante=:idestudiante");
                $stmSetHash->bindParam(":idestudiante", $idestudiante, PDO::PARAM_INT);
                 $stmSetHash->bindParam(":hash", $hash, PDO::PARAM_STR);
                if (!$stmSetHash->execute() || $stmSetHash->rowCount() <= 0) {
                    throw new Exception("Error interno. Intentalo de nuevo");
                }
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        return $exito;
    }

    public function getPuntajesPrimeraRonda($estudianteDTO) {
        $estudiantes = [];
        $codigo = (($estudianteDTO->getRegistrosDTO())->getPartidoDTO())->getCodigo();
        try {
            $stmGetPuntajes = $this->conexion->prepare("select estudiante.idestudiante,estudiante.nombre,estudiante.idregistro,if(isnull(puntaje.correctas),0,puntaje.correctas)correctas,if(isnull(puntaje.promediorespuesta),0,puntaje.promediorespuesta)promediorespuesta from (select estudiante.idestudiante, estudiante.nombre,registro.idregistro,partido.idpartido,partido.codigo from registro INNER JOIN partido on partido.idpartido=registro.idpartido INNER JOIN estudiante on estudiante.idestudiante=registro.idestudiante)estudiante left join (select partido.idpartido,partido.codigo,respuesta.idregistro,count(if(respuesta.correcta,1,null))correctas,avg(UNIX_TIMESTAMP(respuesta.fecharegistro)-UNIX_TIMESTAMP(pregunta.fecharegistro))promediorespuesta from respuesta INNER JOIN registro on registro.idregistro=respuesta.idregistro INNER JOIN partido on partido.idpartido=registro.idpartido INNER JOIN pregunta ON pregunta.idpartido=partido.idpartido and pregunta.idpregunta=respuesta.idpregunta INNER JOIN estadopregunta on estadopregunta.idestadopregunta=pregunta.idestadopregunta  INNER JOIN estudiante ON estudiante.idestudiante=registro.idestudiante  where estadopregunta.descripcion='cerrada' and pregunta.activo GROUP BY registro.idregistro ORDER By correctas DESC)puntaje on puntaje.idregistro=estudiante.idregistro and puntaje.idpartido=estudiante.idpartido and puntaje.codigo=estudiante.codigo where  estudiante.codigo=:codigo1  ORDER BY correctas DESC, promediorespuesta ASC,estudiante.nombre ASC");
            $stmGetPuntajes->bindParam(":codigo1", $codigo, PDO::PARAM_INT);
            if ($stmGetPuntajes->execute() && $stmGetPuntajes->rowCount() > 0) {
                $estudiantes = $stmGetPuntajes->fetchAll();
                $estuaux = [];
                foreach ($estudiantes as $estu) {
                    $estuaux[] = array("ide" => $estu["idestudiante"], "id" => $estu["idregistro"], "nombre" => $estu["nombre"], "puntaje" => $estu["correctas"], "tiempo" => $estu["promediorespuesta"]);
                }
                $estudiantes = $estuaux;
            }
        } catch (Exception $ex) {
            
        }
        return $estudiantes;
    }

    public function getPuntajeEnfrentamiento() {
        $estudiantes = [];
        try {
            $stmGetPuntajes = $this->conexion->prepare("select estudiante.idestudiante,estudiante.nombre,enfrentamiento.puntaje from versus INNER JOIN enfrentamiento on enfrentamiento.idenfrentamiento=versus.idenfrentamiento INNER JOIN registro on registro.idregistro=enfrentamiento.idregistro INNER JOIN estudiante on estudiante.idestudiante=registro.idestudiante");

            if ($stmGetPuntajes->execute() && $stmGetPuntajes->rowCount() > 0) {
                $estudiantes = $stmGetPuntajes->fetchAll();
                $estuaux = [];
                foreach ($estudiantes as $estu) {
                    $estuaux[] = array("ide" => $estu["idestudiante"], "nombre" => $estu["nombre"], "puntaje" => $estu["puntaje"]);
                }
                $estudiantes = $estuaux;
            }
        } catch (Exception $ex) {
            
        }
        return $estudiantes;
    }

    public function getPuntajes($estudianteDTO) {
        $estudiantes = [];
        $codigo = (($estudianteDTO->getRegistrosDTO())->getPartidoDTO())->getCodigo();
        try {
            $stmGetPuntajes = $this->conexion->prepare("select estudiante.idestudiante,estudiante.nombre,if(puntaje.puntuacion is null,0,puntaje.puntuacion)puntuacion,if(puntaje.tpromedio is null,0,puntaje.tpromedio)tpromedio from registro INNER JOIN estudiante on estudiante.idestudiante=registro.idestudiante INNER JOIN partido on partido.idpartido=registro.idpartido LEFT JOIN (select partido.idpartido,registro.idregistro,sum(pun.puntaje)puntuacion,avg(pun.tiempopromedio)tpromedio from puntaje pun INNER JOIN registro on registro.idregistro=pun.idregistro INNER JOIN partido ON partido.idpartido=registro.idpartido GROUP BY pun.idregistro)puntaje on puntaje.idpartido=partido.idpartido and puntaje.idregistro=registro.idregistro WHERE partido.codigo=:codigo1 ORDER BY puntuacion DESC, tpromedio ASC, nombre ASC");
            $stmGetPuntajes->bindParam(":codigo1", $codigo, PDO::PARAM_INT);
            if ($stmGetPuntajes->execute() && $stmGetPuntajes->rowCount() > 0) {
                $estudiantes = $stmGetPuntajes->fetchAll();
                $estuaux = [];
                foreach ($estudiantes as $estu) {
                    $estuaux[] = array("id" => $estu["idestudiante"], "nombre" => $estu["nombre"], "puntaje" => $estu["puntuacion"], "tiempo" => $estu["tpromedio"]);
                }
                $estudiantes = $estuaux;
            }
        } catch (Exception $ex) {
            
        }
        return $estudiantes;
    }

    public function tablaGanadores($estudianteDTO) {
        $idPartido = ($estudianteDTO->getRegistrosDTO())->getPartidoDTO();
        try {
            $stmGanadores = $this->conexion->prepare("select estudiante.idestudiante,estudiante.nombre,respuesta.idregistro,count(respuesta.correcta)correctas,totalpreguntas.totalpreguntas-COUNT(respuesta.correcta) incorrectas,avg(UNIX_TIMESTAMP(respuesta.fecharegistro)-UNIX_TIMESTAMP(pregunta.fecharegistro))promediorespuesta from respuesta INNER JOIN registro on registro.idregistro=respuesta.idregistro INNER JOIN partido on partido.idpartido=registro.idpartido INNER JOIN pregunta ON pregunta.idpartido=partido.idpartido and pregunta.idpregunta=respuesta.idpregunta INNER JOIN estadopregunta on estadopregunta.idestadopregunta=pregunta.idestadopregunta INNER JOIN tipopregunta on tipopregunta.idtipopregunta=pregunta.idtipopregunta INNER JOIN estudiante ON estudiante.idestudiante=registro.idestudiante INNER JOIN /*INNER JOIN TABLA TOTAL PARTIDAS JUGADAS*/(select pregunta.idpartido,COUNT(pregunta.idpregunta)totalpreguntas from pregunta INNER JOIN partido on partido.idpartido=pregunta.idpartido INNER JOIN estadopregunta on estadopregunta.idestadopregunta=pregunta.idestadopregunta INNER JOIN tipopregunta on tipopregunta.idtipopregunta=pregunta.idtipopregunta where tipopregunta.descripcion='ronda uno' and estadopregunta.descripcion='cerrada' GROUP BY pregunta.idpartido)totalpreguntas on totalpreguntas.idpartido=partido.idpartido /*FIN JOIN TABLA TOTAL PARTIDAS JUGADAS*/ where partido.idpartido=:idPartido and respuesta.correcta and tipopregunta.descripcion='ronda uno' and estadopregunta.descripcion='cerrada' GROUP BY registro.idregistro ORDER By correctas DESC ,incorrectas ASC,promediorespuesta DESC LIMIT 16");
            $stmGanadores->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
        } catch (Exception $ex) {
            
        }
    }

    public function mantenerConexion(EstudianteDTO $estudianteDTO) {
        $idestudiante = $estudianteDTO->getIdEstudiante();
        $hash=$estudianteDTO->getHash();
        $exito = false;
        try {
            $stmMantenerConexion = $this->conexion->prepare("update estudiante set logeado=" . TIEMPO . " where idestudiante=:idestudiante and hash=:hash");
            $stmMantenerConexion->bindParam(":idestudiante", $idestudiante, PDO::PARAM_INT);
            $stmMantenerConexion->bindParam(":hash", $hash,PDO::PARAM_STR);
            if ($stmMantenerConexion->execute() && $stmMantenerConexion->rowCount() > 0) {
                $exito = true;
            }
        } catch (Exception $ex) {
            json_encode(["exito"=>false,$ex->getMessage()]);
        }
        return $exito;
    }

    public function esMiHash($hash,$idestudiante) {
        $exito = false;
        $hash1=$hash;
        try {
            $stmHash = $this->conexion->prepare("select idestudiante from estudiante where estudiante.idestudiante=:idestudiante and estudiante.hash=:hash");
            $stmHash->bindParam(":hash", $hash1, PDO::PARAM_STR);
            $stmHash->bindParam(":idestudiante", $idestudiante, PDO::PARAM_INT);
            if ($stmHash->execute() && $stmHash->rowCount() > 0) {
                $exito = true;
            }
        } catch (Exception $ex) {
            
        }
        return $exito;
    }

}
