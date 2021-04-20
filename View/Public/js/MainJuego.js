import {loginEstudiante} from "../js/Metodos.js";
var readGet = function () {
  var query_string = {};
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = decodeURIComponent(pair[1]);
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
      query_string[pair[0]] = arr;
    } else {
      query_string[pair[0]].push(decodeURIComponent(pair[1]));
    }
  }
  return query_string;
}(); 
$(() => {

    if (readGet.n !=undefined && readGet.s!=undefined && readGet.p!=undefined) {
        let id=readGet.n;
        let sede=readGet.s;
        let puntaje=readGet.p;
        let puntajeMaximo=readGet.pm;
        $("#imgCastillo").prop("src",`View/Public/img/castillo${id}.png`);
        $("#lblPuntajeInicio").html(puntaje);
        $("#lblPuntajeFinal").html(puntajeMaximo);
        $("#lblSedeInicio").html("Castillo "+sede);
        $("#lblPuntajeInicio-sm").html(puntaje);
        $("#lblSedeInicio-sm").html("Castillo "+sede);
        
    }else{
        document.location= "Inicio";
    }


    $("#btnLoginEstudiante").on("click", (e) => {
        e.preventDefault();  
              login();
        
    });
    
    $("#inputContraseñaLoginEstudiante").on("keypress",(e)=>{
        if (e.which == 13) {
            login();
        } 
    });
    function login(){
        let usuario=$("#inputUsuarioLoginEstudiante").val();
        let contrasenia=$("#inputContraseñaLoginEstudiante").val();
      let exito=loginEstudiante(usuario,contrasenia);
            if(exito[0]){
            document.location= "InicioEstudiante";
        }else{
             $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Informativo !',
                        body: exito[1]
                    });
        } 
        
        
    }
});