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
<h2 class="kh" style="width:688px;"><i></i> <p><?php echo $yazar[0]['yazar_name']; ?> Köşe Yazıları</p></h2>
  

<!--manset end-->
<div id="haberdetays">
 
 
<div id="iceriksi">


<div class="row">
    
  <?php 
	 foreach ($yazar as $yazi) { ?>
	 <a href="<?php echo SITE_URL.'KoseYazarlari/KoseYazisi/'.$yazi['yazi_id']; ?>">
  <div class="col-md-3 yazarlarlist">
    <div class="thumbnail">
   <img src="<?php echo SITE_UPLOAD_DIR.'yazarlar/122x102_'.$yazi['yazar_resim']; ?>" height="91" />
      <div class="caption">
        <h3 class="yazarbaslik"><?php echo $yazi['yazi_name']; ?> </h3>
        <hr>
        <p><?php echo $helper->kisalt($yazi['yazi_jenerik'],50); ?></p>
      </div>
    </div>
  </div></a>
 <?php }?>

</div>
<div id="reklam1" ><?php echo  $reklam['72890']['reklam_icerik']; ?></div>

</div>

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
