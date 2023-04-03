<?php include_once 'app/helper/General.php'; $helper = new General();
$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>

<!DOCTYPE html>

<html lang="en">
<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="<?php echo $currentnews['news_desc'] ?>" />

  <meta name="keywords" content="<?php echo $currentnews['news_keyw'] ?>" />



  <meta property="fb:app_id" content="<?php echo $set['fb_app_id'] ?>" /> 

  <meta property="fb:admins" content="<?php echo $set['fb_admin_id'] ?>" />

  <meta property="og:url" content="<?php echo $current_url; ?>"/>

  <meta property="og:title" content="<?php echo $currentnews['news_name']; ?>"/>

  <meta property="og:image" content="<?php echo SITE_UPLOAD_DIR.'news/780x400_'.$currentnews['news_image_main'] ?>"/>

  <meta property="og:locale" content="tr_TR"/>

  <meta property="og:type" content="website"/>

  <title><?php echo $currentnews['news_name'] ?></title>



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

        <h1><?php echo $currentnews['news_name'] ?></h1>

        <ol class="breadcrumb">

          <li><a href="<?php echo SITE_URL ?>">Ana Sayfa</a></li>

          <li><a href="<?php echo SITE_URL.$currentcat['Cat_Seo_Name'] ?>"><?php echo $currentcat['Cat_Name'] ?></a></li>

          <li><?php echo $currentnews['news_name'] ?></li>

        </ol>

      </div>

    </div>

    <section>

      <div class="container ">

        <div class="row "> 

          <div class="col-xs-16 banner-outer-thumb  pull-left  wow fadeInLeft animated" data-wow-delay="0.5s" data-wow-offset="50">

            <div class="row">

              <div id="banner-thumbs" class="owl-carousel">

                <?php foreach ($son as  $sond): ?>

                <div class="item"><a href="<?php echo SITE_URL.$sond['Cat_Seo_Name'].'/'.$sond['news_seo_name'] ?>">

                  <div class="box">

                    <div class="carousel-caption"><?php echo $sond['news_name'] ?></div>

                    <img class="img-responsive" src="<?php echo SITE_UPLOAD_DIR.'news/268x163_'.$sond['news_image_main'] ?>" width="1600" height="972" alt=""/>

                    <div class="overlay"></div>

                  </div>

                </a></div>

              <?php endforeach ?>

            </div>

          </div>

        </div>

        <!-- left sec start -->

        <div class="col-md-11 col-sm-11">

          <div class="row">

            <?php include 'theme/son.php'; ?>



            <div class="col-sm-16">

              <div class="row">

                <div class="sec-topic col-sm-16  wow fadeInDown animated " data-wow-delay="0.5s">

                  <div class="row">

                    <div class="col-md-16 col-sm-16 col-xs-16">

                      <img class="img-responsive" src="<?php echo SITE_UPLOAD_DIR.'news/780x400_'.$currentnews['news_image_main'] ?>" width="780" height="400" alt="">

                      <h3><?php echo $currentnews['news_name'] ?></h3>

                      <p><?php echo $currentnews['news_content'] ?></p>

                    </div>

                  </div>

                </div>



                <div class="col-sm-16 wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="25">

                  <?php echo $reklam['72890']['reklam_icerik'] ?><hr>

                </div>



                <div class="sec-topic col-sm-16  wow fadeInDown animated " data-wow-delay="0.5s">

                  <div class="row">

                    <div class="col-md-16 col-sm-16 col-xs-16">



                      <?php if ($currentnews['news_gallery'] == 1  && $currentnews['news_video'] == ''): ?>

                      <div id="rgaleri">

                        <div id="right_go" class="go" data-id="2"><i class="ion-chevron-right"></i> </div>

                        <div id="left_go" class="yok go" data-id="1"><i class="ion-chevron-left"></i></div>

                        <div class="captiongallery">

                          <h5><?php echo $galeri[0]['news_gallery_name'] ?></h5>

                          <p><?php echo $galeri[0]['news_gallery_content'] ?></p>

                        </div>

                        <img src="<?php echo SITE_UPLOAD_DIR.'gallery/780x450_'.$galeri[0]['news_gallery_image'] ?>" class="img-responsive" alt="Image"> 

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



              <div class="col-sm-16 comments-area">

                <div class="main-title-outer pull-left">

                  <div class="main-title">Yorumlar</div>

                </div>

                <div class="col-md-16">

                 <div class="fb-comments" data-width="100%" data-href="<?php echo SITE_URL.$_GET['url'] ?>" data-numposts="5"></div>

               </div>

             </div>

              <div class="col-md-16">

             <div class="col-xs-16 col-sm-5 col-md-16 banner-outer-thumb  pull-left  wow fadeInLeft animated" data-wow-delay="0.5s" data-wow-offset="50">

              <div class="main-title-outer pull-left">

                <div class="main-title">Gündem</div>

              </div>

              <div class="row">

                <?php foreach ($gundem as $gun): ?>

               <div class="col-md-5 col-sm-16 col-xs-16">

                <div class="topic"> <a href="<?php echo SITE_URL.$gun['Cat_Seo_Name'].'/'.$gun['news_seo_name'] ?>">

                  <img class="img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/237x148_'.$gun['news_image_main'] ?>" width="600" height="398" alt=""/>

                  <h3><?php echo $gun['news_name'] ?></h3>

                </a>

              </div>

            </div>

          <?php endforeach ?>

        </div>

      </div>

      <div class="col-xs-16 col-sm-5 col-md-16 banner-outer-thumb  pull-left  wow fadeInLeft animated" data-wow-delay="0.5s" data-wow-offset="50">

              <div class="main-title-outer pull-left">

                <div class="main-title">Ekonomi</div>

              </div>

              <div class="row">

                <?php foreach ($ekonomi as $ek): ?>

               <div class="col-md-5 col-sm-16 col-xs-16">

                <div class="topic"> <a href="<?php echo SITE_URL.$ek['Cat_Seo_Name'].'/'.$ek['news_seo_name'] ?>">

                  <img class="img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/237x148_'.$ek['news_image_main'] ?>" width="600" height="398" alt=""/>

                  <h3><?php echo $ek['news_name'] ?></h3>

                </a>

              </div>

            </div>

          <?php endforeach ?>

        </div>

      </div>

      <div class="col-xs-16 col-sm-5 col-md-16 banner-outer-thumb  pull-left  wow fadeInLeft animated" data-wow-delay="0.5s" data-wow-offset="50">

              <div class="main-title-outer pull-left">

                <div class="main-title">Dünya</div>

              </div>

              <div class="row">

                <?php foreach ($dunya as $dun): ?>

               <div class="col-md-5 col-sm-16 col-xs-16">

                <div class="topic"> <a href="<?php echo SITE_URL.$dun['Cat_Seo_Name'].'/'.$dun['news_seo_name'] ?>">

                  <img class="img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/237x148_'.$dun['news_image_main'] ?>" width="600" height="398" alt=""/>

                  <h3><?php echo $dun['news_name'] ?></h3>

                </a>

              </div>

            </div>

          <?php endforeach ?>

        </div>

      </div>

        </div>

        <hr>

        <div class="col-md-16">

      <div class="col-xs-16 col-sm-5 col-md-16 banner-outer-thumb  pull-left  wow fadeInLeft animated" data-wow-delay="0.5s" data-wow-offset="50">

              <div class="main-title-outer pull-left">

                <div class="main-title">Yaşam</div>

              </div>

              <div class="row">

                <?php foreach ($yasam as $yas): ?>

               <div class="col-md-5 col-sm-16 col-xs-16">

                <div class="topic"> <a href="<?php echo SITE_URL.$yas['Cat_Seo_Name'].'/'.$yas['news_seo_name'] ?>">

                  <img class="img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/237x148_'.$yas['news_image_main'] ?>" width="600" height="398" alt=""/>

                  <h3><?php echo $yas['news_name'] ?></h3>

                </a>

              </div>

            </div>

          <?php endforeach ?>

        </div>

      </div>



      <div class="col-xs-16 col-sm-5 col-md-16 banner-outer-thumb  pull-left  wow fadeInLeft animated" data-wow-delay="0.5s" data-wow-offset="50">

              <div class="main-title-outer pull-left">

                <div class="main-title">Spor</div>

              </div>

              <div class="row">

                <?php foreach ($spor as $sp): ?>

               <div class="col-md-5 col-sm-16 col-xs-16">

                <div class="topic"> <a href="<?php echo SITE_URL.$sp['Cat_Seo_Name'].'/'.$sp['news_seo_name'] ?>">

                  <img class="img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/237x148_'.$sp['news_image_main'] ?>" width="600" height="398" alt=""/>

                  <h3><?php echo $sp['news_name'] ?></h3>

                </a>

              </div>

            </div>

          <?php endforeach ?>

        </div>

      </div>

      <div class="col-xs-16 col-sm-5 col-md-16 banner-outer-thumb  pull-left  wow fadeInLeft animated" data-wow-delay="0.5s" data-wow-offset="50">

              <div class="main-title-outer pull-left">

                <div class="main-title">Magazin</div>

              </div>

              <div class="row">

                <?php foreach ($magazin as $mag): ?>

               <div class="col-md-5 col-sm-16 col-xs-16">

                <div class="topic"> <a href="<?php echo SITE_URL.$mag['Cat_Seo_Name'].'/'.$mag['news_seo_name'] ?>">

                  <img class="img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/237x148_'.$mag['news_image_main'] ?>" width="600" height="398" alt=""/>

                  <h3><?php echo $mag['news_name'] ?></h3>

                </a>

              </div>

            </div>

          <?php endforeach ?>

        </div>

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

       <div class="main-title-outer pull-left">

        <div class="main-title">Hava Durumu</div>

      </div>

      <!-- Tab panes -->

      <div class="tab-content">

        <div class="tab-pane active" >

         <?php include 'theme/havadurumu.php'; ?>

       </div>

     </div>

   </div>

   <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130"> 

    <!-- Nav tabs -->

    <ul class="nav nav-tabs nav-justified " role="tablist">

      <li class="active"><a href="#magazin" role="tab" data-toggle="tab">Benzer Haberler</a></li>

    </ul>



    <!-- Tab panes -->

    <div class="tab-content">

      <div class="tab-pane active" id="magazin">

        <ul class="list-unstyled">

         <?php foreach ($benzer as  $bnz): ?>

         <div class="col-md-16">

          <div class="topic"> <a href="<?php echo SITE_URL.$bnz['Cat_Seo_Name'].'/'.$bnz['news_seo_name'] ?>">

            <img class="img-thumbnail" src="<?php echo SITE_UPLOAD_DIR.'news/327x206_'.$bnz['news_image_main'] ?>" width="600" height="398" alt=""/>

            <h3><?php echo $bnz['news_name'] ?></h3>

          </a>

        </div>

      </div>

    <?php endforeach ?>

  </ul>

