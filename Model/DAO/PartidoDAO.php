<?php

class PartidoDAO {

    private $conexion;

    public function __construct() {
        require_once RAIZ . 'Model/Database/Database.php';
        $this->conexion = (new Database())->connect();
    }

    public function getPartidos() {
        $partidos=[];
        try {
            $stmGetPartidos = $this->conexion->prepare("select partido.idpartido,partido.codigo,concat(grado.nombre,' ',partido.numero)grado,sede.nombre sede,partido.numerorondas,COUNT(registro.idregistro)numeroestudiantes,partido.fechacreacion,if(not partido.finalizado,if(not partido.enjuego and not partido.estaactivo,'Registro',if(partido.enjuego and not partido.estaactivo,'Pausa',if(partido.estaactivo and not partido.enjuego,'Siguiente','Jugando'))),'Finalizado')estado from partido INNER JOIN grado on grado.idgrado=partido.idgrado INNER JOIN sede on sede.idsede=partido.idsede LEFT JOIN registro on registro.idpartido=partido.idpartido GROUP BY partido.idpartido ORDER BY sede.nombre ASC,partido.idgrado,partido.numero ASC");
            if ($stmGetPartidos->execute() && $stmGetPartidos->rowCount() > 0) {
                $grupos=$stmGetPartidos->fetchAll();
                foreach ($grupos as $grupo) {
                    $partidos[]=["codigo"=>$grupo["codigo"],"grado"=>$grupo["grado"],"sede"=>$grupo["sede"],"cantidadRonda"=>$grupo["numerorondas"],"registrados"=>$grupo["numeroestudiantes"],"fecha"=>$grupo["fechacreacion"],"estado"=>$grupo["estado"]];
                }                
            }
        } catch (Exception $ex) {
            
        }
        return $partidos;
    }

    public function RegistrarPartido(PartidoDTO $PartidoDTO) {
        $codigo = $PartidoDTO->getCodigo();
        $idSede= ($PartidoDTO->getSedeDTO())->getIdSede();
        $idGrado=($PartidoDTO->getGradoDTO())->getIdGrado();
        $numero=$PartidoDTO->getNumero();
        $exito = false;
        try {
            $stmRegistrarPartido = $this->conexion->prepare("insert into partido(codigo,idsede,idgrado,numero) values(:codigo,:idsede,:idgrado,:numero)");
            $stmRegistrarPartido->bindParam(":codigo", $codigo, PDO::PARAM_INT);
            $stmRegistrarPartido->bindParam(":idsede", $idSede,PDO::PARAM_INT);
            $stmRegistrarPartido->bindParam(":idgrado", $idGrado,PDO::PARAM_INT);
            $stmRegistrarPartido->bindParam(":numero", $numero,PDO::PARAM_INT);
            $exito = $stmRegistrarPartido->execute();
        } catch (Exception $ex) {
            throw new Exception(stripos($ex->getMessage(), "grupo_UNIQUE")!==false ? "El grupo registrado para la sede grado y numero ingresados esta registrado.": "Error al registrar partido. Intenta de nuevo.");
        }
        return $exito;
    }
    
