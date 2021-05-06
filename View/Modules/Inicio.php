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
@media (max-width: 600px) {
  h2 {
    font-size: 1.55rem;
  }
}
@media (max-width: 1024px) {
  h2 {
    font-size: 1.5rem;
  }
}
        </style>
    </head>
    <body class="hold-transition layout-top-nav">
        
        <div class="wrapper ">
            
            <nav class="main-header navbar navbar-expand-md navbar-dark ">
                <div class="container">
                    <a href="Inicio" class="navbar-brand">
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
            
            <div class="content-wrapper row justify-content-center " style="margin-right: 0px">
                              
          
              
                    <div class="row align-self-center col-12">

            <div class="align-self-center row justify-content-center col-12" id="panelCastillos">
                <h1>El juego estara activo de 7am a 9pm.</h1>
                
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

        <script type="module" src="View/Public/js/Castillos.js?v=<?php echo filemtime(RAIZ . "View/Public/js/Castillos.js"); ?>"></script>
    </body>
</html>