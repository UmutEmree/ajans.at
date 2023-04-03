<div class="col-md-12">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border col-md-12">
           
              <form action="<?php echo SITE_URL ?>Admin/Koseyazilari/Insert_Run" method="post" class="form-horizontal row-border col-md-12" id="koseyazilari" enctype="multipart/form-data">
              <?php echo $alert; ?>


              
<div class="form-group">

                  <label class="col-sm-3 control-label">Köşe Yazısı Başlığı:</label>

                  <div class="col-sm-9">

                    <input type="text" name="yazi_name"   class="form-control zor">

                  </div>

                </div>


<div class="form-group">

                  <label class="col-sm-3 control-label">Meta Açıklamaları 

                  <small class="tip_top" title="Açıklama meta etiketi 160 karakterden az olmalıdır. 160 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Page Title max 160 Karakter)</small>:</label>

                  <div class="col-sm-9">

                    <textarea name="yazi_desc" data-say="160" rows="4" class="form-control say zor" name="yazi_desc"></textarea>

                    <p class="help-block" id="yazi_desc_say"></p>
                  </div>
                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Anahtar Kelimeler

                  <small class="tip_top" title="Anahtar kelime meta etiketi 260 karakterden az olmalıdır. 260 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Keywords max 260 Karakter)</small>:</label>

                  <div class="col-sm-9">

                    <textarea name="yazi_keyw" data-say="260" rows="4" class="form-control say zor" name="yazi_keyw"></textarea>

                    <p class="help-block" id="yazi_keyw_say"></p>
                  </div>
                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Yazı Jeneriği 

                  <small class="tip_top" title="Açıklama Jenerik 400 karakterden az olmalıdır.">(Jenerik max 400 Karakter)</small>:</label>

                  <div class="col-sm-9">

                    <textarea name="yazi_jenerik" data-say="400" rows="4" class="form-control say zor" name="yazi_jenerik"></textarea>

                    <p class="help-block" id="yazi_jenerik_say"></p>
                  </div>
                </div>

<hr>

             <div class="form-group">

                  <label class="col-sm-3 control-label">Resim:<small>(zorunlu değil)</small> </label>

                  <div class="col-sm-9">

                    <input type="file" name="resim" onchange="resim_on_izle(this,'1')" >

                    <img id="onizle1" src="" width="100" style="display:none;" />

                  </div>

                </div>

                
                    <hr>

<div class="form-group col-sm-12">

                  <label class="col-sm-5 control-label pull-left text-left"><h2>İçerik</h2> </label>

                  <div class="clearfix"></div>

                  <div class="col-sm-12 text-right">

                     <textarea name="yazi_content" rows="4" class="form-control editor col-md-12"  ></textarea>

                 
                  </div>

                </div>


                  <div class="clerafix"></div>
 <hr class="bir col-md-12">
 

                 <div class="form-group">

            <label class="col-sm-3 control-label">Yayın Durumu:</label>

            <div class="col-sm-9">

             <div class="radio radio-success">
              <input id="yes" type="radio" name="yazi_durum" value="1" >
              <label for="yes">Hemen Yayınla</label>
              <input id="no" type="radio" name="yazi_durum" value="2" checked="checked">
              <label for="no">Sonra Aktifleştireceğim</label>
            </div>
          </div>

        </div>
        <hr>

       

                <div class="bottom text-right">
                  <button type="button" data-id="koseyazilari" class="btn btn-primary submit_btn">Ekle</button>
                 
                </div>

              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     