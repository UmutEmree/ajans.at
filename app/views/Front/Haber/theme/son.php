 
        <div class="col-sm-16 col-md-11 hot-news hidden-xs">
        <div class="row">
          <div class="col-sm-15"> <span class="ion-ios7-timer icon-news pull-left"></span>
            <ul id="js-news" class="js-hidden">
              <?php foreach ($son as  $sn): ?>
              <li class="news-item"><a href="<?php echo SITE_URL.$sn['Cat_Seo_Name'].'/'.$sn['news_seo_name'] ?>"><?php echo $sn['news_name'] ?></a></li>
             <?php endforeach ?>
            </ul>
          </div>
        </div>
      </div>