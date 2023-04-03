<div class="row">
  <div class="col-md-12">
    <div class="grid simple " style="padding-top:10px;">

     <div class="grid-title no-border"> 
       <h3 class="content-header pull-left"><?php echo $page_label; ?></h3>
       <div class="col-lg-5 pull-right text-right">


        <button id="editable-sample_new" class="btn btn-info tipsi"
        onclick="location.href='<?php echo SITE_URL ?>Admin/Reklam/Insert'"
        title="Yeni Ekleme">
        Yeni Reklam Oluştur <i class="fa fa-plus"></i>
      </button>

    </div>
    <div class="clearfix"></div>
    <hr>
  </div>

  <div class="grid-body no-border">
    <table class="table no-more-tables" id="example">
      <thead>
        <tr>
          <th class="col-md-1">NO</th>
          <th>Reklam Tanımı</th>
          <th>Reklam Boyutu</th>
          <th>Durum</th>

          <th>Bitiş Tarihi</th>

          <th>İşlem</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1;

        foreach($content as $content_row){?>
        <tr class=""
        id="tr_<?php echo $content_row["reklam_id"]; ?>" >
        <td>
          <?php echo $i; ?>
        </td>


        <td><?=$content_row["reklam_name"]; ?></td>
        <td><?=$content_row["reklam_boyut"]; ?></td>
        <td>

         <div class="radio radio-success">
          <input id="yes<?php echo $content_row["reklam_id"] ?>" type="radio" data-id="<?php echo $content_row["reklam_id"].'+reklam_durum'; ?>" class="durumsec" name="reklam_durum<?php echo $content_row["reklam_id"] ?>" value="1" 
          <?php if ($content_row["reklam_durum"] == "1") {
            echo 'checked="checked"';
          } ?>
          >
          <label for="yes<?php echo $content_row["reklam_id"] ?>">Yayında</label>
        </div> <div class="radio">
        <input id="no<?php echo $content_row["reklam_id"] ?>" type="radio" name="reklam_durum<?php echo $content_row["reklam_id"] ?>" data-id="<?php echo $content_row["reklam_id"].'+reklam_durum'; ?>" class="durumsec" value="2"
        <?php if ($content_row["reklam_durum"] == "2") {
          echo 'checked="checked"';
        } ?>>
        <label for="no<?php echo $content_row["reklam_id"] ?>">Pasif</label>
      </div>

    </td>
     
    <td><?=$content_row["reklam_bitis"]; ?></td>



    <td>
      <a href="<?php echo SITE_URL ?>Admin/Reklam/Update/<?php echo $content_row["reklam_id"]; ?>" class="btn btn-info btn-xs tipsi" title="" data-original-title="Düzenle"><i class="fa fa-edit"></i></a>

      <a href="javascript:void(0);" class="btn btn-danger btn-xs tipsi delete_link" title="" data-original-title="Sil"  data-id="<?php echo $content_row["reklam_id"]; ?>"><i class="fa fa-times"></i></a>
    </td>
  </tr>

  <?php $i++;} // end each for main level?>
</tbody>
</table>
</div>
</div>
</div>
</div>