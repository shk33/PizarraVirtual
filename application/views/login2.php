<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <![endif]-->
  <title>Pizarra Virtual</title>
  <!-- Favicon -->
    <link href="<?php echo base_url() ?>assets/css/favicon.ico" rel="shortcut icon" type="image/png" />
  <!--REQUIRED STYLE SHEETS-->
  <!-- BOOTSTRAP CORE STYLE CSS -->
  <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet" />
  <!-- CUSTOM STYLE CSS -->
  <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" />
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <!--Header section  -->
  <div id="home">
    <div class="container" >
      <div class="row ">
        <div class="col-md-8 col-sm-8">
          <h1 class="head-main">Pizarra Virtual</h1>
        </div>
       <div class="col-md-4 col-sm-4">

         <div class="div-trans text-center">
          <?php if (validation_errors() != "" || $error): ?>
            <br>
            <div class="btn btn-danger btn-md">Credenciales Invalidas</div>
          <?php endif ?>
           <h3>Ingresar</h3>
            <?php echo form_open('login/login_user') ?>
           
              <div class="col-md-12 col-sm-12">
                <div class="form-group">
                  <?php 
                    $config = array(
                      'name'        => 'correo',
                      'type'        => 'text',
                      'class'       => 'form-control',
                      'id'          => 'inputEmail',
                      'placeholder' => 'Correo Electrónico',
                      'value'       => set_value('correo')
                    );
                    echo form_input($config); 
                  ?>
                </div>
              </div>

              <div class="col-md-12 col-sm-12">
                <div class="form-group">
                  <?php 
                    $config = array(
                      'name'        => 'contrasena',
                      'type'        => 'password',
                      'class'       => 'form-control',
                      'id'          => 'inputPassword',
                      'placeholder' => 'Contraseña'
                    );
                    echo form_input($config); 
                  ?>
                </div>
              </div>
          
          
              <div class="col-md-12 col-sm-12">
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Entrar al sistema</button>
                </div>
              </div>
           
            <?php echo form_close() ?>
          </div>
        </div>
      </div>
    </div>
  </div>    

  <!-- CORE JQUERY  -->
  <script src="<?php echo base_url() ?>assets/plugins/jquery-1.10.2.js"></script>

  <!-- BOOTSTRAP CORE SCRIPT   -->
  <script src="<?php echo base_url() ?>assets/plugins/bootstrap.js"></script>
 
</body>
</html>
