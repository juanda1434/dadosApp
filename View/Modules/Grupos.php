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

            .btnarriba{
                margin-bottom: 2px;
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
                    <a href="Grupos" class="navbar-brand">
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
                                <a href="Inicio" class="nav-link">Inicio</a>
                            </li>

                        </ul>


                    </div>


                </div>
            </nav>
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-3">
                                <h1>Grupos</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Docente</a></li>
                                    <li class="breadcrumb-item active">Grupos</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <div class="container ">


                    <!-- Content Header (Page header) -->


<section class="content">
                        <div class="align-self-center row justify-content-center col-12" id="panelCastillos">
                
                
             
        </div>
                        
                        
                    </section>

                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Registrar Nuevo Grupo</h3>


                                    </div>
                                    <div class="card-body row">
                                        <div class="form-group col-12 col-lg-4">
                                            <label for="selectSedes">Sede</label>
                                            <select id="selectSedes" class="form-control custom-select">                                                

                                            </select>
                                        </div>

                                        <div class="form-group col-12 col-lg-4">
                                            <label for="selectGrados">Grado</label>
                                            <select id="selectGrados" class="form-control custom-select">

                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-lg-4">
                                            <label for="inputNumero">Numero</label>
                                            <input type="number" id="inputNumero" class="form-control">
                                        </div>

                                        <div class="row col-12 col-lg-3">
                                            <div class="col-12">
                                                <a href="#" id="btnCrearPartida" class="btn btn-success "><li class="fas fa-save"> </li> Crear Nuevo Grupo</a>
                                            </div>
                                        </div>
                                        <div class="row col-12 col-lg-3">
                                            <div class="col-12">
                                                <a href="#" id="btnExcelParticipantePractica" class="btn btn-success " value="0"><li class="fas fa-save"> </li> Excel participantes practica</a>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row col-12 col-lg-3">
                                            <div class="col-12">
                                                <a  href="#" id="btnExcelNoParticipanPractica" class="btn btn-success "><li class="fas fa-save"> </li> Excel no participan practica</a>
                                            </div>
                                        </div>
                                        <div class="row col-12 col-lg-3">
                                            <div class="col-12">
                                                <a href="#" id="btnExcelDiagnosticoProcesado" class="btn btn-success "><li class="fas fa-save"> </li> Excel diagnostico procesado</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                            </div>
                            <div class="col-12">
<div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Generador de excel</h3>


                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12"><h5>Puntos practica diario</h5> </div>
                                                <a href="#"  id="btnExcelParticipantePractica1" class="btn btn-success col-3 col-lg-1 mr-1 mb-1" value="1"><li class="fas fa-save"> </li> Lunes</a>
                                                <a href="#"  id="btnExcelParticipantePractica2" class="btn btn-success col-3 col-lg-1 mr-1 mb-1" value="2"><li class="fas fa-save"> </li> Martes</a>
                                                <a href="#"  id="btnExcelParticipantePractica3" class="btn btn-success col-4 col-lg-2 mr-1 mb-1" value="3"><li class="fas fa-save"> </li> Miercoles</a>
                                                <a href="#"  id="btnExcelParticipantePractica4" class="btn btn-success col-3 col-lg-1 mr-1 mb-1" value="4"><li class="fas fa-save"> </li> Jueves</a>
                                                <a href="#"  id="btnExcelParticipantePractica5" class="btn btn-success col-4 col-lg-1 mr-1 mb-1" value="5"><li class="fas fa-save"> </li> Viernes</a>
                                                <a href="#"  id="btnExcelParticipantePractica6" class="btn btn-success col-4 col-lg-1 mr-1" value="6"><li class="fas fa-save"> </li> Sabado</a>
                                                <a href="#"  id="btnExcelParticipantePractica7" class="btn btn-success col-4 col-lg-2 " value="7"><li class="fas fa-save"> </li> Domingo</a>
                                            </div>
                                       
                                        
                                    </div>
                                    <!-- /.card-body -->
                                </div>                                
                                
                                
                                
                            </div>
                        </div>

                    
                        <div class="card">
                            
                        </div>
                        
                    </section>
                    <!-- /.content -->
                    <!-- Main content -->
                    <section class="content">

                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Grupos</h3>


                                <div class="card-tools">
                                    <button id="btnReloadGrupos" type="button" class="btn btn-tool" ><i class="fas fa-sync-alt"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>

                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped projects table-responsive">
                                    <thead >
                                        <tr>
                                            <th style="width: 1%">
                                                codigo
                                            </th>
                                            <th style="width: 20%">
                                                Grado
                                            </th>
                                            <th style="width: 20%">
                                                Sede
                                            </th>
                                            <th style="width: 10%">
                                                Niños Registrados
                                            </th>
                                            <th>
                                                Rondas Jugadas
                                            </th>
                                            <th style="width: 8%" class="text-center">
                                                Estado
                                            </th>
                                            <th style="width: 20%">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyGrupos">



                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </section>
                    <!-- /.content -->
                    
                    
                    

                </div>


            </div>


            <footer class="main-footer bg-navy">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Familia y escuela unidas para avanzar
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

<script src="View/Public/js/filesaver.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script>
    <script src="View/Public/js/json-excel.js"></script>  
        <script>

var dataExcel = {};
 const generarExcelParticipantesPractica = (e) => {
                fetch('GET/MS/codigo='+($(e)[0].target).getAttribute("value"))
                        .then(r => {

                            return r.json();
                        }).then(d => {
                            dataExcel=d;
                    downloadAsExcel();
                    
                }).catch((e)=>{
                    $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Error del sistema !',
                                    body: "Error al generar el archivo excel."
                                });
                });
            }
           
