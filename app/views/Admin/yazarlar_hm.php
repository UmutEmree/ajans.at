<div class="row">
  <div class="col-md-12">
    <div class="grid simple " style="padding-top:10px;">

     <div class="grid-title no-border"> 
       <h3 class="content-header pull-left"><?php echo $page_label; ?></h3>
       <div class="col-lg-5 pull-right text-right">


        <button id="editable-sample_new" class="btn btn-info tipsi"
        onclick="location.href='<?php echo SITE_URL ?>Admin/Yazarlar/Insert'"
        title="Yeni Ekleme">
       <i class="fa fa-plus"></i> Köşe Yazarı Ekle 
      </button>

    </div><div class="clearfix"></div>
  </div>


  <div class="grid-body no-border">
    <table class="table" id="example">
      <thead>
        <tr>
          <th class="col-md-1">NO</th>
          <th>Yazar Adı</th>
          <th>Mail Adresi</th>
          <th>Şifresi</th>       
          <th>durum</th>

          <th>İşlem</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1;

        foreach($content as $content_row){?>
        <tr class=""
        id="tr_<?php echo $content_row["yazarlar_id"]; ?>" >
        <td>
          <?php echo $i; ?>
        </td>


        <td><?=$content_row["yazar_name"]; ?></td>
        <td><?=$content_row["yazar_mail"]; ?></td>
        <td><?=$content_row["yazar_sifre"]; ?></td>
      
        <td> 

      <div class="radio radio-success">
            <input id="yes<?php echo $content_row["yazarlar_id"] ?>" type="radio" data-id="<?php echo $content_row["yazarlar_id"].'+yazar_durum'; ?>" class="durumsec" name="yazar_durum<?php echo $content_row["yazarlar_id"] ?>" value="1" 
            <?php if ($content_row["yazar_durum"] == "1") {
              echo 'checked="checked"';
            } ?>
            >
            <label for="yes<?php echo $content_row["yazarlar_id"] ?>">Aktif</label>
          </div> <div class="radio">
          <input id="no<?php echo $content_row["yazarlar_id"] ?>" type="radio" name="yazar_durum<?php echo $content_row["yazarlar_id"] ?>" data-id="<?php echo $content_row["yazarlar_id"].'+yazar_durum'; ?>" class="durumsec" value="0"
          <?php if ($content_row["yazar_durum"] == "0") {
            echo 'checked="checked"';
          } ?>>
          <label for="no<?php echo $content_row["yazarlar_id"] ?>">Pasif</label>
        </div>


        </td>



        <td>
          <a href="<?php echo SITE_URL ?>Admin/Yazarlar/Update/<?php echo $content_row["yazarlar_id"]; ?>" class="btn btn-info btn-xs tipsi" title="" data-original-title="Düzenle"><i class="fa fa-edit"></i></a>

          <a href="javascript:void(0);" class="btn btn-danger btn-xs tipsi delete_link" title="" data-original-title="Sil"  data-id="<?php echo $content_row["yazarlar_id"]; ?>"><i class="fa fa-times"></i></a>
        </td>
      </tr>

      <?php $i++;} // end each for main level?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>