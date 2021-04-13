<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstudianteDTO
 *
 * @author USUARIO
 */
class EstudianteDTO {
    private $idEstudiante;
    private $nombre;
    private $usuario;
    private $contrasenia;
    private $RegistrosDTO;
    private $sedeDTO;
    private $hash;
            function __construct($idEstudiante, $nombre, $usuario, $contrasenia, $RegistrosDTO,$sedeDTO) {
        $this->idEstudiante = $idEstudiante;
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->contrasenia = $contrasenia;
        $this->RegistrosDTO = $RegistrosDTO;
        $this->sedeDTO=$sedeDTO;
    }
    function getSedeDTO() {
        return $this->sedeDTO;
    }
    function getHash() {
        return $this->hash;
    }

    function setHash($hash): void {
        $this->hash = $hash;
    }

        function setSedeDTO($sedeDTO): void {
        $this->sedeDTO = $sedeDTO;
    }

        function getRegistrosDTO() {
        return $this->RegistrosDTO;
    }

    function setRegistrosDTO($RegistrosDTO): void {
        $this->RegistrosDTO = $RegistrosDTO;
    }

        function getIdEstudiante() {
        return $this->idEstudiante;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getContrasenia() {
        return $this->contrasenia;
    }

    function setIdEstudiante($idEstudiante): void {
        $this->idEstudiante = $idEstudiante;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setUsuario($usuario): void {
        $this->usuario = $usuario;
    }

    function setContrasenia($contrasenia): void {
        $this->contrasenia = $contrasenia;
    }


}
