    <div class="spotsld">
 
<ul id="spotslider" >

   <?php 
	 foreach ($spotnews as   $spot_row) { ?>
	<li>
	
    <a href="<?php echo SITE_URL.$spot_row['Cat_Seo_Name'].'/'.$spot_row['news_seo_name'] ?>"  title="<?php echo $helper->kisalt($spot_row['news_name'],90); ?>" >
  <img src="<?php echo SITE_UPLOAD_DIR ?>news/300x260_<?php echo $spot_row['news_image_main'] ?>" width="300" height="260" />
	 </a>
     <h2><?php echo $helper->kisalt($spot_row['news_name'],30); ?></h2>  
     <p><?php echo $helper->kisalt($spot_row['news_jenerik'],90); ?></p>       
     </li>
		
<?php }?>
	
 	</ul>
  <div id="nextspt"></div>	 
   <div id="prevspt"> </div>    
 <div id="pagerspt" class="pagerspt"></div>
  </div>