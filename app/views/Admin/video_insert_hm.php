<div class="col-md-9">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border">
           
              <form action="<?php echo SITE_URL ?>Admin/Video/Insert_Run/<?php echo $id ?>" method="post" class="form-horizontal row-border" id="video" enctype="multipart/form-data">
              <?php echo $alert; ?>


              
<div class="form-group">

                  <label class="col-sm-3 control-label">Video Başlık:</label>

                  <div class="col-sm-9">

                    <input type="text" name="video_name"   class="form-control">

                  </div>

                </div>

<div class="form-group">

                   

                  <div class="col-sm-9">

                    <input type="hidden" name="video_news_id" id="<?php echo $haber['news_id'] ?>">
  <?php echo $haber['news_name'] ?>  adlı haber için işlem yapıyorsunuz.
                  </div>

                </div> 

 <hr class="bir">

             <div class="form-group">

                  <label class="col-sm-3 control-label">Dosya:</label>

                  <div class="col-sm-9">

                    <input type="file" name="resim"  >

                    

                  </div>

                </div>

                
                    <hr class="bir">

<div class="form-group">

                  <label class="col-sm-3 control-label">Kod

                  <small class="tip_top" title="Anahtar kelime meta etiketi 260 karakterden az olmalıdır. 260 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Keywords max 260 Karakter)</small>:</label>

                  <div class="col-sm-9">

                    <textarea name="video_kod" data-say="260" rows="4" class="form-control say " name="video_kod"></textarea>

                    <p class="help-block" id="video_kod_say"></p>
                  </div>
                </div>

<div class="form-group col-sm-12">

                  <label class="col-sm-5 control-label pull-left text-left"><h2>İçerik</h2> </label>

                  <div class="clearfix"></div>

                  <div class="col-sm-10 text-right">

                     <textarea name="video_content" rows="4" class="form-control editor col-md-12"  ></textarea>

                 
                  </div>

                </div>

 

       

                <div class="bottom text-right">
                  <button type="button" data-id="video" class="btn btn-primary submit_btn">Ekle</button>
                 
                </div>

              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     