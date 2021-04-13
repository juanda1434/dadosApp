<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnfrentamientoDTO
 *
 * @author USUARIO
 */
class EnfrentamientoDTO {
    
    private $idEnfrentamiento;
    private $registroDTO;
    private $partidoDTO;
    private $numero;
    private $ronda;
    private $puntaje;
    private $respuestamomentanea;
    
    function __construct($idEnfrentamiento, $registroDTO, $partidoDTO, $numero, $ronda, $puntaje, $respuestamomentanea) {
        $this->idEnfrentamiento = $idEnfrentamiento;
        $this->registroDTO = $registroDTO;
        $this->partidoDTO = $partidoDTO;
        $this->numero = $numero;
        $this->ronda = $ronda;
        $this->puntaje = $puntaje;
        $this->respuestamomentanea = $respuestamomentanea;
    }
    
    function pasarRonda():void{
        $aux=[1=>1 ,2=>1,3=>2,4=>2,5=>3,6=>3,7=>4,8=>4,9=>5,10=>5,11=>6,12=>6,13=>7,14=>7,15=>8,15=>8];
        $this->numero=$aux[$this->numero];
        $this->ronda++;
    }
    function getIdEnfrentamiento() {
        return $this->idEnfrentamiento;
    }

    function getRegistroDTO() {
        return $this->registroDTO;
    }

    function getPartidoDTO() {
        return $this->partidoDTO;
    }

    function getNumero() {
        return $this->numero;
    }

    function getRonda() {
        return $this->ronda;
    }

    function getPuntaje() {
        return $this->puntaje;
    }

    function getRespuestamomentanea() {
        return $this->respuestamomentanea;
    }

    function setIdEnfrentamiento($idEnfrentamiento): void {
        $this->idEnfrentamiento = $idEnfrentamiento;
    }

    function setRegistroDTO($registroDTO): void {
        $this->registroDTO = $registroDTO;
    }

    function setPartidoDTO($partidoDTO): void {
        $this->partidoDTO = $partidoDTO;
    }

    function setNumero($numero): void {
        $this->numero = $numero;
    }

    function setRonda($ronda): void {
        $this->ronda = $ronda;
    }

    function setPuntaje($puntaje): void {
        $this->puntaje = $puntaje;
    }

    function setRespuestamomentanea($respuestamomentanea): void {
        $this->respuestamomentanea = $respuestamomentanea;
    }


}