     public function borrarPartido(PartidoDTO $PartidoDTO) {
        $codigo = $PartidoDTO->getCodigo();        
        $exito = false;
        try {
            $this->conexion->beginTransaction();
            $stmGetPartidoRegistro = $this->conexion->prepare("select p.idpartido from partido p  where if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Registro' and p.codigo=:codigo");
            $stmGetPartidoRegistro->bindParam(":codigo", $codigo, PDO::PARAM_INT);
            if ($stmGetPartidoRegistro->execute() && $stmGetPartidoRegistro->rowCount()>0) {
                $idpartido=$stmGetPartidoRegistro->fetch()["idpartido"];
                $stmGetRegistro= $this->conexion->prepare("select registro.idregistro from registro where registro.idpartido=:idpartido");
                $stmGetRegistro->bindParam(":idpartido", $idpartido,PDO::PARAM_INT);
                if ($stmGetRegistro->execute() && $stmGetRegistro->rowCount()>0) {
                    $stmDeleteRegistros= $this->conexion->prepare("delete from registro where idpartido=:idpartido");
                    $stmDeleteRegistros->bindParam(":idpartido", $idpartido,PDO::PARAM_INT);
                    $stmDeleteRegistros->execute();
                }
                $stmDeletePartido= $this->conexion->prepare("Delete from partido where idpartido=:idpartido");
                $stmDeletePartido->bindParam(":idpartido", $idpartido,PDO::PARAM_INT);
                if ($stmDeletePartido->execute()) {
                    $exito=$this->conexion->commit();
                }
            }
            if (!$exito) {
                throw new Exception("Error al borrar grupo");
            }
          
        } catch (Exception $ex) {
            $this->conexion->rollBack();
            throw new Exception(stripos($ex->getMessage(), "grupo_UNIQUE")!==false ? "El grupo registrado para la sede grado y numero ingresados esta registrado.": "Error al registrar partido. Intenta de nuevo.");
        }
        return $exito;
    }
    
    
    

