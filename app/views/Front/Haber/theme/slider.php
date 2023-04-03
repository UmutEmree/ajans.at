<div class="col-xs-16 banner-outer-thumb  pull-left  wow fadeInLeft animated" data-wow-delay="0.5s" data-wow-offset="50">
        <div class="row">
          <div id="banner-thumbs" class="owl-carousel">
            <?php foreach ($manset as  $pop): ?>
            <div class="item"><a href="<?php echo SITE_URL.$pop['Cat_Seo_Name'].'/'.$pop['news_seo_name'] ?>">
              <div class="box">
                <div class="carousel-caption"><?php echo $pop['news_name'] ?></div>
                <img class="img-responsive" src="<?php echo SITE_UPLOAD_DIR.'news/268x163_'.$pop['news_image_main'] ?>" width="1600" height="972" alt=""/>
                <div class="overlay"></div>
                <div class="overlay-info">
                  <div class="cat">
                    
                  </div>
                </div>
              </div>
              </a> </div>
              <?php endforeach ?>
          </div>
        </div>
      </div>