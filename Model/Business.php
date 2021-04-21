<?php

class Business {

    public function getView($location) {
        $locations = ["Inicio", "InicioEstudiante", "Prueba", "Prueba2", "Practica",
            "InicioDocente", "Logout", "RondaUno", "PB", "RondaUnoDocente", "Grupos",
            "PuntajeGrupo", "Enfrentamiento", "LoginE"];
        $value = "";
        foreach ($locations as $locationn) {
            if (strcasecmp($location, $locationn) == 0) {
                $value = $location . ".php";
                break;
            } else {
                $value = "Inicio.php";
            }
        }

        return $value;
    }

    public function enviarPuntoSede() {
        $exito = false;
        session_start();
        if (isset($_SESSION["infoEstudiante"])) {
            require_once RAIZ . 'Model/DAO/SedeDAO.php';
            require_once RAIZ . 'Model/DTO/SedeDTO.php';
            require_once RAIZ . 'Model/DTO/EstudianteDTO.php';
            $sedeDto = new SedeDTO(null, null);
            $sedeDto->setEstudiantesDTO(new EstudianteDTO(($_SESSION["infoEstudiante"])["id"], null, null, null, null, null));
            $exito = (new SedeDAO())->enviarPunto($sedeDto);
        } else {
            throw new Exception("Debes estar logeado");
        }
        return $exito;
    }

    public function getPartidos() {
        require_once RAIZ . 'Model/DAO/PartidoDAO.php';
        require_once RAIZ . 'Model/DAO/GradoDAO.php';

        $partidos = (new PartidoDAO())->getPartidos();

        return $partidos;
    }

    public function getCampoVersus(PartidoDTO $partidoDTO) {

        require_once RAIZ . 'Model/DAO/SignoDAO.php';
        return (new SignoDAO())->getCampos();
    }

    public function getSedesGrados() {
        require_once RAIZ . 'Model/DAO/SedeDAO.php';
        require_once RAIZ . 'Model/DAO/GradoDAO.php';

        $sedeDAO = new SedeDAO();
        $gradoDAO = new GradoDAO();

        $sedes = $sedeDAO->getSede();
        $grados = $gradoDAO->getGrado();

        return ["sedes" => $sedes, "grados" => $grados];
    }

    public function getSedeEstudiante() {
        $sedes = [];
        session_start();
        if (isset($_SESSION["infoEstudiante"])) {
            require_once RAIZ . 'Model/DAO/SedeDAO.php';
            require_once RAIZ . 'Model/DTO/SedeDTO.php';
            require_once RAIZ . 'Model/DTO/EstudianteDTO.php';
            $sedeDAO = new SedeDAO();

            $sedeDTO = new SedeDTO(null, null);
            $sedeDTO->setEstudiantesDTO(new EstudianteDTO(($_SESSION["infoEstudiante"])["id"], null, null, null, null, null));
            $sedes = $sedeDAO->getSedeEstudiante($sedeDTO);

            return ["sede" => $sedes];
        }
    }

    public function getSedes() {
        require_once RAIZ . 'Model/DAO/SedeDAO.php';

        $sedeDAO = new SedeDAO();

        $sedes = $sedeDAO->getSede();

        return ["sedes" => $sedes];
    }

    public function registrarPartido(PartidoDTO $partidoDTO) {
        require_once RAIZ . 'Model/DAO/PartidoDAO.php';
        session_start();
        $exito = false;
        if ((new PartidoDAO())->RegistrarPartido($partidoDTO)) {
            $exito = true;
        }
        return $exito;
    }

    public function borrarPartido(PartidoDTO $partidoDTO) {
        require_once RAIZ . 'Model/DAO/PartidoDAO.php';
        return (new PartidoDAO())->borrarPartido($partidoDTO);
    }