    public function getPartidoActivo(PartidoDTO $partidoDTO) {
$codigo=$partidoDTO->getCodigo();
        $partido = [];
        try {
            $stmGetPartidoActivo = $this->conexion->prepare("select p.idpartido from partido p  where if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Jugando' and p.codigo=:codigo");
            $stmGetPartidoActivo->bindParam(":codigo", $codigo,PDO::PARAM_INT);
            if ($stmGetPartidoActivo->execute() && $stmGetPartidoActivo->rowCount() > 0) {
                $partido = $stmGetPartidoActivo->fetch();
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        return $partido;
    }
     public function getPartidoActivoEnfrentamiento(PartidoDTO $partidoDTO) {
$codigo=$partidoDTO->getCodigo();
        $partido = [];
        try {
            $stmGetPartidoActivo = $this->conexion->prepare("select p.idpartido from partido p INNER JOIN enfrentamiento e on e.idpartido=p.idpartido INNER JOIN versus v1 on v1.idenfrentamiento=e.idenfrentamiento INNER JOIN versus v2 on v2.idenfrentamiento=e.idenfrentamiento where if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Siguiente' and p.codigo=:codigo");
            $stmGetPartidoActivo->bindParam(":codigo", $codigo,PDO::PARAM_INT);
            if ($stmGetPartidoActivo->execute() && $stmGetPartidoActivo->rowCount() > 0) {
                $partido = $stmGetPartidoActivo->fetch();
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        return $partido;
    }

    function validarCodigoPartida(PartidoDTO $partidoDTO) {
        $codigo = $partidoDTO->getCodigo();
        $idSede=  $partidoDTO->getSedeDTO()->getIdSede();
        $idPartido = -1;
        try {
            $stmValidarCodigo = $this->conexion->prepare("select p.idpartido from partido p where p.codigo=:codigo and if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Registro' and p.idsede=:idsede");
            $stmValidarCodigo->bindParam(":codigo", $codigo, PDO::PARAM_INT);
            $stmValidarCodigo->bindParam(":idsede", $idSede,PDO::PARAM_INT);
            if ($stmValidarCodigo->execute() && $stmValidarCodigo->rowCount() > 0) {
                $idPartido = ($stmValidarCodigo->fetch())["idpartido"];
            }
        } catch (Exception $ex) {
            
        }
        return $idPartido;
    }

    function validarPartidoActivo(PartidoDTO $partidoDTO) {
        $codigo = $partidoDTO->getCodigo();
        $idEstudiante=(($partidoDTO->getRegistrosDTO())->getEstudianteDTO())->getIdEstudiante();
        $partidoDTORes = null;
        try {
            $stmvalidarPartido = $this->conexion->prepare("select p.idpartido,registro.idregistro from partido p INNER JOIN registro ON registro.idpartido=p.idpartido where p.codigo=:codigo and registro.idestudiante=:idestudiante and if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Jugando'");
            $stmvalidarPartido->bindParam(":codigo",$codigo, PDO::PARAM_INT);
            $stmvalidarPartido->bindParam(":idestudiante",$idEstudiante, PDO::PARAM_INT);
            if ($stmvalidarPartido->execute() && $stmvalidarPartido->rowCount() > 0) {
                $partido=$stmvalidarPartido->fetch();
                $partidoDTO->setIdPartido($partido["idpartido"]);
                $partidoDTORes = $partidoDTO;
            }
        } catch (Exception $ex) {
            
        }
        return $partidoDTORes;
    }

     function validarPartidoEnfrentamiento(PartidoDTO $partidoDTO) {
        $codigo = $partidoDTO->getCodigo();
        $idEstudiante=(($partidoDTO->getRegistrosDTO())->getEstudianteDTO())->getIdEstudiante();
        $partidoDTORes = null;
        try {
            $stmvalidarPartido = $this->conexion->prepare("select p.idpartido,registro.idregistro from partido p INNER JOIN registro ON registro.idpartido=p.idpartido INNER JOIN enfrentamiento e on e.idregistro=registro.idregistro INNER JOIN versus v1 on v1.idenfrentamiento=e.idenfrentamiento INNER JOIN versus v2 on v2.idenfrentamiento=e.idenfrentamiento  where p.codigo=:codigo and registro.idestudiante=:idestudiante and if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Siguiente'");
            $stmvalidarPartido->bindParam(":codigo",$codigo, PDO::PARAM_INT);
            $stmvalidarPartido->bindParam(":idestudiante",$idEstudiante, PDO::PARAM_INT);
            if ($stmvalidarPartido->execute() && $stmvalidarPartido->rowCount() > 0) {
                $partido=$stmvalidarPartido->fetch();
                $partidoDTO->setIdPartido($partido["idpartido"]);
                $partidoDTORes = $partidoDTO;
            }
        } catch (Exception $ex) {
            
        }
        return $partidoDTORes;
    }
    public function iniciarPartido(PartidoDTO $partidoDTO) {
        $exito = false;
        $codigoPartido = $partidoDTO->getCodigo();
        try {
            $this->conexion->beginTransaction();
            $stmGetPartidoInactivo = $this->conexion->prepare("select p.idpartido from partido p  where if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Registro' and p.codigo");
            $stmGetPartidoInactivo->bindParam(":codigo", $codigoPartido, PDO::PARAM_INT);
            if ($stmGetPartidoInactivo->execute() && $stmGetPartidoInactivo->rowCount() > 0) {
                $idPartido = $stmGetPartidoInactivo->fetch()["idpartido"];
                $stmGetRegistros= $this->conexion->prepare("select r.idregistro from registro r where r.idpartido=:idpartido");
                $stmGetRegistros->bindParam(":idpartido", $idPartido,PDO::PARAM_INT);
                if (!$stmGetRegistros->execute() || $stmGetRegistros->rowCount()<5) {
                    throw new Exception("Para finalizar la etapa de registro tienen que haber minimo 5 estudiantes registrados.");
                }
                $stmIniciarPartido = $this->conexion->prepare("UPDATE partido SET enjuego = true WHERE idpartido=:idpartido");
                $stmIniciarPartido->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
                if ($stmIniciarPartido->execute()) {
                    $exito = $this->conexion->commit();
                }
            }
            
            if (!$exito) {
                throw new Exception("Error al finalizar etapa de registro");
            }
        } catch (Exception $ex) {
            $this->conexion->rollBack();
            throw new Exception($ex->getMessage());
        }
        return $exito;
    }

    public function nuevaRonda(PartidoDTO $partidoDTO) {
        $exito = false;
        $codigoPartido = $partidoDTO->getCodigo();
        try {
            $this->conexion->beginTransaction();
            $stmGetPartidoInactivo = $this->conexion->prepare("select p.idpartido from partido p  where if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Pausa' and p.codigo");
            $stmGetPartidoInactivo->bindParam(":codigo", $codigoPartido, PDO::PARAM_INT);
            if ($stmGetPartidoInactivo->execute() && $stmGetPartidoInactivo->rowCount() > 0) {
                $idPartido = $stmGetPartidoInactivo->fetch()["idpartido"];
                $stmIniciarPartido = $this->conexion->prepare("UPDATE partido SET estaactivo = true WHERE idpartido=:idpartido");
                $stmIniciarPartido->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
                if ($stmIniciarPartido->execute()) {
                    $exito = $this->conexion->commit();
                }
            }
            if (!$exito) {
                throw new Exception("Error al iniciar nueva Ronda");
            }
        } catch (Exception $ex) {
            $this->conexion->rollBack();
        }
        return $exito;
    }
    
    
    
    
    
    
    
    
    public function segundaRonda($partidoDTO) {
        $idPartido = $partidoDTO->getIdPartido();
        $exito = false;
        try {
            $this->conexion->beginTransaction();
            $this->conexion->exec("set @c=0;");
            $stmGanadores = $this->conexion->prepare("select @c:=@c+1 'puesto', registro.idregistro,estudiante.nombre,if(puntaje.puntuacion is null,0,puntaje.puntuacion)puntuacion,if(puntaje.tpromedio is null,0,puntaje.tpromedio)tpromedio from registro INNER JOIN estudiante on estudiante.idestudiante=registro.idestudiante INNER JOIN partido on partido.idpartido=registro.idpartido LEFT JOIN (select partido.idpartido,registro.idregistro,sum(pun.puntaje)puntuacion,avg(pun.tiempopromedio)tpromedio from puntaje pun INNER JOIN registro on registro.idregistro=pun.idregistro INNER JOIN partido ON partido.idpartido=registro.idpartido GROUP BY pun.idregistro)puntaje on puntaje.idpartido=partido.idpartido and puntaje.idregistro=registro.idregistro WHERE partido.idpartido=:idpartido ORDER BY puntuacion DESC, tpromedio ASC, nombre ASC LIMIT 16");
            $stmGanadores->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);

            if (!$stmGanadores->execute() || $stmGanadores->rowCount() <= 0) {
                throw new Exception("No consiguio los 16 ganadores");
            }
            $ganadores = $stmGanadores->fetchAll();
            $puesto = 1;
//            foreach ($ganadores as $key => $ganador) {
//                $stmCambiarEstadoGanador = $this->conexion->prepare("UPDATE registro SET idestadoregistro=2 where idregistro=:idregistro");
//                $idRegistro = $ganador["idregistro"];
//                ($ganadores[$key])["puesto"] = $puesto;
//                $stmCambiarEstadoGanador->bindParam(":idregistro", $idRegistro, PDO::PARAM_INT);
//                if (!$stmCambiarEstadoGanador->execute()) {
//                    throw new Exception("Error al cambiar estado a los ganadores");
//                }
//                $puesto++;
//            }
//            $stmCambiarEstadoPerdedor = $this->conexion->prepare("UPDATE registro SET idestadoregistro=3 where idpartido=:idpartido and idestadoregistro=1");
//            $stmCambiarEstadoPerdedor->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
//            if (!$stmCambiarEstadoPerdedor->execute()) {
//                throw new Exception("Error al cambiar estado a perdedores");
//            }

            if (count($ganadores) <= 16 && count($ganadores) > 8) {

                $primerosUltimos = $this->sacarXPrimeros(8, $ganadores);
                $primeros8 = $this->ordenarExtremos($primerosUltimos[0]);
                $ultimos = $this->ordenarAleatorio($primerosUltimos[1]);
                $ultimos = $this->generarMatch($primeros8, $ultimos, 8);

                foreach ($primeros8 as $key => $value) {
                    if (isset($ultimos[$key])) {
                        $idRegistroUno = $value["idregistro"];
                        $idRegistroDos = ($ultimos[$key])["idregistro"];
                        $numeroUno = ($key + 1) * 2 - 2 + 1;
                        $numeroDos = ($key + 1) * 2 - 2 + 2;
                        $stmRegistrarPrimero = $this->conexion->prepare("insert into enfrentamiento (idregistro,idpartido,numero,ronda) values(:idregistro,:idpartido,:numero,1)");
                        $stmRegistrarPrimero->bindParam(":idregistro", $idRegistroUno, PDO::PARAM_INT);
                        $stmRegistrarPrimero->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
                        $stmRegistrarPrimero->bindParam(":numero", $numeroUno, PDO::PARAM_INT);
                        $stmRegistrarSegundo = $this->conexion->prepare("insert into enfrentamiento (idregistro,idpartido,numero,ronda) values(:idregistro,:idpartido,:numero,1)");
                        $stmRegistrarSegundo->bindParam(":idregistro", $idRegistroDos, PDO::PARAM_INT);
                        $stmRegistrarSegundo->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
                        $stmRegistrarSegundo->bindParam(":numero", $numeroDos, PDO::PARAM_INT);
                        if (!$stmRegistrarPrimero->execute() || !$stmRegistrarSegundo->execute()) {
                            throw new Exception("Error al registrar Enfrentamiento");
                        }
                    } else {

                        $idRegistro = $value["idregistro"];
                        $numeroUno = ($key + 1) * 2 - 2 + 1;
                        $numeroDos = $this->generarNumeroRonda($numeroUno);
                        $stmRegistrarPrimero = $this->conexion->prepare("insert into enfrentamiento (idregistro,idpartido,numero,ronda) values(:idregistro,:idpartido,:numero,1)");
                        $stmRegistrarPrimero->bindParam(":idregistro", $idRegistro, PDO::PARAM_INT);
                        $stmRegistrarPrimero->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
                        $stmRegistrarPrimero->bindParam(":numero", $numeroUno, PDO::PARAM_INT);
                        $stmRegistrarSegundo = $this->conexion->prepare("insert into enfrentamiento (idregistro,idpartido,numero,ronda) values(:idregistro,:idpartido,:numero,2)");
                        $stmRegistrarSegundo->bindParam(":idregistro", $idRegistro, PDO::PARAM_INT);
                        $stmRegistrarSegundo->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
                        $stmRegistrarSegundo->bindParam(":numero", $numeroDos, PDO::PARAM_INT);
                        if (!$stmRegistrarPrimero->execute() || !$stmRegistrarSegundo->execute()) {
                            throw new Exception("Error al registrar Enfrentamiento");
                        }
                    }
                }
            } else if (count($ganadores) <= 8 && count($ganadores) > 4) {

                $primerosUltimos = $this->sacarXPrimeros(4, $ganadores);
                $primeros8 = $this->ordenarExtremos($primerosUltimos[0]);
                $ultimos = $this->ordenarAleatorio($primerosUltimos[1]);
                $ultimos = $this->generarMatch($primeros8, $ultimos, 4);
                foreach ($primeros8 as $key => $value) {
                    if (isset($ultimos[$key])) {
                        $idRegistroUno = $value["idregistro"];
                        $idRegistroDos = ($ultimos[$key])["idregistro"];
                        $numeroUno = ($key + 1) * 2 - 2 + 1;
                        $numeroDos = ($key + 1) * 2 - 2 + 2;
                        $stmRegistrarPrimero = $this->conexion->prepare("insert into enfrentamiento (idregistro,idpartido,numero,ronda) values(:idregistro,:idpartido,:numero,2)");
                        $stmRegistrarPrimero->bindParam(":idregistro", $idRegistroUno, PDO::PARAM_INT);
                        $stmRegistrarPrimero->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
                        $stmRegistrarPrimero->bindParam(":numero", $numeroUno, PDO::PARAM_INT);
                        $stmRegistrarSegundo = $this->conexion->prepare("insert into enfrentamiento (idregistro,idpartido,numero,ronda) values(:idregistro,:idpartido,:numero,2)");
                        $stmRegistrarSegundo->bindParam(":idregistro", $idRegistroDos, PDO::PARAM_INT);
                        $stmRegistrarSegundo->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
                        $stmRegistrarSegundo->bindParam(":numero", $numeroDos, PDO::PARAM_INT);
                        if (!$stmRegistrarPrimero->execute() || !$stmRegistrarSegundo->execute()) {
                            throw new Exception("Error al registrar Enfrentamiento");
                        }
                    } else {
                        $idRegistro = $value["idregistro"];
                        $numeroUno = ($key + 1) * 2 - 2 + 1;
                        $numeroDos = $this->generarNumeroRonda($numeroUno);
                        $stmRegistrarPrimero = $this->conexion->prepare("insert into enfrentamiento (idregistro,idpartido,numero,ronda) values(:idregistro,:idpartido,:numero,2)");
                        $stmRegistrarPrimero->bindParam(":idregistro", $idRegistro, PDO::PARAM_INT);
                        $stmRegistrarPrimero->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
                        $stmRegistrarPrimero->bindParam(":numero", $numeroUno, PDO::PARAM_INT);
                        $stmRegistrarSegundo = $this->conexion->prepare("insert into enfrentamiento (idregistro,idpartido,numero,ronda) values(:idregistro,:idpartido,:numero,3)");
                        $stmRegistrarSegundo->bindParam(":idregistro", $idRegistro, PDO::PARAM_INT);
                        $stmRegistrarSegundo->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
                        $stmRegistrarSegundo->bindParam(":numero", $numeroDos, PDO::PARAM_INT);
                        if (!$stmRegistrarPrimero->execute() || !$stmRegistrarSegundo->execute()) {
                            throw new Exception("Error al registrar Enfrentamiento");
                        }
                    }
                }
            } else {
                throw new Exception("error al conseguir ganadores");
            }

            $stmSegundaRonda = $this->conexion->prepare("UPDATE partido SET enjuego = false,estaactivo=true WHERE idpartido=:idpartido ");
            $stmSegundaRonda->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);

            if (!$stmSegundaRonda->execute()) {
                throw new Exception("Error al cerrar partido");
            }

            $exito = $this->conexion->commit();
        } catch (Exception $ex) {
            $this->conexion->rollBack();
            echo $ex->getMessage();
            echo $ex->getTraceAsString();
        }
        return $exito;
    }

    private function generarNumeroRonda($actual) {
        $n = 0;
        if ($actual == 1 || $actual == 2) {
            $n = 1;
        } else if ($actual == 3 || $actual == 4) {
            $n = 2;
        } else if ($actual == 5 || $actual == 6) {
            $n = 3;
        } else if ($actual == 7 || $actual == 8) {
            $n = 4;
        } else if ($actual == 9 || $actual == 10) {
            $n = 5;
        } else if ($actual == 11 || $actual == 12) {
            $n = 6;
        } else if ($actual == 13 || $actual == 14) {
            $n = 7;
        } else if ($actual == 15 || $actual == 16) {
            $n = 8;
        }
        return $n;
    }

    private function ordenarAleatorio($arreglo) {
        $copiaArreglo = $arreglo;
        $nuevoOrden = [];
        foreach ($copiaArreglo as $value) {
            $aleatorio = array_rand($copiaArreglo, 1);
            $nuevoOrden[] = $copiaArreglo[$aleatorio];
            unset($copiaArreglo[$aleatorio]);
            $copiaArreglo = array_values($copiaArreglo);
        }
        return $nuevoOrden;
    }

    private function ordenarExtremos($arreglo) {
        $copiaArreglo = $arreglo;
        $arregloAux = [];
        for ($i = 0; $i < count($copiaArreglo) / 2; $i++) {
            $j = $i;
            if ($i == 1 && count($arreglo) == 8) {
                $j = 3;
            } else if ($i == 3 && count($arreglo) == 8) {
                $j = 1;
            }
            $arregloAux[] = $copiaArreglo[$j];
            $arregloAux[] = $copiaArreglo[(count($copiaArreglo) - ($i + 1))];
        }
        return $arregloAux;
    }

    private function sacarXPrimeros($x, $arreglo) {
        $nuevoArreglo = [];
        foreach ($arreglo as $key => $value) {
            if ($key < $x) {
                $nuevoArreglo[] = $value;
                unset($arreglo[$key]);
            }
        }

        $arreglo = array_values($arreglo);
        return [$nuevoArreglo, $arreglo];
    }

    private function generarMatch($primerosX, $ultimos, $x) {
        $arregloAux1 = $primerosX;
        $arregloAux2 = [];
        foreach ($ultimos as $key => $value) {
            foreach ($arregloAux1 as $key2 => $value2) {
                if ($value2["puesto"] > ($x - count($ultimos))) {
                    $arregloAux2[$key2] = $value;
                    unset($arregloAux1[$key2]);
                    break;
                }
            }
        }
        return $arregloAux2;
    }

    public function getPartidoPrimeraRondaActivoCodigo($partidoDTO) {
        $exito = false;
        $codigo = $partidoDTO->getCodigo();
        try {
            $stmGetPartidoActivo = $this->conexion->prepare("select p.idpartido from partido p where if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Pausa'");
            $stmGetPartidoActivo->bindParam(":codigo", $codigo, PDO::PARAM_INT);
            if ($stmGetPartidoActivo->execute() && $stmGetPartidoActivo->rowCount() > 0) {
                $partidoDTO->setIdPartido($stmGetPartidoActivo->fetch()["idpartido"]);
                $exito = true;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        return $exito;
    }

    public function getCodigoPartido($partidoDTO) {
        $idPartido = $partidoDTO->getIdPartido();
        $exito = false;
        try {
            $stmGetCodigo = $this->conexion->prepare("select codigo from partido where idpartido=:idpartido");
            $stmGetCodigo->bindParam(":idpartido", $idPartido, PDO::PARAM_INT);
            if ($stmGetCodigo->execute() && $stmGetCodigo->rowCount() > 0) {
                $codigo = $stmGetCodigo->fetch()["codigo"];
                $partidoDTO->setCodigo($codigo);
                $exito = true;
            }
        } catch (Exception $ex) {
            
        }
        return $exito;
    }

    
    
    
    public function finalizarRonda(PartidoDTO $partidoDTO) {
        $codigo=$partidoDTO->getCodigo();
        $exito=false;
        try {
            $this->conexion->beginTransaction();
            $stmFinalizarRonda= $this->conexion->prepare("UPDATE partido p set p.numerorondas=p.numerorondas+1,p.estaactivo=false where p.codigo=:codigo and if(not p.finalizado,if(not p.enjuego and not p.estaactivo,'Registro',if(p.enjuego and not p.estaactivo,'Pausa',if(p.estaactivo and not p.enjuego,'Siguiente','Jugando'))),'Finalizado')='Jugando'");
            $stmFinalizarRonda->bindParam(":codigo", $codigo,PDO::PARAM_INT);
            if (!$stmFinalizarRonda->execute() || $stmFinalizarRonda->rowCount()<1) {
                throw new Exception("Error al cerrar la ronda. Intentalo de nuevo.");
            }
            $stmGetIdPartido= $this->conexion->prepare("select idpartido from partido where codigo=:codigo");
            $stmGetIdPartido->bindParam(":codigo", $codigo,PDO::PARAM_INT);
            if (!$stmGetIdPartido->execute() || $stmGetIdPartido->rowCount()<1) {
                throw new Exception("Error al cerrar ronda. Intentelo de nuevo. Obtener Grupo.");
            }
            $idPartido=$stmGetIdPartido->fetch()["idpartido"];
            $stmGetRegistros= $this->conexion->prepare("select estudiante.idregistro,if(isnull(puntaje.correctas),0,puntaje.correctas)correctas,if(isnull(puntaje.promediorespuesta),0,puntaje.promediorespuesta)promediorespuesta from (select estudiante.nombre,registro.idregistro,partido.idpartido,partido.codigo from registro INNER JOIN partido on partido.idpartido=registro.idpartido INNER JOIN estudiante on estudiante.idestudiante=registro.idestudiante)estudiante left join (select partido.idpartido,partido.codigo,respuesta.idregistro,count(if(respuesta.correcta,1,null))correctas,avg(UNIX_TIMESTAMP(respuesta.fecharegistro)-UNIX_TIMESTAMP(pregunta.fecharegistro))promediorespuesta from respuesta INNER JOIN registro on registro.idregistro=respuesta.idregistro INNER JOIN partido on partido.idpartido=registro.idpartido INNER JOIN pregunta ON pregunta.idpartido=partido.idpartido and pregunta.idpregunta=respuesta.idpregunta INNER JOIN estadopregunta on estadopregunta.idestadopregunta=pregunta.idestadopregunta  INNER JOIN estudiante ON estudiante.idestudiante=registro.idestudiante  where estadopregunta.descripcion='cerrada' and pregunta.activo GROUP BY registro.idregistro ORDER By correctas DESC)puntaje on puntaje.idregistro=estudiante.idregistro and puntaje.idpartido=estudiante.idpartido and puntaje.codigo=estudiante.codigo where estudiante.codigo=:codigo ORDER BY correctas DESC, promediorespuesta ASC,estudiante.nombre ASC");
            $stmGetRegistros->bindParam(":codigo", $codigo,PDO::PARAM_INT);
            if($stmGetRegistros->execute() && $stmGetRegistros->rowCount()>0){
                $registros=$stmGetRegistros->fetchAll();
                foreach ($registros as $registro) {
                    $idRegistro=$registro["idregistro"];
                    $puntaje=intval($registro["correctas"]);
                    $promedio= floatval($registro["promediorespuesta"]);
                    $stmInsertPuntaje= $this->conexion->prepare("insert into puntaje(idregistro,puntaje,tiempopromedio) values(:idregistro,:puntaje,:tiempopromedio)");
                    $stmInsertPuntaje->bindParam(":idregistro", $idRegistro,PDO::PARAM_INT);
                    $stmInsertPuntaje->bindParam(":puntaje", $puntaje,PDO::PARAM_INT);
                    $stmInsertPuntaje->bindParam(":tiempopromedio", $promedio);
                    
                    if(!$stmInsertPuntaje->execute() || $stmInsertPuntaje->rowCount()<1){
                        throw new Exception("Error al cerrar la ronda. Actualizar puntajes.");                                                                                                        
                    }
                }
            }
            $stmSetPreguntas= $this->conexion->prepare("UPDATE pregunta p SET p.activo=false where p.idpartido=:idpartido and p.activo");
            $stmSetPreguntas->bindParam(":idpartido", $idPartido,PDO::PARAM_INT);   
            if (!$stmSetPreguntas->execute() || $stmSetPreguntas->rowCount()<1) {
                throw new Exception("Error al cerrar la ronda. Intentalo de nuevo. Cerrar preguntas.");
            }
            
            $exito= $this->conexion->commit();
            
        } catch (Exception $ex) {
            $this->conexion->rollBack();
            throw new Exception($ex->getMessage());
           
        }
        return $exito;
    }
    
    
}
