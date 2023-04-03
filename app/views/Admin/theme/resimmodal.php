
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

        <form action="<?php echo SITE_URL ?>Admin/News/galeriupload/" method="post" class="form-horizontal row-border col-md-12" id="galeriform" enctype="multipart/form-data">     
          
          <hr class="bir">

          <div class="form-group col-md-12 pull-left">

           

            <div class="col-sm-8 dnone">
              <input type="hidden" id="haberidsi" name="haberid" >
              <input type="hidden" id="haberadi" name="adi" >
              <input type="file" id="resimler" name="resim[]" multiple > 
            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-success btn-large" onclick="$('#resimler').click();"><i class="fa fa-picture-o" style="margin:5px"></i>Galeri Resimleri Seçiniz</button>
            </div>
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary btn-large col-md-12 pull-left"  >Yüklemeye Başla</button>
            </div>
          </div>

          
          <div class="col-md-12">

            <div class="progress progress-striped active progress-large" style="background:#fff">
              <div data-percentage="0%" style="width: 0%;" id="bar" class="progress-bar percent progress-bar-success"></div>
            </div>

          </div>
          

          <div id="sonucfmupload"></div>

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