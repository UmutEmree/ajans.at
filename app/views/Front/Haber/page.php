<?php include_once 'app/helper/General.php'; $helper = new General();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $set['General_desc'] ?>" />
  <meta name="keywords" content="<?php echo $set['General_keyw'] ?>" />

  <meta property="fb:app_id" content="<?php echo $set['fb_app_id'] ?>" /> 
  <meta property="fb:admins" content="<?php echo $set['fb_admin_id'] ?>" />
  <meta property="og:url" content="http://<?php echo $set['General_Site_Domain'] ?>"/>
  <meta property="og:title" content="<?php echo $set['General_title'] ?>"/>
  <meta property="og:image" content="http://<?php echo SITE_UPLOAD_DIR ?>content/logo.png"/>
  <meta property="og:locale" content="tr_TR"/>
  <meta property="og:type" content="website"/>
  <title><?php echo $pg['Content_Name'] ?></title>




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
      <div class="col-sm-16">
        <div class="page-header">

          <h1><?php echo $pg['Content_Name'] ?></h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo SITE_URL ?>">Ana Sayfa</a></li>
              <li><?php echo $pg['Content_Name'] ?></li>
            </ol>
          </div>
      </div>
      <!-- bage header end --> 

    </div>

    <!-- data start -->
    <section>
      <div class="container ">
        <div class="row "> 
          <!-- left sec start -->
          <div class="col-sm-9 col-md-11 author-box">
            <div class="row">
              <div class="col-xs-16 col-sm-16 col-md-16">
                <?php echo $pg['Content_Details'] ?><br>
              </div>
            </div>
          </div>
          <div class="col-sm-7 col-md-5 author-box">
            <div class="row">
              <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130"> 
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-justified " role="tablist">
                <li class="active"><a href="#popular" role="tab" data-toggle="tab">Kurumsal</a></li>
              </ul>
              
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="popular">
                  <div class="table-responsive">
                    <table class="table table-bordered social col-md-15">
                  <tbody>
                    <tr>
                      <td><a class="rss" href="<?php echo SITE_URL.'Page/Detay/24' ?>">
                        <p><img src="<?php echo $theme_patch ?>/images/kurumsal/hakkimizda1212.png" width="150" height="76" alt=""> <br>Hakkımızda</p>
                        </a></td>
                    </tr>
                    <tr>
                      <td><a class="rss" href="<?php echo SITE_URL.'Page/Detay/25' ?>">
                        <p><img src="<?php echo $theme_patch ?>/images/kurumsal/iletisim.jpg" width="150" height="76" alt=""> <br>İletişim</p>
                        </a></td>
                    </tr>
                    <tr>
                      <td><a class="rss" href="<?php echo SITE_URL.'Page/Detay/26' ?>">
                        <p><img src="<?php echo $theme_patch ?>/images/kurumsal/reklam-ver-1.jpg" width="150" height="76" alt=""> <br>Reklam</p>
                        </a></td>
                    </tr>
                    <tr>
                      <td><a class="rss" href="<?php echo SITE_URL.'Page/Detay/27' ?>">
                        <p><img src="<?php echo $theme_patch ?>/images/kurumsal/2093_bg.jpg" width="150" height="76" alt=""> <br>Yardım</p>
                        </a></td>
                    </tr>
                  </tbody>
                </table>
                </div>
                </div>
              </div>
            </div>
            </div>
          </div>
          
      <div class="col-xs-16 banner-outer-thumb  pull-left  wow fadeInLeft animated" data-wow-delay="0.5s" data-wow-offset="50">
        <div class="row">
          <div id="banner-thumbs" class="owl-carousel">
            <?php foreach ($manset as  $man): ?>
            <div class="item"><a href="<?php echo SITE_URL.$man['Cat_Seo_Name'].'/'.$man['news_seo_name'] ?>">
              <div class="box">
                <div class="carousel-caption"><?php echo $man['news_name'] ?></div>
                <img class="img-responsive" src="<?php echo SITE_UPLOAD_DIR.'news/565x343_'.$man['news_image_manset'] ?>" width="1600" height="972" alt=""/>
                <div class="overlay"></div>
              </div>
              </a> </div>
              <?php endforeach ?>
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

</html>