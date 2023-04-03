<div class="col-md-9">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border">
           
              <form action="<?php echo SITE_URL ?>Admin/Koseyazilari/Update_Run/<?php echo $content["yazi_id"]; ?>" method="post" class="form-horizontal row-border" id="koseyazilari" enctype="multipart/form-data">
              <?php echo $alert; ?>


              
<div class="form-group">

                  <label class="col-sm-3 control-label">Köşe Yazısı Başlığı:</label>

                  <div class="col-sm-9">

                    <input type="text" name="yazi_name"  value="<?php echo $content['yazi_name']; ?>" class="form-control zor">

                  </div>

                </div>



<div class="form-group">

                  <label class="col-sm-3 control-label">Desciription 

                  <small class="tip_top" title="Açıklama meta etiketi 160 karakterden az olmalıdır. 160 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Page Title max 160 Karakter)</small>:</label>

                  <div class="col-sm-9">

                    <textarea name="yazi_desc" data-say="160" rows="4" class="form-control say zor" name="yazi_desc"><?php echo $content['yazi_desc']; ?></textarea>

                    <p class="help-block" id="yazi_desc_say"></p>
                  </div>
                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Anahtar Kelimeler

                  <small class="tip_top" title="Anahtar kelime meta etiketi 260 karakterden az olmalıdır. 260 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Keywords max 260 Karakter)</small>:</label>

                  <div class="col-sm-9">

                    <textarea name="yazi_keyw" data-say="260" rows="4" class="form-control say zor" name="yazi_keyw"><?php echo $content['yazi_keyw']; ?></textarea>

                    <p class="help-block" id="yazi_keyw_say"></p>
                  </div>
                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Jenerik 

                  <small class="tip_top" title="Açıklama Jenerik 400 karakterden az olmalıdır.">(Jenerik max 400 Karakter)</small>:</label>

                  <div class="col-sm-9">

                    <textarea name="yazi_jenerik" data-say="400" rows="4" class="form-control say zor" name="yazi_jenerik"><?php echo $content['yazi_jenerik']; ?></textarea>

                    <p class="help-block" id="yazi_jenerik_say"></p>
                  </div>
                </div>

 <hr class="bir">

             <div class="form-group">

                  <label class="col-sm-3 control-label">Resim:</label>

                  <div class="col-sm-9">

                    <input type="file" name="resim" onchange="resim_on_izle(this,'1')" >

                    <img id="onizle1" src="" width="100" style="display:none;" />

                  </div>

                </div>

                
                    <hr class="bir">

<div class="form-group col-sm-12">

                  <label class="col-sm-5 control-label pull-left text-left"><h2>İçerik</h2> </label>

                  <div class="clearfix"></div>

                  <div class="col-sm-12 text-right">

                     <textarea name="yazi_content" rows="4" class="form-control editor col-md-12"  ><?php echo $content['yazi_content']; ?></textarea>

                 
                  </div>

                </div>


                <div class="bottom text-right">
                  <button type="button" data-id="koseyazilari" class="btn btn-primary submit_btn">Güncelle</button>
                 
                </div>

              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     