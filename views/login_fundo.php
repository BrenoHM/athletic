<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrador | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/dist/css/style-menu.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="wrapper">
       
        <div class="login-logo">
            <img src="dist/img/logo.png"  alt="" id="centralizar">
         <b>Painel Administrativo</b>
        </div>
        <!-- /.login-logo -->
  <div class="login-box">
      
      <p class="login-box-msg" style="font-size:23px"> Inicie sua sessão</p>
       
    <?php if(isset($aviso)) { echo $aviso; } ?>
    
    <form action="" method="post">
      <div class="form has-feedback">
        <input type="email" class="form" name="emaUsu" placeholder="Email" style="color: #2D728B">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form has-feedback">
        <input type="password" class="form" name="senUsu" placeholder="Senha" style="color: #2D728B">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
        <!-- /.col -->
      <div class="text-center">
            <button type="submit" name="formLogar" id="login-button" style="color: #2D728B">Entrar</button>
        
    </form>

<!--    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>-->
    <!-- /.social-auth-links -->

    <!--<a href="<?php echo BASE_URL; ?>/usuarios/recuperar">Esqueci minha senha</a><br>-->
    <!--<a href="<?php echo BASE_URL; ?>/usuarios/registrar" class="text-center">Registrar novo Usuário</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo BASE_URL; ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo BASE_URL; ?>/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo BASE_URL; ?>/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
