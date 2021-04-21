<?php

class PreguntaDAO {

    private $conexion;

    public function __construct() {
        require_once RAIZ . 'Model/Database/Database.php';
        $this->conexion = (new Database())->connect();
    }

    public function registrarPregunta($preguntaDTO) {
        $idPartido = ($preguntaDTO->getPartidoDTO())->getIdPartido();
        $dadoUno = $preguntaDTO->getDadoUno();
        $dadoDos = $preguntaDTO->getDadoDos();
        $dadoTres = $preguntaDTO->getDadoTres();
        $dadoCuatro = $preguntaDTO->getDadoCuatro();
        $numero = $preguntaDTO->getNumero();
        $exito = false;
        try {
            
            $stmRegistrarPregunta = $this->conexion->prepare("insert into pregunta(idpartido,idestadopregunta,dadouno,dadodos,dadotres,dadocuatro,fecharegistro,numero) values(:idpartido,1,:dadouno,:dadodos,:dadotres,:dadocuatro,".TIEMPO.",:numero)");
            $stmRegistrarPregunta->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
            $stmRegistrarPregunta->bindParam(":dadouno", $dadoUno, PDO::PARAM_INT);
            $stmRegistrarPregunta->bindParam(":dadodos", $dadoDos, PDO::PARAM_INT);
            $stmRegistrarPregunta->bindParam(":dadotres", $dadoTres, PDO::PARAM_INT);
            $stmRegistrarPregunta->bindParam(":dadocuatro", $dadoCuatro, PDO::PARAM_INT);
            $stmRegistrarPregunta->bindParam(":numero", $numero, PDO::PARAM_INT);
            $exito = $stmRegistrarPregunta->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        return $exito;
    }

    public function cerrarPregunta($preguntaDTO) {
        $exito = false;
        $codigoPartido = ($preguntaDTO->getPartidoDTO())->getCodigo();
        try {
            $this->conexion->beginTransaction();
            $stmGetPreguntaActiva = $this->conexion->prepare("select pr.idpregunta from pregunta pr INNER JOIN partido p on p.idpartido=pr.idpartido INNER JOIN estadopregunta ep on ep.idestadopregunta=pr.idestadopregunta where ep.descripcion='activa' and p.codigo=:codigo");
            $stmGetPreguntaActiva->bindParam(":codigo", $codigoPartido, PDO::PARAM_INT);
            if ($stmGetPreguntaActiva->execute() && $stmGetPreguntaActiva->rowCount() > 0) {
                $idPregunta = $stmGetPreguntaActiva->fetch()["idpregunta"];
                $stmEditarEstado = $this->conexion->prepare("UPDATE pregunta SET idestadopregunta = 2 WHERE idpregunta=:idpregunta ");
                $stmEditarEstado->bindParam(":idpregunta", $idPregunta, PDO::PARAM_INT);
                if ($stmEditarEstado->execute()) {
                    $exito = $this->conexion->commit();
                } else {
                    throw new Exception();
                }
            }
        } catch (Exception $ex) {
            $this->conexion->rollBack();
        }
        return $exito;
    }

    public function saltarPregunta($preguntaDTO) {
        $exito = false;
        $codigoPartido = ($preguntaDTO->getPartidoDTO())->getCodigo();
        try {
            $this->conexion->beginTransaction();
            $stmGetPreguntaActiva = $this->conexion->prepare("select pr.idpregunta from pregunta pr INNER JOIN partido p on p.idpartido=pr.idpartido INNER JOIN estadopregunta ep on ep.idestadopregunta=pr.idestadopregunta WHERE ep.descripcion='activa' and p.codigo=:codigo");
            $stmGetPreguntaActiva->bindParam(":codigo", $codigoPartido, PDO::PARAM_INT);
            if ($stmGetPreguntaActiva->execute() && $stmGetPreguntaActiva->rowCount() > 0) {
                $idPregunta = $stmGetPreguntaActiva->fetch()["idpregunta"];
                $stmEditarEstado = $this->conexion->prepare("UPDATE pregunta SET idestadopregunta = 3 WHERE idpregunta=:idpregunta ");
                $stmEditarEstado->bindParam(":idpregunta", $idPregunta, PDO::PARAM_INT);
                if ($stmEditarEstado->execute()) {
                    $exito = $this->conexion->commit();
                } else {
                    throw new Exception();
                }
            }
        } catch (Exception $ex) {
            $this->conexion->rollBack();
        }
        return $exito;
    }

    public function getPregunta($preguntaDTO) {
        $idPartido = ($preguntaDTO->getPartidoDTO())->getIdPartido();
        $pregunta = [];
        try {
            $stmGetPregunta = $this->conexion->prepare("select pr.idpregunta,pr.dadouno,pr.dadodos,pr.dadotres,pr.dadocuatro,pr.numero,pr.fecharegistro,date_add(pr.fecharegistro, INTERVAL (2*60) second)fechafinal from pregunta pr INNER JOIN partido p on p.idpartido=pr.idpartido INNER JOIN estadopregunta ep on ep.idestadopregunta=pr.idestadopregunta WHERE ep.descripcion='activa'  and p.idpartido=:idpartido and pr.activo");
            $stmGetPregunta->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
            if ($stmGetPregunta->execute() && $stmGetPregunta->rowCount() > 0) {
                $preguntaAux = $stmGetPregunta->fetch();
                $pregunta = array("idpregunta" => $preguntaAux["idpregunta"], "dadouno" => $preguntaAux["dadouno"], "dadodos" => $preguntaAux["dadodos"], "dadotres" => $preguntaAux["dadotres"], "dadocuatro" => $preguntaAux["dadocuatro"], "numero" => intval($preguntaAux["numero"]), "fechauno" => $preguntaAux["fecharegistro"], "fechados" => $preguntaAux["fechafinal"]);
            }
        } catch (Exception $ex) {
            
        }

        return $pregunta;
    }

    public function getPreguntasResueltas($preguntaDTO) {
        $idPartido = ($preguntaDTO->getPartidoDTO())->getIdPartido();
        $preguntas = [];
        try {
            $stmGetPregunta = $this->conexion->prepare("select pr.numero from pregunta pr INNER JOIN partido p on p.idpartido=pr.idpartido INNER JOIN estadopregunta ep on ep.idestadopregunta=pr.idestadopregunta WHERE ep.descripcion='cerrada' and pr.activo  and p.idpartido=:idpartido");
            $stmGetPregunta->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
            if ($stmGetPregunta->execute() && $stmGetPregunta->rowCount() > 0) {
                $preguntasAux = $stmGetPregunta->fetchAll();
                foreach ($preguntasAux as $preguntaAux) {
                    $preguntas[] = intval($preguntaAux["numero"]);
                }
            }
        } catch (Exception $ex) {
            
        }

        return $preguntas;
    }

    

}
