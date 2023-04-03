<div class="row">

  <div class="col-md-12">
    <div class="grid simple " style="padding-top:10px;">

     <div class="grid-title no-border"> 
       <h3 class="content-header pull-left"><?php echo $page_label; ?> (Toplam <?=$toplam_sonuc ?>)</h3>
       <div class="col-lg-5 pull-right text-right">


<button id="editable-sample_new" class="btn btn-primary btn-mini tipsi"
        onclick="location.href='<?php echo SITE_URL ?>Admin/HizliNews/Galeri'"
        title="Hızlı Galeri Haber Ekleme Formu">
        Galeri Haber Ekle <i class="fa fa-plus"></i>
      </button>
  <button id="editable-sample_new" class="btn btn-success btn-mini tipsi"
        onclick="location.href='<?php echo SITE_URL ?>Admin/HizliNews/Video'"
        title="Hızlı Video Haber Ekleme Formu">
        Video Haber Ekle <i class="fa fa-plus"></i>
      </button>
        <button id="editable-sample_new" class="btn btn-info btn-mini tipsi"
        onclick="location.href='<?php echo SITE_URL ?>Admin/News/Insert'"
        title="Yeni Ekleme">
        Haber Ekle <i class="fa fa-plus"></i>
      </button>

    </div>
  </div>
  <div class="col-md-12">

   <nav>
    <ul class="pagination">
      <li>
        <a href="<?=$prev_page ?>" aria-label="Önceki">
         <span aria-hidden="true">&laquo;</span>
       </a>
     </li>
     <?=$pag ?>

     <li>
      <a href="<?=$next_page ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

</div>
<div id='res'></div>

