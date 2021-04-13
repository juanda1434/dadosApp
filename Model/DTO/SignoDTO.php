<?php


class SignoDTO {
    
    private $idSigno;
    private $x;
    private $y;
    private $i;
    private $xi;
    private $yi;
    private $tipo;    
    private $versusDTO;
    
    function __construct($x, $y, $i, $tipo) {
        $this->x = $x;
        $this->y = $y;
        $this->i = $i;
        $this->tipo = $tipo;
    }
    function getIdSigno() {
        return $this->idSigno;
    }

    function getX() {
        return $this->x;
    }

    function getY() {
        return $this->y;
    }

    function getI() {
        return $this->i;
    }

    function getXi() {
        return $this->xi;
    }

    function getYi() {
        return $this->yi;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getVersusDTO() {
        return $this->versusDTO;
    }

    function setIdSigno($idSigno): void {
        $this->idSigno = $idSigno;
    }

    function setX($x): void {
        $this->x = $x;
    }

    function setY($y): void {
        $this->y = $y;
    }

    function setI($i): void {
        $this->i = $i;
    }

    function setXi($xi): void {
        $this->xi = $xi;
    }

    function setYi($yi): void {
        $this->yi = $yi;
    }

    function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    function setVersusDTO($versusDTO): void {
        $this->versusDTO = $versusDTO;
    }


    
}
