<style type="text/css">

<?php foreach ($fontlar as $key => $value) { ?>
  @font-face {
    font-family: fontgelen<?php echo $key ?>;
    src: url(<?php echo SITE_UPLOAD_DIR ?>tools/font/<?php echo $value ?>);
  }
  <?php } ?>
  </style>
  <input type="hidden" value="<?php echo $mansetboyutlar[0] ?>_" id="mansetboyut">
  <input type="hidden" value="<?php echo $mansetboyutlar[1] ?>_" id="thboyut">
  <form action="<?php echo SITE_URL ?>Admin/Manset/reupload" method="post" class="dnone"  id="reuploadmanset" enctype="multipart/form-data">
    <input type="file" name="resim" id="resiminp" onchange="reupload();" >
    <input type="hidden" name="haberid" id="haberid" value="<?php echo $current['news_id'] ?>">
    <input type="hidden" name="oldresim" id="oldresim" value="<?php echo $current['news_image_manset'] ?>">

  </form>
  <div class"dragli dnone" style="position:fixed; display:none; left:20px; font-size:8px; top:100px; width:400px; height;600px; padding:20px; background:#333; color:green; z-index:999999;" id="pancere"></div>
  <div class="col-md-9">
   <div class="grid simple">
    <div class="grid-title no-border">
      <h4><?php echo $page_label; ?></h4>
      <button type="button" class="btn btn-success pull-right tipsi sonkaydet" title="Bu Manşet için işlemleri bitirdiyseniz kaydedebilirsiniz">Kaydet Bitir</button>
      <button type="button" class="btn btn-warning pull-right reuploadsec tipsi" style="margin-right:10px;" title="Yeni bir Manşet Resmi Gönder">Resim Yükle</button>
      <button type="button" class="btn btn-default pull-right tipsi bironce"  style="margin-right:10px;" onclick="$('#bironce').click();" title="bir önceki resme dön">Geri Al</button>


    </div>
    <div class="grid-body no-border">
      <input type="hidden" value="public/files/news/<?=$mansetboyutlar[0].'_';?><?php echo $current['news_image_manset'] ?>" id="mansetresmi">
      <input type="hidden" value="<?=$mansetboyutlar[0].'_';?><?php echo $current['news_image_manset'] ?>" id="ilkhali">
      <input type="hidden" value="" id="toolsresmi">
      <input type="hidden" value="<?php echo SITE_UPLOAD_DIR ?>" id="updir">

      <input type="hidden" value="" id="geni">
      <input type="hidden" value="" id="yuku">


      <div class="input-group pull-left col-md-2">
        <input type="text"  id='dragleft'   class="form-control" placeholder="Yatay Konumu" />
        <span class="input-group-addon"><i>X</i></span>
      </div> 
      <div class="input-group pull-left col-md-2" style="margin-right:5px;">
        <input type="text"  id='dragtop'   class="form-control" placeholder="Dikey Konumu" />
        <span class="input-group-addon"><i>Y</i></span>
      </div>  

      
      <button type="button" class="btn btn-warning btn-xs dnone textbtn actbtnler" onclick='$("#text_onizle").html("")'>Yazıyı Kaldır</button>
      <button type="button" class="btn btn-succes btn-xs dnone uygulabtntext actbtnler" onclick='uygulatext();'>Uygula</button>
      <button type="button" class="btn btn-warning btn-xs dnone imgbtn actbtnler" onclick='$("#img_onizle").html("")'>Resmi Kaldır</button>
      <button type="button" class="btn btn-succes btn-xs dnone uygulabtn actbtnler" onclick='uygula();'>Uygula</button>
      <button type="button" class="btn btn-warning btn-xs dnone shapebtn actbtnler"  >Şekli Kaldır</button>
      <button type="button" class="btn btn-succes btn-xs dnone uygulabtnshape actbtnler" onclick='uygulashape();'>Uygula</button>
      <div class="clearfix"></div>
      <hr>
      <div  id="mansetpencere">
        <div id="text_onizle" class='dragli' style="font-family: fontgelen9;"> </div>
        <div id="img_onizle" class='dragli'> </div>
        <div id="shape_onizle" class='dragli'> </div>
        <img src="<?php echo SITE_UPLOAD_DIR ?>news/<?=$mansetboyutlar[0].'_';?><?php echo $current['news_image_manset'] ?>" id="banner">
      </div>
      <div class="clearfix"></div>
      <hr>
      <div class="row" id="mansetlist">
        <?php $gi =1; foreach ($content as $key => $value) { ?>       
        <div class="col-md-1 mansetsec tipsi" data-id="<?php echo $value['news_image_manset'].'+'.$value['news_id'] ?>" title="Manşet Resmini Seç" ><img class="img-thumbnail minimansetler <?php echo $curimg = ($gi=1) ? 'curimg' : '' ; ?> "  src="<?php echo SITE_UPLOAD_DIR ?>news/<?=$mansetboyutlar[1].'_';?><?php echo $value['news_image_manset'] ?>"></div>
        <?php $gi++; } ?>

      </div>
      <div class="clerafix"></div>
      <hr>
      <h5>İşlem Geçmişi</h5>
      <div class="col-md-12" id="historym"></div>




    </div><!--/porlets-content-->
  </div><!--/block-web--> 
