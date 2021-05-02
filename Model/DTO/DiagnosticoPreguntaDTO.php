<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DiagnosticoPreguntaDTO
 *
 * @author Anillos
 */
class DiagnosticoPreguntaDTO {
   
    private ?int $idDiagnosticoPregunta;
    private ?DiagnosticoDTO $diagnosticoDTO;
    private ?PreguntaBaseDTO $preguntaBaseDTO;
    private ?string $fechaInicio;
    private ?string $fechaFin;
    private ?bool $correcto;
    private ?string $respuesta;
            
    
    function __construct(?int $idDiagnosticoPregunta, ?DiagnosticoDTO $diagnosticoDTO, ?PreguntaBaseDTO $preguntaBaseDTO, ?string $fechaInicio, ?string $fechaFin, ?bool $correcto) {
        $this->idDiagnosticoPregunta = $idDiagnosticoPregunta;
        $this->diagnosticoDTO = $diagnosticoDTO;
        $this->preguntaBaseDTO = $preguntaBaseDTO;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->correcto = $correcto;
    }
    
    function getIdDiagnosticoPregunta(): ?int {
        return $this->idDiagnosticoPregunta;
    }

    /**

     * @return DiagnosticoDTO retorna objeto DiagnosticoDTO o null     */
    function getDiagnosticoDTO(): ?DiagnosticoDTO {
        return $this->diagnosticoDTO;
    }

    function getPreguntaBaseDTO(): ?PreguntaBaseDTO {
        return $this->preguntaBaseDTO;
    }

    function getRespuesta(): ?string {
        return $this->respuesta;
    }

    function setRespuesta(?string $respuesta): void {
        $this->respuesta = $respuesta;
    }

        function getFechaInicio(): ?string {
        return $this->fechaInicio;
    }

    function getFechaFin(): ?string {
        return $this->fechaFin;
    }

    function getCorrecto(): ?bool {
        return $this->correcto;
    }

    function setIdDiagnosticoPregunta(?int $idDiagnosticoPregunta): void {
        $this->idDiagnosticoPregunta = $idDiagnosticoPregunta;
    }

    function setDiagnosticoDTO(?DiagnosticoDTO $diagnosticoDTO): void {
        $this->diagnosticoDTO = $diagnosticoDTO;
    }

    function setPreguntaBaseDTO(?PreguntaBaseDTO $preguntaBaseDTO): void {
        $this->preguntaBaseDTO = $preguntaBaseDTO;
    }

    function setFechaInicio(?string $fechaInicio): void {
        $this->fechaInicio = $fechaInicio;
    }

    function setFechaFin(?string $fechaFin): void {
        $this->fechaFin = $fechaFin;
    }

    function setCorrecto(?bool $correcto): void {
        $this->correcto = $correcto;
    }



}
