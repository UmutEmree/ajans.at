<?php


?>
 <div class="list_carouselrs1">    
<ul id="resimslider3277" >
<?php 
 foreach ($galeri as $imggallery) { ?>
	<li>	
<a href="<?php echo SITE_UPLOAD_DIR ?>gallery/<?php echo $imggallery['news_gallery_image']; ?>"  class="fancybox-effects-d"  data-fancybox-group="gallery" title="<?php echo $imggallery['news_gallery_name']; ?>" >
   <img src="<?php echo SITE_UPLOAD_DIR ?>gallery/148x97_<?php echo $imggallery['news_gallery_image']; ?>" width="148" />
</a>
<p><?php echo $imggallery['news_gallery_name']; ?> </p>         
</li>
<?php } ?>		
</ul>

</div>
 
