<footer>

    <div class="top-sec">

      <div class="container ">

       <div class="col-sm-16 f-social  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="10">

            <ul id="inline-popups" class="list-inline">

              <li> <a href="#"><span class="ion-social-twitter"></span></a> </li>

              <li> <a href="#"><span class="ion-social-facebook"></span></a> </li>

              <li> <a href="#"><span class="ion-social-instagram"></span></a> </li>

            </ul>

          </div>

      </div>

    </div>

    <div class="btm-sec">

      <div class="container">

        <div class="row">

          <div class="col-sm-16">

            <div class="row">

              <div class="col-sm-offset-2 col-sm-13 col-xs-16 f-nav wow fadeInDown animated" data-wow-delay="0.5s" data-wow-offset="10">

                <ul class="list-inline ">

                  <li> <a href="<?php echo SITE_URL ?>"> Ana Sayfa </a> </li>

                  <?php foreach ($newcat as  $c): ?>

                  <li> <a href="<?php echo SITE_URL.$c['Cat_Seo_Name'] ?>"> <?php echo $c['Cat_Name'] ?> </a> </li>

                  <?php endforeach ?>

                  <li> <a href="<?php echo SITE_URL.'Page/Detay/24' ?>"> Hakkımızda </a> </li>

                  <li> <a href="<?php echo SITE_URL.'Page/Detay/25' ?>"> İletisim </a> </li>

                  <li> <a href="<?php echo SITE_URL.'Page/Detay/26' ?>"> Reklam </a> </li>

                  <li> <a href="<?php echo SITE_URL.'Page/Detay/27' ?>"> Yardım </a> </li>

                </ul>
                   <div class="col-sm-offset-2 col-sm-13 col-xs-16 f-nav wow fadeInDown animated" data-wow-delay="0.5s" data-wow-offset="10" style="text-align:center;margin-left:-10px">
                <p>Tasarım - Kodlama : <a href="mailto:umut@umutemre.com" target="_blank" style="text-decoration:none">Tasarım & Uygulama : Infinitum Creative Agency</a></p>
</div>
              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </footer>

  <!-- Footer end -->