</div>

</div>

</div>

<div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50"> <?php echo $reklam['336280']['reklam_icerik'] ?> <a href="#" class="sponsored">Reklam</a> </div>

<div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="150">

  <div class="main-title-outer pull-left">

    <div class="main-title">Döviz</div>

  </div>

  <div class="table-responsive">

   <script type="text/javascript">

   var system="siteneekle";

   var para_birimleri="USD-EUR";

   var arkaplan="FFFFFF";

   var baslik="FFFFFF";

   var cerceve="3D566E";

   var turbaslik="000000";

   var kutucuk="FFFFFF";

   var fiyat="CC3300";

   var genislik="330";

   var konum="left";

   var yatay="2";

   var slide="yok";

   var dikey="0";

   var paylasim="kapali";

   </script>

   <a id="altin_doviz_kuru_ekle" href="http://www.altin.net.tr/">altın fiyatları</a><script type="text/javascript" charset="UTF-8" src="http://www.altin.net.tr/js/doviz2.js"></script>



 </div>

</div>

<div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="150">

  <div class="main-title-outer pull-left">

    <div class="main-title">Altın Borsası</div>

  </div>

  <div class="table-responsive">

   <script type="text/javascript">

   var system="siteneekle";

   var para_birimleri="GA-C-Y-T";

   var arkaplan="FFFFFF";

   var baslik="FFFFFF";

   var cerceve="3D566E";

   var turbaslik="000000";

   var kutucuk="FFFFFF";

   var fiyat="CC3300";

   var genislik="330";

   var konum="left";

   var yatay="2";

   var slide="yok";

   var dikey="0";

   var paylasim="kapali";

   </script>

   <a id="altin_altinfiyatlari_ekle" target="_blank" href="http://www.altin.net.tr/">altın</a><script type="text/javascript" charset="UTF-8" src="http://www.altin.net.tr/js/altin_fiyatlari.js"></script>



 </div>

