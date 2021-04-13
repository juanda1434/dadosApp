<?php

class ControllerRegistro {

    public function __construct() {
        
    }

    public function registrarPartido($sede, $grado, $numero) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/SedeDTO.php';
        require_once RAIZ . 'Model/DTO/GradoDTO.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        $date = getdate(time() - (6 * 60 * 60));
        $codigo = rand(10, 99) . $date["minutes"] . $date["seconds"];
        $partidoDTO = new PartidoDTO(null, $codigo, null, null, new SedeDTO($sede, null), new GradoDTO($grado, null), $numero, null, null, null);
        return Business::registrarPartido($partidoDTO);
    }

    public function unirsePartida($codigoPartido) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        require_once RAIZ . 'Model/DTO/EstudianteDTO.php';
        require_once RAIZ . 'Model/DTO/RegistroDTO.php';
        $registroDTO = new RegistroDTO(null, null, new PartidoDTO(null, $codigoPartido, null, null, null, null, null, null, null, null), null);

        return Business::unirsePartida($registroDTO);
    }

    public function registrarRespuesta($operacion, $numerouno, $numerodos, $numerostres, $numerocuatro,$codigo) {
        require_once RAIZ . 'Model/Business.php';        
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        require_once RAIZ . 'Model/DTO/RespuestaDTO.php';
        require_once RAIZ . 'Model/DTO/PreguntaDTO.php';
        require_once RAIZ . 'Model/DTO/RegistroDTO.php';
        $respuestaDTO = new RespuestaDTO(null, null, new PreguntaDTO(null, new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null), null, $numerouno, $numerodos, $numerostres, $numerocuatro, null), new RegistroDTO(null, null, null, null), null, $operacion);
        return (new Business())->registrarRespuesta($respuestaDTO);
    }

    public function registrarPregunta($numerouno, $numerodos, $numerostres, $numerocuatro, $respuesta,$codigo) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/PreguntaDTO.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        $preguntaDTO = new PreguntaDTO(null, new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null), null, $numerouno, $numerodos, $numerostres, $numerocuatro, $respuesta);
        return Business::registrarPregunta($preguntaDTO);
    }
    
     public function registrarPreguntaEnfrentamiento($numerouno, $numerodos, $numerostres, $numerocuatro, $respuesta,$codigo) {
        require_once RAIZ . 'Model/Business.php';
        require_once RAIZ . 'Model/DTO/PreguntaDTO.php';
        require_once RAIZ . 'Model/DTO/PartidoDTO.php';
        $preguntaDTO = new PreguntaDTO(null, new PartidoDTO(null, $codigo, null, null, null, null, null, null, null, null), null, $numerouno, $numerodos, $numerostres, $numerocuatro, $respuesta);
        return Business::registrarPreguntaEnfrentamiento($preguntaDTO);
    }

}
