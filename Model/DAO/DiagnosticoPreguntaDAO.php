<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DiagnosticoPreguntaDAO
 *
 * @author Anillos
 */
class DiagnosticoPreguntaDAO {

    private PDO $conexion;

    public function __construct() {
        require_once RAIZ . 'Model/Database/Database.php';
        $this->conexion = (new Database())->connect();
    }

    public function listarPregunta(DiagnosticoPreguntaDTO $diagnosticoPreguntaDTO): ?array {
        $idEstudiante = (($diagnosticoPreguntaDTO->getDiagnosticoDTO())->getEstudianteDTO())->getIdEstudiante();
        $pregunta = null;
        try {
            $stmListar = $this->conexion->prepare("SELECT pb.dadouno,pb.dadodos,pb.dadotres,pb.dadocuatro,pb.numero,d.fechafin,pb.idpreguntabase from preguntabase pb INNER JOIN diagnosticopregunta dp on pb.idpreguntabase=dp.idpreguntabase INNER JOIN diagnostico d on d.iddiagnostico=dp.iddiagnostico WHERE not dp.fechainicio is null and dp.fechafin is null and d.idestudiante=:idestudiante");
            $stmListar->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
            if ($stmListar->execute() && $stmListar->rowCount() > 0) {
                $preguntaSQL = $stmListar->fetch();
                $pregunta = ["dadouno" => $preguntaSQL["dadouno"], "dadodos" => $preguntaSQL["dadodos"], "dadotres" => $preguntaSQL["dadotres"], "dadocuatro" => $preguntaSQL["dadocuatro"], "numero" => $preguntaSQL["numero"],"fechafin"=>$preguntaSQL["fechafin"],"numeroPregunta"=>$preguntaSQL["idpreguntabase"]];
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $pregunta;
    }

    public function validarPreguntaIngresada(DiagnosticoPreguntaDTO $diagnosticoPreguntaDTO): bool {
        $pregunta = $this->listarPregunta($diagnosticoPreguntaDTO);

        if ($pregunta != null && $this->validarPreguntaExiste($pregunta, $diagnosticoPreguntaDTO->getPreguntaBaseDTO())) {
            ($diagnosticoPreguntaDTO->getPreguntaBaseDTO())->setNumero($pregunta["numero"]);
            $this->validarRespuesta($diagnosticoPreguntaDTO);
            return true;
        }
        return false;
    }

    private function validarPreguntaExiste(array $pregunta, PreguntaBaseDTO $preguntaBaseDTO): bool {
        $preguntaIngresada = [$preguntaBaseDTO->getDadoUno(), $preguntaBaseDTO->getDadoTres(), $preguntaBaseDTO->getDadoDos(), $preguntaBaseDTO->getDadoCuatro()];
        $pr = [$pregunta["dadouno"], $pregunta["dadodos"], $pregunta["dadotres"], $pregunta["dadocuatro"]];
        foreach ($pr as $preguntaGuardada) {
            for ($i = 0; $i < count($preguntaIngresada); $i++) {
                if ($preguntaGuardada == $preguntaIngresada[$i]) {
                    array_splice($preguntaIngresada, $i, 1);
                }
            }
        }
        return count($preguntaIngresada) == 0;
    }

    private function validarRespuesta(DiagnosticoPreguntaDTO $diagnosticoPreguntaDTO): void {
        $operacion = $diagnosticoPreguntaDTO->getRespuesta();
        $numero = ($diagnosticoPreguntaDTO->getPreguntaBaseDTO())->getNumero();
        $respuestaCalculada;
        eval('$respuestaCalculada=' . $operacion . ';');
        $diagnosticoPreguntaDTO->setCorrecto($respuestaCalculada == $numero);
    }

}
