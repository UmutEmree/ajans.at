<div class="col-md-12">
 <div class="grid simple">
  <div class="grid-title no-border">
    <h4><?php echo $page_label; ?></h4>

  </div>
  <div class="grid-body no-border">

    <form action="<?php echo SITE_URL ?>Admin/News/Update_Run/<?php echo $content["news_id"]; ?>" method="post" class="form-horizontal row-border col-md-12" id="news" enctype="multipart/form-data">
      <?php echo $alert; ?>



      <div class="form-group">

        <label class="col-sm-3 control-label">Başlık:</label>

        <div class="col-sm-9">

          <input type="text" name="news_name"  value="<?php echo $content['news_name']; ?>" class="form-control zor">

        </div>

      </div>

      <div class="form-group">

        <label class="col-sm-3 control-label">Kategori:</label>

        <div class="col-sm-9">

          <select name="news_cat_id"  class="form-control zor catchangeup">

            <?=$selectfill ?>

          </select>
   <input type="hidden"   id="katfiltre" value="<?php echo $content['news_cat_id']; ?>">
   <input type="hidden"   id="newsid" value="<?php echo $content['news_id']; ?>">
        </div>

      </div> 

      <div class="form-group" id="ekkategoriler"></div>

      <div class="form-group">

        <label class="col-sm-3 control-label">Page Title 

          <small class="tip_top" title="Seo uyumluluğu için uygun görülen max karakter sayısı 70 dir. fazla girdiğinizde seo puanınızın düşmesi haricinde her hangi bir zarar vermeyektir.">(Page Title max 70 Karakter)</small>:</label>

          <div class="col-sm-9">

            <textarea name="news_title" data-say="70" class="form-control say zor" name="news_title"><?php echo $content['news_title']; ?></textarea>

            <p class="help-block" id="news_title_say"></p>
          </div>
        </div>

        <div class="form-group">

          <label class="col-sm-3 control-label">Meta Desc. 

            <small class="tip_top" title="Açıklama meta etiketi 160 karakterden az olmalıdır. 160 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Page Title max 160 Karakter)</small>:</label>

            <div class="col-sm-9">

              <textarea name="news_desc" data-say="160" rows="4" class="form-control say zor" name="news_desc"><?php echo $content['news_desc']; ?></textarea>

              <p class="help-block" id="news_desc_say"></p>
            </div>
          </div>

          <div class="form-group">

            <label class="col-sm-3 control-label">Anahtar Kelimeler :

              <small class="tip_top" title="Anahtar kelime meta etiketi 260 karakterden az olmalıdır. 260 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Keywords max 260 Karakter)</small>:</label>

              <div class="col-sm-9">

                <textarea name="news_keyw" data-say="260" rows="4" class="form-control say zor" name="news_keyw"><?php echo $content['news_keyw']; ?></textarea>

                <p class="help-block" id="news_keyw_say"></p>
              </div>
            </div>

            <div class="form-group">

              <label class="col-sm-3 control-label">Haber Jeneriği:</label>

              <div class="col-sm-9">

                <input type="text" name="news_jenerik"  value="<?php echo $content['news_jenerik']; ?>" class="form-control zor">

              </div>

            </div>

            <div class="form-group">

              <label class="col-sm-3 control-label">Tags:</label>

              <div class="col-sm-9">

                <input type="text" class="span12 tagsinput form-control" name="news_tags"  id="source-tags"  value="<?php echo $content['news_tags']; ?>"  >

              </div>

            </div>

            <hr class="bir">

            <div class="form-group">

              <label class="col-sm-3 control-label">Ana resim:</label>

              <div class="col-sm-9">

                <input type="file" name="resim1" onchange="resim_on_izle(this,1)" >
                <input type="hidden" name="oldresim1" value="<?=$content['news_image_main']; ?>" >

                <img id="onizle1" src="<?=SITE_UPLOAD_DIR ?>news/<?=$content['news_image_main']; ?>" width="100" style="display:block;" />

              </div>

            </div>


            <hr class="bir">

            <div class="form-group">

              <label class="col-sm-3 control-label">Manşet Resmi:</label>

              <div class="col-sm-9">

                <input type="file" name="resim2" onchange="resim_on_izle(this,2)" >
                <input type="hidden" name="oldresim2" value="<?=$content['news_image_manset']; ?>" >

                <img id="onizle2" src="<?=SITE_UPLOAD_DIR ?>news/<?=$content['news_image_manset']; ?>" width="100" style="display:block;" />

              </div>

            </div>


            <hr class="bir">




            <div class="form-group">

              <label class="col-sm-3 control-label">Video Kodu:</label>

              <div class="col-sm-9">

                <textarea name="news_video" rows="4" class="form-control col-md-12"  ><?php echo $content['news_video']; ?></textarea>

              </div>

            </div>

            <div class="form-group col-sm-12">

              <label class="col-sm-12 control-label pull-left text-left"><h2>Haber Detayı</h2> </label>

              <div class="clearfix"></div>

              <div class="col-sm-12 text-right">

               <textarea name="news_content" rows="4" class="form-control editor col-md-12"  ><?php echo $content['news_content']; ?></textarea>


             </div>

           </div>






           <div class="bottom text-right">
            <button type="button" data-id="news" class="btn btn-primary submit_btn col-md-4 pull-right">Güncelle</button>

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