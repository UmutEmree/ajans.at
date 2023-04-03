<div class="col-md-12">
 <div class="grid simple">
  <div class="grid-title no-border">
    <h4><?php echo $page_label; ?></h4>
    
  </div>
  <div class="grid-body no-border">
   
    <form action="<?php echo SITE_URL ?>Admin/News/Insert_Run" method="post" class="form-horizontal row-border col-md-12" id="news" enctype="multipart/form-data">
      <?php echo $alert; ?>


      
      <div class="form-group">

        <label class="col-sm-3 control-label">Başlık:</label>
        <div class="col-sm-9">

          <input type="text" name="news_name"   class="form-control zor baslik">

        </div>

      </div>

      <div class="form-group">

        <label class="col-sm-3 control-label">Kategori:</label>

        <div class="col-sm-9">

          <select name="news_cat_id"  class="form-control zor catchange">

            <?=$selectfill ?>

          </select>
<input type="hidden"   id="katfiltre" value="0">
        </div>

      </div> 
      <div class="form-group" id="ekkategoriler"></div>

      <div class="form-group">

        <label class="col-sm-3 control-label">Page Title: 

          <small class="tip_top" title="Seo uyumluluğu için uygun görülen max karakter sayısı 70 dir. fazla girdiğinizde seo puanınızın düşmesi haricinde her hangi bir zarar vermeyektir.">(Page Title max 70 Karakter)</small>:</label>

          <div class="col-sm-9">

            <textarea data-say="70" class="form-control say zor" name="news_title"></textarea>

            <p class="help-block" id="news_title_say"></p>
          </div>
        </div>

        <div class="form-group">

          <label class="col-sm-3 control-label">Meta Desciription:  

            <small class="tip_top" title="Açıklama meta etiketi 160 karakterden az olmalıdır. 160 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Page Title max 160 Karakter)</small>:</label>

            <div class="col-sm-9">

              <textarea data-say="160" rows="4" class="form-control say zor" name="news_desc"></textarea>

              <p class="help-block" id="news_desc_say"></p>
            </div>
          </div>

          <div class="form-group">

            <label class="col-sm-3 control-label">Anahtar Kelimeler:

              <small class="tip_top" title="Anahtar kelime meta etiketi 260 karakterden az olmalıdır. 260 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Keywords max 260 Karakter)</small>:</label>

              <div class="col-sm-9">

                <textarea data-say="260" rows="4" class="form-control say zor" name="news_keyw"></textarea>

                <p class="help-block" id="news_keyw_say"></p>
              </div>
            </div>

            <div class="form-group">

              <label class="col-sm-3 control-label">Haber Jeneriği:</label>

              <div class="col-sm-9">

                
               <textarea name="news_jenerik"  rows="4" class="form-control zor"  ></textarea>


             </div>

           </div>

           <div class="form-group">

            <label class="col-sm-3 control-label">Tags:</label>

            <div class="col-sm-9">

              
              <input class="span12 tagsinput form-control" name="news_tags"  id="source-tags" type="text"  />

            </div>

          </div>

          <hr class="bir">

          <div class="form-group">

            <label class="col-sm-3 control-label">Ana resim:</label>

            <div class="col-sm-9">

              <input type="file" name="resim1" onchange="resim_on_izle(this,'1')" >

              <img id="onizle1" src="" width="100" style="display:none;" />

            </div>

          </div>

          

          <hr class="bir">

          <div class="form-group">

            <label class="col-sm-3 control-label">Manşet Resmi <small>690x355</small>:</label>

            <div class="col-sm-9">

              <input type="file" name="resim2" onchange="resim_on_izle(this,'2')" >

              <img id="onizle2" src="" width="100" style="display:none;" />

            </div>

          </div>

          
          <hr class="bir">



          <div class="form-group">

            <label class="col-sm-3 control-label">Yayın Durumu:</label>

            <div class="col-sm-9">

             <div class="radio radio-success">
              <input id="yes" type="radio" name="news_durum" value="1" checked="checked">
              <label for="yes">Yayında olarak Kaydet</label>
              <input id="no" type="radio" name="news_durum" value="2">
              <label for="no">Pasif olarak kaydet</label>
            </div>
          </div>

        </div>
        <hr>
        <div class="form-group">

          <label class="col-sm-3 control-label">Haber Konumu:</label>

          <div class="col-sm-9">

            <?php $i=1; foreach ($Haber_Konumlari as $key => $value) {?>
            
            <div class="row-fluid col-md-3 pull-left">
              <div class="checkbox check-primary checkbox-circle" >
                <input id="checkbox<?php echo $i ?>" name="<?php echo $key ?>" type="checkbox" value="1" <?php if ($i==2) {
                  echo 'checked="checked"';
                } ?>>
                <label for="checkbox<?php echo $i ?>"><?php echo $value ?></label>
              </div>
            </div>


            <?php $i++;}  ?>
          </div>

        </div>

        <hr>
        <div class="form-group">

          <label class="col-sm-3 control-label">Video Kodu:</label>

          <div class="col-sm-9">

           
            <textarea name="news_video" rows="4" class="form-control col-md-12"  ></textarea>
          </div>

        </div>



        <div class="form-group col-sm-12">

          <label class="col-sm-12 control-label pull-left text-left"><h2>İçerik</h2> </label>

          <div class="clearfix"></div>
          <hr>
          <div class="col-sm-12 text-right">

           <textarea name="news_content" rows="4" class="form-control editor col-md-12"  ></textarea>

           
         </div>

       </div>

       <hr>
       

       <div class="bottom text-right">
        <button type="button" data-id="news" class="btn btn-primary submit_btn col-md-4 pull-right">Ekle</button>
        
      </div>

    </form>
  </div><!--/porlets-content-->
</div><!--/block-web--> 
</div><!--/col-md-6-->
<script>
      CKEDITOR.replace( 'news_content' );
    </script>
<style>
.ck-editor__editable {
    min-height: 400px;
}
</style>
