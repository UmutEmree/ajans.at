<?php include_once 'app/helper/General.php'; 
$helper = new General();
?><!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="<?php echo $yazilar['yazi_desc'] ?>" />
  <meta name="keywords" content="<?php echo $yazilar['yazi_keyw'] ?>" />

  <meta property="fb:app_id" content="<?php echo $set['fb_app_id'] ?>" /> 
  <meta property="fb:admins" content="<?php echo $set['fb_admin_id'] ?>" />
  <meta property="og:url" content="http://<?php echo $set['General_Site_Domain'] ?>"/>
  <meta property="og:title" content="<?php echo $yazilar['yazi_name'].' || '.$set['General_title']; ?>"/>
  <meta property="og:image" content="http://<?php echo SITE_UPLOAD_DIR ?>yazarlar/<?php echo $yazilar['yazar_resim']; ?>"/>
  <meta property="og:locale" content="tr_TR"/>
  <meta property="og:type" content="website"/>
  <title><?php echo  $yazilar['yazi_name'].' || '.$set['General_title'];?></title>

  <?php include_once 'theme/sec.php'; ?>
  <?php include_once 'theme/fancy.php'; ?>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/tr_TR/all.js#xfbml=1&appId=<?php echo $set['fb_app_id'] ?>";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  
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
      <h2 class="kh" style="width:688px;"><i></i> <p><?php echo $yazilar['yazi_name']; ?></p></h2>

      
      
      <!--manset end-->

      <div id="haberdetay">
        <div id="jeneriksi"><?php echo $yazilar['yazi_jenerik']; ?></div>

        <div id="iceriksi">
          <img src="<?php echo SITE_UPLOAD_DIR.'yazarlar/122x102_'.$yazilar['yazar_resim']; ?>" 
          alt="<?php echo $yazilar['yazar_name'] ?>" style="margin:8px;" class="img-circle pull-left">
          <h2><?php echo $yazilar['yazar_name'] ?>
            <small class="pull-right"><?php echo substr($yazilar['yazi_insert_tarih'],0,10); ?></small>
            <br></h2><?php echo $yazilar['yazi_content']; ?>
          </div>

          <div class="clr"></div>
        </div>
        <div class="clr"></div>



        <div id="haberyorum">

          <?php if ($set['yorum_durumu'] == 1) {
            ?>
            <div id="fb-root"></div>


            <fb:comments href="<?php echo SITE_URL.'KoseYazarlari/KoseYazisi/'.$yazilar['yazi_id']; ?>" num_posts="5" width="670"></fb:comments>

            <?php
          } else {
            ?>



            <?php
          }
          ?>
          

        </div>
        <div class="clr10"></div>
        <div id="reklam1" class="728x90"><?php echo  $reklam['72890']['reklam_icerik']; ?></div>
        <div class="clr"></div>
        

        <div class="clr10"></div>
        <!--yazarlar end-->

        
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