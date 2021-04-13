<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SedeDTO
 *
 * @author USUARIO
 */
class SedeDTO {
    
    private $idSede;
    private $nombre;
    private $estudiantesDTO;
    
    function __construct($idSede, $nombre) {
        $this->idSede = $idSede;
        $this->nombre = $nombre;
    }
    function getEstudiantesDTO() {
        return $this->estudiantesDTO;
    }

    function setEstudiantesDTO($estudiantesDTO): void {
        $this->estudiantesDTO = $estudiantesDTO;
    }

        function getIdSede() {
        return $this->idSede;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdSede($idSede): void {
        $this->idSede = $idSede;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }


    
}
