<div class="col-md-9">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border">
              <form action="<?php echo SITE_URL ?>Admin/Categories/q_insert" method="post" class="form-horizontal row-border" id="hizlikat">
              <?php echo $alert; ?>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kategori Adı:</label>
                  <div class="col-sm-9">
                    <input type="text" name="Cat_Name" class="form-control zor">
                  </div>
                </div><!--/form-group--> 
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Main Kategori</label>
                  <div class="col-sm-9">
                    <select class="form-control zor" name="Cat_Main">
                 <?php echo $slct; ?>
                    </select>
                  </div><!--/col-sm-9--> 
                </div> 
            
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kategori Sayfa Başlığı 
                  <small class="tip_top" title="Seo uyumluluğu için uygun görülen max karakter sayısı 70 dir. fazla girdiğinizde seo puanınızın düşmesi haricinde her hangi bir zarar vermeyektir.">(Page Title max 70 Karakter)</small>:</label>
                  <div class="col-sm-9">
                    <textarea name="Cat_Page_Title" data-say="70" class="form-control say zor"></textarea>
                    <p class="help-block" id="Cat_Page_Title_say"></p>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kategori Açıklama
                  <small class="tip_top" title="Açıklama meta etiketi 160 karakterden az olmalıdır. 160 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır..">(Description max 160 Karakter)</small>:</label>
                  <div class="col-sm-9">
                    <textarea name="Cat_Meta_Desc" rows="4" class="form-control say zor" data-say="160"></textarea>
                    <p class="help-block" id="Cat_Meta_Desc_say"></p>
                  </div>
                </div>
                
                
                
            <div class="form-group">
                  <label class="col-sm-3 control-label">Kategori Anahtar Kelimeler 
                  <small class="tip_top" title="Anahtar kelime meta etiketi 260 karakterden az olmalıdır. 260 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Keywords max 260 Karakter)</small>:</label>
                  <div class="col-sm-9">
                    <textarea name="Cat_Meta_Keyw" rows="4" class="form-control say zor" data-say="260"></textarea>
                    <p class="help-block" id="Cat_Meta_Keyw_say"></p>
                  </div>
                </div>
                
                
                <div class="bottom text-right">
                  <button type="button" data-id="hizlikat" class="btn btn-primary submit_btn">Ekle</button>
                 
                </div><!--/form-group-->
              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        
        
  
      </div>
      
   