<?php

class SignoDAO {

    private $conexion;

    public function __construct() {
        require_once RAIZ . 'Model/Database/Database.php';
        $this->conexion = (new Database())->connect();
    }

    public function getCampos() {

        $campos = [];
        try {
            $stmGetSignos = $this->conexion->prepare("select idversus,i,x,y,tipo from signo");
            if ($stmGetSignos->execute() && $stmGetSignos->rowCount() > 0) {
                $signos = $stmGetSignos->fetchAll();
                $campos = [0 => [0=>[],1=>[]], 1 => [0=>[],1=>[]]];
                foreach ($signos as $signo) {
                    if ($signo["idversus"]== "1") {
                        $tipo=($campos[0])[intval($signo["tipo"])];
                        $tipo[intval($signo["i"])] = ["x" => intval($signo["x"]), "y" => intval($signo["y"])];
                        ($campos[0])[intval($signo["tipo"])]=$tipo;
                    } else {
                        $tipo=($campos[1])[intval($signo["tipo"])];
                        $tipo[intval($signo["i"])] = ["x" => intval($signo["x"]), "y" => intval($signo["y"])];
                        ($campos[1])[intval($signo["tipo"])]=$tipo;
                        }
                }
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $campos;
    }
    
    public function setSigno(SignoDTO $signoDTO) {
        $x= intval($signoDTO->getX());
        $y= intval($signoDTO->getY())-100;
        $i=$signoDTO->getI();
        $tipo=$signoDTO->getTipo();
        $idVersus=($signoDTO->getVersusDTO())->getIdVersus();
        $exito=false;
        try {
            $sqlSetSigno= $this->conexion->prepare("update signo set x=:x , y=:y where tipo=:tipo and idversus=:idversus and i=:i");
            $sqlSetSigno->bindParam(":x", $x,PDO::PARAM_INT);
            $sqlSetSigno->bindParam(":y", $y,PDO::PARAM_INT);
            $sqlSetSigno->bindParam(":i", $i,PDO::PARAM_INT);
            $sqlSetSigno->bindParam(":tipo", $tipo,PDO::PARAM_INT);
            $sqlSetSigno->bindParam(":idversus", $idVersus,PDO::PARAM_INT);
            if ($sqlSetSigno->execute() && $sqlSetSigno->rowCount()>0) {
                $exito=true;
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $exito;
    }
    
    
    public function limpiarSigno() {
        $exito=false;
        try {
            $sqlSetSigno= $this->conexion->prepare("UPDATE signo s SET s.x=s.xi,s.y=s.yi WHERE not s.x=s.xi OR not s.y=s.yi");
            if ($sqlSetSigno->execute() && $sqlSetSigno->rowCount()>0) {
                $exito=true;
            }
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return $exito;
        
    }

}
