  <div class="sticky-header"> 

    <!-- header start -->

    <div class="container header">

      <div class="row">

        <div class="col-sm-5 col-md-5 wow fadeInUpLeft animated"><a class="navbar-brand" href="/">Ajans.At</a>

        </div>

        <div class="col-sm-6 col-md-6 hidden-xs text-right"><?php echo $reklam['46860']['reklam_icerik'] ?></div>

        <div class="col-sm-5 col-md-5 f-social  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="10">

            <ul id="inline-popups" class="list-inline">

              <li> <a href="#"><span class="ion-social-twitter"></span></a> </li>

              <li> <a href="#"><span class="ion-social-facebook"></span></a> </li>

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

                  <li class="active"><a href="<?php echo SITE_URL ?>">Ana Sayfa</a></li>

                  <?php foreach ($newcat as  $c): ?>

                   <li><a href="<?php echo SITE_URL.$c['Cat_Seo_Name'] ?>"><?php echo $c['Cat_Name'] ?></a></li>

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

              <input id="search-bar" placeholder="Type & Hit Enter.." autocomplete="off">

            </form>

          </div>

        </div>

        <!-- search end --> 

      </nav>

      <!--nav end--> 

    </div>

    <!-- nav and search end--> 

  </div>