<?php

class ControllerEdit {

    public function cerrarPregunta($codigo) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/PreguntaDTO.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        return Business::cerrarPregunta(new PreguntaDTO(NULL, new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null), null, NULL, NULL, NULL, NULL, NULL, NULL));
    }

    public function SaltarPregunta($codigo) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        require_once RAIZ . 'Model/DTO/PreguntaDTO.php';
        return Business::saltarPregunta(new PreguntaDTO(NULL, new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null), null, NULL, NULL, NULL, NULL, NULL, NULL));
    }

    public function iniciarPartida($codigo) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';

        return (new Business())->iniciarPartido(new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null));
    }

    public function segundaRonda($codigo) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        return Business::segundaRonda(new PartidoDTO(null, $codigo, NULL, null, null, null, null, null, null, null));
    }

    public function nuevaRonda($codigo) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';

        return Business::nuevaRonda(new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null));
    }

    public function finalizarRonda($codigo) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';

        $PartidoDTO = new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null);

        return Business::finalizarRonda($PartidoDTO);
    }
    public function finalizarEnfrentamiento($codigo) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';

        $PartidoDTO = new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null);

        return Business::finalizarEnfrentamiento($PartidoDTO);
    }

    public function enviarPuntoSede() {
        require_once RAIZ . 'Model/Business.php';

        return Business::enviarPuntoSede();
    }

    public function seleccionarVersus($idEnfrentamiento1, $idEnfrentamiento2, $codigo) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/EnfrentamientoDTO.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        $e1 = new EnfrentamientoDTO($idEnfrentamiento1, null, new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null), null, null, null, null);
        $e2 = new EnfrentamientoDTO($idEnfrentamiento2, null, null, null, null, null, null);
        return Business::seleccionarVersus($e1, $e2);
    }

    public function enviarSigno($x, $y, $i, $tipo) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/SignoDTO.php';
        
       return  Business::enviarSigno(new SignoDTO($x, $y, $i, $tipo));
    }
    
    public function responderEnfrentamiento($operacion, $numerouno, $numerodos, $numerostres, $numerocuatro,$codigo) {
        require_once RAIZ . 'Model/Business.php';        
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        require_once RAIZ . 'Model/DTO/RespuestaDTO.php';
        require_once RAIZ . 'Model/DTO/PreguntaDTO.php';
        require_once RAIZ . 'Model/DTO/RegistroDTO.php';
        $respuestaDTO = new RespuestaDTO(null, null, new PreguntaDTO(null, new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null), null, $numerouno, $numerodos, $numerostres, $numerocuatro, null), new RegistroDTO(null, null, null, null), null, $operacion);
        return (new Business())->responderEnfrentamiento($respuestaDTO);
    }

    
    public function actualizarEstado() {
       require_once RAIZ . 'Model/Business.php'; 
       return Business::actualizarEstado();
       
    }
}
