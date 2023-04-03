<?php if ($manset): ?>
  


<div id="manset">
<div id="slideshow">
        <div class="slides">
                <ul>
                <?php  $i=1; foreach ($manset as  $row_manset) {?>
                    <li id="slide-<?php echo $i ?>"><a href="<?php echo SITE_URL.$row_manset['Cat_Seo_Name'].'/'.$row_manset['news_seo_name']; ?>"><img src="<?php echo SITE_UPLOAD_DIR ?>news/690x334_<?php echo $row_manset['news_image_manset']; ?>" width="690" height="334" alt="<?php echo $row_manset['news_name']; ?>" title="<?php echo $row_manset['news_name']; ?>"></a> </li>
                     <?php  	$i++; } ?>
              </ul>
                   
             </div>                 
               
            
        <ul class="slides-nav">
             <?php $im=1;	 foreach($manset as $resmi){?>
                <li <?php if ($im==1){ ?> class="on" <?php }?> > <a href="#slide-<?php echo $im ?>"><div style="background:url(<?php echo SITE_UPLOAD_DIR ?>news/36x36_<?php echo $resmi['news_image_manset']; ?>) no-repeat center right; width:36px; height:36px; background-size:120%; overflow:hidden;"></div></a></li>
                <?php $im++; }?> 
          </ul>
      </div>

 

</div>
 
<?php endif ?>