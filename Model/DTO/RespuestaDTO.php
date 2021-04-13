<?php


class RespuestaDTO {
  
    private $idRespuesta;
    private $correcta;
    private $preguntaDTO;
    private $registroDTO;
    private $fechaRegistro;
    private $respuesta;
    
    
    function __construct($idRespuesta, $correcta, $preguntaDTO, $registroDTO, $fechaRegistro, $respuesta) {
        $this->idRespuesta = $idRespuesta;
        $this->correcta = $correcta;
        $this->preguntaDTO = $preguntaDTO;
        $this->registroDTO = $registroDTO;
        $this->fechaRegistro = $fechaRegistro;
        $this->respuesta = $respuesta;
    }
    function getIdRespuesta() {
        return $this->idRespuesta;
    }

    function getCorrecta() {
        return $this->correcta;
    }

    function getPreguntaDTO() {
        return $this->preguntaDTO;
    }

    function getRegistroDTO() {
        return $this->registroDTO;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function getRespuesta() {
        return $this->respuesta;
    }

    function setIdRespuesta($idRespuesta): void {
        $this->idRespuesta = $idRespuesta;
    }

    function setCorrecta($correcta): void {
        $this->correcta = $correcta;
    }

    function setPreguntaDTO($preguntaDTO): void {
        $this->preguntaDTO = $preguntaDTO;
    }

    function setRegistroDTO($registroDTO): void {
        $this->registroDTO = $registroDTO;
    }

    function setFechaRegistro($fechaRegistro): void {
        $this->fechaRegistro = $fechaRegistro;
    }

    function setRespuesta($respuesta): void {
        $this->respuesta = $respuesta;
    }



}
