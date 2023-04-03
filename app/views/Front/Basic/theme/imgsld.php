<div class="list_carouselrs1">    
<ul id="resimslider32" >
<?php
 
 foreach ($newsgalery as $row_hgal) {
	?>
	<li>	
<a href="<?php echo SITE_URL.$row_hgal['Cat_Seo_Name'].'/'.$row_hgal['news_seo_name']; ?>"  title="<?php echo $row_hgal['news_name']; ?>" >
   <img src="<?php echo SITE_UPLOAD_DIR ?>news/200x150_<?php echo $row_hgal['news_image_main']; ?>" width="148" />
</a>
<p><?php echo $row_hgal['news_name']; ?> </p>         
</li>
<?php } ?>		
</ul>
<div id="pagerres3" class="pagerrsl"></div>
<div id="prevrs12"> </div>
<div id="nextrs12"></div>
</div>
 