const generarExcelNoParticipanPractica = () => {
                fetch('GET/PdfNoParticipa')
                        .then(r => {

                            return r.json();
                        }).then(d => {
                            dataExcel=d;
                    downloadAsExcel();
                    
                }).catch((e)=>{
                    $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Error del sistema !',
                                    body: "Error al generar el archivo excel."
                                });
                });
            }
const generarExcelDiagnosticosProcesados = () => {
                fetch('GET/ExlDiagnostico')
                        .then(r => {

                            return r.json();
                        }).then(d => {
                            dataExcel=d;
                    downloadAsExcel();
                    
                }).catch((e)=>{
                    $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Error del sistema !',
                                    body: "Error al generar el archivo excel."
                                });
                });
            }


            $(() => {

                document.getElementById("btnExcelParticipantePractica").onclick= (e)=>{generarExcelParticipantesPractica(e)};
                document.getElementById("btnExcelParticipantePractica1").onclick= (e)=>{generarExcelParticipantesPractica(e)};
                document.getElementById("btnExcelParticipantePractica2").onclick= (e)=>{generarExcelParticipantesPractica(e)};
                document.getElementById("btnExcelParticipantePractica3").onclick= (e)=>{generarExcelParticipantesPractica(e)};
                document.getElementById("btnExcelParticipantePractica4").onclick= (e)=>{generarExcelParticipantesPractica(e)};
                document.getElementById("btnExcelParticipantePractica5").onclick= (e)=>{generarExcelParticipantesPractica(e)};
                document.getElementById("btnExcelParticipantePractica6").onclick= (e)=>{generarExcelParticipantesPractica(e)};
                document.getElementById("btnExcelParticipantePractica7").onclick= (e)=>{generarExcelParticipantesPractica(e)};
                document.getElementById("btnExcelNoParticipanPractica").onclick= generarExcelNoParticipanPractica;
                document.getElementById("btnExcelDiagnosticoProcesado").onclick= generarExcelDiagnosticosProcesados;
                function botones(estado, codigo, key) {
                    let btns = "";
                    switch (estado) {
                        case "Jugando":
                            btns = `<a class="btn btn-primary btn-sm" href="RondaUnoDocente?codigo=${codigo}"> <i class="fas fa-play"> </i> Abrir </a>
                                    <a class="btn btn-primary btn-sm" href="PuntajeGrupo?codigo=${codigo}"><i class="fas fa-play"></i> Puntuacion </a>`;
                            onAbrir(key, codigo);
                            break;
                        case "Registro":
                            btns = `<a id="btnCerrarRegistro-${key}" class="btn btn-primary btn-sm" href="#"><i class="fas fa-play"></i> Cerrar Registro </a>
                                    <a id="btnBorrarPartido-${key}" class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i>Borrar</a>`;
                            onCerrarRegistro(key, codigo);
                            onBorrar(key,codigo);
                            break;
                        case "Pausa":
                            btns = `<a id="btnNewRonda-${key}" class="btnarriba btn btn-primary btn-sm" href="#"><i class="fas fa-plus"></i> Nueva Ronda</a>
                         <a  class="btn btn-primary btn-sm " href="PuntajeGrupo?codigo=${codigo}"><i class="fas fa-play"></i> Puntuacion </a>
                         <a id="btnGenerarWin-${key}" class="btn btn-primary btn-sm mt-1" href="#"><i class="fas fa-trophy"></i> Generar Ganadores </a>`;
                            onNuevaRonda(key,codigo);
                            onGenerarGanadores(key,codigo);
                            break;
                        case "Siguiente":
                            btns = `<a id="" class="btn btn-primary btn-sm mb-1" href="PuntajeGrupo?codigo=${codigo}"><i class="fas fa-play"></i> Puntajes</a>
                    <a id="" class="btn btn-primary btn-sm" href="PB?codigo=${codigo}"><i class="fas fa-play"></i> Sala enfrentamientos </a> `;

                            break;
                    }

                    return btns;
                }

                function onAbrir(key, codigo) {
                $("#tbodyGrupos").off("click", ("#btnAbrir-" + key));
                    $("#tbodyGrupos").on("click", ("#btnAbrir-" + key), (e) => {
                        e.preventDefault();
                        console.log(key + " " + codigo);
                    });
                }
                function onGenerarGanadores(key, codigo) {
                    
                $("#tbodyGrupos").off("click", ("#btnGenerarWin-" + key));
                    $("#tbodyGrupos").on("click", ("#btnGenerarWin-" + key), (e) => {
                        e.preventDefault();
                         $.post("POST/SegundaRonda",{codigo:codigo},(r)=>{
                             console.log(r);
                             if (r.exito!=undefined && r.exito) {
                                 $(document).Toasts('create', {
                                    class: 'bg-success',
                                    title: 'Informativo !',
                                    body: 'Generaste los cuadro. Puedes empezar los enfrentamientos!'
                                });
    cargarGrupos();
}
                         },"json");
                    });
                }
                
                 function onBorrar(key, codigo) {
                    $("#tbodyGrupos").off("click", ("#btnBorrarPartido-" + key));
                    $("#tbodyGrupos").on("click", ("#btnBorrarPartido-" + key), (e) => {
                         console.log(codigo);
                        e.preventDefault();
                        $.post("POST/BorrarPartido",{codigo:codigo},(r)=>{
                            console.log(r);
                            if (r.exito!=undefined && r.exito) {
                               $(document).Toasts('create', {
                                    class: 'bg-success',
                                    title: 'Informativo !',
                                    body: 'El grupo se ha eliminado correctamente!'
                                });
                                cargarGrupos();
                                
}
                        },"json");
                        
                    });
                }


                function onCerrarRegistro(key, codigo) {
                    $("#tbodyGrupos").off("click", ("#btnCerrarRegistro-" + key))
                    $("#tbodyGrupos").on("click", ("#btnCerrarRegistro-" + key), (e) => {
                        e.preventDefault();
                        $.ajax({
                            url: "POST/IniciarPartida",
                            method: "POST",
                            data: {codigo: codigo}, dataType: "json"


                        }).done((r) => {
                            console.log(r);
                            if (r.exito != undefined && r.exito) {
                                $(document).Toasts('create', {
                                    class: 'bg-success',
                                    title: 'Informativo !',
                                    body: 'Registro finalizado ! Ya puedes iniciar una ronda!'
                                });
                                cargarGrupos();
                            } else if(r.error != undefined){
                                 $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Informativo !',
                                    body: r.error
                                });
                            }
                        });

                    });
                }
                
                function onNuevaRonda(key,codigo) {
                    $("#tbodyGrupos").off("click", ("#btnNewRonda-" + key));
                   
                    $("#tbodyGrupos").on("click", ("#btnNewRonda-" + key), (e) => {  
                         console.log(codigo);
                        e.preventDefault();
                        $.ajax({
                            url: "POST/NuevaRonda",
                            method: "POST",
                            data: {codigo:codigo}, dataType: "json"


                        }).done((r) => {
                            console.log(r);
                            if (r.exito != undefined && r.exito) {
                                $(document).Toasts('create', {
                                    class: 'bg-success',
                                    title: 'Informativo !',
                                    body: 'El partido esta en juego.Ya puedes entrar a la sala y empezar a jugar.'
                                });
                                cargarGrupos();
                            } else {
                                
                            }
                        });
                    
                });
}
                

                $("#btnReloadGrupos").on("click", () => {
                    cargarGrupos();
                });


                cargarRegistro();
                cargarGrupos();
                $("#btnCrearPartida").on("click", (r) => {
                    r.preventDefault();
                        let sede = $("select[id=selectSedes]").val();
                        let grado = $("select[id=selectGrados]").val();
                        let numero = $("#inputNumero").val();
                        if(numero.length<=0){
                             $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Informativo !',
                                    body: "Debes ingresar el numero del grupo"
                                });
                                return;
                        }
                            
                        $.post("POST/RegistrarPartido", {sede: sede, grado: grado, numero: numero}, (r) => {
                            console.log(r);
                            if (r.exito != undefined && r.exito) {
                                $(document).Toasts('create', {
                                    class: 'bg-success',
                                    title: 'Informativo !',
                                    body: 'Registro finalizado ! Ya puedes iniciar una ronda!'
                                });
                                cargarGrupos();
                            }else if( r.error!=undefined ){
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Informativo !',
                                    body: r.error
                                });
                            }
                            
                        },"json");
                    
                });




                function cargarRegistro() {

                    $.get("GET/SedesGrados", (r) => {
                        
                      
                        if (r.sedes != undefined && r.grados != undefined) {
                            let grados = r.grados;
                            let sedes = r.sedes;
                            let optionsSede = "";
                            let optionsGrado = "";
                            for (let key in grados) {
                                let grado = grados[key];
                                optionsGrado += `<option value="${grado.id}">${grado.grado }</option>`;
                            }
                            $("#selectGrados").html(optionsGrado);
                            for (var key in sedes) {
                                let sede = sedes[key];
                                optionsSede += `<option value="${sede.id}">${sede.sede}</option>`;
                            }
                            $("#selectSedes").html(optionsSede);
                            
                            
                            
                            
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
                        <div class="col-12 col-lg-10 align-self-end text-center " style="background-color:rgba(28,86,84,0.2);position: absolute ;">
                            <h4 class=" text-white" style="border-bottom: 1px solid rgba(255,255,255,0.5)">Castillo ${c.sede}</h4>
                            <h5 class=" text-white" ">Puntos: ${c.puntaje}</h5>
                    </div>
                
                    </div>
                    
                    </div>
                </div>
            </div>`;
                castillos+=castillo;
            }
            
            $("#panelCastillos").html(castillos);
                            
                            
                        }
                        
                        

                    }, "json");
                }

                function cargarGrupos() {
                    cargarRegistro();
                    $.get("GET/PartidosDocente", (r) => {
                       
                        if (r.grupos != undefined) {
                            let grupos = r.grupos;
                            let trGrupos = "";
                            for (let key in grupos) {
                                let grupo = grupos[key];
                                let estado = grupo.estado;
                                let estadoFinal = estado == "Registro" ? "Etapa Registro" : estado == "Finalizado" ? "Finalizado" : estado == "Pausa" ? "Pausado" : estado == "Jugando" ? "En juego" : "Clasificacion completada";
                                let labelEstado = `<span class="badge badge-${estado == "Registro" ? "warning" : estado == "Finalizado" ? "danger" : estado == "Pausa" ? "info" : estado == "Jugando" ? "success" : "primary"}">${estadoFinal}</span>`;
                                let btns = botones(estado, grupo.codigo, key)
                                trGrupos += `<tr><td>${grupo.codigo}</td><td><a>${grupo.grado }</a><br/><small>${grupo.fecha }</small>
                                            </td><td>${grupo.sede }</td><td>${ grupo.registrados}</td><td>${ grupo.cantidadRonda}</td>
                                            <td class="project-state">${labelEstado}<!--<span class="badge badge-success">Activo</span>--></td><td class="project-actions text-right">${btns}<!--  <a class="btn btn-info btn-sm" href="#">
                                                    <i class="fas fa-pencil-alt"></i>Cerrar Registro</a>
                                                                        <a class="btn btn-primary btn-sm" href="#">
                                                                              <i class="fas fa-play">
                                                                              </i>Jugar
                                                                          </a><a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i>Borrar</a>--></td></tr>`;

                                                                }
                                                                $("#tbodyGrupos").html(trGrupos);
                                                            }
                                                        }, "json");
                                                    }
                                                });



        </script>
    </body>
</html>