    public function iniciarPartido(PartidoDTO $partidoDTO) {
        require_once RAIZ . 'Model/DAO/PartidoDAO.php';
        return (new PartidoDAO())->iniciarPartido($partidoDTO);
    }

    public function nuevaRonda(PartidoDTO $partidoDTO) {
        require_once RAIZ . 'Model/DAO/PartidoDAO.php';
        return (new PartidoDAO())->nuevaRonda($partidoDTO);
    }

    public function getPartidoActivo(PartidoDTO $partidoDTO) {
        require_once RAIZ . "Model/DAO/PartidoDAO.php";
        $partido = (new PartidoDAO())->getPartidoActivo($partidoDTO);
        if (count($partido) > 0) {
            $idPartido = $partido["idpartido"];
            require_once RAIZ . "Model/DAO/PreguntaDAO.php";
            require_once RAIZ . "Model/DTO/PreguntaDTO.php";
            $preguntaDto = new PreguntaDTO(null, new PartidoDTO($idPartido, null, null, null, null, null, null, null, null, null), null, null, null, null, null, null, null);
            $partido["preguntaactiva"] = (new PreguntaDAO())->getPregunta($preguntaDto);
            $partido["preguntasresueltas"] = (new PreguntaDAO())->getPreguntasResueltas($preguntaDto);
        }
        return $partido;
    }

    public function getPartidoActivoEnfrentamiento(PartidoDTO $partidoDTO) {
        require_once RAIZ . "Model/DAO/PartidoDAO.php";
        $partido = (new PartidoDAO())->getPartidoActivoEnfrentamiento($partidoDTO);
        if (count($partido) > 0) {
            $idPartido = $partido["idpartido"];
            require_once RAIZ . "Model/DAO/PreguntaDAO.php";
            require_once RAIZ . "Model/DTO/PreguntaDTO.php";
            $preguntaDto = new PreguntaDTO(null, new PartidoDTO($idPartido, null, null, null, null, null, null, null, null, null), null, null, null, null, null, null, null);
            $partido["preguntaactiva"] = (new PreguntaDAO())->getPregunta($preguntaDto);
            $partido["preguntasresueltas"] = (new PreguntaDAO())->getPreguntasResueltas($preguntaDto);
        }
        return $partido;
    }

    public function getPuntajesPrimeraRonda($estudianteDTO) {
        require_once RAIZ . "Model/DAO/EstudianteDAO.php";
        return (new EstudianteDAO())->getPuntajesPrimeraRonda($estudianteDTO);
    }

    public function getPuntajes($estudianteDTO) {
        require_once RAIZ . "Model/DAO/EstudianteDAO.php";
        session_start();
        $puntajes = (new EstudianteDAO())->getPuntajes($estudianteDTO);
        $puntajess = [$puntajes];
        if (isset($_SESSION["infoEstudiante"])) {
            $puntajess["ide"] = ($_SESSION["infoEstudiante"])["id"];
        }
        return $puntajess;
    }

    public function loginEstudiante($estudianteDTO) {
        require_once RAIZ . 'Model/DAO/EstudianteDAO.php';
        $exito = false;
        $estudianteDTO->setHash(md5(time()));
        $estudiante = (new EstudianteDAO())->login($estudianteDTO);        
        if (count($estudiante) > 0) {
            $exito = true;            
            session_start();
            $str=$estudianteDTO->getHash();
            setcookie("conexion4",$str, time()+24*60*60,"/");
            $_SESSION["loginEstudiante"] = true;
            $_SESSION["idEstudiante"] = $estudiante["idestudiante"];
            $_SESSION["infoEstudiante"] = ["id" => $estudiante["idestudiante"], "nombre" => $estudiante["nombre"], "sede" => $estudiante["sede"], "idSede" => $estudiante["idsede"]];
        }
        return $exito;
    }
    