</div>

<!--sol taraf başlıyor-->
<div class="col-md-3"><div class="tool-onizle img-thumbnail"></div>

<ul class="nav nav-tabs" id="tab-5">          
  <li class="pull-left active"><a href="#addimage" id="addimagebtn">Resim</a></li>
  <li class="pull-left"><a href="#addshape"  id="addshapebtn">Şekil</a></li> 
  <li class="pull-left "><a href="#addtext"  id="addtextbtn">Yazı</a></li>
</ul>
<div class="tab-content">

  <!-- text adding area -->
  <div class="tab-pane" id="addtext">

    <div class="row column-seperation">
     <div class="btn-group col-md-12">
      <button type="button" class="btn btn-info dropdown-toggle col-md-12" id="fontsecbtnsi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Font Seçiniz <span class="caret"></span>
      </button>
      <input type="hidden"   id="fontfamili" value="tahoma.ttf">
      <ul class="dropdown-menu" >

        <?php foreach ($fontlar as $key => $value) { ?>


        <li><a href="javascript:;" class='fontsec' data-bilgi="<?php echo $value ?>" data-id="fontgelen<?php echo $key ?>" style="font-family: fontgelen<?php echo $key ?>;"><?php echo $value ?></a></li>
        <?php } ?>


      </ul>
    </div>

    <div class="clearfix"></div> 
    <hr>
    
    <input type="text" id="yazi_ekle" placeholder="Yazı giriniz" class="form-control"  >
    <hr>
    <div class="input-group pull-left  renksec col-md-6">
      <input type="text" value="#000" class="form-control" id="yazirengci" />
      <span class="input-group-addon"><i></i></span>
    </div>  
    <button type="button" class="btn btn-info col-md-4  renkuygula">OK</button>
    <div class="clearfix"></div> 
    <hr>
    <div class="input-group pull-left col-md-6">
      <input type="text"   class="form-control" id="fontsizeci"  value="20" />
      <span class="input-group-addon"><i>px</i></span>
    </div> 
    <button type="button" class="btn btn-info col-md-4 boyutuygula">OK</button>
    <div class="clearfix"></div> 
    <hr>


    <?php $yazikonumu = array(
      'Sol' => 'left',
      'Orta' => 'center',
      'Sağ' => 'right',        
      'Üst' => 'top',
      'dOrta' => 'center',
      'Alt' => 'bottom'        
      ); ?>
      <div class="col-md-12" style="border:none;">
        <h6>Yatay Konumu</h6>
        <div class="radio radio-success">
          <?php $ikonum=1; foreach ($yazikonumu as $konumkey => $konumval) {
            if ($ikonum > 3) {
              $dub = 'dikislem';
            } else {
              $dub = 'islem';
            }

            ?>
            <div class="col-md-4">
              <input id="knm<?php echo $ikonum ?>" class="kbtn" data-id='<?php echo $dub.$konumval ?>+text_onizle' type="radio" name="<?php echo $retVal = ($ikonum<4) ? 'a' : 'b' ; ?>" value="<?php echo $konumval ?>" >
              <label for="knm<?php echo $ikonum ?>"><?php echo $konumkey ?></label>
            </div>
            <?php if ($ikonum==3) {
              echo ' <h6>Dikey Konumu</h6>';
            } ?>

            <?php $ikonum++;} ?>


          </div>
        </div>
        <div class="clearfix"></div>



      </div>
    </div>
    <!-- text adding area end -->
    <!-- shape adding area starting -->
    <div class="tab-pane" id="addshape">
      <div class="row column-seperation">
        <div id="kare" >Kare yada dikdörtgen Ekleyiniz.</div>
        <div class="input-group pull-left  renksec col-md-6">
          <input type="text" value="#ffffff" class="form-control" id="rengi" />
          <span class="input-group-addon"><i></i></span>
        </div>  
        <button type="button" class="btn btn-info renkuygula" >Uygula</button>

        <div class="col-md-12" style="border:none;">
          <h6>Yatay Konumu</h6>
          <div class="radio radio-success">
            <?php $skonum=1; foreach ($yazikonumu as $konumkey => $konumval) {
              if ($skonum > 3) {
                $dub = 'dikislem';
              } else {
                $dub = 'islem';
              }

              ?>
              <div class="col-md-4">
                <input id="shape<?php echo $skonum ?>"  type="radio" class='kbtn' name="<?php echo $retVal = ($skonum<4) ? 'm' : 'h' ; ?>" value="<?php echo $konumval ?>" data-id="<?php echo $dub.$konumval ?>+shape_onizle" >
                <label for="shape<?php echo $skonum ?>"><?php echo $konumkey ?></label>
              </div>
              <?php if ($skonum==3) {

                echo ' <h6>Dikey Konumu</h6>';
              } ?>

              <?php $skonum++;} ?>


            </div>
          </div>
          <div class="clearfix"></div>

        </div>
      </div>
      <!-- shape adding area ending -->
      <!-- image adding area starting -->
      <div class="tab-pane active" id="addimage">
        <div class="row">
          <div class="col-md-12">
           <div class="row column-seperation">
            <div class="row-fluid">
              <h5>Kütüphanedeki Resmler</h5>
              <div class="scroller scrollbar-dynamic" data-height="220px">
                <?php foreach($tools as $img_tool){ ?>
                <div class="img-thumbnail tools-div">

                 <img src="<?=SITE_UPLOAD_DIR ?>tools/<?php echo $img_tool ?>" class="img-thumbnail" data-id="<?php echo $img_tool ?>" width="60">
               </div>
               <?php

             } ?>
           </div>
         </div>

         <hr>


         <div class="col-md-12" style="border:none;">
          <h6>Yatay Konumu</h6>
          <div class="radio radio-success">
            <?php $mkonum=1; foreach ($yazikonumu as $konumkey => $konumval) {
              if ($mkonum > 3) {
                $dub = 'dikislem';
              } else {
                $dub = 'islem';
              }

              ?>
              <div class="col-md-4">
                <input id="img<?php echo $mkonum ?>"  type="radio" class='kbtn' name="<?php echo $retVal = ($mkonum<4) ? 'as' : 'bs' ; ?>" value="<?php echo $konumval ?>" data-id="<?php echo $dub.$konumval ?>+img_onizle" >
                <label for="img<?php echo $mkonum ?>"><?php echo $konumkey ?></label>
              </div>
              <?php if ($mkonum==3) {

                echo ' <h6>Dikey Konumu</h6>';
              } ?>

              <?php $mkonum++;} ?>


            </div>
          </div>
          <div class="clearfix"></div>

        </div>

      </div>
    </div>
  </div>
  <!-- image adding area ending -->
</div>
</div>
<div class="clearfix"></div>