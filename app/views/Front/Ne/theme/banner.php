 <div  class="col-sm-16 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">
  <div class="row">
    <div class="col-sm-16 col-md-10 col-lg-8"> 
      <!-- carousel start -->
      <div id="sync1" class="owl-carousel">
        
        <?php foreach ($spot as $spt): ?>
        <div class="box item"> <a href="<?php echo SITE_URL.$spt['Cat_Seo_Name'].'/'.$spt['news_seo_name'] ?>">
          <div class="carousel-caption"><?php echo $spt['news_name'] ?></div>
          <img class="img-responsive"  src="<?php echo SITE_UPLOAD_DIR.'news/565x343_'.$spt['news_image_manset'] ?>"  width="1600" height="972" alt=""/>
          <div class="overlay"></div>
          <div class="overlay-info">
            <div class="cat">
              <p class="cat-data"><span class="ion-social-youtube"></span></p>
            </div>
            <div class="info">
              <p><span class="ion-android-data"></span><?php echo $helper->tarihset($spt['news_insert_tarih']); ?><span class="ion-eye"></span><?php echo $spt['news_ziyaret']; ?></p>
            </div>
          </div>
        </a></div>
      <?php endforeach ?>
    </div>
    <div class="row">
      <div class="hidden-sm">
      <div id="sync2" class="owl-carousel">
       <?php foreach ($spot as $spt): ?>
       <div class="item"><img class=" img-responsive" src="<?php echo SITE_UPLOAD_DIR.'news/134x81_'.$spt['news_image_manset'] ?>"   alt=""/></div>
     <?php endforeach ?>
   </div>
 </div>
 </div>
</div><br>
<div class="col-sm-16 col-md-6 col-lg-8 ">
  <div class="row">
    <div class="col-lg-6 hidden-sm hidden-xs "><a href="#">
        <div class=" carousel-caption">Reklam</div>
        <img src="<?php echo $theme_patch ?>/images/ads/a.png" width="200" height="435"  alt="" />
        <div class="overlay"></div>
        <div class="overlay-info">
        </div>
    </a> </div>
    <div class="col-md-16 col-sm-16 col-lg-10">
      <div class="row">
        <ul class="nav nav-tabs nav-justified " role="tablist">
          <li class="active"><a href="#popular" role="tab" data-toggle="tab">Haftanın Enleri</a></li>
        </ul>
        <?php foreach ($hafta as $hft): ?>
        <div class="col-sm-8 col-md-16 right-img-top "> <a href="<?php echo SITE_URL.$hft['Cat_Seo_Name'].'/'.$hft['news_seo_name'] ?>">
          <div class="box">
            <div class="carousel-caption"><?php echo $hft['news_name'] ?></div>
            <img class="img-responsive" src="<?php echo SITE_UPLOAD_DIR.'news/565x343_'.$hft['news_image_manset'] ?>" width="440" height="292" alt=""/>
            <div class="overlay"></div>
            <div class="overlay-info">
              <div class="cat">
                <p class="cat-data"><span class="ion-social-youtube"></span></p>
              </div>
              <div class="info">
                <p><span class="ion-android-data"></span><?php echo $helper->tarihset($hft['news_insert_tarih']); ?><span class="ion-eye"></span><?php echo $hft['news_ziyaret']; ?></p>
              </div>
            </div>
          </div>
        </a> </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
</div>
</div>
</div>