    public function esMiHash() {
        $exito=false;
        if(isset($_COOKIE["conexion4"])){
            require_once RAIZ . 'Model/DAO/EstudianteDAO.php';
            $hash=$_COOKIE["conexion4"];
            $exito=(new EstudianteDAO())->esMiHash($hash,($_SESSION["infoEstudiante"])["id"]);
        }
        return $exito;
    }
    

    public function unirsePartida($registroDTO) {
        session_start();
        $exito = false;
        if (isset($_SESSION["idEstudiante"])) {
            require_once RAIZ . 'Model/DAO/RegistroDAO.php';
            require_once RAIZ . 'Model/DAO/PartidoDAO.php';
            require_once RAIZ . 'Model/DTO/SedeDTO.php';
            $partidoDTO = $registroDTO->getPartidoDTO();
            $partidoDTO->setSedeDTO(new SedeDTO(($_SESSION["infoEstudiante"])["idSede"], null));
            $idPartido = (new PartidoDAO())->validarCodigoPartida($partidoDTO);

            if ($idPartido > 0) {
                ($registroDTO->getPartidoDTO())->setIdPartido($idPartido);
                $registroDTO->setEstudianteDTO(new EstudianteDTO($_SESSION["idEstudiante"], null, null, null, null, null));
                $idRegistro = (new RegistroDAO())->validarRegistroExistente($registroDTO);
                if ($idRegistro < 0) {
                    $idRegistro = (new RegistroDAO())->unirsePartida($registroDTO);
                    if ($idRegistro > 0) {
                        $exito = true;
                    }
                } else {
                    throw new Exception("Ya estas registrado en un grupo.");
                }
            } else {
                throw new Exception("El codigo ingresado esta incorrecto.");
            }
        }

        return $exito;
    }

    public function getCampoActual(PartidoDTO $partidoDTO) {

        session_start();
        $respuesta = array("opcion" => 4);
        if (isset($_SESSION["infoEstudiante"])) {
            require_once RAIZ . 'Model/DAO/PreguntaDAO.php';
            require_once RAIZ . 'Model/DAO/PartidoDAO.php';
            require_once RAIZ . 'Model/DTO/PreguntaDTO.php';
            require_once RAIZ . 'Model/DTO/RegistroDTO.php';
            require_once RAIZ . 'Model/DTO/EstudianteDTO.php';
            require_once RAIZ . 'Model/DAO/EstudianteDAO.php';
            $partidoDTO->setRegistrosDTO(new RegistroDTO(null, new EstudianteDTO(($_SESSION["infoEstudiante"])["id"], null, null, null, null, null), null, null));
            $partidoDTO = (new PartidoDAO())->validarPartidoActivo($partidoDTO);
            if ($partidoDTO != null) {
                $preguntaDTO = new PreguntaDTO(null, $partidoDTO, null, null, null, null, null, null);
                $pregunta = (new PreguntaDAO())->getPregunta($preguntaDTO);
                $preguntasResueltas = (new PreguntaDAO())->getPreguntasResueltas($preguntaDTO);
                $puntuacion = (new EstudianteDAO())->getPuntajesPrimeraRonda(new EstudianteDTO(null, null, null, null, new RegistroDTO(null, null, $partidoDTO, null), null));
                if (count($pregunta) > 0) {
                    $respuesta = array("opcion" => 1, "pregunta" => $pregunta, "resueltas" => $preguntasResueltas, "puntuacion" => ["id" => ($_SESSION["infoEstudiante"])["id"], "tabla" => $puntuacion]);
                } else {
                    $respuesta = array("opcion" => 2, "resueltas" => $preguntasResueltas, "puntuacion" => ["id" => ($_SESSION["infoEstudiante"])["id"], "tabla" => $puntuacion]);
                }
            } else {
//                $partidoDTO = new PartidoDTO($_SESSION["idPartido"], null, null, null, null);
//                if ((new PartidoDAO())->getCodigoPartido($partidoDTO)) {
//                    require_once RAIZ . 'Model/DAO/EstudianteDAO.php';
//                    require_once RAIZ . 'Model/DTO/EstudianteDTO.php';
//                    require_once RAIZ . 'Model/DTO/RegistroDTO.php';
//                    $tabla = (new EstudianteDAO())->getPuntajesPrimeraRonda(new EstudianteDTO(null, null, null, null, new RegistroDTO(null, null, $partidoDTO, null)));
//
//                    $respuesta = array("opcion" => 3, "puntajes" => $tabla, "id" => $_SESSION["idRegistro"]);
//                }
            }
        }

        return $respuesta;
    }

