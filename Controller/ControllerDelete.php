<?php


class ControllerDelete {

    
    
    public function borrarPartido($codigo) {
        require_once RAIZ.'Model/Business.php';
        require_once RAIZ.'Model/DTO/PartidoDTO.php';
        require_once RAIZ.'Model/DTO/SedeDTO.php';
        require_once RAIZ.'Model/DTO/GradoDTO.php';
        $partidoDTO=new PartidoDTO(null, $codigo, null, null, new SedeDTO(null, null),new GradoDTO(null, null), null, null, null,null);
        return (new Business())->borrarPartido($partidoDTO);
        
        
    }
}
