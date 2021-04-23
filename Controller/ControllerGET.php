<?php

class ControllerGET {

    public function __construct() {
        
    }

    public function validarHash() {
      require_once RAIZ . '/Model/Business.php';
      return (new Business())->esMiHash();
    }
    public function getPartidos() {
        require_once RAIZ . '/Model/Business.php';
        return (new Business())->getPartidos();
    }

    public function getSedesGrados() {
        require_once RAIZ . '/Model/Business.php';
        return (new Business())->getSedesGrados();
    }

    public function getSedeEstudiante() {
        require_once RAIZ . '/Model/Business.php';
        return (new Business())->getSedeEstudiante();
    }
     public function getSedes() {
        require_once RAIZ . '/Model/Business.php';
        return (new Business())->getSedes();
    }
    public function getPartidoActivo($codigo) {

        require_once RAIZ . '/Model/Business.php';
        require_once RAIZ . "Model/DTO/PartidoDTO.php";
        $partido = (new Business())->getPartidoActivo(new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null));
        if (count($partido) > 0) {
            return array("idpartido" => $partido["idpartido"], "preguntaactiva" => $partido["preguntaactiva"], "preguntasresueltas" => $partido["preguntasresueltas"]);
        } else {
            return array("exito" => false);
        }
    }

    public function getPartidoActivoEnfrentamiento($codigo) {

        require_once RAIZ . '/Model/Business.php';
        require_once RAIZ . "Model/DTO/PartidoDTO.php";
        $partido = (new Business())->getPartidoActivoEnfrentamiento(new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null));
        if (count($partido) > 0) {
            return array("idpartido" => $partido["idpartido"], "preguntaactiva" => $partido["preguntaactiva"], "preguntasresueltas" => $partido["preguntasresueltas"]);
        } else {
            return array("exito" => false);
        }
    }
    public function getPuntajesPrimeraRonda($codigo) {
        require_once RAIZ . '/Model/Business.php';
        require_once RAIZ . '/Model/DTO/EstudianteDTO.php';
        require_once RAIZ . '/Model/DTO/RegistroDTO.php';
        require_once RAIZ . '/Model/DTO/PartidoDTO.php';

        $estudianteDTO = new EstudianteDTO(null, null, null, null, new RegistroDTO(null, null, new PartidoDTO(null,$codigo , null, null, null, null, null, null, null, null), null),null);
        $puntajes = (new Business())->getPuntajesPrimeraRonda($estudianteDTO);

        return $puntajes;
    }

    public function getCampoActual($codigo) {
        require_once RAIZ . '/Model/Business.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        return (new Business())->getCampoActual(new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null));
    }
    
    public function getCampoEnfrentamiento($codigo) {
        require_once RAIZ . '/Model/Business.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        return (new Business())->getCampoEnfrentamiento(new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null));
    }

    public function getGanadoresCuadro($codigo) {
        require_once RAIZ . '/Model/Business.php';
        require_once RAIZ . '/Model/DTO/PartidoDTO.php';
    }

    public function getCuadros($codigo) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        require_once RAIZ . 'Model/DTO/EnfrentamientoDTO.php';

        return (new Business())->getCuadros(new EnfrentamientoDTO(null, null, new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null), null, null, null, null));
    }

    public function getCuadrosEstudiante($codigo) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        require_once RAIZ . 'Model/DTO/EnfrentamientoDTO.php';

        return (new Business())->getCuadrosEstudiante(new EnfrentamientoDTO(null, null, new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null), null, null, null, null));
    }
    
    public function getEstadoRegistro() {

        return (new Business())->getEstadoRegistro();
    }
    
    public function getPuntajes($codigo) {
         require_once RAIZ . '/Model/Business.php';
        require_once RAIZ . '/Model/DTO/EstudianteDTO.php';
        require_once RAIZ . '/Model/DTO/RegistroDTO.php';
        require_once RAIZ . '/Model/DTO/PartidoDTO.php';

        $estudianteDTO = new EstudianteDTO(null, null, null, null, new RegistroDTO(null, null, new PartidoDTO(null,$codigo , null, null, null, null, null, null, null, null), null),null);
        $puntajes = (new Business())->getPuntajes($estudianteDTO);
        
        return $puntajes;
    }

    public function getCampoVersus($codigo) {
        require_once RAIZ . '/Model/Business.php';
        require_once RAIZ . '/Model/DTO/PartidoDTO.php';
        
        $partidoDTO=new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null);
       return  (new Business())->getCampoVersus($partidoDTO);
    }
    
    public function getEstudianteVersus($codigo) {
         require_once RAIZ . '/Model/Business.php';
        require_once RAIZ . '/Model/DTO/PartidoDTO.php';
        
        $partidoDTO=new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null);
        return (new Business())->getEstudianteVersus($partidoDTO);
    }
    
    
    public function getListaEstudiantesParticipantes() {
        require_once RAIZ . '/Model/Business.php';
        return (new Business())->getListaEstudiantesParticipantes();
        
    }
}
