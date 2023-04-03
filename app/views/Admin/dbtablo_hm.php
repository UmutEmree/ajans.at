<div class="col-md-12">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border">
           
              <form action="<?php echo SITE_URL ?>Admin/Dbtablo/YapiRun" method="post" class="form-horizontal row-border col-md-12" id="dttablo" enctype="multipart/form-data">
              <?php echo $alert; ?>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Tablo  Adı / Satır Adeti:</label>
                  <div class="col-sm-4">
                    <input type="text" name="tablo_name"  id="tablo_name" class="form-control zor" value="">
                  </div>

                  <div class="col-sm-2">
                    <input type="text" name="rowsu" id="rowsu" class="form-control zor" value="">
                  </div>

                    <div class="col-sm-2">
                   <button class="btn btn-info" type="button" id="hazirlabtn">Hazırla</button>
                  </div>
                </div><!--/form-group--> 


                <div id="dbresult">
                  

                </div>


 
              
       

                <div class="bottom text-right">
                  <button type="button"  class="btn btn-primary submit_btn" data-id="dttablo">Tabloyu Oluştur</button>
                 
                </div>

              </form>

           

            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     