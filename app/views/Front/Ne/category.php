<?php include_once 'app/helper/General.php'; $helper = new General();?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from webyzona.com/templates/themeforest/globalnews/author-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 13:50:32 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $currentcat['Cat_Meta_Desc'] ?>" />
  <meta name="keywords" content="<?php echo $currentcat['Cat_Meta_Keyw'] ?>" />

  <meta property="fb:app_id" content="<?php echo $set['fb_app_id'] ?>" /> 
  <meta property="fb:admins" content="<?php echo $set['fb_admin_id'] ?>" />
  <meta property="og:url" content="http://www.<?php echo $set['General_Site_Domain'] ?>/"/>
  <meta property="og:title" content="<?php echo $currentcat['Cat_Page_Title'].' || '.$set['General_title']; ?>"/>
  <meta property="og:image" content="<?php echo SITE_UPLOAD_DIR ?>content/logo.png"/>
  <meta property="og:locale" content="tr_TR"/>
  <meta property="og:type" content="website"/>
  <title><?php echo $currentcat['Cat_Name'] ?></title>
  <?php include 'theme/src.php'; ?>

</head>
<body>
  <!-- /END THEME SWITCHER--> <!-- wrapper start -->
  <div class="wrapper">
    <?php include 'theme/header.php'; ?>
    <!-- header toolbar end --> 
    <!-- sticky header start -->
    <?php include 'theme/top.php'; ?>
    <!-- sticky header end -->
    <div class="container"> 
      <!-- bage header start -->
      <div class="page-header">
        <h1><?php echo $currentcat['Cat_Name'] ?> </h1>
        <div class="hidden-sm hidden-xs">
        <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL ?>">NeLaanBu</a></li>
          <li><?php echo $currentcat['Cat_Name'] ?></li>
        </ol>
      </div>
      </div>
    </div>
    <section>
      <div class="container ">
        <div class="row "> 
          <!-- left sec start -->
          <div class="col-md-11 col-sm-9">
            <div class="row">
              <?php foreach ($homenews as $m): ?>
              <div class="col-md-8 col-sm-16 col-xs-16 right-img-top "> <a href="<?php echo SITE_URL.$m['Cat_Seo_Name'].'/'.$m['news_seo_name'] ?>">
                <div class="box">
                  <div class="carousel-caption">
                    <?php echo $m['news_name'] ?>
                  </div>
                  <img class="img-responsive" src="<?php echo SITE_UPLOAD_DIR.'news/565x343_'.$m['news_image_manset'] ?>" width="440" height="292" alt=""/>
                  <div class="hidden-xs">
                  <div class="overlay"></div>
                  <div class="overlay-info">
                    <div class="info">
                      <p><span class="ion-android-data"></span><?php echo $helper->tarihset($m['news_insert_tarih']); ?><span class="ion-eye"></span><?php echo $m['news_ziyaret']; ?></p>
                    </div>
                  </div>
                </div>
                </div>
              </a> 
            </div>
          <?php endforeach ?>
        </div>
      </div>
      <!-- left sec end --> 
      <!-- right sec start -->
      <div class="col-sm-7 col-md-5  right-sec">
        <div class="bordered top-margin">
          <div class="row ">
            <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130"> 
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-justified " role="tablist">
                <li class="active"><a href="#popular" role="tab" data-toggle="tab"><?php echo $currentcat['Cat_Name'] ?></a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="popular">
                  <ul class="list-group">
                    <?php foreach ($altkat as  $alt): ?>
                    <li class="list-group-item">
                     <a href="<?php echo SITE_URL.$alt['Cat_Seo_Name'] ?>"> <span class="badge"><?php echo $alt['Cat_content_count'] ?></span><?php echo $alt['Cat_Name'] ?></a>
                      
                    </li>
                  <?php endforeach ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="hidden-xs">
          <?php include 'theme/right.php'; ?>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- data end --> 
<!-- Footer start -->
<?php include 'theme/footer.php'; ?>
<!-- Footer end -->
<?php include 'theme/popup.php'; ?>
</div>
<!-- wrapper end --> 
<!-- jQuery --> 
<?php include 'theme/js.php'; ?>
</body>
<!-- Mirrored from webyzona.com/templates/themeforest/globalnews/author-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 13:50:32 GMT -->
</html>