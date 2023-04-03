<input id="site_url" value="<?php echo SITE_URL; ?>" type="hidden" />
<div id="nav">
<ul>
<li><a href="<?php echo SITE_URL ?>">ANASAYFA</a></li>
<li><a href="<?php echo SITE_URL ?>KoseYazarlari">YAZARLAR</a></li>
<?php foreach ($newcat as   $cat) { ?>
<li><a href="<?php echo SITE_URL.$cat['Cat_Seo_Name']; ?>"><?php echo $helper->mb_upper($cat['Cat_Name']); ?></a></li>
<?php
} 
?>
</ul>

</div>

