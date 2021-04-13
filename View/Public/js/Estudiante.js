import {unirsePartida} from "../js/Metodos.js";


$(()=>{
   
    $("#btnUnirsePartida").on("click",(e)=>{
       e.preventDefault();
      let codigo= $("#inputCodigoPartida").val();
        if(unirsePartida(codigo)){
            location.reload();
        }else{
            
        }
        
        
    });
    
});