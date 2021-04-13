<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistroDTO
 *
 * @author USUARIO
 */
class RegistroDTO {
   
    private $idRegistro;
    private $estudianteDTO;
    private $partidoDTO;
    private $estadoRegistroDTO;
    private $enfrentamientosDTO;
    
    function __construct($idRegistro, $estudianteDTO, $partidoDTO, $estadoRegistroDTO) {
        $this->idRegistro = $idRegistro;
        $this->estudianteDTO = $estudianteDTO;
        $this->partidoDTO = $partidoDTO;
        $this->estadoRegistroDTO = $estadoRegistroDTO;
    }
    
    function getEnfrentamientosDTO() {
        return $this->enfrentamientosDTO;
    }

    function setEnfrentamientosDTO($enfrentamientosDTO): void {
        $this->enfrentamientosDTO = $enfrentamientosDTO;
    }

        function getIdRegistro() {
        return $this->idRegistro;
    }

    function getEstudianteDTO() {
        return $this->estudianteDTO;
    }

    function getPartidoDTO() {
        return $this->partidoDTO;
    }

    function getEstadoRegistroDTO() {
        return $this->estadoRegistroDTO;
    }

    function setIdRegistro($idRegistro): void {
        $this->idRegistro = $idRegistro;
    }

    function setEstudianteDTO($estudianteDTO): void {
        $this->estudianteDTO = $estudianteDTO;
    }

    function setPartidoDTO($partidoDTO): void {
        $this->partidoDTO = $partidoDTO;
    }

    function setEstadoRegistroDTO($estadoRegistroDTO): void {
        $this->estadoRegistroDTO = $estadoRegistroDTO;
    }



    
    
}