    public function getCampoEnfrentamiento(PartidoDTO $partidoDTO) {

        session_start();
        $respuesta = array("opcion" => 4);
        if (isset($_SESSION["infoEstudiante"])) {
            require_once RAIZ . 'Model/DAO/PreguntaDAO.php';
            require_once RAIZ . 'Model/DAO/PartidoDAO.php';
            require_once RAIZ . 'Model/DTO/PreguntaDTO.php';
            require_once RAIZ . 'Model/DTO/RegistroDTO.php';
            require_once RAIZ . 'Model/DTO/EstudianteDTO.php';
            require_once RAIZ . 'Model/DAO/EstudianteDAO.php';
            $partidoDTO->setRegistrosDTO(new RegistroDTO(null, new EstudianteDTO(($_SESSION["infoEstudiante"])["id"], null, null, null, null, null), null, null));
            $partidoDTO = (new PartidoDAO())->validarPartidoEnfrentamiento($partidoDTO);
            if ($partidoDTO != null) {
                $preguntaDTO = new PreguntaDTO(null, $partidoDTO, null, null, null, null, null, null);
                $pregunta = (new PreguntaDAO())->getPregunta($preguntaDTO);
                $preguntasResueltas = (new PreguntaDAO())->getPreguntasResueltas($preguntaDTO);
                $puntuacion = (new EstudianteDAO())->getPuntajeEnfrentamiento();
                if (count($pregunta) > 0) {
                    $respuesta = array("opcion" => 1, "pregunta" => $pregunta, "resueltas" => $preguntasResueltas, "puntuacion" => ["id" => ($_SESSION["infoEstudiante"])["id"], "tabla" => $puntuacion]);
                } else {
                    $respuesta = array("opcion" => 2, "resueltas" => $preguntasResueltas, "puntuacion" => ["id" => ($_SESSION["infoEstudiante"])["id"], "tabla" => $puntuacion]);
                }
            } else {
//                $partidoDTO = new PartidoDTO($_SESSION["idPartido"], null, null, null, null);
//                if ((new PartidoDAO())->getCodigoPartido($partidoDTO)) {
//                    require_once RAIZ . 'Model/DAO/EstudianteDAO.php';
//                    require_once RAIZ . 'Model/DTO/EstudianteDTO.php';
//                    require_once RAIZ . 'Model/DTO/RegistroDTO.php';
//                    $tabla = (new EstudianteDAO())->getPuntajesPrimeraRonda(new EstudianteDTO(null, null, null, null, new RegistroDTO(null, null, $partidoDTO, null)));
//
//                    $respuesta = array("opcion" => 3, "puntajes" => $tabla, "id" => $_SESSION["idRegistro"]);
//                }
            }
        }

        return $respuesta;
    }

