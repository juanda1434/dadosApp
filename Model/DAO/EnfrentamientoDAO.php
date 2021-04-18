<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnfrentamientoDAO
 *
 * @author USUARIO
 */
class EnfrentamientoDAO {

    private $conexion;

    public function __construct() {
        require_once RAIZ . 'Model/Database/Database.php';
        $this->conexion = (new Database())->connect();
    }

    public function getCuadros($enfrentamientoDTO) {
        $cuadros = [];
        $codigo = $enfrentamientoDTO->getPartidoDTO()->getCodigo();
        try {
            $stmGetCuadros = $this->conexion->prepare("select enfrentamiento.idenfrentamiento,enfrentamiento.ronda,enfrentamiento.numero,estudiante.nombre,enfrentamiento.puntaje from enfrentamiento INNER JOIN registro on registro.idregistro=enfrentamiento.idregistro INNER JOIN partido on partido.idpartido=registro.idpartido INNER JOIN estudiante ON estudiante.idestudiante=registro.idestudiante where partido.codigo=:codigo ORDER BY enfrentamiento.ronda ASC,enfrentamiento.numero ASC");
            $stmGetCuadros->bindParam(":codigo", $codigo, PDO::PARAM_INT);
            if ($stmGetCuadros->execute() && $stmGetCuadros->rowCount() > 0) {
                $enfrentamientos = $stmGetCuadros->fetchAll();
                foreach ($enfrentamientos as $enfrentamiento) {
                    $cuadros[] = ["id" => $enfrentamiento["idenfrentamiento"], "nombre" => $enfrentamiento["nombre"], "ronda" => intval($enfrentamiento["ronda"]), "numero" => intval($enfrentamiento["numero"]), "puntaje" => intval($enfrentamiento["puntaje"])];
                }
            }
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }

        return $cuadros;
    }

    public function getEstudianteVersus() {
        $Estudiantes = [];
        try {
            $stmGetCuadros = $this->conexion->prepare("select if(en.ronda=4,'Final',if(en.ronda=3,'Semifinal',if(en.ronda=2,'Cuartos',if(en.ronda=1,'Octavos',''))))ronda,if(MOD(en.numero,2)<>0,(en.numero-1)/2 +1,(en.numero-2)/2 +1)numero,v.idversus,e.nombre,s.nombre sede,concat(g.nombre,' ',p.numero)grupo,en.puntaje from enfrentamiento en INNER JOIN partido p on p.idpartido=en.idpartido INNER JOIN grado g on g.idgrado=p.idgrado INNER JOIN registro r on r.idregistro=en.idregistro INNER JOIN estudiante e on e.idestudiante=r.idestudiante INNER JOIN sede s on s.idsede=e.idsede INNER JOIN versus v on v.idenfrentamiento=en.idenfrentamiento ORDER BY v.idversus ASC");
            if ($stmGetCuadros->execute() && $stmGetCuadros->rowCount() > 0) {
                $enfrentamientos = $stmGetCuadros->fetchAll();
                foreach ($enfrentamientos as $enfrentamiento) {
                    $Estudiantes[] = ["ronda" => $enfrentamiento["ronda"], "numero" => intval($enfrentamiento["numero"]), "" => "", "nombre" => $enfrentamiento["nombre"], "id" => intval($enfrentamiento["idversus"]), "sede" => $enfrentamiento["sede"], "grupo" => $enfrentamiento["grupo"], "puntaje" => intval($enfrentamiento["puntaje"])];
                }
            }
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }

        return $Estudiantes;
    }

