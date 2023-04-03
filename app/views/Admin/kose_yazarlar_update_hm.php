<div class="col-md-9">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border">
           
              <form action="<?php echo SITE_URL ?>Admin/YazarPanel/Update_Run" method="post" class="form-horizontal row-border" id="yazarlar" enctype="multipart/form-data">
              <?php echo $alert; ?>


              
<div class="form-group">

                  <label class="col-sm-3 control-label">İsim:</label>

                  <div class="col-sm-9">

                    <input type="text" name="yazar_name"  value="<?php echo $content['yazar_name']; ?>" class="form-control zor">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Eposta:</label>

                  <div class="col-sm-9">

                    <input type="text" name="yazar_mail"  value="<?php echo $content['yazar_mail']; ?>" class="form-control zor">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Şifre:</label>

                  <div class="col-sm-9">

                    <input type="text" name="yazar_sifre"  value="<?php echo $content['yazar_sifre']; ?>" class="form-control zor">

                  </div>

                </div>

 <hr class="bir">

             <div class="form-group">

                  <label class="col-sm-3 control-label">Resmi:</label>

                  <div class="col-sm-9">

                    <input type="file" name="resim" onchange="resim_on_izle(this,'1')" >
                    <input type="hidden" name="oldresim" value="<?php echo $content['yazar_resim']; ?>">
                    <img id="onizle1" src="<?php echo SITE_UPLOAD_DIR ?>yazarlar/122x102_<?php echo $content['yazar_resim']; ?>" width="100" style="display:block;" />

                  </div>

                </div>

                
                    <hr class="bir">

     
       

                <div class="bottom text-right">
                  <button type="button" data-id="yazarlar" class="btn btn-primary submit_btn">Güncelle</button>
                 
                </div>

              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     