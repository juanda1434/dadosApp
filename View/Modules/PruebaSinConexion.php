
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
                    <a href="PruebaSinConexion" class="navbar-brand">
                        <img src="View/Public/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle  elevation-3"
                             >
                        <span class="brand-text font-weight-light">Colegio Santos Apostoles</span>
                    </a>

                    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                        <!-- Left navbar links -->



                    </div>


                </div>
            </nav>
            <div class="content-wrapper">

                <div class="container ">
                    <div class="row justify-content-center">

                        <div class=" row col-12 col-lg-6 justify-content-center mt-5">

                            <div class="login-box">

                                <!-- /.login-logo -->
                                <div id="banderaTablero" class="card ">
                                    <div class="card-header text-center ">
                                        <h2>Escriba su numero de tarjeta de identidad</h2>
                                    </div>
                                    <div  class="card-body login-card-body p-0 ">       

                                        <div id="contenedorpadre" class="row p-0 ">
                                            <div class="col-12 p-0 " id="container">


                                            </div>

                                        </div>



                                    </div>
                                    <div class="card-footer">

                                        <div class="row justify-content-center">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="identidad">Tarjeta identidad</label>
                                                    <input type="text" class="form-control" id="identidad" placeholder="tarjeta identidad">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row lineat">

                                            <div class="col-12">
                                                <button id="btnEnviar" type="button" class="btn btn-info btn-flat btn-block"><i class="fas fa-paper-plane "></i> Enviar</button>
                                            </div>


                                        </div>



                                    </div>
                                    <!-- /.login-card-body -->
                                </div>
                            </div>
                        </div>

                    </div> 

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


        <script>
            $("#btnEnviar").on("click", () => {
                const identidad= $("#identidad").val();
                if(identidad.length<=0){
                    alert("Debes ingresar numero de tarjeta de identidad");
                    return;
                }
                console.log(identidad);
                $.get("GET/LinkPrueba/codigo="+identidad, (r) => {
                    if(r.link!=undefined){                    
                    document.location.href = r.link;
                    }else{
                        alert("verifique el numero de tarjeta de identidad");
                    }
                },"json")
            });
        </script>
    </body>
</html>