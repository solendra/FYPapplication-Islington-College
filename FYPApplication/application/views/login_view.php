<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Om Furnishing Management System</title>
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

   <!-- Bootstrap 3.3.4 -->
    <link href="<?=base_url('assets/theme/')?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?=base_url('assets/theme/font-awesome-4.3.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url('assets/theme/')?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/theme/')?>/dist/css/style.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo" >
        <b><u style="font-size:30px;">OM Furnishing Management System</u><b>
      </div><!-- /.login-logo -->
     
      
       
      <?php if ($this->session->flashdata('msg')): ?>

        <div class="alert alert-success alert-dismissible" role="alert" id="err_msg_div">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <?= $this->session->flashdata('msg'); ?>
        </div>

    <?php endif; ?>
      
      
      <?php if ($this->session->flashdata('err_msg')): ?>

        <div class="alert alert-danger alert-dismissible" role="alert" id="err_msg_div">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <?= $this->session->flashdata('err_msg'); ?>
        </div>

    <?php endif; ?>
     
      
      <div class="login-box-body">
        <p class="login-box-msg"><u> Log In Here</u></p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
             
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
            </div><!-- /.col -->
          </div>
        </form>

        

        <p>Forgot Password || <a href="<?=base_url('forgot_password');?>">Reset Here </a></p><br>
        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    

     <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets/theme/plugins/jQuery/jQuery-2.1.4.min.js')?>" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url('assets/theme/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>

     
  </body>
</html>
  