    public function responderEnfrentamiento(RespuestaDTO $respuestaDTO) {
        require_once RAIZ . 'Model/DAO/RespuestaDAO.php';
        session_start();
        $exito = false;
        if (isset($_SESSION["infoEstudiante"])) {
            $idEstudiante = ($_SESSION["infoEstudiante"])["id"];
            require_once RAIZ . 'Model/DTO/EstudianteDTO.php';
            ($respuestaDTO->getRegistroDTO())->setEstudianteDTO(new EstudianteDTO($idEstudiante, null, null, null, null, null));
            require_once RAIZ . 'Model/DTO/EnfrentamientoDTO.php';

            if ((new RespuestaDAO())->validarRespuestaEnfrentamiento($respuestaDTO)) {
                $this->validarRespuesta($respuestaDTO);
                require_once RAIZ . 'Model/DAO/EnfrentamientoDAO.php';
                if ($respuestaDTO->getCorrecta()) {
                    $exito = (new EnfrentamientoDAO())->registrarRespuesta(($respuestaDTO->getRegistroDTO())->getEnfrentamientosDTO(), $respuestaDTO->getPreguntaDTO());
                }
            }
        }
        return $exito;
    }

    public function registrarRespuesta(RespuestaDTO $respuestaDTO) {
        require_once RAIZ . 'Model/DAO/RespuestaDAO.php';
        session_start();
        $exito = ["exito" => false];
        if (isset($_SESSION["infoEstudiante"])) {
            $idEstudiante = ($_SESSION["infoEstudiante"])["id"];
            require_once RAIZ . 'Model/DTO/EstudianteDTO.php';
            ($respuestaDTO->getRegistroDTO())->setEstudianteDTO(new EstudianteDTO($idEstudiante, null, null, null, null, null));
            if ((new RespuestaDAO())->validarRespuesta($respuestaDTO)) {
                $this->validarRespuesta($respuestaDTO);
                $exito = (new RespuestaDAO())->registrarRespuesta($respuestaDTO);
            }
        }
        return $exito;
    }

    function validarRespuesta($respuestaDTO) {
        $operacion = $respuestaDTO->getRespuesta();
        $numero = ($respuestaDTO->getPreguntaDTO())->getNumero();
        $respuestaCalculada;
        eval('$respuestaCalculada=' . $operacion . ';');
        $respuestaDTO->setCorrecta($respuestaCalculada == $numero);
    }

    public function registrarPregunta(PreguntaDTO $preguntaDTO) {
        require_once RAIZ . 'Model/DAO/PreguntaDAO.php';
        require_once RAIZ . 'Model/DAO/PartidoDAO.php';

        $partido = (new PartidoDAO())->getPartidoActivo($preguntaDTO->getPartidoDTO());
        $exito = false;
        if (count($partido) > 0) {

            $preguntaDTO->setPartidoDTO(new PartidoDTO($partido["idpartido"], NULL, null, null, null, null, null, null, null, null));
            $exito = (new PreguntaDAO())->registrarPregunta($preguntaDTO);
        }
        return $exito;
    }

    public function registrarPreguntaEnfrentamiento(PreguntaDTO $preguntaDTO) {
        require_once RAIZ . 'Model/DAO/PreguntaDAO.php';
        require_once RAIZ . 'Model/DAO/PartidoDAO.php';

        $partido = (new PartidoDAO())->getPartidoActivoEnfrentamiento($preguntaDTO->getPartidoDTO());
        $exito = false;
        if (count($partido) > 0) {
            $preguntaDTO->setPartidoDTO(new PartidoDTO($partido["idpartido"], NULL, null, null, null, null, null, null, null, null));
            $exito = (new PreguntaDAO())->registrarPregunta($preguntaDTO);
        } else {
            throw new Exception("Para ingresar una pregunta debe tener seleccionado un enfrentamiento.");
        }
        return $exito;
    }

    public function cerrarPregunta($preguntaDTO) {
        require_once RAIZ . 'Model/DAO/PreguntaDAO.php';
        require_once RAIZ . 'Model/DAO/SignoDAO.php';
        (new SignoDAO())->limpiarSigno();
        return (new PreguntaDAO())->cerrarPregunta($preguntaDTO);
    }

    public function saltarPregunta($preguntaDTO) {
        require_once RAIZ . 'Model/DAO/PreguntaDAO.php';
        require_once RAIZ . 'Model/DAO/SignoDAO.php';
        (new SignoDAO())->limpiarSigno();
        return (new PreguntaDAO())->saltarPregunta($preguntaDTO);
    }

