<div class="col-md-12">
       <div class="grid simple">
                <div class="grid-title no-border">
                  <h4><?php echo $page_label; ?></h4>
                  
                </div>
                <div class="grid-body no-border col-md-12">
           
              <form action="<?php echo SITE_URL ?>Admin/Generalsettings/Update_Run" method="post" class="form-horizontal row-border col-md-12" id="generalsettings" enctype="multipart/form-data">
              <?php echo $alert; ?>


              
<div class="form-group">

                  <label class="col-sm-3 control-label">Site Adı:</label>

                  <div class="col-sm-9">

                    <input type="text" name="General_Site_Name"  value="<?php echo $content['General_Site_Name']; ?>" class="form-control zor">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Site Domain:</label>

                  <div class="col-sm-9">

                    <input type="text" name="General_Site_Domain"  value="<?php echo $content['General_Site_Domain']; ?>" class="form-control zor">

                  </div>

                </div>

                 <hr>
 

                 <div class="form-group">

            <label class="col-sm-3 control-label">Site Durumu:</label>

            <div class="col-sm-9">

             <div class="radio radio-success">
              <input id="yes" type="radio" name="General_Site_Status" <?php if ($content['General_Site_Status'] == 1) { echo "checked";}  ?> value="1" >
              <label for="yes">Yayında</label>
              <input id="no" type="radio" name="General_Site_Status" value="0"  <?php if ($content['General_Site_Status'] == 0) { echo "checked";}  ?>>
              <label for="no">Bakımda</label>
            </div>
          </div>

        </div>

<div class="clearfix"></div>
          <div class="form-group">

            <label class="col-sm-3 control-label">Yorum Türü:</label>

            <div class="col-sm-9">

             <div class="radio radio-success">
              <input id="faceyorum" type="radio" name="yorum_durumu" <?php if ($content['yorum_durumu'] == 1) { echo "checked";}  ?> value="1" >
              <label for="faceyorum">Facebook Yorum</label>
              <input id="siteyorum" type="radio" name="yorum_durumu" value="2"  <?php if ($content['yorum_durumu'] == 2) { echo "checked";}  ?>>
              <label for="siteyorum">Site Yorumu</label>
            </div>
          </div>

        </div>
        <hr>

<div class="form-group">

                  <label class="col-sm-3 control-label">Genel Meta Açıklamaları 

                  <small class="tip_top" title="Açıklama meta etiketi 160 karakterden az olmalıdır. 160 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Page Title max 160 Karakter)</small>:</label>

                  <div class="col-sm-9">

                    <textarea name="General_desc" data-say="160" rows="4" class="form-control say " name="General_desc"><?php echo $content['General_desc']; ?></textarea>

                    <p class="help-block" id="General_desc_say"></p>
                  </div>
                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Genel Anahtar Kelimeler

                  <small class="tip_top" title="Anahtar kelime meta etiketi 260 karakterden az olmalıdır. 260 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Keywords max 260 Karakter)</small>:</label>

                  <div class="col-sm-9">

                    <textarea name="General_keyw" data-say="260" rows="4" class="form-control say " name="General_keyw"><?php echo $content['General_keyw']; ?></textarea>

                    <p class="help-block" id="General_keyw_say"></p>
                  </div>
                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Genel Title 

                  <small class="tip_top" title="Seo uyumluluğu için uygun görülen max karakter sayısı 70 dir. fazla girdiğinizde seo puanınızın düşmesi haricinde her hangi bir zarar vermeyektir.">(Page Title max 70 Karakter)</small>:</label>

                  <div class="col-sm-9">

                    <textarea data-say="70" class="form-control say " name="General_title"><?php echo $content['General_title']; ?></textarea>

                    <p class="help-block" id="General_title_say"></p>
                  </div>
                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Facebook Uygulama ID:</label>

                  <div class="col-sm-9">

                    <input type="text" name="fb_app_id"  value="<?php echo $content['fb_app_id']; ?>" class="form-control zor">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Facebook Uygulama Secret Key:</label>

                  <div class="col-sm-9">

                    <input type="text" name="fb_app_secret"  value="<?php echo $content['fb_app_secret']; ?>" class="form-control zor">

                  </div>

                </div>