<div class="grid-body no-border">

  <table class="table no-more-tables table-bordered" id="example">
    <thead>
      <tr>
        <th class="col-md-1" style="width:15px;">NO</th>
        <th  class="col-md-3">Haber Başlığı</th>
        <th  class="col-md-2">Kategorisi</th>


        <th  class="col-md-1">Yayın Durumu</th>
        <th  class="col-md-2">Konum Durumu</th>
        <th  class="col-md-3">İşlem</th>
      </tr>
    </thead>
    <tbody>
     <tr style="background:#f9f9f9;">                     
      <td> <input type="text" name="news_id" id="ara_news_id" class="form-control ent"

        <?php if ($current_input['label'] == 'news_id') {
         echo 'value="'.$current_input['val'].'"';
       } ?>
       ></td>
       <td> <input type="text" name="news_name" id="ara_news_name" class="form-control ent"
        <?php if ($current_input['label'] == 'news_name') {
         echo 'value="'.$current_input['val'].'"';
       } ?>

       ></td>
       <td> <select  name="news_cat_id" id="ara_news_cat_id" class="form-control degis">
        <?=$selectfill ?>
      </select></td>
      <td>
        <select  name="news_durum" id="ara_news_durum" class="form-control degis">
          <option value="-1" <?php if ($current_input['label'] == 'news_durum' && $current_input['val'] ==-1) {echo "selected"; } ?>>Tümü</option>            
          <option value="1"  <?php if ($current_input['label'] == 'news_durum' && $current_input['val'] ==1) {echo "selected"; } ?>>Yayında</option>
          <option value="2"  <?php if ($current_input['label'] == 'news_durum' && $current_input['val'] ==2) {echo "selected"; } ?>>Pasif</option>

        </select>

      </td>
      <td>


        <select  name="news_konum" id="ara_news_konum" class="form-control degis">
          <option value="-1">Tümü</option>
          <?php  foreach ($Haber_Konumlari as $key => $value) {?>
          
          <option value="<?=$key ?>"
           <?php if ($current_input['label'] == $key && $current_input['val'] != '-1') {
             echo 'selected';
           } ?>
           ><?=$value ?></option>

           <?php } ?>

         </select>

       </td>
      
       <td></td>
     </tr>


     <?php $i=1;

     foreach($content as $content_row){?>
     <tr class=""
     id="tr_<?php echo $content_row["news_id"]; ?>" >
     <td>
      <?php echo $pageno*20+$i-20; ?>
    </td>


    <td><?=$content_row["news_name"]; ?></td>
    <td><?=$content_row["Cat_Name"]; ?></td>

    <td> 

     <div class="radio radio-success">
      <input id="yes<?php echo $content_row["news_id"] ?>" type="radio" data-id="<?php echo $content_row["news_id"].'+news_durum'; ?>" class="durumsec" name="news_durum<?php echo $content_row["news_id"] ?>" value="1" 
      <?php if ($content_row["news_durum"] == "1") {
        echo 'checked="checked"';
      } ?>
      >
      <label for="yes<?php echo $content_row["news_id"] ?>">Yayında</label>
    </div> <div class="radio">
    <input id="no<?php echo $content_row["news_id"] ?>" type="radio" name="news_durum<?php echo $content_row["news_id"] ?>" data-id="<?php echo $content_row["news_id"].'+news_durum'; ?>" class="durumsec" value="2"
    <?php if ($content_row["news_durum"] == "2") {
      echo 'checked="checked"';
    } ?>>
    <label for="no<?php echo $content_row["news_id"] ?>">Pasif</label>
  </div>
</td>
<td>
  <div class="row">
    <?php $imp=1; foreach ($Haber_Konumlari as $key => $value) {?>

    <div class="row-fluid col-md-1">
      <div class="checkbox check-primary checkbox-circle pull-left tipsi" title="<?php echo $value ?>" >
        <input class="konumsec" id="checkbox<?php echo $imp.$content_row["news_id"] ?>" name="<?php echo $key.$content_row["news_id"] ?>" type="checkbox" data-id="<?php echo $content_row["news_id"].'+'.$key; ?>" value="1" <?php if ($content_row[$key]==1) {
          echo 'checked="checked"';
        } ?>>
        <label for="checkbox<?php echo $imp.$content_row["news_id"] ?>">  </label>
      </div>
    </div>


    <?php $imp++;}  ?>
  </div>
</td>





<td class="col-md-2">
  <!--   <a href="<?php echo SITE_URL ?>Admin/Yorum/listhaber/<?php //echo $content_row["news_id"]; ?>"  target='_blank' class="btn btn-warning btn-xs btn-mini tipsi" title="Haber Yorumları" data-original-title="Haber Yorumları"><i class="fa fa-comment"></i></a> --> 
  <a href="javascript:;" data-id="<?php echo $content_row["news_id"].'+'.$content_row["news_name"]; ?>"  class="btn btn-warning btn-xs btn-mini tipsi video" title="Video Galeri oluştur" data-original-title="Galeri oluştur"><i class="fa fa-video-camera"></i></a>

  <a href="javascript:;" data-id="<?php echo $content_row["news_id"].'+'.$content_row["news_name"]; ?>" class="btn btn-success btn-xs btn-mini tipsi galeri" title="Galeri oluştur" data-original-title="Galeri oluştur"><i class="fa fa-picture-o"></i></a>

  <a href="javascript:;" data-id="<?php echo $content_row["news_id"].'+'.$content_row["news_name"]; ?>" class="btn btn-primary btn-xs btn-mini tipsi quick" title="Hızlı Düzenle" data-original-title="Hızlı Düzenle"><i class="fa fa-wrench"></i></a>

  <a href="<?php echo SITE_URL ?>Admin/News/Update/<?php echo $content_row["news_id"]; ?>" class="btn btn-info btn-xs btn-mini tipsi" title="Düzenle" data-original-title="Düzenle"><i class="fa fa-edit"></i></a>

  <a href="javascript:void(0);" class="btn btn-danger btn-xs btn-mini tipsi delete_link" title="" data-original-title="Sil"  data-id="<?php echo $content_row["news_id"]; ?>"><i class="fa fa-times"></i></a>
</td>
</tr>

<?php $i++;} // end each for main level?>
</tbody>
</table>
<div class="col-md-12">

 <nav>
  <ul class="pagination">
    <li>
      <a href="<?=$prev_page ?>" aria-label="Önceki">
       <span aria-hidden="true">&laquo;</span>
     </a>
   </li>
   <?=$pag ?>

   <li>
    <a href="<?=$next_page ?>" aria-label="Next">
      <span aria-hidden="true">&raquo;</span>
    </a>
  </li>
</ul>
</nav>

</div>
</div>
</div>
</div>
</div>


<div id="modalci">
  <?php   include 'theme/videomodal.php'; ?>
</div>