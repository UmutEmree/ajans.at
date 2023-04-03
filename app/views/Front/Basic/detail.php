<?php include_once 'app/helper/General.php'; 
$helper = new General();
?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="<?php echo $currentnews['news_desc'] ?>" />
<meta name="keywords" content="<?php echo $currentnews['news_keyw'] ?>" />

<meta property="fb:app_id" content="<?php echo $set['fb_app_id'] ?>" /> 
<meta property="fb:admins" content="<?php echo $set['fb_admin_id'] ?>" />
<meta property="og:url" content="http://<?php echo $set['General_Site_Domain'] ?>"/>
<meta property="og:title" content="<?php echo $currentnews['news_name'].' || '.$set['General_title']; ?>"/>
<meta property="og:image" content="http://<?php echo SITE_UPLOAD_DIR ?>news/690x334_<?php echo $currentnews['news_image_main']; ?>"/>
<meta property="og:locale" content="tr_TR"/>
<meta property="og:type" content="website"/>
<title><?php echo  $currentnews['news_name'].' || '.$set['General_title'];?></title>

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
<?php include('theme/sag2.php'); ?>
<!--orta bolge-->
<div id="ortax">
<!--manset-->
<h2 class="kh" style="width:688px;"><i></i> <p><?php echo $currentnews['news_name']; ?></p></h2>


<?php if ($currentnews['news_video'] != ''){echo $currentnews['news_video'];}?>
 <div id="jeneriksitop"><?php echo $currentnews['news_jenerik']; ?></div>
<div id="manset">
<div id="slideshow">
        <div class="slides">
                <ul>
             
                    <li id="slide-<?php echo $i ?>"> <img src="<?php echo SITE_UPLOAD_DIR ?>news/690x334_<?php echo $currentnews['news_image_main']; ?>" width="690"   alt="<?php echo $currentnews['news_name']; ?>" title="<?php echo $currentnews['news_name']; ?>">
                    
                    <div style="width:600px; height:40px; position:relative; margin:-50px auto; z-index:9999;">   
          <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style fl">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-536c43910368e108"></script>
<!-- AddThis Button END -->
</div>
                      </li>
                      
              </ul>
              
           
      
             </div>                 
               
            
        
      </div>

 

</div>
<!--manset end-->

<div id="haberdetay">
<h2><?php echo $currentnews['news_name']; ?></h2>
 <div id="iceriksi"><?php echo $currentnews['news_content']; ?></div>

<div class="clr"></div>
</div>
<div class="clr"></div>
<?php if ($currentnews['news_gallery'] == 1) {
  ?>

<div id="resimgalerisi1">
<div id="resimgalerisi1head"></div>
<div id="resimgalerisi1centerdetay" >
<?php include("theme/detaygaleri.php"); ?>
<div class="clr"></div>
</div>
</div>
<div class="clearfix"></div>
<?php } ?>

<div id="haberyorum">

	<?php if ($set['yorum_durumu'] == 1) {
		?>
<div id="fb-root"></div>


<fb:comments href="<?php echo SITE_URL.$currentcat['Cat_Seo_Name'].'/'.$currentnews['news_seo_name']; ?>" num_posts="5" width="670"></fb:comments>

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

<?php include('theme/centerdetail.php'); ?>
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