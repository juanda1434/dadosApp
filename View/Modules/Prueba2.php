<?php
session_start();
if (isset($_SESSION["loginEstudiante"])) {
    header("Location: InicioEstudiante");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Estudiante</title>
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
    <body class="hold-transition layout-top-nav">
        
        <div class="wrapper ">
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
                            <li class="nav-item">
                                <a href="Inicio" class="nav-link">Inicio</a>
                            </li>

                        </ul>


                    </div>


                </div>
            </nav>
            <div class="content-wrapper row justify-content-center " style="margin-right:0px">
                
          
              
                
                    <div class="row align-self-center col-12 ">

            <div class="align-self-center row justify-content-center col-12 ">
<div class="login-box col-12 col-sm-8 col-lg-6 ">
            
            <!-- /.login-logo -->
            <div class="card mb-0 shadow-none"  style="background-color: rgba(22,22,22,0);">
                
                
                <div class="card-body  col-12 row justify-content-center"  style="background-color: rgba(0,0,0,0);">
                    <h2  >Meta :<span id="lblPuntajeFinal">Cargando...</span></h2>
                    <div class="col-12 row  justify-content-center" style="min-height: 350px">
                        <div class="col-12 row align-content-center" >
                            <img id="imgCastillo" src="View/Public/img/castillo1.png" class="img-fluid col-12" alt="alt" />
                </div>
                        
                        
                        <div class="col-12 col-lg-8 align-self-center text-center d-none d-lg-block" style="background-color:rgba(28,86,84,0.45);position: absolute ;">
                            <h1 class=" text-white" style="border-bottom: 1px solid rgba(255,255,255,0.5)" id="lblSedeInicio">Cargando ...</h1>
                            <h2 class=" text-white" ">Puntos: <small id="lblPuntajeInicio">Cargando ...</small></h2>                    
                    </div>
                        <div class="col-12 col-lg-8 align-self-start text-center d-lg-none" style="background-color:rgba(28,86,84,0.45);position: absolute ;">
                            <h2 class=" text-white" style="border-bottom: 1px solid rgba(255,255,255,0.5)" id="lblSedeInicio-sm">Cargando ...</h2>
<h5 class=" text-white" ">Puntos: <small id="lblPuntajeInicio-sm">Cargando ...</small></h5>

                    
                    </div>
                    <div class="col-8 col-lg-6 align-self-end" style="background-color: rgba(28,86,84,0.2);position: absolute ;">
                        <p class="login-box-msg text-white">Ingresa tu codigo y contraseña</p>

                    
                        <div class="input-group mb-3">
                            <input id="inputUsuarioLoginEstudiante" type="text" class="form-control" placeholder="codigo">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="inputContraseñaLoginEstudiante" type="password" class="form-control" placeholder="Contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                   
                       <div class="row justify-content-center col-12 ">

                            
                            <div class="col-12 col-md-4">
                                <a id="btnLoginEstudiante" href="" role="button" class="btn btn-dark btn-block">Ingresar</a>
                            </div>
                         
                        </div>
                   

                </div>
                <!-- /.login-card-body -->
                
            </div>
             
        </div>
            </div>
                   </div>
               
               

            </div>
            
            <footer class="main-footer bg-navy ml-0" >
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

        <script type="module" src="View/Public/js/MainJuego.js?v=<?php echo filemtime(RAIZ . "View/Public/js/MainJuego.js"); ?>"></script>
    </body>
</html>