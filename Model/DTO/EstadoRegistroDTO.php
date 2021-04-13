<?php

class EstadoRegistroDTO {

    private $idEstadoRegistro;
    private $descripcion;
    
   
    function __construct($idEstadoRegistro, $descripcion) {
        $this->idEstadoRegistro = $idEstadoRegistro;
        $this->descripcion = $descripcion;
    }

    
    function getIdEstadoRegistro() {
        return $this->idEstadoRegistro;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdEstadoRegistro($idEstadoRegistro): void {
        $this->idEstadoRegistro = $idEstadoRegistro;
    }

    function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }


}
