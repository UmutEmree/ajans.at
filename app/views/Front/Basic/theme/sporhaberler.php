


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

<div id="sagsporhaberler">
<h2><i></i><p>SPOR</p></h2>

<ul class="contentsi">
   <?php foreach ($sporhaberleri as  $rowspr): ?>
     
   
<li>
<a href="<?php echo SITE_URL.$rowspr['Cat_Seo_Name'].'/'.$rowspr['news_seo_name'] ?>" class="imgsi"><img src="<?php echo SITE_UPLOAD_DIR ?>news/90x61_<?php echo $rowspr['news_image_main'] ?>" width="90" height="61"></a>
<h3 class="basliksi"><?php echo $helper->kisalt($rowspr['news_name'],30); ?></h3>
<p class="psi"><?php echo $helper->kisalt($rowspr['news_jenerik'],90); ?></p>
</li>

<?php endforeach ?>
</ul>

</div>
