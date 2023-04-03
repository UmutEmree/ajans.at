<div class="row">
                    <div class="col-md-12">
                        <div class="grid simple " style="padding-top:10px;">
                            
                           <div class="grid-title no-border"> 
                           <h3 class="content-header pull-left"><?php echo $page_label; ?></h3>
                              <div class="col-lg-5 pull-right text-right">
                        
                                 
                                <button id="editable-sample_new" class="btn btn-info tipsi"
                                       onclick="location.href='<?php echo SITE_URL ?>Admin/Video/Insert'"
                                      title="Yeni Ekleme">
                                     Video Ekle <i class="fa fa-plus"></i>
                                  </button>
                                   
                            </div>      <div class="clearfix"></div>
                            </div>
        
                            <div class="grid-body no-border">
 <?php $i=1;  foreach($content as $content_row){?>
                              <div class="col-sm-3 col-md-3" id="tr_<?=$content_row["video_id"]; ?>">
    <div class="thumbnail">
      <img src="https://i.ytimg.com/vi/<?=$content_row["video_kod"]; ?>/default.jpg" style="width:100%;" class="img-rounded">
      <div class="caption">
        <h5><?=$content_row["video_name"]; ?></h5>
         
        <p><a href="<?php echo SITE_URL ?>Admin/Video/Update/<?php echo $content_row["video_id"]; ?>" class="btn btn-info btn-mini tipsi" title="" data-original-title="Düzenle"><i class="fa fa-edit"></i></a>

<a href="javascript:void(0);" class="btn btn-danger btn-mini tipsi delete_link" title="" data-original-title="Sil"  data-id="<?php echo $content_row["video_id"].'+'.$content_row["video_file"]; ?>"><i class="fa fa-times"></i></a></p>
      </div>
    </div>
  </div>
<?php if ($i%4==0): ?>
  <div class="clearfix"></div>
<?php endif ?>
  <?php $i++;} ?>
                       
                     </div>
                        </div>
                    </div>
                </div>
 