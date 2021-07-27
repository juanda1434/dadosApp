<?php
//session_start();
//if (!isset($_SESSION["infoEstudiante"])) {
//    header("Location: Inicio");
//} else {
//    require_once RAIZ . 'Controller/ControllerGET.php';
//    if (!(new ControllerGET())->validarHash()) {
//        header("Location: Logout");
//    } else
//    if (!(new ControllerGET())->validarDiagnostico()) {
//        header("Location: Inicio");
//    }
//}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Institucion Educativa Colegio Santos Apostoles </title>
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

        <style>

            .lineat{
                border-top: 1px solid rgba(0,0,0,.125);
                padding-top: 10px;
                margin-top: 10px;
            }
            .container-game{
                border: black 1px solid;
            }
            .container-numeros{
                border: black 3px solid;
                background-color: #303f9f;
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

            .list-group-item.activoo.lose{
                background-color: #ffebee;
            }
            .list-group-item.activoo.win{
                background-color: #c8e6c9;
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
                    <a href="Diagnostico" class="navbar-brand">
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
                                <a href="InicioEstudiante" class="nav-link">Volver Menu</a>
                            </li>
                            <li class="nav-item">
                                <a href="Logout" class="nav-link">Salir</a>
                            </li>
                        </ul>


                    </div>


                </div>
            </nav>
            <div class="content-wrapper">

                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="row col-12  justify-content-center mt-lg-5">
                            <div class="">

                                <!-- /.login-logo -->
                                <div id="banderaTabla" class="card">
                                    <div class="card-header text-center">
                                        <h3 >Antes de <b>iniciar el juego</b> debes presentar la siguiente <b>prueba avance</b>.
                                            <br><br>Realiza la prueba <b>sin ayuda de tus padres</b>, para que puedas evidenciar tus avances durante el juego.
                                            <br><br>Recuerda que esta prueba <b>no tiene calificación</b>.
                                        <br><br>Esta prueba tiene una duración máxima de <b>20 minutos</b>.
                                        <br><br><b>Dar click en empezar prueba avance</b></h3>

                                    </div>
                                    <div  class="card-body  pt-0 pb-0 pl-1 pr-2">       

                                        <div class="row p-4 justify-content-center" >
                                            <button type="button" class="btn btn-primary" disabled="" id="btnEmpezarPrueba">Empezar prueba diagnóstica</button>

                                        </div>


                                    </div>
                                    <!-- /.login-card-body -->
                                </div>
                            </div>
                        </div>

                        <div class=" row col-12 col-lg-6 justify-content-center mt-5">
                            <div class="login-box">

                                <!-- /.login-logo -->
                                <div id="banderaTablero" class="card ">
                                    <div class="card-header text-center ">
                                        <h2>Calcu<b>Dados</b></h2>
                                        <h3 id="numeroPregunta"></h3>

                                    </div>
                                    <div  class="card-body login-card-body p-0 ">       

                                        <div id="contenedorpadre" class="row p-0 ">
                                            <div class="col-12 p-0 " id="container">


                                            </div>

                                        </div>



                                    </div>
                                    <div class="card-footer">

                                        <div class="row justify-content-center">

                                            <div class="col-6">
                                                <button id="btnResponder" type="button" class="btn btn-info btn-flat btn-block" disabled=""><i class="fas fa-paper-plane "></i> Responder</button>
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
                                <div id="banderaTabla" class="card">
                                    <div class="card-header text-center">
                                        <h3 id="numeroLlegar"><b>Jugar</b> para empezar</h3>

                                    </div>
                                    <div  class="card-body  pt-0 pb-0 pl-1 pr-2">       

                                        <div class="row p-4 container-numeros" id="container-numeros">


                                        </div>


                                    </div>
                                    <!-- /.login-card-body -->
                                </div>
                            </div>
                        </div>

                    </div> 

                </div>

                <div class="modal fade" id="final-success">
                    <div class="modal-dialog">
                        <div class="modal-content bg-success">
                            <div class="modal-header">
                                <h4 class="modal-title align-content-center">Has finalizado la prueba diagnostica</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p>Muchas gracias por participar en la prueba diagnostica.<br>Ya puedes iniciar la primera fase y sumar puntos para tu sede.</p>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>


            <footer class="main-footer bg-navy">
                <!-- To the right -->
                <div class="float-right ">
                    Familia y escuela unidas para avanzar
                </div>
                <!-- Default to the left -->
                <strong><div >CalcuDados </div>  <a class="d-none d-md-inline"  href="https://colsantosapostoles.edu.co/web/"> Institucion Educativa Colegio Santos Apostoles</a></strong>
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
        <script>

            var estaJugando = true;
            var estaRuleta = false;
            var tablaNumeros = [];
            var numeros = [];
            var signosArreglo = [];

            var numeroElegido = -1;
            var numerosSeleccionadosProfe = [-1, -1, -1, -1];


            var tiempo = 60 * 20;
            var contador = 0;

            var fechaFin = null;
            var imgDados = [];
            var imgLetra = [];
            $(() => {
                let interval = setInterval(() => {
                    $.post("POST/ActualizarEstado", {actualizar: true}, (r) => {

                        if (r.exito != undefined && !r.exito) {
                            document.location = "Inicio";
                        }
                    });
                }, 5000);

                interval;
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

                let llenarTabla = "";
                for (let i = 0; i < 15; i++) {
                    tablaNumeros[i] = i + 1;
                    let activo = i == 5 ? "activo" : "";
                    llenarTabla += `<div id="${(i + 1)}cuadrado" class="col-4 text-center p-3 numero ${activo}">

                            <b >${(i + 1)}</b>
                        </div>`;
                }
                $("#container-numeros").html(llenarTabla);

                $("#btnEmpezarPrueba").on("click", (e) => {
                    $.post("POST/IniciarDiagnostico", (r) => {
                        if (r.exito != undefined && r.exito) {
                            $(document).Toasts('create', {
                                class: 'bg-success',
                                title: 'Genial !',
                                body: 'Acabas de iniciar tu prueba diagnostica. Tienes 20 minutos para hacerla.'
                            });
                            actualizarCampo();
                            $("#btnEmpezarPrueba").prop("disabled", true);
                            $("html,body").animate({scrollTop: $("#banderaTablero").offset().top}, 1000);
                        }
                    }, "json");
                });


                function llegoNumero() {


                    for (let i = 0; i < numeros.length; i++) {
                        let d = numerosSeleccionadosProfe[i];
//                        let imageletra = new Image();
//                        let imageDado = new Image();
                        numeros[i].letra.letra = d;
                        numeros[i].letra.image(imgLetra[d]);
//                        imageletra.src = `View/Public/img/${d}letra.png`;
                        numeros[i].dado.image(imgDados[d]);
//                        imageDado.src = `View/Public/img/${d}.png`;
                        $(".activo").removeClass("activo");
                        $(`#${d}cuadrado`).addClass("activo");
                        layer.batchDraw();

                        $(".activo").removeClass("activo");
                        $(`#${numeroElegido}cuadrado`).addClass("activo");
                        $("#numeroLlegar").html(`Debes llegar a : <b id="numeroLlegar">${numeroElegido}</b>`);
                    }
                }

                $("#btnResponder").on("click", () => {
                    if (!estaRuleta) {
                        $.post("POST/RespuestaDiagnostico", getOperacion(), (r) => {
                            console.log(r);
                            if (r.error != undefined) {
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Ups !',
                                    body: r.error
                                });
                            } else if (r.exito != undefined) {
                                $(document).Toasts('create', {
                                    class: 'bg-success',
                                    title: 'Genial !',
                                    body: 'Enviaste una respuesta, responde la siguiente!'
                                });
                                reiniciartablero();
                                actualizarCampo();

                            }
                        }, "json");
                    }

                });


                function next() {
                    if (estaJugando && !estaRuleta) {
                        estaRuleta = true;
                        reiniciartablero();

                        activeButton($("#btnResponder"), false);

                    }
                }

                function reiniciartablero() {
                    for (let i = 0; i < numeros.length; i++) {
                        numeros[i].letra.draggable(false);
                        reiniciarUbicacion(numeros[i].letra);
                    }

                    for (let i = 0; i < signosArreglo.length; i++) {
                        signosArreglo[i].draggable(false);
                        reiniciarUbicacion(signosArreglo[i]);
                    }
                    layer.batchDraw();
                    layer.batchDraw();
                    layer.batchDraw();
                }

                function pausarRuleta() {
                    estaRuleta = false;
                    for (let i = 0; i < numeros.length; i++) {
                        numeros[i].letra.draggable(true);
                        reiniciarUbicacion(numeros[i].letra);
                    }
                    for (let i = 0; i < signosArreglo.length; i++) {
                        signosArreglo[i].draggable(true);
                        reiniciarUbicacion(signosArreglo[i]);

                    }
                    activeButton($("#btnResponder"), true);
                }

                function reiniciarUbicacion(bichito) {
                    bichito.x(bichito.xIni);
                    bichito.y(bichito.yIni);
                    bichito.width(bichito.wIni);
                    bichito.height(bichito.hIni);
                    cuadroLetra = null;
                    cuadroSigno = null;
                    CuadroSignoIzquierdo = null;
                    CuadroSignoDerecho = null;
                    seleccionados = {};
                }

                function activeButton(boton, active) {
                    if (active) {
                        boton.removeClass("disabled");
                    } else {
                        boton.addClass("disabled");
                    }

                }

                var cronometroInterval = null;
                function  pasarSegundo() {
                    return fechaFin !== null ? fechaFin.unix() - now().unix() : 0;
                }
                let cantidadResueltas = 0;
                function actualizarCampo() {

                    $.get("GET/CampoDiagnostico", (r) => {
                        console.log(r);
                        if (r.opcion != undefined) {
                            switch (r.opcion) {
                                case 4:
                                    document.location = "Diagnostico";
                                    break;
                                case 3:
                                    $('#final-success').modal({
                                        keyboard: false
                                    });
                                    setTimeout(() => {
                                        document.location = "Inicio";
                                    }, 4000)

                                    break;
                                case 1:
                                    document.location = "Inicio";
                                    break;
                                case 2:
                                    $("#btnEmpezarPrueba").prop("disabled", false);

                                    break;
                                case 5:
                                    numerosSeleccionadosProfe = [r.pregunta.dadouno, r.pregunta.dadodos, r.pregunta.dadotres, r.pregunta.dadocuatro];
                                    numeroElegido = r.pregunta.numero;
                                    $("#numeroPregunta").html(`<b>Pregunta #${r.pregunta.numeroPregunta}</b>`)
                                    llegoNumero();
                                    pausarRuleta();
                                    $("#btnResponder").prop("disabled", false);
                                    if (cronometroInterval == null) {
                                        fechaFin = moment(r.pregunta.fechafin, "YYYY-MM-DD hh:mm:ss");
                                        cronometroInterval = setInterval(() => {
                                            if (pasarSegundo() + 2 <= 0) {
                                                $('#final-success').modal({
                                                    keyboard: false
                                                });
                                                setTimeout(() => {
                                                    document.location = "Inicio";
                                                }, 4000)
                                                clearInterval(cronometroInterval);
                                                cronometroInterval = null;
                                            } else {
                                                $("#numeroLlegar").html(`Debes llegar a : <b id="numeroLlegar">${numeroElegido}</b><br><span><b>Tiempo Restante : ${pasarSegundo() + 2}</b></span>`)
                                            }
                                        }, 500)
                                    }
                                    break;
                            }

                        }

                    }, "json");

                }
                actualizarCampo();

            });

            for (let i = 1; i < 7; i++) {
                let dado = new Image();
                dado.src = `View/Public/img/${i}.png`;
                imgDados[i] = dado;
            }
            let dado = new Image();
            dado.src = `View/Public/img/-1.png`;
            imgDados[0] = dado;
            for (let i = 1; i < 7; i++) {
                let letra = new Image();
                letra.src = `View/Public/img/${i}letra.png`;
                imgLetra[i] = letra;
            }
            let letra = new Image();
            letra.src = `View/Public/img/-1letra.png`;
            imgLetra[0] = letra;
            var numerosSeleccionados = {1: -1, 2: -1, 3: -1, 4: -1};
            var arregloCuadrados = {};
            var cuadroLetra = null;
            var cuadroSigno = null;
            var CuadroSignoIzquierdo = null;
            var CuadroSignoDerecho = null;
            var seleccionados = {};


            var stage = new Konva.Stage({
                container: 'container',
                width: 400,
                height: 400
            });
            var layer = new Konva.Layer();
            // add the layer to the stage
            stage.add(layer);
            let inicialx = 30;
            let inicialy = 140;
            let matriz = [];
            for (var i = 0; i < 1; i++) {
                matriz[i] = [];
                for (var j = 0; j < 4; j++) {
                    matriz[i][j] = new Konva.Rect({
                        x: (inicialx + (inicialx * j) + (50 * j) + (20 * j)),
                        y: (inicialy + (inicialy * i) + (10 * i)),
                        width: 34,
                        height: 34,
                        stroke: 'black',
                        strokeWidth: 4, name: "cuadrado"
                    });
                    // add the shape to the layer
                    layer.add(matriz[i][j]);
                    arregloCuadrados[j > 1 ? ((j + 1) * 4 - (j + 1)) : (j + 1) * 4 - ((j + 1) + 1) ] = matriz[i][j];
                }
            }

            for (var i = 0; i < 1; i++) {
                for (var j = 0; j < 4; j++) {

                    if (j > 0) {
                        let cuadradoSignod = new Konva.Rect({
                            x: (inicialx + 38 + (inicialx * j) + (50 * j) + (20 * j)),
                            y: (inicialy + (inicialy * i) + (10 * i)),
                            width: 10,
                            height: 34,
                            stroke: 'white',
                            strokeWidth: 4, name: "cuadradoDerecho"
                        });

                        layer.add(cuadradoSignod);
                        arregloCuadrados[j > 2 ? j * 4 + 1 : j * 4 + 2] = cuadradoSignod;

                    }
                    if (j < 3) {
                        let cuadradoSignoi = new Konva.Rect({
                            x: (inicialx - 15 + (inicialx * j) + (50 * j) + (20 * j)),
                            y: (inicialy + (inicialy * i) + (10 * i)),
                            width: 10,
                            height: 34,
                            stroke: 'white',
                            strokeWidth: 4, name: "cuadradoIzquierdo"
                        });
                        arregloCuadrados[j != 0 ? j * 4 : j + 1] = cuadradoSignoi;

                        layer.add(cuadradoSignoi);
                        let cuadradoSigno = new Konva.Rect({
                            x: (inicialx + 45 + (inicialx * j) + (54.6 * j) + (20 * j)),
                            y: (inicialy + (inicialy * i) + (10 * i)),
                            width: 34,
                            height: 34,
                            stroke: 'white',
                            strokeWidth: 4, name: "cuadradoMedio"
                        });
                        layer.add(cuadradoSigno);
                        arregloCuadrados[((j + 1) * 4) - 1] = cuadradoSigno;
                    }





                }
            }

            function letras(i, letra, layer) {
                let wIni = 40;
                let hIni = 40;

                let xinicial = 60 + (i * 50) + (25 * i);
                let signo2 = new Konva.Image({
                    x: xinicial,
                    y: 260,
                    image: imgLetra[letra == -1 ? 0 : letra],
                    width: wIni,
                    height: hIni, draggable: false, name: "letra"
                });
                signo2.wIni = wIni;
                signo2.hIni = hIni;
                signo2.xIni = xinicial;
                signo2.yIni = 260;
                signo2.letra = letra;
                numeros[i] = {letra: signo2, dado: null};
                signo2.on('mouseup touchend', function () {
                    console.log("hola " + i);
                });
                signo2.on('dragend', () => {
                    if (cuadroLetra != null) {
                        signo2.height(cuadroLetra.height() - 8);
                        signo2.width(cuadroLetra.width() - 8);
                        signo2.x(cuadroLetra.x() + 3);
                        signo2.y(cuadroLetra.y() + 3);
                        cuadroLetra.fill("white");
                        for (let key in arregloCuadrados) {
                            if (arregloCuadrados[key] === cuadroLetra) {
                                seleccionados[key] = {cuadrado: cuadroLetra, signo: signo2, caracter: signo2.letra};
                                break;
                            }
                        }

                        cuadroLetra = null;
                    } else {
                        signo2.height(hIni);
                        signo2.width(wIni);
                        signo2.x(xinicial)
                        signo2.y(260)
                    }
                });
                layer.add(signo2);
                layer.batchDraw();
            }

            for (let key in numerosSeleccionados) {
                letras(key - 1, numerosSeleccionados[key], layer);
            }
            function signos(nombre, layer, posicion) {
                let presion = false;
                let signo = new Image();
                let wIni = 45;
                let hIni = 45;
                signo.onload = () => {
                };
                signo.src = `View/Public/img/${nombre}.png`;

                let signo2 = new Konva.Image({
                    x: posicion,
                    y: 320,
                    image: signo,
                    width: wIni,
                    height: hIni, draggable: false, name: nombre
                });
                signo2.wIni = wIni;
                signo2.hIni = hIni;
                signo2.xIni = posicion;
                signo2.yIni = 320;
                signo2.nombre = nombre;
                signosArreglo[signosArreglo.length] = signo2;
                signo2.on('dragend', function () {
                    let nameSigno = signo2.name();
                    switch (nameSigno) {
                        case "parentesisderecho":
                            if (CuadroSignoDerecho != null) {
                                signo2.x(CuadroSignoDerecho.x() - 20);
                                signo2.y(CuadroSignoDerecho.y() - 10);
                                signo2.height(hIni + 13);
                                CuadroSignoDerecho.fill("white");
                                for (let key in arregloCuadrados) {
                                    if (arregloCuadrados[key] === CuadroSignoDerecho) {
                                        seleccionados[key] = {cuadrado: CuadroSignoDerecho, signo: signo2, caracter: ")"};
                                        break;
                                    }
                                }
                                CuadroSignoDerecho = null;
                            } else {
                                signo2.x(posicion);
                                signo2.y(320);
                                signo2.width(wIni);
                                signo2.height(hIni);
                            }
                            break;
                        case"parentesisizquierdo":
                            if (CuadroSignoIzquierdo != null) {
                                signo2.x(CuadroSignoIzquierdo.x() - 14);
                                signo2.y(CuadroSignoIzquierdo.y() - 10);
                                signo2.height(hIni + 13);
                                CuadroSignoIzquierdo.fill("white");
                                for (let key in arregloCuadrados) {
                                    if (arregloCuadrados[key] === CuadroSignoIzquierdo) {
                                        seleccionados[key] = {cuadrado: CuadroSignoIzquierdo, signo: signo2, caracter: "("};
                                        break;
                                    }
                                }
                                CuadroSignoIzquierdo = null;
                            } else {
                                signo2.x(posicion);
                                signo2.y(320);
                                signo2.width(wIni);
                                signo2.height(hIni);
                            }
                            break;
                        default:
                            if (cuadroSigno != null) {
                                signo2.x(cuadroSigno.x());
                                signo2.y(cuadroSigno.y());
                                signo2.width(cuadroSigno.width());
                                signo2.height(cuadroSigno.height());

                                for (let key in arregloCuadrados) {
                                    if (arregloCuadrados[key] === cuadroSigno) {

                                        seleccionados[key] = {cuadrado: cuadroSigno, signo: signo2, caracter: convertirCaracter(nameSigno)};
                                        break;
                                    }
                                }
                                cuadroSigno.fill("white");
                                cuadroSigno = null;
                            } else {
                                signo2.x(posicion);
                                signo2.y(320);
                                signo2.width(wIni);
                                signo2.height(hIni);
                            }

                            break;
                    }
                });
                layer.add(signo2);
                layer.batchDraw();
            }
            function convertirCaracter(signo) {
                let caracter = "";
                switch (signo) {
                    case "suma":
                        caracter = "+";
                        break;
                    case "multiplicacion":
                        caracter = "*";
                        break;
                    case "resta":
                        caracter = "-";
                        break;
                    case "division":
                        caracter = "/";
                        break;

                }
                return caracter;

            }
            signos("suma", layer, 50);
            signos("suma", layer, 50);
            signos("suma", layer, 50);
            signos("multiplicacion", layer, 110);
            signos("multiplicacion", layer, 110);
            signos("multiplicacion", layer, 110);
            signos("resta", layer, 170);
            signos("resta", layer, 170);
            signos("resta", layer, 170);
            signos("division", layer, 230);
            signos("division", layer, 230);
            signos("division", layer, 230);
            signos("parentesisderecho", layer, 310);
            signos("parentesisderecho", layer, 310);
            signos("parentesisizquierdo", layer, 280);
            signos("parentesisizquierdo", layer, 280);


            function dados(i, layer, numero) {
                let dado = new Image();
                dado.onload = function () {
                    var dado1 = new Konva.Image({
                        x: 35 + (i * 90),
                        y: 40,
                        image: imgDados[numero == -1 ? 0 : numero],
                        width: 55,
                        height: 55, name: "dado"
                    });
                    numeros[i].dado = dado1;
                    layer.add(dado1);
                    layer.batchDraw();
                };
                dado.src = `View/Public/img/${numero}.png`;
            }

            var line = new Konva.Line({
                points: [30, 380, 360, 380],
                stroke: 'black',
                strokeWidth: 1,
                lineCap: 'round',
                lineJoin: 'round',
            });
            var line2 = new Konva.Line({
                points: [38, 310, 345, 310],
                stroke: 'black',
                strokeWidth: 1,
                lineCap: 'round',
                lineJoin: 'round',
            });
            var line3 = new Konva.Line({
                points: [50, 250, 325, 250],
                stroke: 'black',
                strokeWidth: 1,
                lineCap: 'round',
                lineJoin: 'round',
            });

            layer.add(line)
            layer.add(line2)
            layer.add(line3)
            for (let i = 0; i < 4; i++) {
                dados(i, layer, numerosSeleccionados[i + 1]);
            }

            function fitStageIntoParentContainer() {
                var container = document.querySelector('#contenedorpadre');
                // now we need to fit stage into parent
                var containerWidth = container.offsetWidth;
                // to do this we need to scale the stage
                var scale = containerWidth / 400;
                stage.width(400 * scale);
                stage.height(400 * scale);
                stage.scale({x: scale, y: scale});
                stage.draw();
            }
            fitStageIntoParentContainer();
            window.addEventListener('resize', fitStageIntoParentContainer);
            layer.on('dragmove', function (e) {
                var target = e.target;
                var targetRect = e.target.getClientRect();
                if (target.name() == "letra") {
                    layer.children.each(function (group) {
                        let nameaux = group.name();
                        // do not check intersection with itself
                        if (group === target || nameaux != "cuadrado") {
                            return;
                        }

                        if (haveIntersection(group.getClientRect(), targetRect) && nameaux == "cuadrado") {
                            if (!estaOcupado(group, target)) {
                                group.fill('#f44336');
                                cuadroLetra = group;
                            }

                        } else if (nameaux == "cuadrado" && cuadroLetra === group) {
                            for (var key in seleccionados) {
                                if (seleccionados[key].cuadrado === cuadroLetra) {
                                    delete seleccionados[key];
                                    break;
                                }
                            }
                            cuadroLetra = null;
                            group.fill('white');
                        }


                        // do not need to call layer.draw() here
                        // because it will be called by dragmove action
                    });
                } else if (target.name() == "suma" || target.name() == "resta" || target.name() == "multiplicacion" || target.name() == "division") {

                    layer.children.each(function (group) {
                        let nameaux = group.name();// do not check intersection with itself
                        if (group === target || nameaux != "cuadradoMedio") {
                            return;
                        }

                        if (haveIntersection(group.getClientRect(), targetRect) && nameaux == "cuadradoMedio") {
                            if (!estaOcupado(group, target)) {
                                group.fill('#f44336');
                                cuadroSigno = group;
                            }

                        } else if (nameaux == "cuadradoMedio" && cuadroSigno === group) {
                            for (var key in seleccionados) {
                                if (seleccionados[key].cuadrado === cuadroSigno) {
                                    delete seleccionados[key];
                                    break;
                                }
                            }
                            cuadroSigno = null;
                            group.fill('white');
                        }


                        // do not need to call layer.draw() here
                        // because it will be called by dragmove action
                    });
                } else if (target.name() == "parentesisizquierdo") {
                    layer.children.each(function (group) {
                        let nameaux = group.name();
                        // do not check intersection with itself
                        if (group === target || nameaux != "cuadradoIzquierdo") {
                            return;
                        }

                        if (haveIntersection(group.getClientRect(), targetRect) && nameaux == "cuadradoIzquierdo") {
                            if (!estaOcupado(group, target)) {
                                group.fill('#f44336');
                                CuadroSignoIzquierdo = group;
                            }

                        } else if (nameaux == "cuadradoIzquierdo" && CuadroSignoIzquierdo === group) {
                            for (var key in seleccionados) {
                                if (seleccionados[key].cuadrado === CuadroSignoIzquierdo) {
                                    delete seleccionados[key];
                                    break;
                                }
                            }
                            CuadroSignoIzquierdo = null;
                            group.fill('white');
                        }


                        // do not need to call layer.draw() here
                        // because it will be called by dragmove action
                    });
                } else if (target.name() == "parentesisderecho" || nameaux != "cuadradoDerecho") {
                    layer.children.each(function (group) {
                        let nameaux = group.name();
                        // do not check intersection with itself
                        if (group === target) {
                            return;
                        }

                        if (haveIntersection(group.getClientRect(), targetRect) && nameaux == "cuadradoDerecho") {
                            if (!estaOcupado(group, target)) {
                                group.fill('#f44336');
                                CuadroSignoDerecho = group;

                            }

                        } else if (nameaux == "cuadradoDerecho" && CuadroSignoDerecho === group) {
                            for (var key in seleccionados) {
                                if (seleccionados[key].cuadrado === CuadroSignoDerecho) {
                                    delete seleccionados[key];
                                    break;
                                }
                            }
                            CuadroSignoDerecho = null;
                            group.fill('white');
                        }


                        // do not need to call layer.draw() here
                        // because it will be called by dragmove action
                    });
                }

            });
            function getOperacion() {
                let operacion = "";
                let numeros = [];
                for (let key in seleccionados) {
                    operacion += seleccionados[key].caracter;
                    if (!isNaN(seleccionados[key].caracter)) {
                        numeros[numeros.length] = seleccionados[key].caracter;
                    }
                }
                return operacion == "" ? {operacion: "0+0", numerouno: 0, numerodos: 0, numerotres: 0, numerocuatro: 0} : {operacion: operacion, numerouno: numeros[0], numerodos: numeros[1], numerotres: numeros[2], numerocuatro: numeros[3]};
            }

            function validarOperacion() {
                return (new Function("return " + getOperacion())());

            }

            function estaOcupado(cuadrado, signo) {
                let ocupado = false;
                for (let key in seleccionados) {
                    let seleccion = seleccionados[key];
                    if (seleccion !== undefined && cuadrado === seleccion.cuadrado && signo !== seleccion.signo) {
                        return true;
                    }

                }
                return ocupado;

            }


            function haveIntersection(r1, r2) {
                return !(
                        r2.x > r1.x + r1.width ||
                        r2.x + r2.width < r1.x ||
                        r2.y > r1.y + r1.height ||
                        r2.y + r2.height < r1.y
                        );
            }


        </script>
    </body>
</html>

