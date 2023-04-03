<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="<?php echo SITE_PUBLIC_ADMIN ?>/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo SITE_PUBLIC_ADMIN ?>/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_PUBLIC_ADMIN ?>/assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_PUBLIC_ADMIN ?>/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_PUBLIC_ADMIN ?>/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="<?php echo SITE_PUBLIC_ADMIN ?>/assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_PUBLIC_ADMIN ?>/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_PUBLIC_ADMIN ?>/assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top">
<div class="container">
  <div class="row login-container column-seperation">  
        <div class="col-md-5 col-md-offset-1">
          <h2>Yönetici Giriş Formu</h2>
          <p>Kayıp Şifreler sistemimizde bulunan gsm numaralarınıza anlık olarak iletilir<br>
            bu işlem için telefonunuzun onaylı olması gerekmektedir.</p>
          <br>

		   <button class="btn btn-block btn-info col-md-8" type="button">
        
            <span class="bold">Yeni Şifre Talebi</span> </button>
		   <a class="btn btn-block btn-success col-md-8"  href="<?php echo SITE_URL ?>Admin/Yazarlogin">
            <span class="pull-left"><i class="icon-twitter"></i></span>
            <span class="bold">Köşe Yazarı olarak gir</span>
		    </a>
        </div>
        <div class="col-md-5 "> <br>
		
        
    
    <form id="login-form" class="login-form" action="<?php echo SITE_URL; ?>Admin/Login/runLogin" method="post">
		 <div class="row">
      <?=$alert ?>
		 <div class="form-group col-md-10">
            <label class="form-label">Kullanıcı Adı</label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="text" name="username" id="username" class="form-control">                                 
				</div>
            </div>
          </div>
          </div>
		  <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Şifre</label>
            <span class="help"></span>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
					<input type="password" name="pass" id="pass" class="form-control">                                 
				</div>
            </div>
          </div>
          </div>
		  <div class="row">
          <div class="control-group  col-md-10">
            <div class="checkbox checkbox check-success"> 
              <input type="checkbox" id="checkbox1" name="kahve" value="1">
              <label for="checkbox1">Beni Hatırla </label>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <button class="btn btn-primary btn-cons pull-right" type="submit">Login</button>
            </div>
          </div>
		  </form>
        </div>
     
    
  </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="<?php echo SITE_PUBLIC_ADMIN ?>/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="<?php echo SITE_PUBLIC_ADMIN ?>/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo SITE_PUBLIC_ADMIN ?>/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="<?php echo SITE_PUBLIC_ADMIN ?>/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo SITE_PUBLIC_ADMIN ?>/assets/js/login.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
</body>
</html>