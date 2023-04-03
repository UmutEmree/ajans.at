<div class="col-md-9">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border">
           
              <form action="<?php echo SITE_URL ?>Admin/Yazarlar/Insert_Run" method="post" class="form-horizontal row-border col-md-12" id="yazarlar" enctype="multipart/form-data">
              <?php echo $alert; ?>


              
<div class="form-group">

                  <label class="col-sm-3 control-label">İsim:</label>

                  <div class="col-sm-9">

                    <input type="text" name="yazar_name"   class="form-control zor">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Eposta:</label>

                  <div class="col-sm-9">

                    <input type="text" name="yazar_mail"   class="form-control zor">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Şifre:</label>

                  <div class="col-sm-9">

                    <input type="text" name="yazar_sifre"   class="form-control zor">

                  </div>

                </div>

 <hr class="bir">

             <div class="form-group">

                  <label class="col-sm-3 control-label">Resmi:</label>

                  <div class="col-sm-9">

                    <input type="file" name="resim" onchange="resim_on_izle(this,'1')" >

                    <img id="onizle1" src="" width="100" style="display:none;" />

                  </div>

                </div>

                
                    <hr class="bir">


 

                 <div class="form-group">

            <label class="col-sm-3 control-label">Durumu:</label>

            <div class="col-sm-9">

             <div class="radio radio-success">
              <input id="yes" type="radio" name="yazar_durum" value="1" checked="checked">
              <label for="yes">Onaylı yazar</label>
              <input id="no" type="radio" name="yazar_durum" value="2">
              <label for="no">Kontrollu yazar</label>
            </div>
          </div>

        </div>
        <hr>

       

                <div class="bottom text-right">
                  <button type="button" data-id="yazarlar" class="btn btn-primary submit_btn">Ekle</button>
                 
                </div>

              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     