<div id="centerhaberlist">
 
<h2 class="kh"><i></i> <p><?php echo $currentcat['Cat_Name']; ?></p></h2> 
<ul> 

 <?php
 if (count($homenews)>0) {

  foreach ($homenews as   $row_homenews){ ?>
 	
 
	

 <a href="<?php echo SITE_URL.$currentcat['Cat_Seo_Name']."/".$row_homenews['news_seo_name'] ?>">
<li><img src="<?php echo SITE_UPLOAD_DIR ?>news/200x150_<?php echo $row_homenews['news_image_main'] ?>"><h2><?php echo $helper->mb_ucfirst($helper->kisalt($row_homenews['news_name'],60)); ?></h2>
<p><?php echo $helper->kisalt($row_homenews['news_jenerik'],80) ?> </p>

</li></a>
 
 <?php }
 } else{

 	echo "<br><br><h4>Bu Kategoriye Henüz Aktif bir Haber Eklenmemiş.</h4>";
 }?>
</ul>

 
</div>
