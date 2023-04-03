
<div id="resimmodal" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="false" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" id="modalkapatbig" onclick="modalkapat('resimmodal')"  >×</button>
        <h4 class="modal-title mymodalinh4ubigresim" id="mySmallModalLabel">Small modal</h4>
      </div>
      <div class="clearfix"></div>
      <div class="modal-body mymodalinbodisibigresim" >
       <div class="col-md-12">
        <div id="onbilgiupload" class="col-md-12"></div>
<div id="sonucfmupload"></div>
<div class="clearfix"></div>
        <form action="<?php echo SITE_URL ?>Admin/Video/Insert_Run/" method="post" class="form-horizontal row-border col-md-12" id="galeriform" enctype="multipart/form-data">     
          
          <hr class="bir">

          <div class="form-group col-md-12 pull-left">

           

            <div class="col-sm-8 dnone">
              <input type="hidden" id="haberidsi" name="video_news_id" >
              <input type="hidden" id="haberadi" name="adi" >
              <input type="file" id="resimler" name="resim"  > 
            </div>
            <div class="col-md-12">
              <div class="form-group">

                   
                    <input type="text" name="video_name" placeholder="Video Başlığı"   class="form-control">
 
                </div>
            </div>

             <div class="col-md-12">
              <div class="form-group">
                <p>Aralarında virgül kullanınız</p>
 <input type="text" name="video_tags" placeholder="Video Tagları örn : haber,video,siyaset"   class="form-control">
 
                </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
 
 
                    <textarea name="video_desc"  rows="4" class="form-control" placeholder="Video Açıklaması" ></textarea>
 
                </div>
            </div>

             <div class="col-md-12">
              <div class="form-group">
                <p>Eğer Youtube'a yüklenmiş videonuz varsa Url giriniz. Url girerseniz video dosyası seçmeyiniz.</p>
 <input type="text" name="video_kod" placeholder="https://www.youtube.com/watch?v=tW3K6hc5V4w"   class="form-control">
 
                </div>
            </div>

            <div class="col-md-6">
              <button type="button" class="btn btn-success btn-large" onclick="$('#resimler').click();"><i class="fa fa-video-camera" style="margin:5px"></i>Video Seçiniz</button>
            </div>
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary btn-large col-md-12 pull-left videobtn"  >Kaydet</button>
            </div>
          </div>

          
          <div class="col-md-12">

            <div class="progress progress-striped active progress-large" style="background:#fff">
              <div data-percentage="0%" style="width: 0%;" id="bar" class="progress-bar percent progress-bar-success"></div>
            </div>

          </div>
          

          

          <div class="bottom text-right">

          </div>

        </form>

      </div>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <hr>
    <div class="clearfix"></div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>