    public function segundaRonda($partidoDTO) {
        require_once RAIZ . 'Model/DAO/PartidoDAO.php';
        $exito = false;
        $validarPartido = (new PartidoDAO())->getPartidoPrimeraRondaActivoCodigo($partidoDTO);
        if ($validarPartido) {
            $exito = (new PartidoDAO())->segundaRonda($partidoDTO);
        }
        return $exito;
    }

    public function getEstudianteVersus(PartidoDTO $partidoDTO) {
        require_once RAIZ . 'Model/DAO/EnfrentamientoDAO.php';
        return (new EnfrentamientoDAO())->getEstudianteVersus();
    }

    public function getGanadoresCuadro() {
        
    }

    public function getCuadros($enfrentamientoDTO) {
        require_once RAIZ . 'Model/DAO/EnfrentamientoDAO.php';
        return (new EnfrentamientoDAO())->getCuadros($enfrentamientoDTO);
    }
    public function getCuadrosEstudiante($enfrentamientoDTO) {
        session_start();
        if(isset($_SESSION["infoEstudiante"])){        
        require_once RAIZ . 'Model/DAO/EnfrentamientoDAO.php';
        return ["id"=>($_SESSION["infoEstudiante"])["id"],"cuadro"=>(new EnfrentamientoDAO())->getCuadros($enfrentamientoDTO)];        
        }
        return [];
    }

    public function getEstadoRegistro() {
        $estadoRegistro = [];
        session_start();
        if (isset($_SESSION["loginEstudiante"]) && isset($_SESSION["idEstudiante"])) {
            require_once RAIZ . 'Model/DTO/RegistroDTO.php';
            require_once RAIZ . 'Model/DTO/EstudianteDTO.php';
            require_once RAIZ . 'Model/DTO/SedeDTO.php';
            require_once RAIZ . 'Model/DAO/RegistroDAO.php';
            require_once RAIZ . 'Model/DAO/SedeDAO.php';
            $estadoRegistro = (new RegistroDAO())->getEstadoRegistro(new RegistroDTO(null, new EstudianteDTO($_SESSION["idEstudiante"], null, null, null, null, null), null, null));
            $estadoRegistro["nombre"] = ($_SESSION["infoEstudiante"])["nombre"];
            $estadoRegistro["sede"] = ($_SESSION["infoEstudiante"])["sede"];
            $estadoRegistro["idsede"] = ($_SESSION["infoEstudiante"])["idSede"];
            $estadoRegistro["puntajeSede"] = (new SedeDAO())->getPuntaje(new SedeDTO(null, $estadoRegistro["sede"]));
            $estadoRegistro["puntajeMinimo"] = (new SedeDAO())->getPuntajeMinimo(new SedeDTO(null, $estadoRegistro["sede"]));
            if (isset($estadoRegistro["estado"]) && $estadoRegistro["estado"] == "Siguiente") {
                require_once RAIZ . 'Model/DAO/EnfrentamientoDAO.php';
                require_once RAIZ . 'Model/DTO/EnfrentamientoDTO.php';
                $a = (new EnfrentamientoDAO())->validarActivo(new EnfrentamientoDTO(null, new RegistroDTO(null, new EstudianteDTO($_SESSION["idEstudiante"], null, null, null, null, null), null, null), null, null, null, null, null));
                if ($a) {
                    $estadoRegistro["activo"] = true;
                }
            }
        } else {
            throw new Exception("Debes Estar logeado");
        }

        return $estadoRegistro;
    }

    public function finalizarRonda(PartidoDTO $partidoDTO) {
        require_once RAIZ . 'Model/DAO/PartidoDAO.php';
        return (new PartidoDAO())->finalizarRonda($partidoDTO);
    }

