<?php

require'../controlador/sessions.php';
$objses = new Sessions();
$objses->init();
$user = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null ;
$cedula = isset($_SESSION['cedula']) ? $_SESSION['cedula'] : null ;
$puchi = isset($_SESSION['puchi']) ? $_SESSION['puchi'] : null ;
if($user == ''){
	 header('Location:../usuario.php?error=2');
} ?>
<html>
    <head>
        
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>estudiante</title>

    <!-- Bootstrap Core CSS -->

            <link href="../css/uno.css" rel="stylesheet" type="text/css" media="screen" />
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
        
                        <script type="text/javascript" src="../js/paging.js"></script>
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
<!--            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
            </div>-->
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
                    <small><?php echo ''.$user; ?></small> <?php echo 'Doc de identidad:'; ?><small><?php echo ''.$cedula; ?></small>
                    <?php echo 'Examen:'; ?><small><?php echo ''.$puchi; ?></small>
                </h1>
<!--                <ol class="breadcrumb">
                    <li><a href="inicio.php">estudiante</a>
                    </li>
                    <li class="active">calificación</li>
                </ol>-->
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
<!--            <div class="col-md-3">
                <div class="list-group">
                    <a href="inicio.php" class="list-group-item ">Inicio</a>
                    <a href="presentarexamen.php" class="list-group-item ">Presentar examen</a>
                    <a href="calificacion.php" class="list-group-item active">Calificaciones</a>
                </div>
            </div>-->
            <!-- Content Column -->
            <div class="col-md-11">
                            <h2> Bienvenido</h2>
                <p>el examen consta de 5 minutos, debe marcar todas las preguntas.</p>
                <form action="../controlador/resultado.php" method="post">
                                <table  id="results" class="display" cellspacing="0" width="100%">
                  <thead style="background-color: #940008; color: #fff;">
      <tr>
            <th>Item</th>
            <th>Pregunta</th>
      </tr>
    </thead>
    <tbody>
              <?php
              require '../dao/PruebaDao.php';
              require '../dao/EnunciadoDao.php';
              require '../modelo/Conexion.php';
                    $uDao = new PruebaDao();
                    $allusers = $uDao->preguntas($puchi);
                    $edao = new EnunciadoDao();
                    $asd =1;
                   foreach($allusers as $user):  ?>

                <tr><td><?php echo $asd.'.' ?> </td>
                    <td>   <?php echo $user['b']; ?> </td>
                </tr>
                       <?php $allo = $edao->respuestas($user['c']) ;
                 foreach($allo as $u){?>
                <tr><td><?php echo $u['a'].'.'; ?> </td>
                    <td>   <?php echo $u['b']; ?> </td>
                </tr>
                 <?php } ?>
                <tr><td><div class="form-group">
  <label for="rta">Rta:</label>
  <input width="10px" type="text" style="visibility: hidden;" class="form-control" id="rta" name="rta<?php echo $asd; ?>" value="<?php echo $user['a']; ?>"></div></td>
  <td>
<div class="form-group">
    <select class="form-control" id="resp" name="resp<?php echo $asd; ?>">
      <option value="f" selected="true">seleccione una</option>
      <option value="a">a</option>
      <option value="b">b</option>
      <option value="c">c</option>
      <option value="d">d</option>
      <option value="e">e</option>
  </select>
</div></td>
                </tr>
            <?php $asd=$asd+1;  endforeach; ?>   </tbody>
  </table>
                <br>
                            <div class="col-xs-5">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span>Guardar</button>   
                        </div>
<input width="10px" type="text" style="visibility: hidden;" class="form-control" id="sda" name="sda" value="<?php echo $asd; ?>">
                </form>

              <div id="pageNavPosition"></div>
              <script type="text/javascript"><!--
        var pager = new Pager('results', 7); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>
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
</body>
</html>
