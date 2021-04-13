<?php

class RespuestaDAO {

    private $conexion;

    public function __construct() {
        require_once RAIZ . 'Model/Database/Database.php';
        $this->conexion = Database::connect();
    }

    public function registrarRespuesta($respuestaDTO) {
        $correcta = $respuestaDTO->getCorrecta();
        $idPregunta = ($respuestaDTO->getPreguntaDTO())->getIdPregunta();
        $idRegistro = ($respuestaDTO->getRegistroDTO())->getIdRegistro();
        $respuesta = $respuestaDTO->getRespuesta();
        $exito = array("exito"=>false);
        try {
            
            $stmRegistroRespuesta = $this->conexion->prepare("insert into respuesta (correcta,idpregunta,idregistro,fecharegistro,respuesta) values(:correcta,:idpregunta,:idregistro,".TIEMPO.",:respuesta)");
            $stmRegistroRespuesta->bindParam(":correcta", $correcta, PDO::PARAM_BOOL);
            $stmRegistroRespuesta->bindParam(":idpregunta", $idPregunta, PDO::PARAM_INT);
            $stmRegistroRespuesta->bindParam(":idregistro", $idRegistro, PDO::PARAM_INT);
            $stmRegistroRespuesta->bindParam(":respuesta", $respuesta, PDO::PARAM_STR);
            $exito = $stmRegistroRespuesta->execute();
            $exito= $exito ? array("exito"=>true,"respuesta"=> $correcta) :array("exito"=>false);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
           echo  $ex->getMessage();
        }
        return $exito;
    }

    
    public function validarRespuesta(RespuestaDTO $respuestaDTO) {
        $idEstudiante=(($respuestaDTO->getRegistroDTO())->getEstudianteDTO())->getIdEstudiante();
        $codigo=(($respuestaDTO->getPreguntaDTO())->getPartidoDTO())->getCodigo();
        $dado1 = ($respuestaDTO->getPreguntaDTO())->getDadoUno();
        $dado2 = ($respuestaDTO->getPreguntaDTO())->getDadoDos();
        $dado3 = ($respuestaDTO->getPreguntaDTO())->getDadoTres();
        $dado4 = ($respuestaDTO->getPreguntaDTO())->getDadoCuatro();
        
        try {
        $stmValidarPregunta = $this->conexion->prepare("select r.idregistro,pr.idpregunta,pr.dadouno,pr.dadodos,pr.dadotres,pr.dadocuatro,pr.numero from registro r INNER JOIN partido p on p.idpartido=r.idpartido INNER JOIN pregunta pr on pr.idpartido=p.idpartido and pr.idpartido=r.idpartido INNER JOIN estadopregunta ep on ep.idestadopregunta=pr.idestadopregunta left JOIN respuesta on respuesta.idpregunta=pr.idpregunta and respuesta.idregistro=r.idregistro where if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Jugando' and  ep.descripcion='activa' and ".TIEMPO."<date_add(pr.fecharegistro, INTERVAL (3*60) second) and p.codigo=:codigo and r.idestudiante=:idestudiante and respuesta.idrespuesta is null");
        $stmValidarPregunta->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
        $stmValidarPregunta->bindParam(":codigo", $codigo,PDO::PARAM_INT);
        $exito = false;
        if ($stmValidarPregunta->execute() && $stmValidarPregunta->rowCount() > 0 && $this->validarDados($pregunta = $stmValidarPregunta->fetch(), [$dado1, $dado2, $dado3, $dado4])) {
            ($respuestaDTO->getPreguntaDTO())->setNumero(intval($pregunta["numero"]));
            ($respuestaDTO->getRegistroDTO())->setIdRegistro($pregunta["idregistro"]);
            ($respuestaDTO->getPreguntaDTO())->setIdPregunta($pregunta["idpregunta"]);   
            $exito = true;
        }    
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $exito;
    }
    public function validarRespuestaEnfrentamiento(RespuestaDTO $respuestaDTO) {
        $idEstudiante=(($respuestaDTO->getRegistroDTO())->getEstudianteDTO())->getIdEstudiante();
        $codigo=(($respuestaDTO->getPreguntaDTO())->getPartidoDTO())->getCodigo();
        $dado1 = ($respuestaDTO->getPreguntaDTO())->getDadoUno();
        $dado2 = ($respuestaDTO->getPreguntaDTO())->getDadoDos();
        $dado3 = ($respuestaDTO->getPreguntaDTO())->getDadoTres();
        $dado4 = ($respuestaDTO->getPreguntaDTO())->getDadoCuatro();
        
        try {
        $stmValidarPregunta = $this->conexion->prepare("select en.idenfrentamiento,pr.idpregunta,pr.dadouno,pr.dadodos,pr.dadotres,pr.dadocuatro,pr.numero from registro r INNER JOIN partido p on p.idpartido=r.idpartido INNER JOIN pregunta pr on pr.idpartido=p.idpartido and pr.idpartido=r.idpartido INNER JOIN estadopregunta ep on ep.idestadopregunta=pr.idestadopregunta left JOIN respuesta on respuesta.idpregunta=pr.idpregunta and respuesta.idregistro=r.idregistro INNER JOIN enfrentamiento en on en.idregistro=r.idregistro INNER JOIN versus v on v.idenfrentamiento=en.idenfrentamiento where if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Siguiente' and  ep.descripcion='activa' and ".TIEMPO."<date_add(pr.fecharegistro, INTERVAL (3*60) second) and p.codigo=:codigo and r.idestudiante=:idestudiante and respuesta.idrespuesta is null");
        $stmValidarPregunta->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
        $stmValidarPregunta->bindParam(":codigo", $codigo,PDO::PARAM_INT);
        $exito = false;
        if ($stmValidarPregunta->execute() && $stmValidarPregunta->rowCount() > 0 && $this->validarDados($pregunta = $stmValidarPregunta->fetch(), [$dado1, $dado2, $dado3, $dado4])) {
            ($respuestaDTO->getPreguntaDTO())->setNumero(intval($pregunta["numero"]));
            ($respuestaDTO->getRegistroDTO())->setEnfrentamientosDTO(new EnfrentamientoDTO($pregunta["idenfrentamiento"], null, null, null, null, null, null));
           ($respuestaDTO->getPreguntaDTO())->setIdPregunta($pregunta["idpregunta"]);   
            $exito = true;
        }    
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $exito;
    }
    
     private function validarDados($pregunta, $arreglo2) {
        $arreglo = [$pregunta["dadouno"], $pregunta["dadodos"], $pregunta["dadotres"], $pregunta["dadocuatro"]];
        foreach ($arreglo2 as $n) {
            for ($i = 0; $i < count($arreglo); $i++) {
                if ($arreglo[$i] == $n) {
                    unset($arreglo[$i]);
                    $arreglo = array_values($arreglo);
                    break;
                }
            }
        }
        return count($arreglo) == 0;
    }
}
