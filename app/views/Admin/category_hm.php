<div class="row">
  <div class="col-md-12">
    <div class="grid simple " style="padding-top:10px;">

     <div class="grid-title no-border">      
      <div class="col-lg-8">

        <button id="editable-sample_new" class="btn btn-primary tipsi"
        onclick="location.href='<?php echo SITE_URL ?>Admin/Categories/HizliEkle'"
        title="Sadece Temel bilgileri girerek oluşturmak için">
        Hızlı Kategori Ekle <i class="fa fa-plus"></i>
      </button> 
      <button id="editable-sample_new" class="btn btn-info tipsi"
      onclick="location.href='<?php echo SITE_URL ?>Admin/Categories/Cat_insert'"
      title="Detaylı içerik girerek oluşturmak için">
      Kategori Ekle <i class="fa fa-plus"></i>
    </button>
    <a href="javascript:;" class="btn btn-link tipsi btnmin" title="Alt Kategorileri gizle göster" onclick="slidetogle('sub')" style="font-size:11px;">  Tüm (Göster/Gizle)&nbsp;<i class="fa fa-undo"></i></a>

  </div>
   


</div>

<div class="grid-body no-border">


  <table class="table no-more-tables" id="dynamic-table">
    <thead>
      <tr>
        <th >No</th>
        <th >Kategori Adı </th>
        <th  >Kategori Main</th>
        <th  >Konum</th>
        <th  >Sıra</th>
        <th  >İşlem</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach($cat as $cat_row){?>
      <tr  id="tr_<?php echo $cat_row["Cat_id"]; ?>" >
      
      <td>
        <?php if(count($cat_row["Cat_Depht"])>0){?>
        <button type="button" class="btn btn-info btn-xs tipsi" 
        title="Göster/Gizle"
        onclick="slidetogle(<?php echo $cat_row["Cat_id"]; ?>)"
        ><i class="fa fa-plus"></i></button>
        <?php }else{ echo $i; } ?>
      </td>
      <td>
       <a class="pull-left Cat_Nameh5<?php echo $cat_row["Cat_id"]; ?>">Ana Kategori / </a> 
       <b class="pull-left Cat_Nameh5<?php echo $cat_row["Cat_id"]; ?>">
         <?php echo $cat_row["Cat_Name"]; ?></b>
         <div id="divCat_Name<?php echo $cat_row["Cat_id"]; ?>" 
          style="display:none;">


          <div class="input-group col-md-8">  
           <input class="form-control" type="text" 
           id="Cat_Name_val<?php echo $cat_row["Cat_id"]; ?>" 
           value="<?php echo $cat_row["Cat_Name"]; ?>" 
           />
           <div class="input-group-btn">
            <button type="button" class="btn btn-info updateBtn" 
            data-id="Cat_Name+<?php echo $cat_row["Cat_id"]; ?>" ><i class="fa fa-edit"></i></button>
          </div>
        </div>




      </div>
    </td>
    <td><h6 class="Cat_Main<?php echo $cat_row["Cat_id"]; ?>"><?php echo $cat_row["Cat_M_Name"] ?></h6> 
     <div  class="selectCat_Main<?php echo $cat_row["Cat_id"]; ?>" 
       style="display:none; width:250px;"> 
       <select  class="col-md-10 selectCat<?php echo $cat_row["Cat_id"]; ?>"
        data-id="<?php echo $cat_row["Cat_Main"]; ?>"
        id="Cat_Main_val<?php echo $cat_row["Cat_id"]; ?>" 
        name="cat">
        <?php  echo $data["slct"]?>
      </select>
      <button class="btn btn-info col-md-2 updateBtn " type="button"
      data-id="Cat_Main+<?php echo $cat_row["Cat_id"]; ?>" 
      ><i class="fa fa-edit"></i></button>
    </div>
  </td>
  <td class="center">  <div class="row">
    <?php $imp=1; foreach ($Kategori_Konumlari as $key => $value) {?>

    <div class="row-fluid col-md-1">
      <div class="checkbox check-primary checkbox-circle pull-left tipsi" title="<?php echo $value ?>" >
        <input class="konumsec" id="checkbox<?php echo $imp.$cat_row["Cat_id"] ?>" name="<?php echo $key.$cat_row["Cat_id"] ?>" type="checkbox" data-id="<?php echo $cat_row["Cat_id"].'+'.$key; ?>" value="1" <?php if ($cat_row[$key]==1) {
          echo 'checked="checked"';
        } ?>>
        <label for="checkbox<?php echo $imp.$cat_row["Cat_id"] ?>">  </label>
      </div>
    </div>


    <?php $imp++;}  ?>
  </div></td>
  <td><input type="text" name="sira" style="width:50px;" data-id="<?php echo $cat_row["Cat_id"]; ?>"  class="form-control   sirabelirle" value="<?php echo $cat_row["Cat_Row"]; ?> "></td>
  <td>
   <div class="btn-group">
     <button class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"> İşlem <span class="caret"></span> </button>
     <ul class="dropdown-menu">
      <li> <a href="javascript:void(0);" onclick="kateditshow('<?php echo $cat_row["Cat_id"]; ?>')">Hızlı Düzenle</a> </li>
     <!--  <li> <a href="<?php //echo SITE_URL ?>Admin/Categories/Edit/<?php //echo $cat_row["Cat_id"]; ?>">Düzenle</a> </li>  -->    
      <li> <a  href="javascript:void(0);" class="delete_link" data-id="<?php echo $cat_row["Cat_id"]; ?>">Sil</a> </li>

    </ul>
  </div></a>
</td>
</tr>
<?php if (isset($cat_row["Cat_Depht"]) && !empty($cat_row["Cat_Depht"])){ ?>
<?php foreach($cat_row["Cat_Depht"] as $indis){?>

<tr class="sub sub1 <?php echo $cat_row["Cat_id"]; ?>"
 id="tr_<?php echo $cat_row[$indis]["Cat_id"]; ?>" 
 >
 <td> 
  <?php if(count($cat_row[$indis]["Cat_Depht"])>0){?>
  <button type="button" class="btn btn-info btn-xs tipsi" 
  title="Göster/Gizle"
  onclick="slidetogle(<?php echo $cat_row[$indis]["Cat_id"] ?>)"
  ><i class="fa fa-plus"></i></button>
  <?php }?>
</td>
<td>
  <a class="pull-left Cat_Nameh5<?php echo $cat_row[$indis]["Cat_id"]; ?>">Ana Kategori / <?php echo $cat_row[$indis]["Cat_M_Name"]; ?> / </a> 
  <b class="pull-left Cat_Nameh5<?php echo $cat_row[$indis]["Cat_id"]; ?>" ><?php echo $cat_row[$indis]["Cat_Name"]; ?></b>
  

  <div id="divCat_Name<?php echo $cat_row[$indis]["Cat_id"]; ?>" 
    style="display:none;">


    <div class="input-group col-md-8">  
     <input class="form-control" type="text" 
     id="Cat_Name_val<?php echo $cat_row[$indis]["Cat_id"]; ?>" 
     value="<?php echo $cat_row[$indis]["Cat_Name"]; ?>" 
     />
     <div class="input-group-btn">
      <button type="button" class="btn btn-info updateBtn" 
      data-id="Cat_Name+<?php echo $cat_row[$indis]["Cat_id"]; ?>" ><i class="fa fa-edit"></i></button>
    </div>
  </div>
</div>



</td>
<td> 
  <h6 class="Cat_Main<?php echo $cat_row[$indis]["Cat_id"]; ?>"><?php echo $cat_row[$indis]["Cat_M_Name"] ?></h6>

  <div  class="selectCat_Main<?php echo $cat_row[$indis]["Cat_id"]; ?>" 
   style="display:none; width:250px;"> 
   <select  class="col-md-10 selectCat<?php echo $cat_row[$indis]["Cat_id"]; ?>" 
    data-id="<?php echo $cat_row[$indis]["Cat_Main"]; ?>"
    id="Cat_Main_val<?php echo $cat_row[$indis]["Cat_id"]; ?>" 
    name="cat">
    <?php  echo $data["slct"]?>
  </select>
  <button class="btn btn-info col-md-2 updateBtn " type="button"
  data-id="Cat_Main+<?php echo $cat_row[$indis]["Cat_id"]; ?>" 
  ><i class="fa fa-edit"></i></button>
</div>


</td>
<td class="center"><div class="row">
    <?php $imp=1; foreach ($Kategori_Konumlari as $key => $value) {?>

    <div class="row-fluid col-md-1">
      <div class="checkbox check-primary checkbox-circle pull-left tipsi" title="<?php echo $value ?>" >
        <input class="konumsec" id="checkbox<?php echo $imp.$cat_row[$indis]["Cat_id"] ?>" name="<?php echo $key.$cat_row[$indis]["Cat_id"] ?>" type="checkbox" data-id="<?php echo $cat_row[$indis]["Cat_id"].'+'.$key; ?>" value="1" <?php if ($cat_row[$indis][$key]==1) {
          echo 'checked="checked"';
        } ?>>
        <label for="checkbox<?php echo $imp.$cat_row[$indis]["Cat_id"] ?>">  </label>
      </div>
    </div>


    <?php $imp++;}  ?>
  </div></td>
  <td><input type="text" name="sira" data-id="<?php echo $cat_row[$indis]["Cat_id"]; ?>" style="width:50px;" class="form-control   sirabelirle" value="<?php echo $cat_row[$indis]["Cat_Row"]; ?> "></td>
<td>  <div class="btn-group">
 <button class="btn btn-info  btn-sm dropdown-toggle" data-toggle="dropdown"> İşlem <span class="caret"></span> </button>
 <ul class="dropdown-menu">

   <li> 
    <a href="javascript:void(0);" onclick="kateditshow('<?php echo $cat_row[$indis]["Cat_id"]; ?>')">Hızlı Düzenle</a>
  </li>

  <li> <a href="<?php echo SITE_URL ?>Admin/Categories/Edit/<?php echo $cat_row[$indis]["Cat_id"]; ?>">Düzenle</a> </li>
  <li> <a href="#">Ürün Ekle</a> </li>
  <li> <a href="javascript:void(0);" class="delete_link" data-id="<?php echo $cat_row[$indis]["Cat_id"]; ?>">Sil</a> </li>

</ul>
</div></td>
</tr>
<?php if (isset($cat_row[$indis]["Cat_Depht"]) && !empty($cat_row[$indis]["Cat_Depht"])){ ?>
<?php foreach($cat_row[$indis]["Cat_Depht"] as $indis2){?>


<tr class="sub sub2 <?php echo $cat_row["Cat_id"].' '.$cat_row[$indis]["Cat_id"]; ?> "
  id="tr_<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>"
  >
  <td></td>

  <td>
    <a class="pull-left Cat_Nameh5<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>">Ana Kategori / <?php echo $cat_row[$indis]["Cat_M_Name"]; ?> /
      <?php echo $cat_row[$indis][$indis2]["Cat_M_Name"]; ?> / </a> 
      <b class="pull-left Cat_Nameh5<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>"><?php echo $cat_row[$indis][$indis2]["Cat_Name"]; ?></b>
      
      <div id="divCat_Name<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>" 
        style="display:none;">


        <div class="input-group col-md-8">  
         <input class="form-control" type="text" 
         id="Cat_Name_val<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>" 
         value="<?php echo $cat_row[$indis][$indis2]["Cat_Name"]; ?>" 
         />
         <div class="input-group-btn">
          <button type="button" class="btn btn-info updateBtn" 
          data-id="Cat_Name+<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>" ><i class="fa fa-edit"></i></button>
        </div>
      </div>
    </div>


  </td>
  <td> 
    <h6 class="Cat_Main<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>"><?php echo $cat_row[$indis][$indis2]["Cat_M_Name"] ?></h6>



    <div  class="selectCat_Main<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>" 
     style="display:none; width:250px;"> 
     <select  class="col-md-10 selectCat<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>" 
      data-id="<?php echo $cat_row[$indis][$indis2]["Cat_Main"]; ?>"
      id="Cat_Main_val<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>" 
      name="cat">
      <?php  echo $data["slct"]?>
    </select>
    <button class="btn btn-info col-md-2 updateBtn " type="button"
    data-id="Cat_Main+<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>" 
    ><i class="fa fa-edit"></i></button>
  </div>

</td>
<td class="center"><div class="row">
    <?php $imp=1; foreach ($Kategori_Konumlari as $key => $value) {?>

    <div class="row-fluid col-md-1">
      <div class="checkbox check-primary checkbox-circle pull-left tipsi" title="<?php echo $value ?>" >
        <input class="konumsec" id="checkbox<?php echo $imp.$cat_row[$indis][$indis2]["Cat_id"] ?>" name="<?php echo $key.$cat_row[$indis][$indis2]["Cat_id"] ?>" type="checkbox" data-id="<?php echo $cat_row[$indis][$indis2]["Cat_id"].'+'.$key; ?>" value="1" <?php if ($cat_row[$indis][$indis2][$key]==1) {
          echo 'checked="checked"';
        } ?>>
        <label for="checkbox<?php echo $imp.$cat_row[$indis][$indis2]["Cat_id"] ?>">  </label>
      </div>
    </div>


    <?php $imp++;}  ?>
  </div></td>
  <td><input type="text" name="sira" style="width:50px;" data-id="<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>"  class="form-control   sirabelirle" value="<?php echo $cat_row[$indis][$indis2]["Cat_Row"]; ?> "></td>
<td>  <div class="btn-group">
 <button class="btn btn-info  btn-sm dropdown-toggle" data-toggle="dropdown"> İşlem <span class="caret"></span> </button>
 <ul class="dropdown-menu">
   <li> 
     <a href="javascript:void(0);" 
     onclick="kateditshow('<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>')">
     Hızlı Düzenle</a> 
   </li>
   <li> 
    <a href="<?php echo SITE_URL ?>Admin/Categories/Edit/<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>">
      Düzenle</a> </li>
      <li> <a href="#">Ürün Ekle</a> </li>
      <li> 
       <a href="javascript:void(0);" class="delete_link" data-id="<?php echo $cat_row[$indis][$indis2]["Cat_id"]; ?>">
         Sil</a> </li>

       </ul>
     </div></td>
   </tr>

   <?php } // end each for level 2?> 
   <?php } // end if for level 2?>

   <?php } // end each for level 1?> 
   <?php } // end if for level 1?>
   <?php $i++;} // end each for main level?>
 </tbody>
</table>
</div>
</div>
</div>
</div>