<?php

require'../controlador/sessions.php';
$objses = new Sessions();
$objses->init();
$user = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null ;
$cedula = isset($_SESSION['cedula']) ? $_SESSION['cedula'] : null ;
if($user == ''){
	 header('Location:../usuario.php?error=2');
}
$err = isset($_GET['error']) ? $_GET['error'] : null ;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>estudiante</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background: #c9302c;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
<!--                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>-->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="background: #c9302c;">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: #c9302c;">Salir <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="../controlador/log_out.php">cerrar cesión</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Estudiante:
                    <small><?php echo ''.$user; ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="inicio.php">estudiante</a>
                    </li>
                    <li class="active">Presentar examen</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="inicio.php" class="list-group-item ">Inicio</a>
                    <a href="presentarexamen.php" class="list-group-item active ">Presentar examen</a>
                    <a href="calificacion.php" class="list-group-item">Calificaciones</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2> Bienvenido</h2>
                <p>Debe ingresar el codigo del examen que usted va a presentar.</p>
                <form role="form" class="form-horizontal" action="../controlador/prueba.php" method="post">
                            <div class="form-group">
             <?php if($err==2){ echo "<div class='alert alert-danger text-center'>
                            <strong>Advertencia:No es el horario establecido para presentar el examen</strong></div> ";  } ?>
			<?php if($err==1){
				echo "<div class='alert alert-danger text-center'>
                            <strong>Advertencia:El examen no se existe </strong></div>";
			}?>
                            <?php if($err==3){
				echo "<div class='alert alert-danger text-center'>
                            <strong>Advertencia:El examen esta fuera de la fecha </strong></div>";
			}?>
                            <?php if($err==4){
				echo "<div class='alert alert-danger text-center'>
                            <strong>Advertencia:Usted ya presento la prueba </strong></div>";
			}?>
                            </div>
                    <div class="form-group">
                        <label for="codigo" class="control-label col-xs-4">Codigo del examen:</label>
                        <div class="col-xs-5">
                            <input id="codigo" name="codigo" type="text" class="form-control" placeholder="Escriba su codigo" onkeyup="validacion('codigo');" aria-describedby="inputSuccess2Status" required="true">
                            <span class="help-block"></span>
                        </div>
                    </div>
<!--                    <div class="form-group">
                        <label for="nombres" class="control-label col-xs-4">Nombres y Apellidos:</label>
                        <div class="col-xs-5">
                            <input id="nombres" name="nombres" type="text" class="form-control" placeholder="Escriba sus Nombres y Apellidos" onkeyup="validacion('nombres');">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dni" class="control-label col-xs-4">DNI:</label>
                        <div class="col-xs-5">
                            <input id="dni" name="dni" type="text" class="form-control" placeholder="Escriba su DNI" onkeyup="validacion('dni');">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-xs-4">EMAIL:</label>
                        <div class="col-xs-5">
                            <input id="email" name="email" type="text" class="form-control" placeholder="Escriba su email" onkeyup="validacion('email');">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="genderRadios" class="control-label col-xs-4">Genero:</label>
                        <div class="col-xs-3">
                            <label class="radio-inline">
                                <input id="male" type="radio" name="genderRadios" value="M" onclick="validacion('genderRadios')"> Maculino
                            </label>
                            <label class="radio-inline">
                                <input id="female" type="radio" name="genderRadios" value="F" onclick="validacion('genderRadios')"> Femenino
                            </label>
                           
                        </div>
                        <div class="col-xs-2">
                                            </div>
                            
                        
                       
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-xs-4">Carrera Profesional:</label>
                        <div class="col-xs-5">
                            <select id="carrera" name="carrera" class="form-control" onchange="validacion('carrera');">
                                <option value="">Seleccione uno</option>
                                <option value="1">Ing. Sistema e Informatica</option>
                                <option value="2">Ing. Ambiental</option>
                                <option value="3">Ing. Pesquera</option>
                            </select>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label for="codigo" class="control-label col-xs-4"></label>
                        <div class="col-xs-5">
                            <button   type="text" class="btn btn-primary" onclick='verificar();' ><span class="glyphicon glyphicon-lock"></span> Presentar prueba</button>   
                        </div>
                    </div>                 
                </form>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                    <p>ADSI;Website 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="..js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="..js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/validacion.js"></script>
</body>

</html>
