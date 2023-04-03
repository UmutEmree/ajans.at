<div class="col-md-9">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border">
           
              <form action="<?php echo SITE_URL ?>Admin/Yorum/Update_Run/<?php echo $content["yorum_id"]; ?>" method="post" class="form-horizontal row-border col-md-12" id="yorum" enctype="multipart/form-data">
              <?php echo $alert; ?>


              
 
<div class="form-group">

                  <label class="col-sm-3 control-label">Yorumcu:</label>

                  <div class="col-sm-9">

                    <input type="text" name="yorum_name"  value="<?php echo $content['yorum_name']; ?>" class="form-control zor">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Yorum Başlığı:</label>

                  <div class="col-sm-9">

                    <input type="text" name="yorum_baslik"  value="<?php echo $content['yorum_baslik']; ?>" class="form-control zor">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Yorumu

                  :</label>

                  <div class="col-sm-9">

                    <textarea name="yorum_content" data-say="260" rows="4" class="form-control say zor" ><?php echo $content['yorum_content']; ?></textarea>

                    <p class="help-block" id="yorum_content_say"></p>
                  </div>
                </div>

 


                <div class="form-group">

            <label class="col-sm-3 control-label">Yorum Durumu:</label>

            <div class="col-sm-9">

             <div class="radio radio-success">
              <input id="yes" type="radio" name="yorum_durum" <?php if ($content['yorum_durum'] == 1) { echo "checked";}  ?> value="1" >
              <label for="yes">Yayında</label>
              <input id="no" type="radio" name="yorum_durum" value="2"  <?php if ($content['yorum_durum'] == 2) { echo "checked";}  ?>>
              <label for="no">Pasif</label>
            </div>
          </div>

        </div>

 

       

                <div class="bottom text-right">
                  <button type="button" data-id="yorum" class="btn btn-primary submit_btn">Güncelle</button>
                 
                </div>

              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     