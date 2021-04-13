<?php

class VersusDAO {

    private $conexion;

    public function __construct() {
        require_once RAIZ . 'Model/Database/Database.php';
        $this->conexion = Database::connect();
    }

    function validarVersus(VersusDTO $versusDTO) {
        $exito = false;
        $idEstudiante = ((($versusDTO->getEnfrentamientoDTO())->getRegistroDTO())->getEstudianteDTO())->getIdEstudiante();
        try {
            $stmValidarVersus = $this->conexion->prepare("select v.idversus from versus v INNER JOIN enfrentamiento e1 on e1.idenfrentamiento=v.idenfrentamiento INNER JOIN enfrentamiento e2 ON e2.idenfrentamiento=v.idenfrentamiento INNER JOIN registro r on r.idregistro=e1.idregistro or r.idregistro=e2.idregistro INNER JOIN estudiante es on es.idestudiante=r.idestudiante WHERE es.idestudiante=:idestudiante");
            $stmValidarVersus->bindParam(":idestudiante", $idEstudiante, PDO::PARAM_INT);
            if ($stmValidarVersus->execute() && $stmValidarVersus->rowCount() > 0) {
                $idVersus = $stmValidarVersus->fetch()["idversus"];
                $versusDTO->setIdVersus($idVersus);
                $exito = true;
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $exito;
    }

    function setVersus($versusArray) {
        $exito = false;
        try {
            $this->conexion->beginTransaction();

            foreach ($versusArray as $v) {
                $idEnfrentamiento = ($v->getEnfrentamientoDTO())->getIdEnfrentamiento();
                $idVersus = $v->getIdVersus();
                $stmSetVersus = $this->conexion->prepare("UPDATE versus v set v.idenfrentamiento=:idenfrentamiento where v.idversus=:idVersus");
                $stmSetVersus->bindParam(":idenfrentamiento", $idEnfrentamiento, PDO::PARAM_INT);
                $stmSetVersus->bindParam(":idVersus", $idVersus, PDO::PARAM_INT);
                if (!$stmSetVersus->execute() || $stmSetVersus->rowCount() < 0) {
                    throw new Exception("Error al seleccionar enfrentamiento.");
                }
            }

            $exito = $this->conexion->commit();
        } catch (Exception $ex) {
            $this->conexion->rollBack();
            throw new Exception($ex->getMessage());
        }
        return $exito;
    }

    public function validarVersusExiste() {
        $exito = false;
        try {
            $stmValidarVersus = $this->conexion->prepare("select * from versus v where not v.idenfrentamiento is null");
            if ($stmValidarVersus->execute() && $stmValidarVersus->rowCount() == 2) {
                $exito = true;
            }
        } catch (Exception $ex) {
            
        }
        return $exito;
    }

    public function validarTerminarVersus() {
        $exito = ["exito" => false];
        try {
            $stmValidarTerminar = $this->conexion->prepare("select e1.idenfrentamiento id1,e1.puntaje puntaje1,e2.idenfrentamiento id2,e2.puntaje puntaje2,e1.numero numero,e1.ronda,e1.idpartido,e1.idregistro r1,e2.idregistro r2 from enfrentamiento e1 INNER JOIN enfrentamiento e2 on MOD(e1.numero,2)<>0 and e1.ronda=e2.ronda and e1.numero+1=e2.numero and ((e1.puntaje>=2 or e2.puntaje>=2 ) and (e1.puntaje<>e2.puntaje) )INNER JOIN partido p on p.idpartido=e1.idpartido and p.idpartido=e2.idpartido INNER JOIN versus v on v.idenfrentamiento=e1.idenfrentamiento where if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Siguiente' ORDER BY v.idversus ASC");

            if ($stmValidarTerminar->execute() && $stmValidarTerminar->rowCount() > 0) {
                $enfrentamientos = $stmValidarTerminar->fetch();
                $p1 = intval($enfrentamientos["puntaje1"]);
                $p2 = intval($enfrentamientos["puntaje2"]);
                $id1 = $enfrentamientos["id1"];
                $id2 = $enfrentamientos["id2"];
                $r1 = $enfrentamientos["r1"];
                $r2 = $enfrentamientos["r2"];
                $enfrentamientos = ["idregistro"=>$p1 > $p2 ? $r1 : $r2,"idpartido"=>$enfrentamientos["idpartido"],"ronda" => $enfrentamientos["ronda"], "numero" => $enfrentamientos["numero"], "id" => $p1 > $p2 ? $id1 : $id2, "puntaje" => $p1 > $p2 ? $p1 : $p2];
                $exito = ["exito" => true, "enfrentamiento" => $enfrentamientos];
            }
        } catch (Exception $ex) {
            
        }
        return $exito;
    }

    
    
}
