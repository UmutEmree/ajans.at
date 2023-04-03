<?php foreach ($homecat as  $row_homecat): ?>
 	<?php if ($row_homecat["Cat_content_count"]>0): ?>
 		
 	

<div id="centerhaberlist">
 
<h2 class="kh"><i></i> <p><?php echo $row_homecat['Cat_Name']; ?></p> <a href="<?php echo $row_homecat['Cat_Seo_Name'] ?>" class="katheaderlink">Tümü</a></h2> 
<ul> 
 <?php foreach ($homenews as   $row_homenews): ?>
 	
<?php if ($row_homenews['news_cat_id'] == $row_homecat['Cat_id']): ?>
	

 <a href="<?php echo SITE_URL.$row_homecat['Cat_Seo_Name']."/".$row_homenews['news_seo_name'] ?>">
<li><img src="<?php echo SITE_UPLOAD_DIR ?>news/200x150_<?php echo $row_homenews['news_image_main'] ?>"><h2><?php echo $helper->mb_ucfirst($helper->kisalt($row_homenews['news_name'],60)); ?></h2>
<p><?php echo $helper->kisalt($row_homenews['news_jenerik'],80) ?> </p>

</li></a>
 <?php endif ?>
 <?php endforeach ?>
</ul>

 
</div>
<?php endif ?>
 
 <?php endforeach ?> 