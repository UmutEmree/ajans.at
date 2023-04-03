  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.5&appId=498103570369528";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <!-- sticky header start -->
  <div class="sticky-header"> 
    <!-- header start -->
    <div class="container header">
      <div class="row">
        <div class="col-md-5 col-sm-6 col-xs-offset-1 col-xs-15 wow fadeInUpLeft animated"><a class="navbar-brand" href="<?php echo SITE_URL ?>"></a></div>
        
        <div class="col-md-4 col-xs-16 hidden-xs hidden-sm "><img src="<?php echo $theme_patch ?>/images/ads/468-60-ad.gif" width="468" height="60" alt=""/></div>
        <div class="col-md-offset-3 col-md-3 col-sm-3 col-xs-offset-6 col-xs-10 f-social  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="10">
          <ul class="list-inline">
            <li> <a href="https://www.facebook.com/NeLaanBuFan"><span class="ion-social-facebook"></span></a> </li>
            <li> <a href="#"><span class="ion-social-instagram"></span></a> </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- header end --> 
    <!-- nav and search start -->
    <div class="nav-search-outer"> 
      <!-- nav start -->
      
      <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
          <div class="row">
            <div class="col-sm-16"> <a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav text-uppercase main-nav ">
                  <li class="active "><a href="<?php echo SITE_URL ?>">NeLaanBu</a></li>
                  <li> <a href="<?php echo SITE_URL.'Videolar' ?>">Vİdeolar</a></li>
                  <li> <a href="<?php echo SITE_URL.'Resimler' ?>">Resİmler</a></li>
                  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategorİler<span class="ion-ios7-arrow-down nav-icn"></span></a>

                    <ul class="dropdown-menu text-capitalize" role="menu">
                      <?php foreach ($newcat as  $c): ?>
                      <li>
                        <a href="<?php echo SITE_URL.$c['Cat_Seo_Name'] ?>"><span class="ion-ios7-arrow-right nav-sub-icn"></span> <?php echo $c['Cat_Name'] ?> </a>
                      </li>
                    <?php endforeach ?>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- nav end --> 
      <!-- search start -->
      <div class="search-container ">
        <div class="container">
          <form action="#" method="" role="search">
            <input id="search-bar" placeholder="Video & Resim Ara.." autocomplete="off">
          </form>
        </div>
      </div>
      <!-- search end --> 
    </nav>
    <!--nav end--> 
  </div>
  <!-- nav and search end--> 
</div>
<!-- sticky header end --> 
  <!-- top sec start -->