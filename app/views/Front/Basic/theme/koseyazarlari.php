 <div id="guneyansiyanhaberler">
<h2><i style="background-image: url(./files/theme/sag/yazarikon.png);"></i><p>KÖŞE YAZILARI</p></h2>

<ul class="contentsi">
<?php foreach ($koseyazarlari as   $kosero): ?>
	

<li>
<a href="<?php echo SITE_URL.'KoseYazarlari/KoseYazisi/'.$kosero['yazi_id']; ?>" class="imgsi"><img src="<?php echo SITE_UPLOAD_DIR ?>yazarlar/122x102_<?php echo $kosero['yazar_resim'] ?>" width="90"  ></a>
<h3 class="basliksi"><?php echo $helper->kisalt($kosero['yazi_name'],30); ?></h3>
<p class="psi" style="font-size:10px;"><?php echo $helper->kisalt($kosero['yazi_jenerik'],60); ?><br />
<font style="font-size:10px; color:#666666; font-weight:bold; padding:3px;"><?php echo $helper->kisalt($kosero['yazar_name'],90); ?></font>
</p>
</li>

<?php endforeach ?>
</ul>

</div>