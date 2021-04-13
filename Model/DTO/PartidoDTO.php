<?php

class PartidoDTO {

    private $idPartido;
    private $codigo;
    private $estaActivo;
    private $enJuego;
    private $sedeDTO;
    private $gradoDTO;
    private $numero;
    private $numeroRondas;
    private $fechacreacion;
    private $finalizar;
    private $registrosDTO;

    function __construct($idPartido, $codigo, $estaActivo, $enJuego,  $sedeDTO,  $gradoDTO, $numero, $numeroRondas, $fechacreacion, $finalizar) {
        $this->idPartido = $idPartido;
        $this->codigo = $codigo;
        $this->estaActivo = $estaActivo;
        $this->enJuego = $enJuego;
        $this->sedeDTO = $sedeDTO;
        $this->gradoDTO = $gradoDTO;
        $this->numero = $numero;
        $this->numeroRondas = $numeroRondas;
        $this->fechacreacion = $fechacreacion;
        $this->finalizar = $finalizar;
    }
    function getRegistrosDTO() {
        return $this->registrosDTO;
    }

    function setRegistrosDTO($registrosDTO): void {
        $this->registrosDTO = $registrosDTO;
    }

        function getSedeDTO() {
        return $this->sedeDTO;
    }

    function getGradoDTO() {
        return $this->gradoDTO;
    }

    function getNumero() {
        return $this->numero;
    }

    function getNumeroRondas() {
        return $this->numeroRondas;
    }

    function getFechacreacion() {
        return $this->fechacreacion;
    }

    function getFinalizar() {
        return $this->finalizar;
    }

    function setSedeDTO($sedeDTO): void {
        $this->sedeDTO = $sedeDTO;
    }

    function setGradoDTO($gradoDTO): void {
        $this->gradoDTO = $gradoDTO;
    }

    function setNumero($numero): void {
        $this->numero = $numero;
    }

    function setNumeroRondas($numeroRondas): void {
        $this->numeroRondas = $numeroRondas;
    }

    function setFechacreacion($fechacreacion): void {
        $this->fechacreacion = $fechacreacion;
    }

    function setFinalizar($finalizar): void {
        $this->finalizar = $finalizar;
    }

    function getIdPartido() {
        return $this->idPartido;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getEstaActivo() {
        return $this->estaActivo;
    }

    function getEnJuego() {
        return $this->enJuego;
    }

    function setIdPartido($idPartido): void {
        $this->idPartido = $idPartido;
    }

    function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }

    function setEstaActivo($estaActivo): void {
        $this->estaActivo = $estaActivo;
    }

    function setEnJuego($enJuego): void {
        $this->enJuego = $enJuego;
    }

}
