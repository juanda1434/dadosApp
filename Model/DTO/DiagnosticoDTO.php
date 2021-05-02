<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DiagnosticoDTO
 *
 * @author Anillos
 */

class DiagnosticoDTO {
    
    private ?int $idDiagnostico;
    private ?EstudianteDTO $estudianteDTO;
    private ?string $fechaInicio;
    private ?string $fechaFin;
    private ?DiagnosticoPreguntaDTO $diagnosticoPreguntasDTO;
    private array $diagnosticoPreguntaDTO;
    
     public function __construct(?int $idDiagnostico,?EstudianteDTO $estudianteDto,?string $fechaInicio, ?string $fechaFin){
        $this->idDiagnostico=$idDiagnostico;
        $this->estudianteDTO=$estudianteDto;
        $this->fechaFin= $fechaFin;
        $this->fechaInicio=$fechaInicio;
        $this->diagnosticoPreguntaDTO = [];
    }
    
   
    public function getFirtDiagnosticoPreguntaDTO() : DiagnosticoPreguntaDTO{
        return $this->diagnosticoPreguntaDTO[0];
    }
    
    public function agregarDiagnosticoPreguntaDTO (DiagnosticoPreguntaDTO $diagnosticoPreguntaDTO){
        $this->diagnosticoPreguntaDTO[]=$diagnosticoPreguntaDTO;
    }
    
    function getIdDiagnostico(): ?int {
        return $this->idDiagnostico;
    }
    

    function getEstudianteDTO(): ?EstudianteDTO {
        return $this->estudianteDTO;
    }

    function getFechaInicio(): ?string {
        return $this->fechaInicio;
    }

    function getFechaFin(): ?string {
        return $this->fechaFin;
    }

    function setIdDiagnostico(?int $idDiagnostico): void {
        $this->idDiagnostico = $idDiagnostico;
    }

    function setEstudianteDTO(?EstudianteDTO $estudianteDTO): void {
        $this->estudianteDTO = $estudianteDTO;
    }

    function setFechaInicio(?string $fechaInicio): void {
        $this->fechaInicio = $fechaInicio;
    }

    function setFechaFin(?string $fechaFin): void {
        $this->fechaFin = $fechaFin;
    }

    
}
