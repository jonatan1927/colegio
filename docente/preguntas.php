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

    <title>docente</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/uno.css" rel="stylesheet" type="text/css" media="screen" />

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
                <h1 class="page-header">Docente:
                    <small><?php echo ''.$user; ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="inicio.php">docente</a>
                    </li>
                    <li class="active">Preguntas</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="inicio.php" class="list-group-item">Inicio</a>
                    <a href="curso.php" class="list-group-item ">Adicionar curso</a>
                    <a href="preguntas.php" class="list-group-item active">Adicionar preguntas</a>
                    <a href="examen.php" class="list-group-item ">Publicar examen</a>
                    <a href="calificacion.php" class="list-group-item">Calificaciones</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2> Bienvenido</h2>
                <p>Mediante este formulario usted puede registrar preguntas.</p>
                <form role="form" class="form-horizontal" action="../controlador/agregarPregunta.php" method="post">
                            <div class="form-group">
             <?php if($err==1){ echo "<div class='alert alert-success text-center'>
                            <strong>Advertencia:Su registro ha sido guardado</strong></div> ";  } ?>
			<?php if($err==2){
				echo "<div class='alert alert-danger text-center'>
                            <strong>Advertencia: </strong>este registro no se pudo realizar</div>";
			}?>
                        <?php if($err==3){
				echo "<div class='alert alert-danger text-center'>
                            <strong>Advertencia: </strong>el codigo del curso no esta asignado</div>";
			}
                        ?> </div>
                    <div class="form-group">
                        <label for="codigo" class="control-label col-xs-4">Codigo del curso:</label>
                        <div class="col-xs-5">
                            <input id="codigo" name="codigo" type="text" class="form-control" placeholder="Escriba el codigo" onkeyup="validacion('codigo');" aria-describedby="inputSuccess2Status">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                <label for="nombres" class="control-label col-xs-4">Pregunta:</label>
                <div class="col-xs-5">
                    <textarea id="nombres" name="nombres" rows="3" class="form-control" placeholder="pregunta" onkeyup="validacion('nombres');"></textarea>
                    <span class="help-block"></span>
                </div>
                    </div>
                <div class="form-group" style=" width: 700px; margin-left: 70px;"> 
                <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Posibles respuestas</th>   
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>a</td>
        <td>                <div class="col-xs-12">
                <input id="pre" name="pre" rows="3" class="form-control" placeholder="pregunta" onkeyup="validacion('pre');">
                    <span class="help-block"></span>
                </div></td>
        </tr>
          <tr>
        <td>b</td>
                <td>                <div class="col-xs-12">
                    <input id="preg" name="preg" rows="3" class="form-control" placeholder="pregunta" onkeyup="validacion('preg');">
                    <span class="help-block"></span>
                </div></td>      </tr>
          <tr>
        <td>c</td>
               <td>                <div class="col-xs-12">
                    <input id="pregu" name="pregu" rows="3" class="form-control" placeholder="pregunta" onkeyup="validacion('pregu');">
                    <span class="help-block"></span>
                </div></td>  </tr>
          <tr>
        <td>d</td>
               <td>                <div class="col-xs-12">
                    <input id="pregun" name="pregun" rows="3" class="form-control" placeholder="pregunta" onkeyup="validacion('pregun');">
                    <span class="help-block"></span>
                </div></td>    </tr>
              <tr>
        <td>e</td>
               <td>                <div class="col-xs-12">
                    <input id="pregunta" name="pregunta" rows="3" class="form-control" placeholder="pregunta" onkeyup="validacion('pregunta');">
                    <span class="help-block"></span>
                </div></td>    </tr>
    
    
    </tbody></table>
      </div>
                    <div class="form-group">
                        <label for="pregunt" class="control-label col-xs-4">Respuesta:</label>
                        <div class="col-xs-5">
                            <input id="pregunt" name="pregunt" type="text" class="form-control" placeholder="respuesta" onkeyup="validacion('pregunt');" aria-describedby="inputSuccess2Status">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-4"></label>
                        <div class="col-xs-5">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Registrar pregunta</button>   
                        </div>
                    </div>                 
                </form>
               
            </div>
        </div>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                    <p>ADSI;Website 2016</p>
                </div>
            </div>
        </footer>
    </div>
     <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="..js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="..js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/validacion.js"></script>
</body>

</html>
