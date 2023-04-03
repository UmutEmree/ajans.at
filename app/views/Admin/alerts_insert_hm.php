<div class="col-md-9">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border">
           
              <form action="<?php echo SITE_URL ?>Admin/Alerts/Insert_Run" method="post" class="form-horizontal row-border" id="alerts" enctype="multipart/form-data">
              <?php echo $alert; ?>


              
<div class="form-group">

                  <label class="col-sm-3 control-label">alerts_name:</label>

                  <div class="col-sm-9">

                    <input type="text" name="alerts_name"   class="form-control zor">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">alerts_type:</label>

                  <div class="col-sm-9">

                    <input type="text" name="alerts_type"   class="form-control zor">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">alerts_durum:</label>

                  <div class="col-sm-9">

                    <input type="text" name="alerts_durum"   class="form-control zor">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">alerts_link:</label>

                  <div class="col-sm-9">

                    <input type="text" name="alerts_link"   class="form-control zor">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">alerts_not:</label>

                  <div class="col-sm-9">

                    <input type="text" name="alerts_not"   class="form-control ">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">alerts_insert_tarih:</label>

                  <div class="col-sm-9">

                    <input type="text" name="alerts_insert_tarih"   class="form-control zor">

                  </div>

                </div>

       

                <div class="bottom text-right">
                  <button type="button" data-id="alerts" class="btn btn-primary submit_btn">Ekle</button>
                 
                </div>

              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     