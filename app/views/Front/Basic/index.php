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

<?php include("theme/manset.php"); ?>
<!--manset end-->
<div class="clr10"></div>
<div id="reklam1" class="728x90"><?php echo  $reklam['72890']['reklam_icerik']; ?></div>
<div class="clr"></div>
<!--resim galerisi baslad-->
<div id="resimgalerisi1">
<div id="resimgalerisi1head"></div>
<div id="resimgalerisi1center">
<?php include("theme/imgsld.php"); ?>
</div>
</div>
<!--resim galerisi end-->

<div class="clr10"></div>
<!--yazarlar end-->

<?php include('theme/centerhaber.php'); ?>
<!--center haber  end-->


 <?php //include("theme/footerhaber.php"); ?> 
<!--footer haber  end-->
</div>


<!--orta end-->
  <div class="clr"></div>
<div id="footernews">
<!--reklam-->
<div id="reklam2"class="728x90"><?php echo  $reklam['72890']['reklam_icerik']; ?></div>
<!--reklam end-->
  <div class="clr"></div>
  <!--video galeri index start-->
  
<?php include("theme/videogaleri.php"); ?>
  <!--video galery end-->
<div id="spothaberler">
<?php include("theme/spotslider.php"); ?>
</div>

</div><!--footernews galery end-->


</div><!--mainx galery end-->
<div class="clr10"></div>
<?php include("theme/footer.php"); ?>
 <!--footer end -->

</body>
</html>