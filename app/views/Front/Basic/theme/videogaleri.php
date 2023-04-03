<div id="videogaleriindex">
  <div id="vidhed"><a href="Video-Haber">TÜM VİDEOLAR</a></div>
  <?php $iv = 1;  foreach ($newsvideo as  $video_row){ ?>
   
  
 <?php  if($iv==1){?>
  <div id="bigvideo">
  <a href="<?php echo SITE_URL.$video_row['Cat_Seo_Name'].'/'.$video_row['news_seo_name'] ?>"><img src="<?php echo SITE_UPLOAD_DIR.'news/320x180_'.$video_row['news_image_main']; ?>" width="330" height="243"></a>
  <h2><?php echo $helper->kisalt($video_row['news_name'],40); ?></h2>
  </div>
  
 <?php  }else{?>
  
   <div class="smlvideo">
  <a href="<?php echo SITE_URL.$video_row['Cat_Seo_Name'].'/'.$video_row['news_seo_name'] ?>"><img src="<?php echo SITE_UPLOAD_DIR.'news/200x150_'.$video_row['news_image_main']; ?>" width="156" height="101"></a>
  <h2><?php echo $helper->kisalt($video_row['news_name'],25);   ?></h2>
  </div>
  
  
  
    <?php } $iv++; }?>
  
  </div>


