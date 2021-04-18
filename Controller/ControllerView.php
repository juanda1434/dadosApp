<?php

class ControllerView{
    
    public function getView($location) {
        
        return (new Business())->getView($location);
        
    }
    
    
    
}

