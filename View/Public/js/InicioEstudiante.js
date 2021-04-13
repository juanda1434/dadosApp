$(() => {

    let estadoActualizar = "1";
    
    function getRegistro() {
        $.get("GET/EstadoRegistro", (r) => {
            console.log(r)
            let tipoBoton = 1;
            let btn = "";
            let panel = `<div class='col-12 text-white  text-center'>Ingresa el codigo que te de tu profesora. </div><div class="col-12 input-group mb-3 mt-3"  >
           
                                    <input id="inputCodigoPartida" type="number" class="form-control" placeholder="Codigo Partida">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-keyboard"></i>
                                        </div>
                                    </div>
                                </div>
                                `;
            let actualizar = false;
            if (r.exito != undefined && r.exito) {
                if (r.estadoRegistro != undefined && Object.keys(r.estadoRegistro).length > 0) {
                    let nombre = r.estadoRegistro["nombre"];
                    let sede = r.estadoRegistro["sede"];
                    let idSede = r.estadoRegistro["idsede"];
                    let puntaje = r.estadoRegistro["puntajeSede"];
                    let estado = "";
                    if (Object.keys(r.estadoRegistro).length > 4) {
                        estado = r.estadoRegistro["estado"];
                        let grado = r.estadoRegistro["grado"];
                        let codigo = r.estadoRegistro["codigo"];
                        btn = estado == "Jugando" ? `<div class="col-12 col-md-4 mb-2 mt-1">
                               <a id="btnAbrirPartido" href="RondaUno?codigo=${codigo}" role="button" class="btn btn-dark btn-block text-center"><i class="fas fa-play fa-lg "></i> <b class="ml-2"> Jugar </b></a>
                            </div><div class="col-12 col-md-4 mb-2">
                               <a href="#" role="button" class="disabled btn btn-dark btn-block text-center"><i class="fas fa-play fa-lg "></i> <b class="ml-2">Puntuacion</b></a>
                            </div>` :
                                estado == "Pausa" ? `<div class="col-12 col-md-4 mb-2 mt-1">
                               <a id="btnAbrirPartido" href="#" role="button" class="disabled btn btn-dark btn-block text-center"><i class="fas fa-play fa-lg "></i> <b class="ml-2"> Jugar </b></a>
                            </div><div class="col-12 col-md-4 mb-2">
                               <a href="PuntajeGrupo?codigo=${codigo}" role="button" class=" btn btn-dark btn-block text-center"><i class="fas fa-play fa-lg "></i> <b class="ml-2">Puntuacion</b></a>
                            </div>` :
                                estado == "Registro" ? `<div class="col-12 col-md-4 mb-2 mt-1">
                               <a id="btnAbrirPartido" href="#" role="button" class="disabled btn btn-dark btn-block text-center"><i class="fas fa-play fa-lg "></i> <b class="ml-2"> Jugar </b></a>
                            </div><div class="col-12 col-md-4 mb-2">
                               <a href="#" role="button" class="disabled btn btn-dark btn-block text-center"><i class="fas fa-play fa-lg "></i> <b class="ml-2">Puntuacion</b></a>
                            </div>` :
                                estado == "Siguiente" && r.estadoRegistro["activo"] != undefined ? `<div class="col-12 col-md-4 mb-2 mt-1">
                              <a id="btnAbrirPartido" href="Enfrentamiento?codigo=${codigo}" role="button" class="btn btn-dark btn-block text-center"><i class="fas fa-play fa-lg "></i> <b class="ml-2">Jugar</b></a>
                            </div>` : `<div class="col-12 col-md-4 mb-2 mt-1">
                               <a id="btnAbrirPartido" href="#" role="button" class="disabled btn btn-dark btn-block text-center"><i class="fas fa-play fa-lg "></i> <b class="ml-2"> Jugar </b></a>
                            </div><div class="col-12 col-md-4 mb-2 ">
                               <a href="#" role="button" class="disabled btn btn-dark btn-block text-center"><i class="fas fa-play fa-lg "></i> <b class="ml-2">Puntuacion</b></a>
                            </div>`;
                        let informacion = estado == "Jugando" ? `Puedes jugar entra a la partida.` : estado == "Pausa" ? `Puedes revisar tu puntuacion !` : ``;
                        panel = `
                                    <ul class="list-group list-group-unbordered mt-0">
                                        <li style="background-color: rgba(0,0,0,0)" class="list-group-item text-white">
                                            <b>Grupo</b> <a class="float-right ">${grado}</a>
                                        </li>
                       
                                    </ul>
                                    `;
                    } else {
                        estado = "";
                        btn = `<div class="col-12 col-md-4 mb-2 mt-1">
                                    <a id="btnUnirsePartida" href="#" role="button" class="btn btn-dark btn-block text-center"><i class="fas fa-play fa-lg "></i> <b class="ml-2">Unirse</b></a>
                                </div>`;
                    }
                    if (estado != estadoActualizar) {
                        $("#lblNombreEstudiante").html(nombre);
                        $("#lblSedeInicio").html("Castillo " + sede);
                        $("#lblPuntajeInicio").html(puntaje);
                        $("#lblSedeInicio-sm").html("Castillo " + sede);
                        $("#lblPuntajeInicio-sm").html(puntaje);
                        
    $("#imgCastillo").prop("src",`View/Public/img/castillo${idSede}.png`);
                        estadoActualizar=estado;
                        actualizar=true;
                    }

                }
            }
            if (actualizar) {
                btn += `<div class="col-12 col-md-4 mb-2">
                                <a  href="Practica" role="button" class="btn btn-dark btn-block"><b>Practica</b></a>
                            </div><div class="col-12 col-md-4">
                                <a  href="Logout" role="button" class="btn btn-dark btn-block"><b>Salir</b></a>
                            </div>`;
            $("#panelBotones").html(btn);
            $("#panelInicioEstudiante").html(panel);
            onUnirsePartida();
            actualizar=false;
            }
            
            

            setTimeout(() => {
                getRegistro();
            }, 3500);
        }, "json");

    }

    getRegistro();


    function onUnirsePartida() {
        $("#btnUnirsePartida").off("click");
        $("#btnUnirsePartida").on("click", (e) => {
            e.preventDefault();
            let codigo = $("#inputCodigoPartida").val();
            $.post("POST/UnirsePartida", {codigo: codigo}, (r) => {
                console.log(r);
                if (r.exito != undefined && r.exito) {
                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'Informativo !',
                        body: 'Te uniste al grupo!'
                    });
                    getRegistro();
                } else if (r.error != undefined) {
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Informativo !',
                        body: r.error
                    });
                }
            }, "json");
        })
    }


let interval=setInterval(()=>{
    $.post("POST/ActualizarEstado",{actualizar:true},(r)=>{
        if (r.exito!=undefined && !r.exito) {
            document.location = "Inicio";    
}
    });
},5000);

interval;

});