<?php

class RegistroEstudianteDAO{

    private $conexion;

    public function __construct() {
        require_once RAIZ . 'Model/Database/Database.php';
        $this->conexion = (new Database())->connect();
    }



    public function registrar($name, $code, $pass, $sede){
        $success = false;
       try {
        $prepareStatement = $this->conexion->prepare("insert into estudiante (nombre,usuario,contrasenia,idsede,logeado,hash)  values(:name,:code,:pass,:sede,'2020-01-01','inithashlol')" );
        $prepareStatement->bindParam(":name",$name,PDO::PARAM_STR);
        $prepareStatement->bindParam(":code",$code,PDO::PARAM_STR);
        $prepareStatement->bindParam(":pass",$pass,PDO::PARAM_STR);
        $prepareStatement->bindParam(":sede",$sede,PDO::PARAM_STR);
        $success = $prepareStatement->execute();
       } catch (\Throwable $th) {
        throw new Exception("El codigo ingresado ya fue registrado");
       }
        return $success;
    }

    public function habilitar(){
        $success = [];
        $habilitado = -1;
        try {
        $prepareStatement = $this->conexion->prepare("select habilitado from registro_estudiante");        
        if ($prepareStatement->execute() && $prepareStatement->rowCount() > 0) {
            $habilitado = $prepareStatement->fetchAll();            
            $habilitado = !$habilitado[0]["habilitado"];             
            $prepareStatement = $this->conexion->prepare("update registro_estudiante set habilitado = :habi" );
            $prepareStatement->bindParam(":habi",$habilitado,PDO::PARAM_BOOL);
            $success = [$prepareStatement->execute(),$habilitado];
        }                 
        } catch (\Throwable $th) {
         throw new Exception($th->getMessage());
        }
         return $success;
    }

    public function habilitado(){
        $success = false;
        try {
        $prepareStatement = $this->conexion->prepare("select habilitado from registro_estudiante");        
        if ($prepareStatement->execute() && $prepareStatement->rowCount() > 0) {
            $habilitado = $prepareStatement->fetchAll();            
            $success = $habilitado[0]["habilitado"];
        }                 
        } catch (\Throwable $th) {
         throw new Exception($th->getMessage());
        }
         return $success;
    }
}