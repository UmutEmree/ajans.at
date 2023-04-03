<div class="col-md-9">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border">
           
              <form action="<?php echo SITE_URL ?>Admin/Theme/Insert_Run" method="post" class="form-horizontal row-border" id="theme" enctype="multipart/form-data">
              <?php echo $alert; ?>


              
<div class="form-group">

                  <label class="col-sm-3 control-label">Tema Adı:</label>

                  <div class="col-sm-9">

                    <input type="text" name="theme_name"   class="form-control zor">

                  </div>

                </div>

 <hr class="bir">

             <div class="form-group">

                  <label class="col-sm-3 control-label">Tema Zip Dosyası:</label>

                  <div class="col-sm-9">

                    <input type="file" name="resim"  >

                    

                  </div>

                </div>

                
                    <hr class="bir">

<div class="form-group">

                  <label class="col-sm-3 control-label">Yükleneceği Dosya:</label>

                  <div class="col-sm-9">

                    <input type="text" name="theme_folder"   class="form-control ">

                  </div>

                </div>

 
  

                <div class="bottom text-right">
                  <button type="button" data-id="theme" class="btn btn-primary submit_btn">Ekle</button>
                 
                </div>

              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     