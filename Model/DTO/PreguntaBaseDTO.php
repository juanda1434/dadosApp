<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PreguntaBaseDTO
 *
 * @author Anillos
 */
class PreguntaBaseDTO {
    
    private ?int $idPreguntaBase;
    private ?int $dadoUno;
    private ?int $dadoDos;
    private ?int $dadoTres;
    private ?int $dadoCuatro;
    private ?int $numero;
    private array $diagnosticoPreguntaDTO;


    function __construct(?int $idPreguntaBase, ?int $dadoUno, ?int $dadoDos, ?int $dadoTres, ?int $dadoCuatro, ?int $numero) {
        $this->idPreguntaBase = $idPreguntaBase;
        $this->dadoUno = $dadoUno;
        $this->dadoDos = $dadoDos;
        $this->dadoTres = $dadoTres;
        $this->dadoCuatro = $dadoCuatro;
        $this->numero = $numero;
    }
    function addDiagnosticoPreguntaDTO(DiagnosticoPreguntaDTO $diagnosticoPreguntaDTO) {
        $this->diagnosticoPreguntaDTO[]=$diagnosticoPreguntaDTO;
    }
    function getIdPreguntaBase(): ?int {
        return $this->idPreguntaBase;
    }

    function getDadoUno(): ?int {
        return $this->dadoUno;
    }

    function getDadoDos(): ?int {
        return $this->dadoDos;
    }

    function getDadoTres(): ?int {
        return $this->dadoTres;
    }

    function getDadoCuatro(): ?int {
        return $this->dadoCuatro;
    }

    function getNumero(): ?int {
        return $this->numero;
    }

    function setIdPreguntaBase(?int $idPreguntaBase): void {
        $this->idPreguntaBase = $idPreguntaBase;
    }

    function setDadoUno(?int $dadoUno): void {
        $this->dadoUno = $dadoUno;
    }

    function setDadoDos(?int $dadoDos): void {
        $this->dadoDos = $dadoDos;
    }

    function setDadoTres(?int $dadoTres): void {
        $this->dadoTres = $dadoTres;
    }

    function setDadoCuatro(?int $dadoCuatro): void {
        $this->dadoCuatro = $dadoCuatro;
    }

    function setNumero(?int $numero): void {
        $this->numero = $numero;
    }



}
