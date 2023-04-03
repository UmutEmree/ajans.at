<div class="col-md-11 col-sm-16">
  <div class="row"> 
    <!-- business start -->
    <div class="col-sm-16 business  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">
      <div class="main-title-outer pull-left">
        <div class="main-title">Son Eklenenler Vİdeolar</div>
      </div>
      <div class="row">
        <div class="col-md-16 col-sm-16">
          <div class="row">

            <?php foreach ($son as $sn): ?>
            <div class="col-sm-8 col-md-8 right-img-top "> <a href="<?php echo SITE_URL.$sn['Cat_Seo_Name'].'/'.$sn['news_seo_name'] ?>">
              <div class="box">
                <div class="carousel-caption"><?php echo $sn['news_jenerik'] ?></div>
                <img class="img-responsive" src="<?php echo SITE_UPLOAD_DIR.'news/565x343_'.$sn['news_image_manset'] ?>" width="440" height="292" alt=""/>
                <div class="overlay"></div>
                <div class="overlay-info">
                  <div class="cat">
                    <p class="cat-data"><span class="ion-social-youtube"></span></p>
                  </div>
                  <div class="info">
                    <p><span class="ion-android-data"></span><?php echo $helper->tarihset($sn['news_insert_tarih']); ?><span class="ion-eye"></span><?php echo $sn['news_ziyaret']; ?></p>
                  </div>
                </div>
              </div>
            </a> </div>
          <?php endforeach ?>
          </div>
      </div>
    </div>
    <hr>
  </div>
  <div class="col-sm-16 wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="25"><img class="img-responsive" src="<?php echo $theme_patch ?>/images/ads/728-90-ad.gif" width="780" height="90" alt=""/><hr></div>
              
  <!-- business end --> 

  <!-- Science & Travel start -->
  <div class="col-sm-16">
    <div class="row">
            <div class="col-md-16 col-sm-16 col-xs-16 wow fadeInRight animated" data-wow-delay="0.5s" data-wow-offset="130">
              <div class="main-title-outer pull-left">
                <div class="main-title">Son Eklenen Resİmler</div>
              </div>
              <div class="row left-bordered">
                <?php foreach ($sonresim as $snrsm): ?>
                <div class="topic col-md-8 col-sm-8"> 
                  <a href="<?php echo SITE_URL.$snrsm['Cat_Seo_Name'].'/'.$snrsm['news_seo_name'] ?>"> 
                  <div class="box">
                <div class="carousel-caption"><?php echo $snrsm['news_jenerik'] ?></div>
                <img class="img-responsive" src="<?php echo SITE_UPLOAD_DIR.'news/565x343_'.$snrsm['news_image_manset'] ?>" width="385" height="152" alt=""/>
                <div class="overlay"></div>
                <div class="overlay-info">
                  <div class="cat">
                    <p class="cat-data"><span class="ion-images"></span></p>
                  </div>
                  <div class="info">
                    <p><span class="ion-android-data"></span><?php echo $helper->tarihset($snrsm['news_insert_tarih']); ?><span class="ion-eye"></span><?php echo $snrsm['news_ziyaret']; ?></p>
                  </div>
                </div>
              </div><br>
                  </a></div>
                  <?php endforeach ?>
                    </div>
                  </div>
                </div>
                <hr>
              </div>
              <!-- Scince & Travel end --> 
              <!-- lifestyle start-->
              <div class="col-sm-16 wow fadeInUp animated " data-wow-delay="0.5s" data-wow-offset="100">
                <div class="main-title-outer pull-left">
                  <div class="main-title">Popüler Resİmler</div>
                </div>
                <div class="row">
                  <div id="owl-lifestyle" class="owl-carousel owl-theme lifestyle pull-left">
                    <?php foreach ($popresim as $prsm): ?>
                    <div class="item topic"> <a href="<?php echo SITE_URL.$prsm['Cat_Seo_Name'].'/'.$prsm['news_seo_name'] ?>"> <img class="img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/565x343_'.$prsm['news_image_manset'] ?>" width="300" height="132" alt=""/>
                      <h4><?php echo $prsm['news_jenerik'] ?></h4>
                      <div class="text-danger sub-info-bordered remove-borders">
                        <div class="time"><span class="ion-android-data icon"></span><?php echo $helper->tarihset($prsm['news_insert_tarih']); ?></div>
                        <div class="comments"><span class="ion-eye icon"></span><?php echo $prsm['news_ziyaret']; ?></div>
                        </div>
                    </a> </div>
                    <?php endforeach ?>
                  </div>
                </div>
               <div class="hidden-xs"> <hr> </div> 
              </div>
              <!-- lifestyle end --> 

              <!--Recent videos start-->
            
              <!--Recent videos end--> 
              <!--wide ad start-->
              <div class="col-sm-16 hidden-xs wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="25"><img class="img-responsive" src="<?php echo $theme_patch ?>/images/ads/728-90-ad.gif" width="780" height="90" alt=""/></div>
              <!--wide ad end--> 

            </div>
          </div>