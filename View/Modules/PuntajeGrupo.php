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
            
            .list-group-item.activoo.win{
                background-color: #c8e6c9;
            }

        </style>
    </head>
    <body class="hold-transition layout-top-nav" >
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand-md navbar-dark ">
                <div class="container">
                    <a href="#" class="navbar-brand">
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
                            <?php
                            session_start();
                            $list = <<<Lista
                            <li class="nav-item">
                            <a href="Grupos" class="nav-link">Volver</a>
                            </li>
                            Lista;
                            if (isset($_SESSION["infoEstudiante"])) {
                                $list = <<<Lista
                                <li class="nav-item">
                                <a href="InicioEstudiante" class="nav-link">Volver Menu</a>
                                </li>
                                <li class="nav-item">
                                <a href="Logout" class="nav-link">Salir</a>
                                </li>
                                Lista;
                            } 
                            echo $list;
                            ?>


                        </ul>


                    </div>


                </div>
            </nav>
            <div class="content-wrapper">

                <div class="container ">
                    <div class="row justify-content-center">


                        <div class="login-box col-12 col-lg-6 mt-4" id="tablapuntuacionesd">

                            <!-- /.login-logo -->
                            <div class="card ">
                                <div class="card-header text-center ">
                                    <h2><b>Tabla de puntuacion</b> </h2>

                                </div>
                                <div  class="card-body login-card-body">       

                                    <div class="row">
                                        <div class="col-12 p-0 " >
                                            <div class="col-12">
                                                <ul id="listPuntajes" class="list-group list-group-unbordered mb-3">



                                                </ul>
                                            </div>



                                        </div>

                                        <!-- /.col -->

                                        <!-- /.col -->
                                    </div>



                                </div>

                                <!-- /.login-card-body -->
                            </div>
                        </div>
                    </div> 

                </div>


            </div>


            <footer class="main-footer bg-navy">
                <!-- To the right -->
                <div class="float-right ">
                    Realizado por <a href="https://facebook.com/Devidsft">Devidsft</a>
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
            $(() => {
                let codigo = readGet.codigo;
                $.post("GET/PuntajesGrupo/codigo=" + codigo, (r) => {
                    console.log(r);
                    
                    if (r.puntajes != undefined) {
                        let idmi="";
                        if (r.ide!=undefined && r.ide!=null) {
    idmi=r.ide;
}
                        let cantidadNiños = 0;
                        let listPuntajes = "";
                        for (var key in r.puntajes) {
                            let tabla = r.puntajes[key];
                            cantidadNiños++;
                            let tiempo= parseFloat(tabla.tiempo);
                            let yo=idmi==tabla.id ?"activoo win":"";
                            listPuntajes += `<li class="list-group-item ${yo}">${ cantidadNiños } -  
                                                           ${ tabla.nombre } <a class="float-right pr-1">${tabla.puntaje} - ${tiempo}sg</a>
                                                        </li>`;
                        }
                        $("#listPuntajes").html(`<li class="list-group-item "># -  
                                                           <b>Nombre</b> <a class="float-right pr-1">Puntos - Tiempo</a>
                                                        </li>`+listPuntajes);

                    }

                }, "json");
            });
            
            let interval=setInterval(()=>{
    $.post("POST/ActualizarEstado",{actualizar:true},(r)=>{
        console.log(r);
    });
},5000);

interval;
        </script>
    </body>
</html>