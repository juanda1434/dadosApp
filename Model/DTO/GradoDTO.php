<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Grado
 *
 * @author USUARIO
 */
class GradoDTO {
    
    
    private $idGrado;
    private $nombre;

    
    function __construct($idGrado, $nombre) {
        $this->idGrado = $idGrado;
        $this->nombre = $nombre;
    }
    function getIdGrado() {
        return $this->idGrado;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdGrado($idGrado): void {
        $this->idGrado = $idGrado;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }


}
