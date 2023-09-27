import {loginEstudiante, registroEs} from "../js/Metodos.js";
function login(){    
    let name = document.getElementById("name").value;
    let pass = document.getElementById("pass").value;
    let code = document.getElementById("code").value;
    let sede = document.querySelector("select[id=sede]").value;
    if (!name || !pass || !code || !sede){
        $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Informativo !',
            body: "Debe ingresar todos los valores"
        });
        return;
    }
    let exito = registroEs(name,pass,code,sede);
        if(exito[0]){
            $(document).Toasts('create', {
                class: 'bg-success',
                title: 'Informativo !',
                body: "Se ha registrado de manera exitosa!"
            });
    }else{
         $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Informativo !',
                    body: exito[1]
                });
    } 
    
    
}

document.getElementById("btnRegistro").onclick = ()=>{    
    login();
}