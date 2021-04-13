<?php

class ControllerLogin {

    
    
    public function loginEstudiante($codigo,$contrasenia) {
        require_once RAIZ.'Model/DTO/EstudianteDTO.php';
        $estudianteDTO=new EstudianteDTO(null, null, $codigo, $contrasenia, null,null);
        
        return Business::loginEstudiante($estudianteDTO);
        
    }
    
    
}
