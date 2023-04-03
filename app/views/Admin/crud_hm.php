<div class="col-md-6">
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4><?php echo $pagelabel; ?></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body no-border">
              <div class="row-fluid">
                <div class="span8">
                <div id="makseform"><img src="<?php echo SITE_PUBLIC ?>admin/media/aja.gif"/><</div>
                 <form action="<?php echo SITE_URL ?>Admin/Crud/Kogs" method="post" id="crup" enctype='multipart/form-data'>
                  <div id="alertsi"></div>
                      <div class="form-group">
                        <label class="form-label">Tablo Adı Seçiniz</label>
                        <span class="help">Veri Tabanındaki Tüm Tablolar Listelenmiştir</span>
                        <div class="controls">
                        <select class="form-control" name="table_name" id="table_name">
                        <?php foreach($all_table as $table_name){  ?>
                        <option value="<?php echo $table_name ?>"><?php echo $table_name ?></option>
                        <?php } ?>
                        </select>
                        </div>
                      </div>

                 <div class="form-group">
                        <label class="form-label">Controller Adı</label>
                        <span class="help">Default Olarak Tablo adı Mevcuttur</span>
                        <div class="controls">
                          <input type="text" class="form-control" name="controller_name" id="controller_name">
                        </div>
                      </div>



                 <div class="form-group">
                        <label class="form-label">View Adı</label>
                        <span class="help">Default Olarak Tablo adı Mevcuttur</span>
                        <div class="controls">
                          <input type="text" class="form-control" name="view_name" id="view_name">
                        </div>
                      </div>

                  <div class="form-group" id="sema_div"></div>
                    
                       
                       <button class="btn btn-info pull-right" type="button" onclick="crudpos();">İşleme Başla</button>
</form>
                 </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-6" id="cruppanel">
          <div class="grid simple">
            <div class="grid-title no-border">
         
            </div>
            <div class="grid-body no-border">
              <div class="row-fluid">
                <div class="span8" id="crutresult">
                  
                 </div>
              </div>
            </div>
          </div>
        </div>