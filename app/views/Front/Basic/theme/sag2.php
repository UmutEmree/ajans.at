

<div id="sagx">
<!--<div id="kurvesporbanner"></div>-->
<!--sag haber start-->
 

<!--sag haber end--> 
<?php  include("koseyazarlari.php"); ?> 
<div class="300x300 ortala fr"><?php echo  $reklam['300300']['reklam_icerik']; ?></div> 
<div id="guneyansiyanhaberler">
<h2><i></i><p>GÜNDEN YANSIYANLAR</p></h2>

<ul class="contentsi">
   <?php foreach ($gundemhaberleri as  $rowgun): ?>
     
   
<li>
<a href="<?php echo SITE_URL.$rowgun['Cat_Seo_Name'].'/'.$rowgun['news_seo_name'] ?>" class="imgsi"><img src="<?php echo SITE_UPLOAD_DIR ?>news/90x61_<?php echo $rowgun['news_image_main'] ?>" width="90" height="61"></a>
<h3 class="basliksi"><?php echo $helper->kisalt($rowgun['news_name'],30); ?></h3>
<p class="psi"><?php echo $helper->kisalt($rowgun['news_jenerik'],90); ?></p>
</li>

<?php endforeach ?>
</ul>

</div>
 
<!--sag spor haber end-->
 <?php  //include("sagaltkur.php"); ?> 
<!--kurlar end-->
<div id="reklam3">
<?php echo  $reklam['300300']['reklam_icerik']; ?></div>
</div>
 