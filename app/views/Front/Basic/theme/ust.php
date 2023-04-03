<div id="ustbant">
  <div id="ustbantmain"><div class="468x60 fl" id="headerreklam"><?php echo $reklam['46860']['reklam_icerik'] ?></div>
  <ul id="ustbantmenu">
   <li ><a href="#"><?php   echo date('d.m.Y'); ?></a></li>
<li ><a href="<?php echo SITE_URL.'Page/Detay/1' ?>">Kurumsal</a></li>
<li ><a href="<?php echo SITE_URL.'Page/Detay/2' ?>">Reklam</a></li>
<li style="background-image:none;"><a href="<?php echo SITE_URL.'Page/Detay/3' ?>">İletişim</a></li> 
 </ul> 
</div>
</div> 
<!--header-->  
 <div id="aramabarbg"></div>
 <div id="header">
   <div id="logo" onClick="location.href='<?php echo SITE_URL ?>'"><img src="<?php echo SITE_UPLOAD_DIR ?>content/logo.png" ></div>
 
   
  <?php foreach ($koseyazarlari as $key => $koseci) { ?>
<blockquote>
     <a href="<?php echo SITE_URL.'KoseYazarlari/KoseYazisi/'.$koseci['yazi_id']; ?>">     <div class="sag">   <h2><?php echo $koseci['yazar_name']; ?></h2>
      <p>Köşe Yazarı</p>
     <cite>" <?php  echo  $koseci['yazi_name']; ?> "</cite>
      </div> 
     <img src="<?php echo SITE_UPLOAD_DIR ?>yazarlar/122x102_<?php   echo $koseci['yazar_resim']; ?>" ></a>
     </blockquote>
   <?php } ?>
  
   <div id="paperlink"></div>
 </div> 