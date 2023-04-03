<div class="col-md-11 col-sm-16">

  <div class="row">

  <div class="col-sm-16  business   wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">

    <div class="main-title-outer pull-left">

      <div class="main-title">Gündem</div>

    </div>

   

      <div class="col-md-16  ">

        <div class="row">

          <?php foreach ($gundem as $gun): ?>

          <div class="col-md-8 col-sm-8 col-xs-16">

          <div class="topic"> <a href="<?php echo SITE_URL.$gun['Cat_Seo_Name'].'/'.$gun['news_seo_name'] ?>">

            <img class="img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/380x239_'.$gun['news_image_main'] ?>" width="600" height="398" alt=""/>

            <h3 style="height:70px"><?php echo $gun['news_name'] ?></h3>

          </a>

        </div>

      </div>

        <?php endforeach ?>

      </div>

    </div>

 

  <hr>

</div>

<!-- business start -->

<div class="col-sm-16 business  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">

  <div class="main-title-outer pull-left">

    <div class="main-title">Ekonomi</div>

  </div>

  <div class="row">

    <div class="col-md-16 col-sm-16">

      <div class="row">

        <?php foreach ($ekonomi as $ek): ?>

        <div class="col-md-5 col-sm-5 col-xs-16">

          <div class="topic"> <a href="<?php echo SITE_URL.$ek['Cat_Seo_Name'].'/'.$ek['news_seo_name'] ?>">

            <img class="img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/237x148_'.$ek['news_image_main'] ?>" width="600" height="398" alt=""/>

            <h3><?php echo $ek['news_name'] ?></h3>

          </a>

        </div>

      </div>

    <?php endforeach ?>

  </div>

</div>

</div>

<hr>

</div>



<!-- Science & Travel start -->

<div class="col-sm-16">

  <div class="row">

    <div class="col-xs-16 col-sm-8  wow fadeInLeft animated science" data-wow-delay="0.5s" data-wow-offset="130">

      <div class="main-title-outer pull-left">

        <div class="main-title">Dünya</div>

      </div>

      <div class="row">

        <?php foreach ($dunya as $dun): ?>

        <div class="topic col-sm-16"> <a href="<?php echo SITE_URL.$dun['Cat_Seo_Name'].'/'.$dun['news_seo_name'] ?>">

          <img class=" img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/385x212_'.$dun['news_image_main'] ?>" width="600" height="227" alt=""/>

          <h3> <?php echo $dun['news_name'] ?></h3>

        </a>

      </div>

    <?php endforeach ?>

  </div>

</div>

<div class="col-sm-8 col-xs-16 wow fadeInRight animated" data-wow-delay="0.5s" data-wow-offset="130">

  <div class="main-title-outer pull-left">

    <div class="main-title">Yaşam</div>

  </div>

  <div class="row left-bordered">

    <?php foreach ($yasam as $yas): ?>

    <div class="topic col-sm-16"> <a href="<?php echo SITE_URL.$yas['Cat_Seo_Name'].'/'.$yas['news_seo_name'] ?>">

      <img class=" img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/385x212_'.$yas['news_image_main'] ?>" width="600" height="227" alt=""/>

      <h3> <?php echo $yas['news_name'] ?></h3>

    </a>

  </div>

<?php endforeach ?>



</div>

</div>

</div>

<hr>

</div>

<!-- Scince & Travel end --> 

<!-- lifestyle start-->

<div class="col-xs-16 banner-outer-thumb  pull-left  wow fadeInLeft animated" data-wow-delay="0.5s" data-wow-offset="50">

  <div class="main-title-outer pull-left">

    <div class="main-title">Spor</div>

  </div>

  <div class="row">

    <div id="banner-thumbs" class="owl-carousel">

      <?php foreach ($spor as $sp): ?>

      <div class="item"><a href="<?php echo SITE_URL.$sp['Cat_Seo_Name'].'/'.$sp['news_seo_name'] ?>">

        <div class="box">

          <img class="img-responsive" src="<?php echo SITE_UPLOAD_DIR.'news/178x110_'.$sp['news_image_main'] ?>" width="1600" height="972" alt=""/>

        </div>

      </a> <p><?php echo $sp['news_name'] ?></p></div>

    <?php endforeach ?>

  </div>

</div>

  <div class="col-xs-16 col-sm-16 col-md-16  wow fadeInLeft animated science" data-wow-delay="0.5s" data-wow-offset="130">



    <div class="row">

      <?php foreach ($sporpop as $sporpp): ?>

      <div class="topic col-sm-8 col-md-8"> <a href="<?php echo SITE_URL.$sporpp['Cat_Seo_Name'].'/'.$sporpp['news_seo_name'] ?>">

        <img class=" img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/384x158_'.$sporpp['news_image_main'] ?>" width="600" height="227" alt=""/>

        <h3><?php echo $sporpp['news_name'] ?></h3>

      </a>

    </div>

      <?php endforeach ?>

</div>

</div>



<hr>

</div>

<!-- lifestyle end --> 



<!--Recent videos start-->

<div class="col-sm-16 recent-vid wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="50">

  <div class="main-title-outer pull-left">

    <div class="main-title">Magazin</div>

  </div>



    <div id="owl-lifestyle" class="owl-carousel owl-theme lifestyle pull-left">

        <?php foreach ($magazin as $mag): ?>

      <div class="item topic"> <a href="<?php echo SITE_URL.$mag['Cat_Seo_Name'].'/'.$mag['news_seo_name'] ?>"> 

        <img class="img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/254x117_'.$mag['news_image_main'] ?>" width="300" height="132" alt=""/>

        <h4><?php echo $mag['news_name'] ?></h4>

      </a> </div>

        <?php endforeach ?>

    </div>

 

  <div class="col-xs-16 col-sm-16 col-md-16  wow fadeInLeft animated science" data-wow-delay="0.5s" data-wow-offset="130">



    <div class="row">

      <?php foreach ($magpop as $magp): ?>

      <div class="topic col-sm-8 col-md-8"> <a href="<?php echo SITE_URL.$magp['Cat_Seo_Name'].'/'.$magp['news_seo_name'] ?>">

        <img class=" img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/384x158_'.$magp['news_image_main'] ?>" width="600" height="227" alt=""/>

        <h3 style="font-size:11px"><?php echo $magp['news_name'] ?></h3>

      </a>

    </div>

      <?php endforeach ?>

</div>

</div>

<hr>

</div>

<!--Recent videos end--> 

<!--wide ad start-->

<div class="col-sm-16 wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="25"><?php echo $reklam['72890']['reklam_icerik'] ?> </div>

<!--wide ad end--> 



</div>

</div>