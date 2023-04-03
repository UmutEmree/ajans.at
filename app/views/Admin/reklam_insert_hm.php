<div class="col-md-12">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border col-md-12">
           
              <form action="<?php echo SITE_URL ?>Admin/Reklam/Insert_Run" method="post" class="col-md-12 form-horizontal row-border" id="reklam" enctype="multipart/form-data">
              <?php echo $alert; ?>


              
<div class="form-group">

                  <label class="col-sm-3 control-label">Reklam Tanımı:</label>

                  <div class="col-sm-9">

                    <input type="text" name="reklam_name"   class="form-control zor">

                  </div>

                </div>

<div class="form-group col-md-6">

                  <label class="col-sm-4 control-label">Reklam Boyutu</label>

                  <div class="col-sm-8">

                    <select name="reklam_boyut"  class="form-control zor">
<?php foreach ($boytlar as $key => $value): ?>
    <option value="<?php echo $value ?>" ><?php echo $value ?></option>
<?php endforeach ?>
               

                    </select>

                  </div>

                </div> 
                <div class="form-group col-md-6">

                  <label class="col-sm-4 control-label">Bitiş Tarihi:</label>

                  <div class="col-sm-8">
 
                     <div class="input-append success date col-md-12   no-padding">
                    <input type="text" class="form-control zor" name="reklam_bitis">
                    <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> </div>

                  </div>

                </div>



<div class="form-group col-sm-12">

                  <label class="col-sm-5 control-label pull-left text-left"><h2>Reklam İçeriği</h2> </label>

                  <div class="clearfix"></div>

                  <div class="col-sm-12 text-right">

                     <textarea name="reklam_icerik" rows="4" class="form-control editor col-md-12"  ></textarea>

                 
                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Reklam Durumu</label>

                  <div class="col-sm-9">
 
                         <div class="radio radio-success col-md-6">
          <input id="yes" type="radio"   name="reklam_durum" value="1" checked> 
           <label for="yes">Şimdi Aktif Et</label>
          
          
        </div> <div class="radio col-md-6">
        <input id="no" type="radio" name="reklam_durum" value="2">
        <label for="no">Sonra Aktif Et</label>
      </div>


                  </div>

                </div> 

       

                <div class="bottom text-right">
                  <button type="button" data-id="reklam" class="btn btn-primary submit_btn">Ekle</button>
                 
                </div>

              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     