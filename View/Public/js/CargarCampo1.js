var camposVersus = [[], []];
var EstudiantesVersus = [[], []];
var pmayor = 0;
var pun = [0, 0];
var actualizar = false;
function cargar() {

    let numeros = [];
    let signosArreglo = [];
    let imgDados = [];
    let imgLetra = [];
    let stage = new Konva.Stage({
        container: 'container1',
        width: 400,
        height: 300
    });
    let layer = new Konva.Layer();

    // add the layer to the stage
    stage.add(layer);


    for (var i = 1; i < 7; i++) {
        let letra = new Image();
        letra.src = `View/Public/img/${i}letra.png`;
        imgLetra[i] = letra;
    }
    let letra = new Image();
    letra.src = `View/Public/img/-1letra.png`;
    imgLetra[0] = letra;
//    let numerosSeleccionados = {1: -1, 2: -1, 3: -1, 4: -1};
    let arregloCuadrados = {};
    let inicialx = 30;
    let inicialy = 40;
    let matriz = [];
    for (let i = 0; i < 1; i++) {
        matriz[i] = [];
        for (let j = 0; j < 4; j++) {
            matriz[i][j] = new Konva.Rect({
                x: (inicialx + (inicialx * j) + (50 * j) + (20 * j)),
                y: (inicialy + (inicialy * i) + (10 * i)),
                width: 36,
                height: 36,
                stroke: 'black',
                strokeWidth: 4, name: "cuadrado"
            });
            // add the shape to the layer
            layer.add(matriz[i][j]);
            arregloCuadrados[j > 1 ? ((j + 1) * 4 - (j + 1)) : (j + 1) * 4 - ((j + 1) + 1) ] = matriz[i][j];
        }
    }

    for (let i = 0; i < 1; i++) {
        for (let j = 0; j < 4; j++) {

            if (j > 0) {
                let cuadradoSignod = new Konva.Rect({
                    x: (inicialx + 38 + (inicialx * j) + (50 * j) + (20 * j)),
                    y: (inicialy + (inicialy * i) + (10 * i)),
                    width: 10,
                    height: 34,
                    stroke: '#00000000',
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
                    stroke: '#00000000',
                    strokeWidth: 4, name: "cuadradoIzquierdo"
                });
                arregloCuadrados[j != 0 ? j * 4 : j + 1] = cuadradoSignoi;

                layer.add(cuadradoSignoi);
                let cuadradoSigno = new Konva.Rect({
                    x: (inicialx + 45 + (inicialx * j) + (54.6 * j) + (20 * j)),
                    y: (inicialy + (inicialy * i) + (10 * i)),
                    width: 34,
                    height: 34,
                    stroke: '#00000000',
                    strokeWidth: 4, name: "cuadradoMedio"
                });
                layer.add(cuadradoSigno);
                arregloCuadrados[((j + 1) * 4) - 1] = cuadradoSigno;
            }





        }
    }

    function letras(i, letra, layer) {
        let wIni = 30;
        let hIni = 30;

        let xinicial = 60 + (i * 50) + (25 * i);
        let signo2 = new Konva.Image({
            x: xinicial,
            y: 160,
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
            console.log(signo2.x() + " " + signo2.y());
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
        let wIni = nombre == "parentesisizquierdo" || nombre == "parentesisderecho" ? 45 : 34;
        let hIni = nombre == "parentesisizquierdo" || nombre == "parentesisderecho" ? 45 + 13 : 34;
        signo.onload = () => {

        };

        signo.src = `View/Public/img/${nombre}.png`;
        let signo2 = new Konva.Image({
            x: posicion,
            y: 220,
            image: signo,
            width: wIni,
            height: hIni, draggable: false, name: nombre
        });
        signo2.wIni = wIni;
        signo2.hIni = hIni;
        signo2.xIni = posicion;
        signo2.yIni = 320;
        signosArreglo[signosArreglo.length] = signo2;
        layer.add(signo2);
        layer.batchDraw();
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


    let line = new Konva.Line({
        points: [30, 280, 360, 280],
        stroke: 'black',
        strokeWidth: 1,
        lineCap: 'round',
        lineJoin: 'round',
    });
    let line2 = new Konva.Line({
        points: [38, 210, 345, 210],
        stroke: 'black',
        strokeWidth: 1,
        lineCap: 'round',
        lineJoin: 'round',
    });
    let line3 = new Konva.Line({
        points: [50, 150, 325, 150],
        stroke: 'black',
        strokeWidth: 1,
        lineCap: 'round',
        lineJoin: 'round',
    });

    layer.add(line)
    layer.add(line2)
    layer.add(line3)


    function fitStageIntoParentContainer() {
        let container = document.querySelector('#contenedorpadre1');
        // now we need to fit stage into parent
        let containerWidth = container.offsetWidth;
        // to do this we need to scale the stage
        let scale = containerWidth / 400;
        stage.width(400 * scale);
        stage.height(300 * scale);
        stage.scale({x: scale, y: scale});
        stage.draw();
    }


    fitStageIntoParentContainer();
    layer.batchDraw();





    function mapa() {
        return new Promise(r => {
            setTimeout(() => {
                let campo = camposVersus[0];

                if (campo.length > 0) {
                    for (let tipo in campo) {
                        let tipoSigno = campo[tipo];
                        switch (tipo) {
                            case "0":
                                for (let letra in tipoSigno) {
                                    let x = tipoSigno[letra].x;
                                    let y = tipoSigno[letra].y;
                                    numeros[letra].letra.x(x);
                                    numeros[letra].letra.y(y);
                                }
                                break;
                            case '1':
                                for (let signo in tipoSigno) {
                                    let x = tipoSigno[signo].x;
                                    let y = tipoSigno[signo].y;
                                    signosArreglo[signo].x(x);
                                    signosArreglo[signo].y(y);
                                }
                                break;
                        }
                    }

                }
                for (let i = 0; i < numeros.length; i++) {
                    let d = numerosSeleccionados[i + 1] == -1 ? 0 : numerosSeleccionados[i + 1];

//                    numeros[i].letra.letra = d;
                    numeros[i].letra.image(imgLetra[d]);

                }
                layer.batchDraw()

                let estudiante = EstudiantesVersus[0];
                if (Object.keys(estudiante).length > 0) {
                    $("#lblNombre1").html(estudiante["nombre"]);
                    $("#lblSede1").html(estudiante["sede"]);
                    $("#lblGrupo1").html(estudiante["grupo"]);
                    $("#lblPuntaje1").html(estudiante["puntaje"]);
                    $("#btnGanador1").html(`<button class="btn btn-primary"><i class="fas fa-crown"></i>Ganador
    </button>`);
                    $("#btnGanador1").off("click");
                    $("#btnGanador1").on("click", () => {
                        seleccionarGanador(estudiante["id"]);
                    });
                } else {
                    $("#lblNombre1").html("Selecciona enfrentamiento");
                    $("#lblSede1").html("Selecciona enfrentamiento");
                    $("#lblGrupo1").html("Selecciona enfrentamiento");
                    $("#lblPuntaje1").html("Selecciona enfrentamiento");
                    $("#btnGanador1").off("click");
                    $("#btnGanador1").html(``);
                }


                r(mapa());

            }, 500);
        })
    }

    async function  m() {
        await mapa();
    }
    m();


}

function cargar2() {


    let numeros = [];
    let signosArreglo = [];
    let imgDados = [];
    let imgLetra = [];
    let stage = new Konva.Stage({
        container: 'container2',
        width: 400,
        height: 300
    });
    let layer = new Konva.Layer();

    // add the layer to the stage
    stage.add(layer);


    for (var i = 1; i < 7; i++) {
        let letra = new Image();
        letra.src = `View/Public/img/${i}letra.png`;
        imgLetra[i] = letra;
    }
    let letra = new Image();
    letra.src = `View/Public/img/-1letra.png`;
    imgLetra[0] = letra;
//    let numerosSeleccionados = {1: -1, 2: -1, 3: -1, 4: -1};
    let arregloCuadrados = {};
    let inicialx = 30;
    let inicialy = 40;
    let matriz = [];
    for (let i = 0; i < 1; i++) {
        matriz[i] = [];
        for (let j = 0; j < 4; j++) {
            matriz[i][j] = new Konva.Rect({
                x: (inicialx + (inicialx * j) + (50 * j) + (20 * j)),
                y: (inicialy + (inicialy * i) + (10 * i)),
                width: 36,
                height: 36,
                stroke: 'black',
                strokeWidth: 4, name: "cuadrado"
            });
            // add the shape to the layer
            layer.add(matriz[i][j]);
            arregloCuadrados[j > 1 ? ((j + 1) * 4 - (j + 1)) : (j + 1) * 4 - ((j + 1) + 1) ] = matriz[i][j];
        }
    }

    for (let i = 0; i < 1; i++) {
        for (let j = 0; j < 4; j++) {

            if (j > 0) {
                let cuadradoSignod = new Konva.Rect({
                    x: (inicialx + 38 + (inicialx * j) + (50 * j) + (20 * j)),
                    y: (inicialy + (inicialy * i) + (10 * i)),
                    width: 10,
                    height: 34,
                    stroke: '#00000000',
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
                    stroke: '#00000000',
                    strokeWidth: 4, name: "cuadradoIzquierdo"
                });
                arregloCuadrados[j != 0 ? j * 4 : j + 1] = cuadradoSignoi;

                layer.add(cuadradoSignoi);
                let cuadradoSigno = new Konva.Rect({
                    x: (inicialx + 45 + (inicialx * j) + (54.6 * j) + (20 * j)),
                    y: (inicialy + (inicialy * i) + (10 * i)),
                    width: 34,
                    height: 34,
                    stroke: '#00000000',
                    strokeWidth: 4, name: "cuadradoMedio"
                });
                layer.add(cuadradoSigno);
                arregloCuadrados[((j + 1) * 4) - 1] = cuadradoSigno;
            }





        }
    }

    function letras(i, letra, layer) {
        let wIni = 30;
        let hIni = 30;

        let xinicial = 60 + (i * 50) + (25 * i);
        let signo2 = new Konva.Image({
            x: xinicial,
            y: 160,
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
            console.log(signo2.x() + " " + signo2.y());
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
        let wIni = nombre == "parentesisizquierdo" || nombre == "parentesisderecho" ? 45 : 34;
        let hIni = nombre == "parentesisizquierdo" || nombre == "parentesisderecho" ? 45 + 13 : 34;
        signo.onload = () => {

        };

        signo.src = `View/Public/img/${nombre}.png`;
        let signo2 = new Konva.Image({
            x: posicion,
            y: 220,
            image: signo,
            width: wIni,
            height: hIni, draggable: false, name: nombre
        });
        signo2.wIni = wIni;
        signo2.hIni = hIni;
        signo2.xIni = posicion;
        signo2.yIni = 320;
        signosArreglo[signosArreglo.length] = signo2;
        layer.add(signo2);
        layer.batchDraw();
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


    let line = new Konva.Line({
        points: [30, 280, 360, 280],
        stroke: 'black',
        strokeWidth: 1,
        lineCap: 'round',
        lineJoin: 'round',
    });
    let line2 = new Konva.Line({
        points: [38, 210, 345, 210],
        stroke: 'black',
        strokeWidth: 1,
        lineCap: 'round',
        lineJoin: 'round',
    });
    let line3 = new Konva.Line({
        points: [50, 150, 325, 150],
        stroke: 'black',
        strokeWidth: 1,
        lineCap: 'round',
        lineJoin: 'round',
    });

    layer.add(line)
    layer.add(line2)
    layer.add(line3)


    function fitStageIntoParentContainer() {
        let container = document.querySelector('#contenedorpadre2');
        // now we need to fit stage into parent
        let containerWidth = container.offsetWidth;
        // to do this we need to scale the stage
        let scale = containerWidth / 400;
        stage.width(400 * scale);
        stage.height(300 * scale);
        stage.scale({x: scale, y: scale});
        stage.draw();
    }


    fitStageIntoParentContainer();
    layer.batchDraw();


    function mapa() {
        return new Promise(r => {
            setTimeout(() => {
                let campo = camposVersus[1];
                if (campo.length > 0) {
                    for (let tipo in campo) {
                        let tipoSigno = campo[tipo];
                        switch (tipo) {
                            case "0":
                                for (let letra in tipoSigno) {
                                    let x = tipoSigno[letra].x;
                                    let y = tipoSigno[letra].y;
                                    numeros[letra].letra.x(x);
                                    numeros[letra].letra.y(y);
                                }
                                break;
                            case '1':
                                for (let signo in tipoSigno) {
                                    let x = tipoSigno[signo].x;
                                    let y = tipoSigno[signo].y;
                                    signosArreglo[signo].x(x);
                                    signosArreglo[signo].y(y);
                                }
                                break;
                        }
                    }

                }
                for (let i = 0; i < numeros.length; i++) {
                    let d = numerosSeleccionados[i + 1] == -1 ? 0 : numerosSeleccionados[i + 1];

//                    numeros[i].letra.letra = d;
                    numeros[i].letra.image(imgLetra[d]);

                }
                layer.batchDraw()
                let estudiante = EstudiantesVersus[1];
                if (Object.keys(estudiante).length > 0) {
                    $("#lblNombre2").html(estudiante["nombre"]);
                    $("#lblSede2").html(estudiante["sede"]);
                    $("#lblGrupo2").html(estudiante["grupo"]);
                    $("#lblPuntaje2").html(estudiante["puntaje"]);
                    $("#lblRonda").html(estudiante["ronda"])
                    $("#lblNumeroRonda").html(estudiante["numero"])
                    $("#btnGanador2").html(`<button class="btn btn-primary"><i class="fas fa-crown"></i>Ganador
    </button>`);
                    $("#btnGanador2").off("click");
                    $("#btnGanador2").on("click", () => {
                        seleccionarGanador(estudiante["id"]);
                    });
                } else {
                    $("#lblNombre2").html("Selecciona enfrentamiento");
                    $("#lblSede2").html("Selecciona enfrentamiento");
                    $("#lblGrupo2").html("Selecciona enfrentamiento");
                    $("#lblPuntaje2").html("Selecciona enfrentamiento");
                    $("#lblRonda").html("Esperando...");
                    $("#lblNumeroRonda").html("Esperando...");
                    $("#btnGanador2").off("click");
                    $("#btnGanador2").html(``);
                }


                r(mapa());

            }, 500);
        })
    }

    async function  m() {
        await mapa();
    }
    m();


}


$(() => {

    function getMovimientos() {
        $.get("GET/CampoVersus/codigo=" + readGet.codigo, (r) => {
//            console.log(r);
            if (r[0] != undefined && Object.keys(r[0]).length > 0) {
                camposVersus[0] = r[0];
            }
            if (r[1] != undefined && Object.keys(r[1]).length > 0) {
                camposVersus[1] = r[1];
            }
            setTimeout(() => {
                getMovimientos();
            }, 1000);
        }, "json");

    }
    function getEstudiantesVersus() {
        $.get("GET/EstudiantesVersus/codigo=" + readGet.codigo, (r) => {
            pmayor = 0;
//            console.log(r);
            if (r[0] != undefined && Object.keys(r[0]).length > 0) {
                EstudiantesVersus[0] = r[0];
            } else {
                EstudiantesVersus[0] = [];
            }
            if (r[1] != undefined && Object.keys(r[1]).length > 0) {
                EstudiantesVersus[1] = r[1];
            } else {
                EstudiantesVersus[1] = [];
            }

            for (let key in EstudiantesVersus) {
                let a = EstudiantesVersus[key];
                for (let k in a) {
                    if (k == "puntaje") {
                        pmayor = a[k] > pmayor ? a[k] : pmayor;
                        if (pun[key] != a[k]) {
                            actualizar = true;
                            pun[key] = a[k];
                        }

                    }
                }
            }
            if (pmayor >= 2) {
                $("#btnFinalizarEnfrentamiento").removeClass("disabled");
            } else {
                $("#btnFinalizarEnfrentamiento").addClass("disabled");
            }
            setTimeout(() => {
                getEstudiantesVersus();
            }, 1000);
        }, "json");
    }
    getEstudiantesVersus();
    getMovimientos();


    cargar();
    cargar2();




});

const seleccionarGanador = (idversus) => {
    $.post("POST/GanadorEnfrentamiento", {codigo: readGet.codigo, id: idversus}, (r) => {
        console.log(r);
        if (r.exito != undefined && r.exito) {
            actualizar = true;
            $(document).Toasts('create', {
                class: 'bg-success',
                title: 'Correcto!',
                body: 'Acabas seleccionar un ganador!'
            });
        }
    }, "json");
};