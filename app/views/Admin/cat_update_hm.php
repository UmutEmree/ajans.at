<div class="col-md-9">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border">
           
              <form action="<?php echo SITE_URL ?>Admin/Categories/Cat_insert_Run" method="post" class="form-horizontal row-border" id="hizlikat" enctype="multipart/form-data">
              <?php echo $alert; ?>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kategori Adı:</label>
                  <div class="col-sm-9">
                    <input type="text" name="Cat_Name" class="form-control zor" value="<?php echo $cat["Cat_Name"]; ?>">
                  </div>
                </div><!--/form-group--> 
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Main Kategori</label>
                  <div class="col-sm-9">
                    <select class="form-control zor" name="Cat_Main" data-id="<?php echo $cat["Cat_Main"]; ?>">
                 <?php echo $slct; ?>
                    </select>
                  </div><!--/col-sm-9--> 
                </div> 
            
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kategori Sayfa Başlığı 
                  <small class="tip_top" title="Seo uyumluluğu için uygun görülen max karakter sayısı 70 dir. fazla girdiğinizde seo puanınızın düşmesi haricinde her hangi bir zarar vermeyektir.">(Page Title max 70 Karakter)</small>:</label>
                  <div class="col-sm-9">
                    <textarea name="Cat_Page_Title" data-say="70" class="form-control say zor"><?php echo $cat["Cat_Page_Title"]; ?></textarea>
                    <p class="help-block" id="Cat_Page_Title_say"></p>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kategori Açıklama
                  <small class="tip_top" title="Açıklama meta etiketi 160 karakterden az olmalıdır. 160 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır..">(Description max 160 Karakter)</small>:</label>
                  <div class="col-sm-9">
                    <textarea name="Cat_Meta_Desc" rows="4" class="form-control say zor" data-say="160"><?php echo $cat["Cat_Meta_Desc"]; ?></textarea>
                    <p class="help-block" id="Cat_Meta_Desc_say"></p>
                  </div>
                </div>
                
                
                
            <div class="form-group">
                  <label class="col-sm-3 control-label">Kategori Anahtar Kelimeler 
                  <small class="tip_top" title="Anahtar kelime meta etiketi 260 karakterden az olmalıdır. 260 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Keywords max 260 Karakter)</small>:</label>
                  <div class="col-sm-9">
                    <textarea name="Cat_Meta_Keyw" rows="4" class="form-control say zor" data-say="260"><?php echo $cat["Cat_Meta_Keyw"]; ?></textarea>
                    <p class="help-block" id="Cat_Meta_Keyw_say"></p>
                  </div>
                </div>
                
                <hr class="bir">
             <div class="form-group">
                  <label class="col-sm-3 control-label">Kategori Banneri <small>(güncel ise seçim yapmayınız)</small>:</label>
                  <div class="col-sm-9">
                    <input type="file" name="resim" onchange="resim_on_izle(this)" >
                    
                    <img id="onizle" src="<?php echo SITE_UPLOAD_DIR ?>kategori/<?php echo $cat["Cat_image"]; ?>" width="100" style="display:<?php if (!empty($cat["Cat_image"])){ echo "block";}else{echo "none";}?>" />
                    
                  </div>
                </div><!--/form-group--> 
                
                    <hr class="bir">
      
                
                   <div class="form-group col-sm-12">
                  <label class="col-sm-5 control-label pull-left text-left"><h2>Kategori Detayı</h2> </label>
                  <div class="clearfix"></div>
                  <div class="col-sm-10 text-right">
                     <textarea name="Cat_Content" rows="4" class="form-control editor col-md-12"  ><?php echo $cat["Cat_Content"]; ?></textarea>
                 
                  </div>
                </div>
                
                
                <div class="bottom text-right">
                  <button type="button" data-id="hizlikat" class="btn btn-primary submit_btn">Güncelle</button>
                 
                </div><!--/form-group-->
              </form>
           </div><!--/porlets-content-->
          </div><!--/block-web--> 
        
        
  
      </div>
      