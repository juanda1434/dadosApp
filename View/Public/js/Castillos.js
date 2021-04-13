$(()=>{
   
    $.get("GET/SedesGrados",(r)=>{
        
        if (r.sedes!=undefined) {
           let castillos="";
            for (var key in r.sedes) {
                let c=(r.sedes)[key];
                let castillo=`<div class="login-box col-10 col-md-6 col-lg-3 ">
            <div  class="card mb-0 shadow-none"  style="background-color: rgba(22,22,22,0);">
                
                
                <div class="card-body  col-12 row justify-content-center"  style="background-color: rgba(0,0,0,0);">
                    <div class="col-12 row  justify-content-center">
                        <div class="col-12 row align-content-center" >
                     <img src="View/Public/img/castillo${c.id}.png" class="img-fluid col-12" alt="alt"/>
                </div>
                        <div class="col-12 col-lg-10 align-self-end text-center " style="background-color:rgba(28,86,84,0.35);position: absolute ;">
                            <h4 class=" text-white" style="border-bottom: 1px solid rgba(255,255,255,0.5)">Castillo ${c.sede}</h4>
                            <h5 class=" text-white" ">Puntos: ${c.puntaje}</h5>
                    </div>
                
                    </div>
                    <div class="col-6 ">
                                <a href="LoginE?n=${c.id}&s=${c.sede}&p=${c.puntaje}" href="" role="button" class="btn btn-dark btn-block">Entrar</a>
                            </div>
                    </div>
                </div>
            </div>`;
                castillos+=castillo;
            }
            
            $("#panelCastillos").html(castillos);
}
        
        
        
        
    },"json");
    
});

