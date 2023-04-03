
<div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50"> <img class="img-responsive" src="<?php echo $theme_patch ?>/images/ads/336-280-ad.gif" width="336" height="280" alt=""/> <a href="#" class="sponsored">Reklam</a> </div>

<!-- activities start -->
<div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130"> 
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified " role="tablist">
    <li class="active"><a href="#popular" role="tab" data-toggle="tab">popüler</a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="popular">
      <ul class="list-unstyled">
        <?php foreach ($populer as $pop): ?>
        <li> <a href="<?php echo SITE_URL.$pop['Cat_Seo_Name'].'/'.$pop['news_seo_name'] ?>">
          <div class="row">
            <div class="col-sm-8 col-md-8"><img class="img-thumbnail pull-left" src="<?php echo SITE_UPLOAD_DIR.'news/565x343_'.$pop['news_image_manset'] ?>" width="164" height="152" alt=""/> </div>
            <div class="col-sm-8 col-md-8">
              <h4><?php echo $pop['news_name'] ?></h4>
              <div class="text-danger sub-info">
                <div class="time"><span class="ion-android-data icon"></span><?php echo $helper->tarihset($pop['news_insert_tarih']); ?></div>
                <div class="comments"><span class="ion-eye icon"></span><?php echo $pop['news_ziyaret']; ?></div>
              </div>
            </div>
          </div>
        </a> </li>
      <?php endforeach ?>                      
    </ul>
  </div>
</div>
</div>
<div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50"> <img class="img-responsive" src="<?php echo $theme_patch ?>/images/ads/336-280-ad.gif" width="336" height="280" alt=""/> <a href="#" class="sponsored">Reklam</a> </div>

<div class="col-md-16">
  <ul class="nav nav-tabs nav-justified " role="tablist">
    <li class="active"><a href="#popular" role="tab" data-toggle="tab">Ahmet Kural</a></li>
  </ul>
</div>
<div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130"> 
  <!-- Nav tabs -->
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="popular">
      <ul class="list-unstyled">
        <?php foreach ($kardespayi as $kar): ?>
        <li> <a href="<?php echo SITE_URL.$kar['Cat_Seo_Name'].'/'.$kar['news_seo_name'] ?>">
          <div class="row">
            <div class="col-sm-8 col-md-8"><img class="img-thumbnail pull-left" src="<?php echo SITE_UPLOAD_DIR.'news/565x343_'.$kar['news_image_manset'] ?>" width="164" height="152" alt=""/> </div>
            <div class="col-sm-8 col-md-8">
              <h4><?php echo $kar['news_name'] ?></h4>
              <div class="text-danger sub-info">
                <div class="time"><span class="ion-android-data icon"></span><?php echo $helper->tarihset($kar['news_insert_tarih']); ?></div>
                <div class="comments"><span class="ion-eye icon"></span><?php echo $kar['news_ziyaret']; ?></div>
              </div>
            </div>
          </div>
        </a> </li>
      <?php endforeach ?>
    </ul>
  </div>
<div class="center">
  <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50"> <img class="img-responsive" src="<?php echo $theme_patch ?>/images/ads/336-280-ad.gif" width="336" height="280" alt=""/> <a href="#" class="sponsored">Reklam</a> </div>
</div>
</div>
</div>
<!-- activities end --> 
<!-- flicker imgs end --> 
