<div class="col-md-8">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border  col-md-12">
           
              <form action="<?php echo SITE_URL ?>Admin/Admin/Update_Run/<?php echo $content["Admin_id"]; ?>" method="post" class="form-horizontal  col-md-12 row-border" id="admin" enctype="multipart/form-data">
              <?php echo $alert; ?>


              
<div class="form-group">

                  <label class="col-sm-3 control-label">Yönetici Adı:</label>

                  <div class="col-sm-9">

                    <input type="text" name="Admin_Name"  value="<?php echo $content['Admin_Name']; ?>" class="form-control ">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Yönetici Mail:</label>

                  <div class="col-sm-9">

                    <input type="text" name="Admin_Mail"  value="<?php echo $content['Admin_Mail']; ?>" class="form-control ">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Kullanıcı Adı:</label>

                  <div class="col-sm-9">

                    <input type="text" name="Admin_User_Name"  value="<?php echo $content['Admin_User_Name']; ?>" class="form-control ">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Eski Şifre:</label>

                  <div class="col-sm-9">

                    <input type="text" name="Admin_Passwordold"  value="" placeholder="######" class="form-control ">

                  </div>

                </div>

  <div class="form-group">

                  <label class="col-sm-3 control-label">Yeni Şifre:</label>

                  <div class="col-sm-9">

                    <input type="text" name="Admin_Password"  value="" class="form-control ">

                  </div>

                </div>

       

                <div class="bottom text-right">
                  <button type="button" data-id="admin" class="btn btn-primary submit_btn">Güncelle</button>
                 
                </div>

              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     