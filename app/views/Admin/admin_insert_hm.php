<div class="col-md-9">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border">
           
              <form action="<?php echo SITE_URL ?>Admin/Admin/Insert_Run" method="post" class="form-horizontal row-border" id="admin" enctype="multipart/form-data">
              <?php echo $alert; ?>


              
<div class="form-group">

                  <label class="col-sm-3 control-label">Yönetici Adı:</label>

                  <div class="col-sm-9">

                    <input type="text" name="Admin_Name"   class="form-control ">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Yönetici Mail:</label>

                  <div class="col-sm-9">

                    <input type="text" name="Admin_Mail"   class="form-control ">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Kullanıcı Adı:</label>

                  <div class="col-sm-9">

                    <input type="text" name="Admin_User_Name"   class="form-control ">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Şifre:</label>

                  <div class="col-sm-9">

                    <input type="text" name="Admin_Password"   class="form-control ">

                  </div>

                </div>

       

                <div class="bottom text-right">
                  <button type="button" data-id="admin" class="btn btn-primary submit_btn">Ekle</button>
                 
                </div>

              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     