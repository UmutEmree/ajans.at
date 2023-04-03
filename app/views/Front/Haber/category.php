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
    <!-- sticky header start -->
    <?php include 'theme/top.php'; ?>
    <!-- sticky header end -->
    <div class="container"> 
      <!-- bage header start -->
      <div class="page-header">
        <h1><?php echo $currentcat['Cat_Name'] ?> </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL ?>">Ana Sayfa</a></li>
          <li><?php echo $currentcat['Cat_Name'] ?></li>
        </ol>
      </div>
    </div>
    <section>
      <div class="container ">
        <div class="row "> 
         
          <?php include 'theme/slider.php'; ?>
          <!-- left sec start -->
          <div class="col-md-11 col-sm-9">
            <div class="row">
              <?php include 'theme/son.php'; ?>
              <?php foreach ($homenews as $m): ?>
              <div class="col-md-8 col-sm-16 col-xs-16 right-img-top "> <a href="<?php echo SITE_URL.$m['Cat_Seo_Name'].'/'.$m['news_seo_name'] ?>">
                <div class="box">
                  <div class="carousel-caption">
                    <?php echo $m['news_name'] ?>
                  </div>
                  <img class="img-responsive" src="<?php echo SITE_UPLOAD_DIR.'news/385x212_'.$m['news_image_main'] ?>" width="440" height="292" alt=""/>
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
</div>
<?php include 'theme/popup.php'; ?>
<!-- wrapper end --> 
<!-- jQuery --> 
<?php include 'theme/js.php'; ?>
</body>
<!-- Mirrored from webyzona.com/templates/themeforest/globalnews/author-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 13:50:32 GMT -->
</html>