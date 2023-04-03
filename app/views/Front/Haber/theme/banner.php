<div class="container">

  <div class="row">

    <?php include 'son.php'; ?>

    <!-- banner outer start -->

    <div  class="col-sm-16 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">

      <div class="row">

        <div class="col-sm-16 col-md-10 col-lg-8"> 

          <!-- carousel start -->

          <div id="sync1" class="owl-carousel">

            <?php foreach ($spot as $spt): ?>

            <div class="box item"> <a href="<?php echo SITE_URL.$spt['Cat_Seo_Name'].'/'.$spt['news_seo_name'] ?>">

              <div class="carousel-caption"><?php echo $spt['news_name'] ?></div>

              <img class="img-responsive" src="<?php echo SITE_UPLOAD_DIR.'news/565x343_'.$spt['news_image_manset'] ?>" width="1600" height="972" alt=""/>

              <div class="overlay"></div>

            </a></div>

          <?php endforeach ?>

        </div>

        <div class="row">

          <div id="sync2" class="owl-carousel">

            <?php foreach ($spot as $spt): ?>

            <div class="item"><img class=" img-responsive" src="<?php echo SITE_UPLOAD_DIR.'news/134x81_'.$spt['news_image_manset'] ?>"  width="1600" height="972" alt=""/></div>

          <?php endforeach ?>

        </div>

      </div>

    </div>

    <div class="col-sm-16 col-lg-8 business   wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">

      <div class="main-title-outer ">

      <div class="main-title">Son Dakika</div>

    </div><hr>

    <?php foreach ($son as  $sn): ?>

    <div class="col-md-5 col-sm-8 col-xs-16 col-lg-8">

          <div class="topic"> <a href="<?php echo SITE_URL.$sn['Cat_Seo_Name'].'/'.$sn['news_seo_name'] ?>">

            <img class="img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/272x169_'.$sn['news_image_main'] ?>" width="600" height="398" alt=""/>

          </a>

          <p style="height:40px"><?php echo $sn['news_name'] ?></p>

        </div>

      </div>

    <?php endforeach ?>

    </div>

  </div>

</div>

<!-- banner outer end --> 

</div>

</div>