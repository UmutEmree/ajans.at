<?php include_once 'app/helper/General.php'; 
$helper = new General();
?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="<?php echo $currentcat['Cat_Meta_Desc'] ?>" />
<meta name="keywords" content="<?php echo $currentcat['Cat_Meta_Keyw'] ?>" />

<meta property="fb:app_id" content="<?php echo $set['fb_app_id'] ?>" /> 
<meta property="fb:admins" content="<?php echo $set['fb_admin_id'] ?>" />
<meta property="og:url" content="http://<?php echo $set['General_Site_Domain'] ?>"/>
<meta property="og:title" content="<?php echo $currentcat['Cat_Page_Title'].' || '.$set['General_title']; ?>"/>
<meta property="og:image" content="http://<?php echo SITE_UPLOAD_DIR ?>content/logo.png"/>
<meta property="og:locale" content="tr_TR"/>
<meta property="og:type" content="website"/>
<title><?php echo  $currentcat['Cat_Page_Title'].' || '.$set['General_title'];?></title>

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
 

<div class="clr10"></div>
<!--yazarlar end-->

<?php include('theme/centerhabercats.php'); ?>
<!--center haber  end-->
 
<!--footer haber  end-->
</div>


<!--orta end-->
  <div class="clr"></div>
 


</div><!--mainx galery end-->
<div class="clr10"></div>
<?php include("theme/footer.php"); ?>
 <!--footer end -->

</body>
</html>