    public function validarEnfrentamiento(EnfrentamientoDTO $enfrentamiento1, EnfrentamientoDTO $enfrentamiento2) {

        $idEnfrentamiento1 = $enfrentamiento1->getIdEnfrentamiento();
        $idEnfrentamiento2 = $enfrentamiento2->getIdEnfrentamiento();
        $codigo = ($enfrentamiento1->getPartidoDTO())->getCodigo();
        $exito = false;
        try {
            $stmValidarVersusExistente = $this->conexion->prepare("select * from versus v where v.idenfrentamiento is null");
            if (!$stmValidarVersusExistente->execute() || $stmValidarVersusExistente->rowCount() != 2) {
                throw New Exception("Debe terminar el enfrentamiento actual para poder seleccionar otro.");
            }
            $stmValidarEnfrentamiento = $this->conexion->prepare("select * from enfrentamiento e1 INNER JOIN enfrentamiento e2 on MOD(e1.numero,2)<>0 and e1.ronda=e2.ronda and e1.numero+1=e2.numero and e1.puntaje<2 and e2.puntaje<2 INNER JOIN partido p on p.idpartido=e1.idpartido and p.idpartido=e2.idpartido where e1.idenfrentamiento=:id1 and e2.idenfrentamiento=:id2 and if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Siguiente' and p.codigo=:codigo");
            $stmValidarEnfrentamiento->bindParam(":id1", $idEnfrentamiento1, PDO::PARAM_INT);
            $stmValidarEnfrentamiento->bindParam(":id2", $idEnfrentamiento2, PDO::PARAM_INT);
            $stmValidarEnfrentamiento->bindParam(":codigo", $codigo, PDO::PARAM_INT);
            if ($stmValidarEnfrentamiento->execute() && $stmValidarEnfrentamiento->rowCount() > 0) {
                $exito = true;
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $exito;
    }

    public function finalizarEnfrentamiento(EnfrentamientoDTO $enfrentamientoDTO) {
        $ronda = $enfrentamientoDTO->getRonda();
        $numero = $enfrentamientoDTO->getNumero();
        $idPartido = ($enfrentamientoDTO->getPartidoDTO())->getIdPartido();
        $idRegistro = ($enfrentamientoDTO->getRegistroDTO())->getIdRegistro();
        $exito = false;
        try {
            $this->conexion->beginTransaction();
            $stmLimpiarVersus = $this->conexion->prepare("update versus v set v.idenfrentamiento=null");
            if (!$stmLimpiarVersus->execute() || $stmLimpiarVersus->rowCount() != 2) {
                throw new Exception("Error al finalizar enfrentamiento. Limpiar versus.");
            }
            $stmLimpiarCampo = $this->conexion->prepare("UPDATE signo s SET s.x=s.xi,s.y=s.yi WHERE not s.x=s.xi OR not s.y=s.yi");
            if (!$stmLimpiarCampo->execute() || $stmLimpiarCampo->rowCount() < 0) {
                throw new Exception("Error al finalizar enfrentamiento. Limpiar campo.");
            }
            $stmSetPreguntas = $this->conexion->prepare("UPDATE pregunta p SET p.activo=false where p.idpartido=:idpartido and p.activo");
            $stmSetPreguntas->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
            if (!$stmSetPreguntas->execute() || $stmSetPreguntas->rowCount() < 1) {
                throw new Exception("Error finalizar enfrentamiento. Cerrar pregunta");
            }
            $stmSetEnfrentamiento = $this->conexion->prepare("insert into enfrentamiento (idregistro,idpartido,numero,ronda) values(:idregistro,:idpartido,:numero,:ronda)");
            $stmSetEnfrentamiento->bindParam(":idregistro", $idRegistro, PDO::PARAM_INT);
            $stmSetEnfrentamiento->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
            $stmSetEnfrentamiento->bindParam(":numero", $numero, PDO::PARAM_INT);
            $stmSetEnfrentamiento->bindParam(":ronda", $ronda, PDO::PARAM_INT);
            if (!$stmSetEnfrentamiento->execute() || $stmSetEnfrentamiento->rowCount() <= 0) {
                throw new Exception("Error al finalizar enfrentamiento. Actualizar ganador.");
            }

            $exito = $this->conexion->commit();
        } catch (Exception $ex) {
            $this->conexion->rollBack();
            throw new Exception($ex->getMessage());
        }
        return $exito;
    }

    function registrarRespuesta(EnfrentamientoDTO $enfrentamientoDTO, PreguntaDTO $preguntaDTO) {
        $idEnfrentamiento = $enfrentamientoDTO->getIdEnfrentamiento();
        $idPregunta=$preguntaDTO->getIdPregunta();
        $exito = false;
        try {
            $this->conexion->beginTransaction();
            $stmRespuesta = $this->conexion->prepare("update enfrentamiento set puntaje=puntaje+1 where idenfrentamiento=:idenfrentamiento");
            $stmRespuesta->bindParam(":idenfrentamiento", $idEnfrentamiento, PDO::PARAM_INT);
            if (!$stmRespuesta->execute() || $stmRespuesta->rowCount() <=0) {
                throw new Exception("Error al enviar respuesta");
            }
            $stmEditarEstado = $this->conexion->prepare("UPDATE pregunta SET idestadopregunta = 2 WHERE idpregunta=:idpregunta ");
            $stmEditarEstado->bindParam(":idpregunta", $idPregunta, PDO::PARAM_INT);
            if (!$stmEditarEstado->execute() || $stmEditarEstado->rowCount()<1) {
                 throw new Exception("Error al enviar respuesta");
            }
            $sqlSetSigno= $this->conexion->prepare("UPDATE signo s SET s.x=s.xi,s.y=s.yi WHERE not s.x=s.xi OR not s.y=s.yi");
            if (!$sqlSetSigno->execute() ) {
                throw new Exception("Error al enviar respuesta");
            }
            $exito= $this->conexion->commit();
        } catch (Exception $ex) {
            $this->conexion->rollBack();
            throw new Exception($ex->getMessage());
        }
        return $exito;
    }

    
    public function validarActivo(EnfrentamientoDTO $enfrentamientoDTO) {
        $idEstudiante=(($enfrentamientoDTO->getRegistroDTO())->getEstudianteDTO())->getIdEstudiante();
        $exito=false;
        try {
            $stmValidar = $this->conexion->prepare("select * from versus v INNER JOIN enfrentamiento en on en.idenfrentamiento=v.idenfrentamiento INNER JOIN registro r on r.idregistro=en.idregistro INNER JOIN estudiante e on e.idestudiante=r.idestudiante where  e.idestudiante=:idestudiante");
           $stmValidar->bindParam(":idestudiante", $idEstudiante,PDO::PARAM_INT);
            if ($stmValidar->execute() && $stmValidar->rowCount() >0) {
                $exito=true;
            }
        } catch (Exception $ex) {
            
        }
        return $exito;
        
    }
}
