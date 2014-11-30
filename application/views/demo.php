
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>Pizarra Virtual</title>

    <!-- Favicon -->
    <link href="<?php echo base_url() ?>assets/css/favicon.ico" rel="shortcut icon" type="image/png" />

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/landing/css/main.css" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><b>Pizarra Virtual</b></a>
        </div>
      </div>
    </div>

	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1>Haz de las matemáticas algo sencillo.</h1>
					<a href="<?php echo base_url(); ?>login">
						<button type="submit" class="btn btn-warning btn-lg">Ingresar al Sistema</button>
					</a>
				</div><!-- /col-lg-6 -->
				<div class="col-lg-6">
					<img class="img-responsive" src="<?php echo base_url(); ?>assets/landing/img/ipad-hand.png" alt="">
				</div><!-- /col-lg-6 -->
				
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /headerwrap -->
	
	
	<div class="container">
		<div class="row mt centered">
			<div class="col-lg-6 col-lg-offset-3">
				<h1>Las matemáticas<br/>Al fin de una forma fácil.</h1>
				<h3>Un entorno colaborativo que facilita el aprendizaje de las matemáticas.</h3>
			</div>
		</div><!-- /row -->
		
		<div class="row mt centered">
			<div class="col-lg-4">
				<img src="<?php echo base_url(); ?>assets/landing/img/ser01.png" width="180" alt="">
				<h4>1 - Herramienta Online</h4>
				<p>Accede desde cualquier dispositivo conectado a internet.</p>
			</div><!--/col-lg-4 -->

			<div class="col-lg-4">
				<img src="<?php echo base_url(); ?>assets/landing/img/ser02.png" width="180" alt="">
				<h4>2 - Comunícate fácilmente</h4>
				<p>Tendrás a tu disposición una forma fácil de comunicarte con tus compañeros, tutores e incluso administradores del sitio.</p>

			</div><!--/col-lg-4 -->

			<div class="col-lg-4">
				<img src="<?php echo base_url(); ?>assets/landing/img/ser03.png" width="180" alt="">
				<h4>3 - Verificador de Ecuaciones</h4>
				<p> Tendrás a tu disposición un poderoso verificador de ecuaciones que te dirá si tus cálculos matemáticos son correctos o no , si encontramos algún error en tus ecuaciones te propondremos posibles errores comunes que  pudiste haber cometido.</p>

			</div><!--/col-lg-4 -->
		</div><!-- /row -->
	</div><!-- /container -->
	
	<div class="container">
		<hr>
		<div class="row centered">
			<div class="col-lg-6 col-lg-offset-3">
				<a href="<?php echo base_url(); ?>login">
					<button type="submit" class="btn btn-warning btn-lg">Ingresar al Sistema</button>
				</a>
			</div>
			<div class="col-lg-3"></div>
		</div><!-- /row -->
		<hr>
	</div><!-- /container -->
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
