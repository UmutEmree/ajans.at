<div class="col-md-9">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border">
           
              <form action="<?php echo SITE_URL ?>Admin/Content/Update_Run/<?php echo $content["Content_id"]; ?>" method="post" class="form-horizontal row-border" id="content_update" enctype="multipart/form-data">
              <?php echo $alert; ?>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Başlık:</label>
                  <div class="col-sm-9">
                    <input type="text" name="Content_Name" class="form-control zor" value="<?php echo $content["Content_Name"]; ?>">
                    <input name="Content_id" type="hidden" id="Content_id" value="<?php echo $content["Content_id"]; ?>" />
                  </div>
                </div><!--/form-group--> 
                
                   <div class="form-group">
                  <label class="col-sm-3 control-label">İçerik Türü</label>
                  <div class="col-sm-9">
                    <label class="radio-inline">
                      <input name="Content_Type" type="radio" id="inlineradio1" value="1" 
                     <?php if($content["Content_Type"] == 1){ ?>
                       checked="checked"
                       <?php }?>
                       >
                      Kurumsal Makale </label>
                    <label class="radio-inline">
                      <input name="Content_Type" type="radio" id="inlineradio2" value="2"
                        <?php if($content["Content_Type"] == 2){ ?>
                       checked="checked"
                       <?php }?>
                       >
                     
                     Bilgi Makaleleri </label>
                    <label class="radio-inline">
                      <input name="Content_Type" type="radio" id="inlineradio3" value="3"
                       <?php if($content["Content_Type"] == 3){ ?>
                       checked="checked"
                       <?php }?>
                       > 
                      
                     Sabit Sayfalar </label>
                  </div>
                </div><!--/form-group-->   
            
                
                 
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">İçerik Açıklama
                  <small class="tip_top" title="Açıklama meta etiketi 160 karakterden az olmalıdır. 160 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır..">(Description max 160 Karakter)</small>:</label>
                  <div class="col-sm-9">
                    <textarea name="Content_Meta_Desc" rows="4" class="form-control say" data-say="160"><?php echo $content["Content_Meta_Desc"]; ?></textarea>
                    <p class="help-block" id="Content_Meta_Desc_say"></p>
                  </div>
                </div>
                
                
                
            <div class="form-group">
                  <label class="col-sm-3 control-label">İçerik Anahtar Kelimeler 
                  <small class="tip_top" title="Anahtar kelime meta etiketi 260 karakterden az olmalıdır. 260 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Keywords max 260 Karakter)</small>:</label>
                  <div class="col-sm-9">
                    <textarea name="Content_Keyw" rows="4" class="form-control say" data-say="260"><?php echo $content["Content_Keyw"]; ?></textarea>
                    <p class="help-block" id="Content_Keyw_say"></p>
                  </div>
                </div>
                
              
                   <div class="form-group">
                  <label class="col-sm-5 control-label pull-left text-left"><h2>İçerik Detayı</h2> </label>
                  <div class="clearfix"></div>
                  <div class="col-sm-10 text-right">
                     <textarea name="Content_Details" rows="4" class="form-control editor col-md-12"  ><?php echo $content["Content_Details"]; ?></textarea>
                 
                  </div>
                </div>
                
                
                <div class="bottom text-right">
                  <button type="button" data-id="content_update" class="btn btn-primary submit_btn">Güncelle</button>
                 
                </div><!--/form-group-->
              </form>
          </div><!--/porlets-content-->
          </div><!--/block-web--> 
        
        
  
      </div>
      