</div>

<div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50"> <?php echo $reklam['336280']['reklam_icerik'] ?><a href="#" class="sponsored">Reklam</a> </div>



<div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130"> 

  <!-- Nav tabs -->

  <ul class="nav nav-tabs nav-justified " role="tablist">

    <li class="active"><a href="#super" role="tab" data-toggle="tab">Süper Lig</a></li>

    <li><a href="#bir" role="tab" data-toggle="tab">PTT 1. Lig</a></li>

  </ul>



  <!-- Tab panes -->

  <div class="tab-content">

    <div class="tab-pane active" id="super">

      <iframe src="http://webkodu.com/sitene-ekle/puan-durumu/wk-sitene-super-lig-puan-durumu-ekle.html" width=275 height=486 marginwidth=0 marginheight=0 hspace=0 vspace=0 scrolling=no frameborder=0></iframe>

    </div>

    <div class="tab-pane" id="bir">

      <iframe src="http://webkodu.com/sitene-ekle/puan-durumu/wk-sitene-ikinci-lig-puan-durumu-ekle.html" width=275 height=486 marginwidth=0 marginheight=0 hspace=0 vspace=0 scrolling=no frameborder=0></iframe>

    </div>

  </div>

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

<!-- wrapper end --> 

<?php include 'theme/popup.php'; ?>

<!-- jQuery --> 

<?php include 'theme/js.php'; ?>





</body>



<!-- Mirrored from webyzona.com/templates/themeforest/globalnews/author-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 13:50:32 GMT -->

</html>