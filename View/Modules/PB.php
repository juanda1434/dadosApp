<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Institucion Educativa Colegio Santos Apostoles</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="View/Public/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="View/Public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="View/Public/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="View/Public/css/braket.css">
        <style>
            .container-game{
                border: black 1px solid;
            }
            .container-numeros{
                border: black 3px solid;
                background-color: #303f9f;
            }
            .card-footer.container-numeros{
                border-top: black 0px solid;
                background-color: #3f51b5;
            }
            .numero{
                border: black 4px solid;
                font-size: 22px;
                background-color: #bbdefb;
            }

            .numero.activo{
                background-color: #ffccbc;
            }
            .numero.inactivo{
                background-color: #e6ee9c ;
            }
            body{
                background-color: #e9ecef;
            }

            .brand-image.img-circle{
                height: 53px!important;
            }

            nav {
                background-color: #133163!important;
            }
            footer.bg-navy{
                background-color: #133163!important;
            }

        </style>
    </head>
    <body class="hold-transition layout-top-nav" >
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand-md navbar-dark ">
                <div class="container">
                    <a href="PB" class="navbar-brand">
                        <img src="View/Public/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle  elevation-3"
                             >
                        <span class="brand-text font-weight-light">Colegio Santos Apostoles</span>
                    </a>

                    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="Grupos" class="nav-link">Volver</a>
                            </li>

                        </ul>


                    </div>


                </div>
            </nav>
            <div class="content-wrapper">

                <div class="container ">
                    <div class="row justify-content-center">



                        <div class=" row col-12 col-lg-6 justify-content-center mt-5">
                            <div class="login-box col-12 col-lg-9">

                                <!-- /.login-logo -->
                                <div class="card ">
                                    <div class="card-header text-center ">
                                        <h2><b id="lblNombre1">Nombre niño</b> </h2>

                                    </div>
                                    <div  class="card-body login-card-body">       

                                        <div  class="row">
                                            <div class="col-12 p-0 " >
                                                <div class="col-12">
                                                    <ul class="list-group list-group-unbordered mb-3">
                                                        <li class="list-group-item">
                                                            <b>Puntaje</b> <a class="float-right"><span id="lblPuntaje1">Selecciona enfrentamiento</span></a>
                                                        </li>

                                                        <li class="list-group-item">
                                                            <b>Sede </b> <a class="float-right"><span id="lblSede1">Selecciona un enfrentamiento</span></a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Grupo </b> <a class="float-right"><span id="lblGrupo1">Selecciona un enfrentamiento</span></a>
                                                        </li>
                                                    </ul>
                                                </div>



                                            </div>

                                            <!-- /.col -->

                                            <!-- /.col -->
                                        </div>



                                    </div>
                                    <div class="card-footer">
                                        <div class="row justify-content-center">

                                            <div id="contenedorpadre1" class="row p-0 ">
                                                <div class="col-12 p-0 " id="container1">


                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.login-card-body -->
                                </div>
                            </div>

                        </div>






                        <div class=" row col-12 col-lg-6 justify-content-center mt-5">
                            <div class="login-box col-12 col-lg-9">

                                <!-- /.login-logo -->
                                <div class="card ">
                                    <div class="card-header text-center ">
                                        <h2><b id="lblNombre2">Nombre niño</b> </h2>

                                    </div>
                                    <div  class="card-body login-card-body">       

                                        <div  class="row">
                                            <div class="col-12 p-0 " >
                                                <div class="col-12">
                                                    <ul class="list-group list-group-unbordered mb-3">
                                                        <li class="list-group-item">
                                                            <b>Puntaje</b> <a class="float-right"><span id="lblPuntaje2">Selecciona enfrentamiento</span></a>
                                                        </li>

                                                        <li class="list-group-item">
                                                            <b>Sede </b> <a class="float-right"><span id="lblSede2">Selecciona enfrentamiento</span></a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Grupo </b> <a class="float-right"><span id="lblGrupo2">Selecciona enfrentamiento</span></a>
                                                        </li>

                                                    </ul>
                                                </div>



                                            </div>

                                            <!-- /.col -->

                                            <!-- /.col -->
                                        </div>



                                    </div>
                                    <div class="card-footer">
                                        <div class="row justify-content-center">
                                            <div id="contenedorpadre2" class="row p-0 ">
                                                <div class="col-12 p-0 " id="container2">


                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.login-card-body -->
                                </div>
                            </div>

                        </div>









                        <div class=" row col-12 col-lg-6 justify-content-center mt-5">
                            <div class="login-box col-12 col-lg-9">

                                <!-- /.login-logo -->
                                <div class="card ">
                                    <div class="card-header text-center ">
                                        <h2><b>Panel Control</b> </h2>

                                    </div>
                                    <div  class="card-body login-card-body">       

                                        <div  class="row">
                                            <div class="col-12 p-0 " >
                                                <div class="col-12">
                                                    <ul class="list-group list-group-unbordered mb-3">
                                                        <li class="list-group-item">
                                                            <b>Codigo de sala</b> <a class="float-right"><span id="lblCodigoSala">Cargando ...</span></a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Ronda Seleccionada</b> <a class="float-right"><span id="lblRonda">Esperando...</span></a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Enfrentamiento #</b> <a class="float-right"><span id="lblNumeroRonda">Esperando...</span></a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Tiempo</b> <a class="float-right"><span id="lblTiempo">Inicia enfrentamiento ...</span></a>
                                                        </li>

                                                    </ul>
                                                </div>



                                            </div>

                                            <!-- /.col -->

                                            <!-- /.col -->
                                        </div>



                                    </div>
                                    <div class="card-footer">
                                        <div class="row justify-content-center">

                                            <div class="col-6 mt-3 row justify-content-center">
                                                <button id="btnIniciarRuleta" type="button" class="btn btn-info btn-flat disabled"><i class="fas fa-paper-plane "></i> Enviar numero</button>
                                            </div>
                                            <div class="col-6 mt-3 row justify-content-center">
                                                <button id="btnSaltarPartida" type="button" class="btn btn-info btn-flat disabled"><i class="fas fa-paper-plane "></i> Saltar numero</button>
                                            </div>

                                            <div class="col-6 mt-3 row justify-content-center">
                                                <button id="btnFinalizarEnfrentamiento" type="button" class="btn btn-info btn-flat disabled"><i class="fas fa-paper-plane "></i> Finalizar Enfrentamiento</button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.login-card-body -->
                                </div>
                            </div>

                        </div>
                        <div class="row col-12 col-lg-6 justify-content-center mt-lg-5">
                            <div class="login-box">

                                <!-- /.login-logo -->
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h3><b id="numeroLlegar">Esperando Iniciar Partida</b></h3>

                                    </div>
                                    <div  class="card-body  pt-0 pb-0 pl-2 pr-2">       

                                        <div class="row p-4 container-numeros" id="container-numeros"> 


                                        </div>


                                    </div>

                                    <div class="card-footer container-numeros p-2">
                                        <div id="contenedorpadre" class="row">
                                            <div class="col-12 p-0" id="container">


                                            </div>

                                        </div> 
                                    </div>
                                    <!-- /.login-card-body -->
                                </div>
                            </div>
                        </div>

                        <div id="panelCuadro" class="card row col-12 justify-content-center mt-lg-5" style="background-color: #f4f9f9;">
                            <div class="row col-12">
                                <div class="containerB col-12">
                                    <h1>Cuadro Torneo</h1>
                                    <h2>Enfrentamientos</h2>
                                    <div id="panelEnfrentamientos" class="tournament-bracket tournament-bracket--rounded">

                                    </div>
                                </div>



                            </div>
                        </div>
                    </div> 

                </div>


            </div>


            <footer class="main-footer bg-navy">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Desarrollado por <a href="https://facebook.com/Devidsft">Devidsft</a>
                </div>
                <!-- Default to the left -->
                <strong><div class="d-none d-lg-inline">CalcuDados </div>  <a href="https://colsantosapostoles.edu.co/web/"> Institucion Educativa Colegio Santos Apostoles</a></strong>
            </footer>

        </div>




        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="View/Public/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="View/Public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="View/Public/dist/js/adminlte.min.js"></script>
        <script src="https://unpkg.com/konva@7.2.2/konva.min.js"></script>
        <script src="View/Public/plugins/moment/moment.min.js"></script>

        <script src="View/Public/plugins/moment/moment-timezone-with-data.js"></script>
        <script src="View/Public/js/Cuadros.js"></script>
        <script src="View/Public/js/CargarCampo1.js"></script>
        <script>

            var readGet = function () {
                var query_string = {};
                var query = window.location.search.substring(1);
                var vars = query.split("&");
                for (var i = 0; i < vars.length; i++) {
                    var pair = vars[i].split("=");
                    if (typeof query_string[pair[0]] === "undefined") {
                        query_string[pair[0]] = decodeURIComponent(pair[1]);
                    } else if (typeof query_string[pair[0]] === "string") {
                        var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
                        query_string[pair[0]] = arr;
                    } else {
                        query_string[pair[0]].push(decodeURIComponent(pair[1]));
                    }
                }
                return query_string;
            }();
            cuadro(readGet.codigo);

            $("#lblCodigoSala").html(readGet.codigo);

            var tablaNumeros = [];
            var tablaNumeros2 = [];
            var numerosSeleccionados = {1: -1, 2: -1, 3: -1, 4: -1};
            var numeroElegido = -1;
            var numeros = [];
            var imgDados = [];
            var app = {niñosUnidos: 0, enjuego: true, codigoSala: "", estaRuleta: false, fechaFin: null};
            $(() => {
                app.codigoSala = readGet.codigo;
                var serverDate;
                var serverOffset;
                $.get("GET/Time", function (data) {
                    // server returns a json object with a date property.
                    serverDate = data.date * 1000;
                    serverOffset = moment(serverDate).tz("America/Bogota").diff(new Date());
                }, "json");

                function now() {
                    return moment().tz("America/Bogota").add(serverOffset, 'milliseconds');
                }

                $("#btnIniciarRuleta").on("click", (e) => {
                    if (!app.estaRuleta && numeroElegido == -1 && app.enjuego) {
                        activeButton($("#btnIniciarRuleta"), false);
                        activeButton($("#btnFinalizarRonda"), false);
                        app.estaRuleta = true;
                    }
                });

                $("#btnFinalizarEnfrentamiento").on("click", (e) => {

                    if (!app.estaRuleta && numeroElegido == -1 && app.enjuego) {
                        activeButton($("#btnIniciarRuleta"), false);
                        $.post("POST/FinalizarEnfrentamiento", {codigo: app.codigoSala}, (r) => {
                            console.log(r);
                            if (r.exito != undefined && r.exito) {
                                $(document).Toasts('create', {
                                        class: 'bg-success',
                                        title: 'Informativo!',
                                        body: 'Has finalizado el enfrentamiento.'
                                    });
                                    cuadro(readGet.codigo);
                            }else if(r.error !=undefined){
                                 $(document).Toasts('create', {
                                        class: 'bg-warning',
                                        title: 'Informativo!',
                                        body: r.error
                                    });
                            }
                        },"json");

                    }

                });




                activarTabla();
                $("#btnSaltarPartida").on("click", () => {
                    if (!app.estaRuleta && app.enjuego && numeroElegido != -1) {
                        $.ajax({
                            url: "POST/SaltarNumero",
                            method: "POST",
                            data: {codigo: app.codigoSala}, dataType: "json"


                        }).done((r) => {
                            console.log(r);
                            if (r.exito != undefined && r.exito) {
                                $(document).Toasts('create', {
                                    class: 'bg-success',
                                    title: 'Informativo!',
                                    body: 'Acabas de saltar un numero, puedes enviar otro !'
                                });
                                getEstadoPartido();
                                activeButton($("#btnSaltarPartida"));
                                numerosSeleccionados = {1: -1, 2: -1, 3: -1, 4: -1};
                                numeroElegido = -1;
                                app.fechaFin = null;
                                llenarDados();
                                debesLlegar();
                            } else {

                            }
                        });
                    }


                });



                let llenarTabla = "";
                for (let i = 0; i < 15; i++) {
                    tablaNumeros[i] = i + 1;
                    tablaNumeros2[i] = i + 1;
                    let activo = i == 5 ? "" : "";
                    llenarTabla += `<div id="${(i + 1)}cuadrado" class="col-4 text-center p-3 numero ${activo}">

                            <b >${(i + 1)}</b>
                        </div>`;
                }

                $("#container-numeros").html(llenarTabla);

                $("#btnCrearPartida").on("click", (r) => {
                    if (!app.enjuego && app.codigoSala == "") {
                        $.post("POST/RegistrarPartido", {crearPartida: true}, (r) => {
                            console.log(r);
                            getEstadoPartido();
                        });
                    }
                });


                function cronometro() {
                    setTimeout(() => {
                        let aux = pasarSegundo();
                        if (aux > 0) {
                            $("#lblTiempo").html(aux);
                            cronometro();
                        } else {
                            $.ajax({
                                url: "POST/CerrarPregunta",
                                method: "POST",
                                data: {codigo: app.codigoSala}, dataType: "json"


                            }).done((r) => {
                                console.log(r);
                                if (r.exito != undefined && r.exito) {
                                    $(document).Toasts('create', {
                                        class: 'bg-success',
                                        title: 'Informativo!',
                                        body: 'Se ha acabado el tiempo para responder, puedes enviar otro numero.'
                                    });
                                    $("#lblTiempo").html("esperando...");
                                    numerosSeleccionados = {1: -1, 2: -1, 3: -1, 4: -1};
                                    numeroElegido = -1;
                                    app.fechaFin = null;
                                    llenarDados();
                                    debesLlegar();
                                    getEstadoPartido();

                                }



                            });

                        }
                    }, 1000);


                }
                function pasarSegundo() {
                    return app.fechaFin !== null ? app.fechaFin.unix() - now().unix() : 0;
                }


                function getEstadoPartido() {
                    $.get("GET/PartidoActivoEnfrentamiento/codigo=" + app.codigoSala, (r) => {
                        console.log(r);
                        if (r.exito != undefined && !r.exito) {
                            if (app.codigoSala != "") {


                            } else {

                            }


                        } else {
//                            $("#lblCodigoSala").html(app.codigoSala);
//                            $("#lblEstadoSala").html(`En Juego`);
//                            $("#lblCantidadNiñosUnidos").html(0);

                            if (r.preguntaactiva != undefined && Object.keys(r.preguntaactiva).length > 0) {

                                numerosSeleccionados = {1: r.preguntaactiva["dadouno"], 2: r.preguntaactiva["dadodos"], 3: r.preguntaactiva["dadotres"], 4: r.preguntaactiva["dadocuatro"]}
                                numeroElegido = r.preguntaactiva["numero"] - 1;
                                llenarDados();
                                debesLlegar();
                                activeButton($("#btnIniciarRuleta"), false);
                                activeButton($("#btnSaltarPartida"), true);
                                app.fechaFin = moment(r.preguntaactiva["fechados"], "YYYY-MM-DD hh:mm:ss");
                                cronometro();
                            } else {
                                activeButton($("#btnIniciarRuleta"), true);
                                activeButton($("#btnSaltarPartida"), false);
                            }
                            if (r.preguntasresueltas != undefined && r.preguntasresueltas.length > 0) {
                                let PreguntasResueltas = r.preguntasresueltas;
                                $("#lblTotalJugado").html(PreguntasResueltas.length)
                                tablaNumeros = tablaNumeros2;
                                for (var i = 0; i < PreguntasResueltas.length; i++) {
                                    let activo = $(`#${PreguntasResueltas[i]}cuadrado`);
                                    activo.removeClass("activo");
                                    activo.addClass("inactivo");
                                    for (var j = 0; j < tablaNumeros.length; j++) {
                                        if (tablaNumeros[j] == PreguntasResueltas[i]) {
                                            tablaNumeros.splice(j, 1);
                                            break;
                                        }

                                    }
                                }
                            }




                            //getTablaPuntuaciones(app.codigoSala);

                        }
                    }, "json");
                }

                function actu1() {
                    return new Promise(r => {
                        setTimeout(() => {
                            if (actualizar) {
                                actualizar = false;                               
                                numerosSeleccionados = {1: -1, 2: -1, 3: -1, 4: -1};
                                numeroElegido = -1;
                                app.fechaFin = null;
                                llenarDados();
                                debesLlegar();
                                getEstadoPartido();
                            }
                            r(actu1());
                        }, 2000);
                    })
                }
                async function actu(){
                    await actu1();
                }
                actu();

                        getEstadoPartido();

//                var timeoutPuntuaciones = null;
//                function getTablaPuntuaciones(codigoSala) {
//                    if (codigoSala != "") {
//                        $.get("GET/PuntajesPrimeraRonda/codigo=" + codigoSala, (r) => {
//                            //console.log(r);
//                            let listPuntajes = `<li class="list-group-item">
//                                                            <b>Nombre</b> <a class="float-right"><b>Puntaje</b></a>
//                                                        </li>
//                                                        `;
//                            let cantidadNiños = 0;
//                            for (var key in r) {
//                                cantidadNiños++;
//                                listPuntajes += `<li class="list-group-item">
//                                                           ${r[key].nombre} <a class="float-right">${r[key].puntaje}</a>
//                                                        </li>`;
//                            }
//                            $("#listPuntajes").html(listPuntajes);
//                            $("#lblCantidadNiñosUnidos").html(cantidadNiños);
//
//                            timeoutPuntuaciones == null ? setTimeout(() => {
//                                getTablaPuntuaciones(codigoSala)
//                            }, 1500) : timeoutPuntuaciones;
//                        }, "json");
//
//                    }
//
//                }


                function activeButton(boton, active) {
                    if (active) {
                        boton.removeClass("disabled");
                    } else {
                        boton.addClass("disabled");
                    }

                }




                function activarTabla() {
                    let tiempo = 5;
                    let contador = 0;

                    let numerosSeleccionados = {1: -1, 2: -1, 3: -1, 4: -1};
                    let numeroElegido = -1;
                    setInterval(() => {


                        if (app.enjuego && app.estaRuleta) {
                            contador += 250;
                            tiempo += contador == 1000 ? -1 : 0;
                            contador = contador == 1000 ? 0 : contador;
                            let num = Math.floor((Math.random() * tablaNumeros.length - 1) + 2);
                            let num2 = tablaNumeros[num - 1];
                            $(".activo").removeClass("activo");
                            $(`#${num2}cuadrado`).addClass("activo");
                            let texto = tiempo > 0 ? `Empieza en <b>${tiempo}</b>` : `Espera un momento...`;
                            $("#numeroLlegar").html(texto);
                            numeroElegido = num2;
                            /////////////////////////
                            for (let i = 0; i < numeros.length; i++) {
                                let d = Math.floor((Math.random() * 5) + 1);
                                numerosSeleccionados[i + 1] = d;
//                                let imageDado = new Image();
                                numeros[i].dado.image(imgDados[d]);
//                                imageDado.src = `View/Public/img/${d}.png`;
                                layer.batchDraw();
                                layer.batchDraw();

                            }
                            if (tiempo == 0) {
                                tiempo = 5;
                                app.estaRuleta = false;
                                $.post("POST/RegistrarPreguntaEnfrentamiento", {dadouno: numerosSeleccionados[1], dadodos: numerosSeleccionados[2], dadotres: numerosSeleccionados[3], dadocuatro: numerosSeleccionados[4], numero: numeroElegido, codigo: app.codigoSala}, (r) => {
                                    if (r.exito != undefined && r.exito) {
                                        $(document).Toasts('create', {
                                            class: 'bg-success',
                                            title: 'Informativo!',
                                            body: 'Acabas de enviar los dados a los estudiantes, Ya pueden empezar a enviar respuestas. !'
                                        });
                                        getEstadoPartido();

                                    } else {

                                    }
                                }, "json");
                                //$("html,body").animate({scrollTop: $("#contenedorpadre").offset().top}, 1000);
                            }


                        }


                    }, 250);
                }


                function llenarDados() {
                    for (let i = 0; i < numeros.length; i++) {
                        let d = numerosSeleccionados[i + 1];
                        let imageDado = new Image();
                        numeros[i].dado.image(imageDado);
                        imageDado.src = `View/Public/img/${d}.png`;
                        layer.batchDraw();
                        layer.batchDraw();

                    }
                }
                function debesLlegar() {
                    if (numeroElegido == -1) {
                        $("#numeroLlegar").html(`Esperando a que envies un numero.`);
                        $(".activo").removeClass("activo");
                    } else {
                        $("#numeroLlegar").html(`Debes llegar a : <b id="numeroLlegar">${numeroElegido + 1}</b>`);
                        $(".activo").removeClass("activo");
                        $(`#${numeroElegido + 1}cuadrado`).addClass("activo");
                    }
                }



            });
            for (let i = 1; i < 7; i++) {
                let dado = new Image();
                dado.src = `View/Public/img/${i}.png`;
                imgDados[i] = dado;
            }
            let dado = new Image();
            dado.src = `View/Public/img/-1.png`;
            imgDados[0] = dado;
            var stage = new Konva.Stage({
                container: 'container',
                width: 360,
                height: 100
            });
            var layer = new Konva.Layer();
            // add the layer to the stage
            stage.add(layer);

            function fitStageIntoParentContainer() {
                var container = document.querySelector('#contenedorpadre');
                // now we need to fit stage into parent
                var containerWidth = container.offsetWidth;
                // to do this we need to scale the stage
                var scale = containerWidth / 360;
                stage.width(360 * scale);
                stage.height(100 * scale);
                stage.scale({x: scale, y: scale});
                stage.draw();
            }
            fitStageIntoParentContainer();
            window.addEventListener('resize', fitStageIntoParentContainer);
            function dados(i, layer, numero) {
                let dado = new Image();

                dado.onload = function () {
                    var dado1 = new Konva.Image({
                        x: 10 + (i * 95),
                        y: 20,
                        image: imgDados[numero == -1 ? 0 : numero],
                        width: 55,
                        height: 55, name: "dado"
                    });
                    numeros[i] = {dado: dado1};
                    layer.add(dado1);
                    layer.batchDraw();
                };
                dado.src = `View/Public/img/${numero}.png`;
            }

            for (let i = 0; i < 4; i++) {
                dados(i, layer, numerosSeleccionados[i + 1]);
            }

        </script>
    </body>
</html>
