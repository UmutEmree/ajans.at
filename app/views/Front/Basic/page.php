<?php include_once 'app/helper/General.php'; 
$helper = new General();
?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="<?php echo $set['General_desc'] ?>" />
<meta name="keywords" content="<?php echo $set['General_keyw'] ?>" />

<meta property="fb:app_id" content="<?php echo $set['fb_app_id'] ?>" /> 
<meta property="fb:admins" content="<?php echo $set['fb_admin_id'] ?>" />
<meta property="og:url" content="http://<?php echo $set['General_Site_Domain'] ?>"/>
<meta property="og:title" content="<?php echo $set['General_title'] ?>"/>
<meta property="og:image" content="http://<?php echo SITE_UPLOAD_DIR ?>content/logo.png"/>
<meta property="og:locale" content="tr_TR"/>
<meta property="og:type" content="website"/>
<title><?php echo $set['General_title'] ?></title>

 <?php include_once 'theme/sec.php'; ?>
 
</head>

<body>

<!--ust bant-->
<?php include 'theme/ust.php'; ?>
<!--nav--> 

 <?php include_once 'theme/nav.php'; ?>


<!--content-->
<div id="mainx">
<!--sag bolge-->
<?php include('theme/sag.php'); ?>
<!--orta bolge-->
<div id="ortax">
<!--manset-->
<h2 class="kh" style="width:688px;"><i></i> <p><?php echo $pg['Content_Name']; ?></p></h2>
  

<!--manset end-->
<div id="haberdetay">
 
 
<div id="iceriksi"><?php echo $pg['Content_Details']; ?></div>

<div class="clr"></div>
</div>
<div class="clr"></div>
 

 
<!--center haber  end-->

  
<!--footer haber  end-->
</div>


<!--orta end-->
  <div class="clr"></div>
 

</div><!--mainx galery end-->
<div class="clr10"></div>
<?php include("theme/footer.php"); ?>
 <!--footer end- -->

</body>
</html>

