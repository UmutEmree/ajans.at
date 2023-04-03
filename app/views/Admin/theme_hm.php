<div class="row">
                    <div class="col-md-12">
                        <div class="grid simple " style="padding-top:10px;">
                            
                           <div class="grid-title no-border"> 
                           <h3 class="content-header pull-left"><?php echo $page_label; ?></h3>
                              <div class="col-lg-5 pull-right text-right">
                        
                                 
                                <button id="editable-sample_new" class="btn btn-info tipsi"
                                       onclick="location.href='<?php echo SITE_URL ?>Admin/Theme/Insert'"
                                      title="Yeni Ekleme">
                                     Yeni Tema Ekle <i class="fa fa-plus"></i>
                                  </button>
                                   
                            </div>
                            <div class="clearfix"></div>
                            </div>
              
                            <div class="grid-body no-border">
<?php $i=1;
               
                 foreach($content as $content_row){?>
                               <div class="col-sm-4 col-md-3" id="tr_<?php echo $content_row["theme_id"]; ?>">
    <div class="thumbnail">
      <img src="<?php echo SITE_UPLOAD_DIR.'content/'.$content_row["theme_image"]; ?>" class="img-responsive">
      <div class="caption">
        <h3><?php echo $i; ?> : <?=$content_row["theme_name"]; ?></h3>
        <p>Dosya Adı : <?=$content_row["theme_folder"]; ?></p>
        <p>
<a href="<?php echo SITE_URL ?>Admin/Theme/Update/<?php echo $content_row["theme_id"]; ?>" class="btn btn-info btn-xs tipsi" title="" data-original-title="Düzenle"><i class="fa fa-edit"></i></a>

<a href="javascript:void(0);" class="btn btn-danger btn-xs tipsi delete_link" title="" data-original-title="Sil"  data-id="<?php echo $content_row["theme_id"]; ?>"><i class="fa fa-times"></i></a>

        </p>
      </div>
    </div>
  </div>

   <?php $i++;} // end each for main level?>
                        
                     </div>
                        </div>
                    </div>
                </div>