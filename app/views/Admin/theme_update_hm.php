<div class="col-md-9">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border">
           
              <form action="<?php echo SITE_URL ?>Admin/Theme/Update_Run/<?php echo $content["theme_id"]; ?>" method="post" class="form-horizontal row-border col-md-8" id="theme" enctype="multipart/form-data">
              <?php echo $alert; ?>


              
<div class="form-group">

                  <label class="col-sm-3 control-label">Tema Adı:</label>

                  <div class="col-sm-9">

                    <input type="text" name="theme_name"  value="<?php echo $content['theme_name']; ?>" class="form-control zor">

                  </div>

                </div>

 <hr class="bir">

             <div class="form-group">

                  <label class="col-sm-3 control-label">Tema Zip Dosyası:</label>

                  <div class="col-sm-9">

                    <input type="file" name="resim" onchange="resim_on_izle(this)" >

                    <img id="onizle" src="" width="100" style="display:none;" />

                  </div>

                </div>

                
                    <hr class="bir">

<div class="form-group">

                  <label class="col-sm-3 control-label">Yükleneceği URL:</label>

                  <div class="col-sm-9">

                    <input type="text" name="theme_folder"  value="<?php echo $content['theme_folder']; ?>" class="form-control zor">

                  </div>

                </div>

 
  
       

                <div class="bottom text-right">
                  <button type="button" data-id="theme" class="btn btn-primary submit_btn">Güncelle</button>
                 
                </div>

              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     