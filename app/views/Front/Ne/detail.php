<?php include_once 'app/helper/General.php'; $helper = new General();?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from webyzona.com/templates/themeforest/globalnews/author-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 13:50:32 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $currentnews['news_desc'] ?>" />
  <meta name="keywords" content="<?php echo $currentnews['news_keyw'] ?>" />

  <meta property="fb:app_id" content="<?php echo $set['fb_app_id'] ?>" /> 
  <meta property="fb:admins" content="<?php echo $set['fb_admin_id'] ?>" />
  <meta property="og:url" content="http://<?php echo $set['General_Site_Domain'] ?>"/>
  <meta property="og:title" content="<?php echo $currentnews['news_name'].' || '.$set['General_title']; ?>"/>
  <meta property="og:image" content="http://<?php echo SITE_UPLOAD_DIR ?>news/690x334_<?php echo $currentnews['news_image_main']; ?>"/>
  <meta property="og:locale" content="tr_TR"/>
  <meta property="og:type" content="website"/>
  <title><?php echo $currentnews['news_name'] ?></title>

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
        <h1><?php echo $currentcat['Cat_Name'] ?> / <?php echo $currentnews['news_name'] ?></h1>
        <div class="hidden-sm hidden-xs">
        <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL ?>">NeLaanBu</a></li>
          <li><a href="<?php echo SITE_URL.$currentcat['Cat_Seo_Name'] ?>"><?php echo $currentcat['Cat_Name'] ?></a></li>
          <li><?php echo $currentnews['news_name'] ?></li>
        </ol>
        </div>
      </div>
    </div>
    <section>
      <div class="container ">
        <div class="row "> 
          <!-- left sec start -->
          <div class="col-md-11 col-sm-11">
            <div class="row">
              <div class="col-sm-16">
                <div class="row">
                  <div class="sec-topic col-sm-16  wow fadeInDown animated " data-wow-delay="0.5s">
                    <div class="row">
                      <div class="col-md-16 col-sm-16 col-xs-16">
                        <div class="col-md-4 col-sm-12 col-xs-12" >
                          <h5><img src="<?php echo $theme_patch ?>/images/general/top-red.png" alt="">NeLaanBu</h5>
                        </div>
                        
                      <?php if ($currentnews['news_gallery'] == 1  && $currentnews['news_video'] == ''): ?>
                      <div id="rgaleri">
                        <div id="right_go" class="go" data-id="2"><i class="ion-chevron-right"></i> </div>
                        <div id="left_go" class="yok go" data-id="1"><i class="ion-chevron-left"></i></div>
                        <div class="captiongallery">
                          <h5><?php echo $galeri[0]['news_gallery_name'] ?></h5>
                          <p><?php echo $galeri[0]['news_gallery_content'] ?></p>
                        </div>
                        <img src="<?php echo SITE_UPLOAD_DIR.'gallery/790x450_'.$galeri[0]['news_gallery_image'] ?>" class="img-responsive" alt="Image"> 
                      </div>
                      <div class="clearfix"></div>
                      <div class="row">
                        <div class="text-center">
                          <ul class="pagination">
                            <li><a href="#">&laquo;</a></li>
                            <?php $gi = 1; foreach ($galeri as   $gid): ?>
                            <li><a href="#<?php echo $gi ?>" class="relink"  data-id="<?php echo $gid['news_gallery_id'] ?>" id="link<?php echo $gi ?>"><?php echo $gi ?></a></li>
                            <?php $gi++; endforeach ?>    
                            <li><a href="#">&raquo;</a></li>
                            <input type="hidden" value="<?php echo $gi-1 ?>" id="lastusak">
                          </ul>
                        </div>
                      </div>
                    <?php endif ?>
                    <div class="col-md-16 col-sm-16 col-xs-16">
                      <?php if ($currentnews['news_video'] != '' ){echo $currentnews['news_video'];}?>
                    </div>
                  </div>
                  <div class="col-sm-16 sec-info">
                    <div class="text-danger sub-info-bordered">
                      <div class="col-md-12 col-sm-12 col-xs-9">
                        <div class="author"><span class="ion-person icon"></span>Ne laaan Bu</div>
                        <div class="time"><span class="ion-android-data icon"></span><?php echo $helper->tarihset($currentnews['news_insert_tarih']); ?></div>
                        <div class="time"><span class="ion-eye icon"></span><?php echo $currentnews['news_ziyaret']; ?> İzlenim</div>
                      </div> 
                      <div class="col-md-4 col-sm-4 col-xs-7">
                        <div class="fb-like" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false"></div>
                      </div><br>
                    </div>
                  </div>
                  <br>
                </div>
              </div>
              <div class="col-sm-16 wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="25">
                <img class="img-responsive" src="<?php echo $theme_patch ?>/images/ads/728-90-ad.gif" width="780" height="90" alt=""/><hr>
              </div>
              <div class="col-sm-16 comments-area">
                <div class="main-title-outer pull-left">
                  <div class="main-title">Yorumlar</div>
                </div>
                <div class="col-md-16">
                 <div class="fb-comments" data-width="100%" data-href="<?php echo SITE_URL.$_GET['url'] ?>" data-numposts="5"></div>
               </div>
             </div>
             <div class="col-sm-16 related">
              <div class="main-title-outer pull-left">
                <div class="main-title"><?php echo $currentcat['Cat_Name'] ?> &nbsp;Benzerleri</div>
              </div>
              <div class="row">
                <?php foreach ($ortak as  $or): ?>
                <div class="item topic col-sm-5 col-xs-16"> <a href="<?php echo SITE_URL.$or['Cat_Seo_Name'].'/'.$or['news_seo_name'] ?>"> <img width="274" height="121" alt="" src="<?php echo SITE_UPLOAD_DIR.'news/565x343_'.$or['news_image_manset'] ?>" class="img-thumbnail">
                  <h4><?php echo $or['news_name'] ?></h4>
                  <div class="text-danger sub-info-bordered remove-borders">
                    <div class="time"><span class="ion-android-data icon"></span><?php echo $helper->tarihset($or['news_insert_tarih']); ?></div>
                    <div class="comments"><span class="ion-eye icon"></span><?php echo $or['news_ziyaret']; ?></div>
                  </div>
                </a> 
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- left sec end --> 
<!-- right sec start -->
<div class="col-sm-5 hidden-xs right-sec">
  <div class="bordered top-margin">
    <div class="row ">
      <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130"> 
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified " role="tablist">
          <li class="active"><a href="#popular" role="tab" data-toggle="tab">Benzerleri</a></li>
          <li><a href="#recent" role="tab" data-toggle="tab">Popüler</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="popular">
            <ul class="list-unstyled">
              <?php foreach ($benzer as  $m): ?>
              <li> <a href="<?php echo SITE_URL.$m['Cat_Seo_Name'].'/'.$m['news_seo_name'] ?>">
                <div class="row">
                  <div class="col-sm-8 col-md-8"><img class="img-thumbnail pull-left" src="<?php echo SITE_UPLOAD_DIR.'news/565x343_'.$m['news_image_manset'] ?>" width="164" height="152" alt=""/> </div>
                  <div class="col-sm-8 col-md-8">
                    <h4><?php echo $m['news_name'] ?></h4>
                    <div class="text-danger sub-info">
                      <div class="time"><span class="ion-android-data icon"></span><?php echo $helper->tarihset($m['news_insert_tarih']); ?></div>
                      <div class="comments"><span class="ion-eye icon"></span><?php echo $m['news_ziyaret']; ?></div>
                    </div>
                  </div>
                </div>
              </a> </li>
            <?php endforeach ?>
          </ul>
        </div>
        <div class="tab-pane" id="recent">
          <ul class="list-unstyled">
            <?php foreach ($populer as $pop): ?>
            <li> <a href="<?php echo SITE_URL.$pop['Cat_Seo_Name'].'/'.$pop['news_seo_name'] ?>">
              <div class="row">
                <div class="col-sm-8  col-md-8 "><img class="img-thumbnail pull-left" src="<?php echo SITE_UPLOAD_DIR.'news/565x343_'.$pop['news_image_manset'] ?>" width="164" height="152" alt=""/> </div>
                <div class="col-sm-8  col-md-8 ">
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
  <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50"> <img class="img-responsive" src="<?php echo $theme_patch ?>/images/ads/336-280-ad.gif" width="336" height="280" alt=""/> <a href="#" class="sponsored">sponsored advert</a> </div>
  <!-- activities start -->
  <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130"> 
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified " role="tablist">
      <li class="active"><a href="#popular" role="tab" data-toggle="tab">Kategoriler</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="popular">
        <ul class="list-group">
          <?php foreach ($newcat as  $c): ?>
          <li class="list-group-item">
            <a href="<?php echo SITE_URL.$c['Cat_Seo_Name'] ?>"><?php echo $c['Cat_Name'] ?></a>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  </div>
</div>
<div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50"> <img class="img-responsive" src="<?php echo $theme_patch ?>/images/ads/336-280-ad.gif" width="336" height="280" alt=""/> <a href="#" class="sponsored">sponsored advert</a> </div>
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
<!-- wrapper end --> 
<!-- jQuery --> 
<?php include 'theme/js.php'; ?>


</body>

<!-- Mirrored from webyzona.com/templates/themeforest/globalnews/author-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 13:50:32 GMT -->
</html>