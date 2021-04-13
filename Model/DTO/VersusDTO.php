<?php

class VersusDTO {
   
    private $idVersus;
    private $enfrentamientoDTO;
    
    function __construct($idVersus, $enfrentamientoDTO) {
        $this->idVersus = $idVersus;
        $this->enfrentamientoDTO = $enfrentamientoDTO;
    }

    function getIdVersus() {
        return $this->idVersus;
    }

    function getEnfrentamientoDTO() {
        return $this->enfrentamientoDTO;
    }
    function setIdVersus($idVersus): void {
        $this->idVersus = $idVersus;
    }

    function setEnfrentamientoDTO($enfrentamientoDTO): void {
        $this->enfrentamientoDTO = $enfrentamientoDTO;
    }


   
    
}
