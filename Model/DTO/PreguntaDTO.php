<?php

class PreguntaDTO {
    
    
    private $idPregunta;
    private $partidoDTO;
    private $estadoPreguntaDTO;
    private $dadoUno;
    private $dadoDos;
    private $dadoTres;
    private $dadoCuatro;
    private $numero;
    
    
    
    function __construct($idPregunta, $partidoDTO, $estadoPreguntaDTO, $dadoUno, $dadoDos, $dadoTres, $dadoCuatro, $numero) {
        $this->idPregunta = $idPregunta;
        $this->partidoDTO = $partidoDTO;
        $this->estadoPreguntaDTO = $estadoPreguntaDTO;
        $this->dadoUno = $dadoUno;
        $this->dadoDos = $dadoDos;
        $this->dadoTres = $dadoTres;
        $this->dadoCuatro = $dadoCuatro;
        $this->numero = $numero;
    }
    function getIdPregunta() {
        return $this->idPregunta;
    }

    function getPartidoDTO() {
        return $this->partidoDTO;
    }

    function getEstadoPreguntaDTO() {
        return $this->estadoPreguntaDTO;
    }

    function getTipoPreguntaDTO() {
        return $this->tipoPreguntaDTO;
    }

    function getDadoUno() {
        return $this->dadoUno;
    }

    function getDadoDos() {
        return $this->dadoDos;
    }

    function getDadoTres() {
        return $this->dadoTres;
    }

    function getDadoCuatro() {
        return $this->dadoCuatro;
    }

    function getNumero() {
        return $this->numero;
    }

    function setIdPregunta($idPregunta): void {
        $this->idPregunta = $idPregunta;
    }

    function setPartidoDTO($partidoDTO): void {
        $this->partidoDTO = $partidoDTO;
    }

    function setEstadoPreguntaDTO($estadoPreguntaDTO): void {
        $this->estadoPreguntaDTO = $estadoPreguntaDTO;
    }

    function setTipoPreguntaDTO($tipoPreguntaDTO): void {
        $this->tipoPreguntaDTO = $tipoPreguntaDTO;
    }

    function setDadoUno($dadoUno): void {
        $this->dadoUno = $dadoUno;
    }

    function setDadoDos($dadoDos): void {
        $this->dadoDos = $dadoDos;
    }

    function setDadoTres($dadoTres): void {
        $this->dadoTres = $dadoTres;
    }

    function setDadoCuatro($dadoCuatro): void {
        $this->dadoCuatro = $dadoCuatro;
    }

    function setNumero($numero): void {
        $this->numero = $numero;
    }


    
   
    
    
    
    
}
