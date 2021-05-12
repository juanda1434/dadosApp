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
            $stmLogin->bindParam(":usuario", $usuario, PDO::PARAM_STR);
            $stmLogin->bindParam(":contrasenia", $contrasenia, PDO::PARAM_STR);
            if ($stmLogin->execute() && $stmLogin->rowCount() > 0) {
                $exito = $stmLogin->fetch();
                $stmEstaConectado = $this->conexion->prepare("SELECT estudiante.idestudiante from estudiante WHERE estudiante.idestudiante=:idestudiante and UNIX_TIMESTAMP(" . TIEMPO . ")-UNIX_TIMESTAMP(estudiante.logeado)>=10");
                $idestudiante = intval($exito["idestudiante"]);
                $stmEstaConectado->bindParam(":idestudiante", $idestudiante, PDO::PARAM_INT);
                if (!$stmEstaConectado->execute() || $stmEstaConectado->rowCount() <= 0) {
                    throw new Exception("La cuenta esta siendo usada en este momento");
                }
                $hash = $estudianteDTO->getHash();
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
        $hash = $estudianteDTO->getHash();
        $exito = false;
        try {
            $stmMantenerConexion = $this->conexion->prepare("update estudiante set logeado=" . TIEMPO . " where idestudiante=:idestudiante and hash=:hash");
            $stmMantenerConexion->bindParam(":idestudiante", $idestudiante, PDO::PARAM_INT);
            $stmMantenerConexion->bindParam(":hash", $hash, PDO::PARAM_STR);
            if ($stmMantenerConexion->execute() && $stmMantenerConexion->rowCount() > 0) {
                $exito = true;
            }
        } catch (Exception $ex) {
            json_encode(["exito" => false, $ex->getMessage()]);
        }
        return $exito;
    }

    public function esMiHash($hash, $idestudiante) {
        $exito = false;
        $hash1 = $hash;
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

    public function getListaEstudiantesParticipantes($filter) {
        $estos = [];
        $dias = [["2021-05-03 05:00:00", "2021-05-10 22:00:00"], ["2021-05-03 05:00:00", "2021-05-04 11:50:00"], ["2021-05-04 11:51:00", "2021-05-05 05:00:00"], ["2021-05-05 05:00:00", "2021-05-06 05:00:00"], ["2021-05-06 05:00:00", "2021-05-07 05:00:00"], ["2021-05-07 05:00:00", "2021-05-08 05:00:00"], ["2021-05-08 05:00:00", "2021-05-09 05:00:00"], ["2021-05-09 05:00:00", "2021-05-10 22:00:00"]];
        $fecha1 = ($dias[$filter])[0];
        $fecha2 = ($dias[$filter])[1];
        try {
            $stm = $this->conexion->prepare("select e.nombre,SUM(if(puntajesede.correcto,0,1)) incorrecto,SUM(if(puntajesede.correcto,1,0)) correcto,s.nombre sede from puntajesede INNER JOIN estudiante e on e.idestudiante=puntajesede.idestudiante inner join sede s on s.idsede=puntajesede.idsede WHERE puntajesede.fecharegistro BETWEEN '$fecha1' and '$fecha2' GROUP BY puntajesede.idestudiante ORDER by s.idsede,correcto desc,incorrecto asc");
            if ($stm->execute() && $stm->rowCount() > 0) {
                $estus = $stm->fetchAll();

                foreach ($estus as $value) {
                    $estos[] = ["nombre" => $value["nombre"], "correctas" => $value["correcto"], "incorrectas" => $value["incorrecto"], "sede" => $value["sede"]];
                }
            }
        } catch (Exception $ex) {
            
        }
        return $estos;
    }

    public function getListaEstudiantesNoParticipantes() {
        $estos = [];
        try {
            $stm = $this->conexion->prepare("select estudiante.nombre,sede.nombre sede,if(participantes.idestudiante is null ,'Sin realizar','Realizado') diagnostico from estudiante left join puntajesede on puntajesede.idestudiante=estudiante.idestudiante INNER JOIN sede on sede.idsede=estudiante.idsede left join (SELECT estudiante.idestudiante FROM estudiante left join diagnostico on estudiante.idestudiante=diagnostico.iddiagnostico where diagnostico.fechainicio is null)participantes on participantes.idestudiante=estudiante.idestudiante where puntajesede.idestudiante is null ORDER BY estudiante.idsede,diagnostico");
            if ($stm->execute() && $stm->rowCount() > 0) {
                $estus = $stm->fetchAll();

                foreach ($estus as $value) {
                    $estos[] = ["nombre" => $value["nombre"], "sede" => $value["sede"], "diagnostico" => $value["diagnostico"]];
                }
            }
        } catch (Exception $ex) {
            
        }
        return $estos;
    }

    public function getListaDiagnosticosProcesados() {
        $diagnosticos=[];
        try {
            $sql = "select e.nombre,s.nombre sede,SUM(if(dp.correcta and not d.fechainicio is null,1,0))correcta,sum(if(not dp.correcta and not dp.fechafin is null,1,0))incorrecta,sum(if(dp.fechafin is null,1,0))sincontestar,sum(if(not dp.fechafin is null,unix_timestamp(dp.fechafin)-unix_timestamp(dp.fechainicio),0))/(10-sum(if(dp.fechafin is null,1,0)))tiempoprom,GROUP_CONCAT(if(dp.correcta,'correcta',if(not dp.correcta,'incorrecta','sin contestar')) ORDER BY dp.idpreguntabase SEPARATOR '-')preguntas,GROUP_CONCAT(if(not dp.fechafin is null,unix_timestamp(dp.fechafin)-unix_timestamp(dp.fechainicio),0) ORDER BY dp.idpreguntabase SEPARATOR '-')tiempo FROM diagnostico d INNER JOIN diagnosticopregunta dp on d.iddiagnostico=dp.iddiagnostico INNER JOIN estudiante e on e.idestudiante=d.idestudiante INNER join sede s on s.idsede=e.idsede where not d.fechainicio is null GROUP BY d.iddiagnostico order by s.idsede,correcta desc,incorrecta desc";
            $stm = $this->conexion->prepare($sql);
            if ($stm->execute() && $stm->rowCount() > 0) {
                $diagnosticosSQL = $stm->fetchAll();
                $diagnosticos=array_map(array($this,"procesarDiagnosticos"), $diagnosticosSQL);
            }
        } catch (Exception $ex) {
            
        }
        return $diagnosticos;
    }

      function procesarDiagnosticos($diagnostico) {
        $diagnosticoNuevo = ["nombre" => $diagnostico["nombre"],"sede"=>$diagnostico["sede"] ,"correctas" => $diagnostico["correcta"], "incorrectas" => $diagnostico["incorrecta"], "sin contestar" => $diagnostico["sincontestar"], "tiempo avg" => $diagnostico["tiempoprom"]];
        $preguntas = explode("-", $diagnostico["preguntas"]);
        $tiempos = explode("-", $diagnostico["tiempo"]);
        for ($i = 0; $i < count($preguntas); $i++) {
            $diagnosticoNuevo["pregunta" . ($i+1)] = $preguntas[$i];
            $diagnosticoNuevo["tiempo" . ($i+1)] = $tiempos[$i];
        }
        return $diagnosticoNuevo;
    }

}