    public function finalizarEnfrentamiento(PartidoDTO $partidoDTO) {

        require_once RAIZ . 'Model/DAO/VersusDAO.php';

        $versusDAO = (new VersusDAO());
        if (!$versusDAO->validarVersusExiste()) {
            throw new Exception("No hay enfrentamiento seleccionado.");
        }
        $enfrentamiento = $versusDAO->validarTerminarVersus();
        if (!$enfrentamiento["exito"]) {
            throw new Exception("Para terminar el versus debe existir un ganador.");
        }
        require_once RAIZ . 'Model/DTO/EnfrentamientoDTO.php';
        require_once RAIZ . 'Model/DTO/RegistroDTO.php';
        $enfrentamiento = $enfrentamiento["enfrentamiento"];
        $enfrentamientoDTO = new EnfrentamientoDTO($enfrentamiento["id"], new RegistroDTO($enfrentamiento["idregistro"], null, null, null), new PartidoDTO($enfrentamiento["idpartido"], null, null, null, null, null, null, null, null, null), $enfrentamiento["numero"], $enfrentamiento["ronda"], null, null);
        $enfrentamientoDTO->pasarRonda();
        require_once RAIZ . 'Model/DAO/EnfrentamientoDAO.php';
        return (new EnfrentamientoDAO())->finalizarEnfrentamiento($enfrentamientoDTO);
    }

    public function seleccionarVersus(EnfrentamientoDTO $e1, EnfrentamientoDTO $e2) {
        require_once RAIZ . 'Model/DAO/EnfrentamientoDAO.php';
        $exito = false;
        if (!(new EnfrentamientoDAO())->validarEnfrentamiento($e1, $e2)) {
            throw new Exception("No se puede seleccionar este enfrentamiento.");
        }
        require_once RAIZ . 'Model/DAO/VersusDAO.php';
        require_once RAIZ . 'Model/DTO/VersusDTO.php';
        $exito = (new VersusDAO())->setVersus([new VersusDTO(1, $e1), new VersusDTO(2, $e2)]);

        return $exito;
    }

    public function enviarSigno(SignoDTO $signoDTO) {
        session_start();
        $exito = false;
        if (isset($_SESSION["infoEstudiante"])) {
            require_once RAIZ . 'Model/DAO/VersusDAO.php';
            require_once RAIZ . 'Model/DTO/VersusDTO.php';
            require_once RAIZ . 'Model/DTO/RegistroDTO.php';
            require_once RAIZ . 'Model/DTO/EstudianteDTO.php';
            require_once RAIZ . 'Model/DTO/EnfrentamientoDTO.php';
            $versusDTO = new VersusDTO(null, new EnfrentamientoDTO(null, new RegistroDTO(null, new EstudianteDTO(($_SESSION["infoEstudiante"])["id"], null, null, null, null, null), null, null), null, null, null, null, null));
            if ((new VersusDAO())->validarVersus($versusDTO)) {
                $signoDTO->setVersusDTO($versusDTO);
                require_once RAIZ . 'Model/DAO/SignoDAO.php';
                $exito = (new SignoDAO())->setSigno($signoDTO);
            }
        }
        return $exito;
    }

    public function actualizarEstado() {
        
        session_start();
        $exito=false;
        if(isset($_SESSION["infoEstudiante"])){
            require_once RAIZ . 'Model/DTO/EstudianteDTO.php';
            require_once RAIZ . 'Model/DAO/EstudianteDAO.php';
           $estudianteDTO=new EstudianteDTO(($_SESSION["infoEstudiante"])["id"], null, null, null, null, null); 
           $estudianteDTO->setHash($_COOKIE["conexion4"]);
//           if(isset($_COOKIE["conexion"])){
//               unset($_COOKIE["conexion"]);
//           }
           $exito=(new EstudianteDAO())->mantenerConexion($estudianteDTO);
        }
        return $exito;
    }
}