<div class="form-group">

                  <label class="col-sm-3 control-label">Facebook Admin ID:</label>

                  <div class="col-sm-9">

                    <input type="text" name="fb_admin_id"  value="<?php echo $content['fb_admin_id']; ?>" class="form-control zor">

                  </div>

                </div>


                <hr>

                <div class="form-group">

                  <label class="col-sm-3 control-label">Google Analytics Kodu:</label>

                  <div class="col-sm-9">

                    <textarea  class="form-control " name="googleanalitics"><?php echo $content['googleanalitics']; ?></textarea>

                  </div>

                </div>


                <div class="form-group">

                  <label class="col-sm-3 control-label">Analytics Hesabı Maili :</label>

                  <div class="col-sm-9">

                    <input type="text" name="analiticsmail"  value="<?php echo $content['analiticsmail']; ?>" class="form-control">

                  </div>

                </div>


                  <div class="form-group">

                  <label class="col-sm-3 control-label">Analytics Profil ID :</label>

                  <div class="col-sm-9">

                    <input type="text" name="analiticsprofilid"  value="<?php echo $content['analiticsprofilid']; ?>" class="form-control">

                  </div>

                </div>



                   <div class="form-group">

                  <label class="col-sm-3 control-label">Analytics Hesabı Şifre Dosyası (.p12 file) :</label>

                  <div class="col-sm-9">

                    <input type="file" name="dosya"  class="form-control">
                    <input type="hidden" name="olddosya"  value="<?php echo $content['analiticspass']; ?>">

                  </div>

                </div>

                <hr>

                 <div class="form-group">

                  <label class="col-sm-3 control-label">Youtube Api Client ID :</label>

                  <div class="col-sm-9">

                    <input type="text" name="yapi_id"  value="<?php echo $content['yapi_id']; ?>" class="form-control">

                  </div>

                </div>


                <div class="form-group">

                  <label class="col-sm-3 control-label">Youtube Api Client Secret :</label>

                  <div class="col-sm-9">

                    <input type="text" name="yapi_secret"  value="<?php echo $content['yapi_secret']; ?>" class="form-control">

                  </div>

                </div>

                 <div class="form-group">

                  <label class="col-sm-3 control-label">Youtube Api AppName :</label>

                  <div class="col-sm-9">

                    <input type="text" name="yapi_name"  value="<?php echo $content['yapi_name']; ?>" class="form-control">

                  </div>

                </div>
<hr>
     <div class="form-group">

                  <label class="col-sm-3 control-label">Telefon :</label>

                  <div class="col-sm-9">

                    <input type="text" name="tel"  value="<?php echo $content['tel']; ?>" class="form-control">

                  </div>

                </div>

                 <div class="form-group">

                  <label class="col-sm-3 control-label">GSM :</label>

                  <div class="col-sm-9">

                    <input type="text" name="gsm"  value="<?php echo $content['gsm']; ?>" class="form-control">

                  </div>

                </div>

                 <div class="form-group">

                  <label class="col-sm-3 control-label">Fax :</label>

                  <div class="col-sm-9">

                    <input type="text" name="fax"  value="<?php echo $content['tel']; ?>" class="form-control">

                  </div>

                </div>
    <div class="form-group">

                  <label class="col-sm-3 control-label">Adres:</label>

                  <div class="col-sm-9">

                    <textarea  class="form-control " rows="5" name="adres"><?php echo $content['adres']; ?></textarea>

                  </div>

                </div>
       

       <div class="form-group">

                  <label class="col-sm-3 control-label">Maps Kodu:</label>

                  <div class="col-sm-9">

                    <textarea  class="form-control" rows="5" name="maps"><?php echo $content['maps']; ?></textarea>

                  </div>

                </div>



<?php
    $soc = json_decode($content['social']);

 foreach ($sociallink as  $var): ?>
    <div class="form-group">
 <label class="col-sm-3 control-label"><?php echo $var ?></label>
                  <div class="col-sm-9">

<div class="input-group">
      <div class="input-group-addon"><i class="fa fa-<?php echo $var ?>"></i></div>
      <input type="text" class="form-control" name="social[<?php echo $var ?>]" value="<?php echo $soc->$var ?>" >
      
    </div>
                  </div>

                </div>
  
<?php endforeach ?>





                <div class="bottom text-right">
                  <button type="button" data-id="generalsettings" class="btn btn-primary submit_btn">Güncelle</button>
                 
                </div>

              </form>
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div><!--/col-md-6-->
     