

<div id="sagx">
<!--<div id="kurvesporbanner"></div>-->
<!--sag haber start-->
<div id="saghaber">
 <ul id="saghaberhead">
 <?php
 
 $renkler = array('1'=>'#0070BC','2'=>'#D8242F','3'=>'#008EAE','4'=>'#8FC249','5'=>'#F59331');
  $itab= 1; foreach ($rightcat as  $rcat) { ?>
  
    <li id="sagtab<?=$itab;?>" 
	<?php if ($itab ==1){ ?> class="actx<?=$itab;?>" data-id="<?php echo $rcat['Cat_id']; ?>" <?php } ?> 
    onclick="javascript:sagislem('<?php echo $rcat['Cat_id']; ?>','<?php echo $renkler[$itab] ?>','<?=$itab;?>');" >
     
     <a href="javascript:;" ><?php echo  $rcat['Cat_Name']; ?></a>
     </li>
     
  <?php $itab++; }?>
  </ul>
  
   <div id="tabs-1" data-id="2" class="saghaberic">
 <div class="saghabersld">
    
 
    
<ul id="saghabersldsi" >

<?php foreach($rightnews as $rnews){?>
  <li>
  
    <a href="#"  title="<?php echo $rnews['news_name']; ?>" >
   <img src="<?php echo SITE_UPLOAD_DIR ?>news/320x180_<?php echo $rnews['news_image_main']; ?>" height="180" />
   </a>
       <p class="saghabername" ><?php echo $rnews['news_name']; ?></p>  
     </li>
    
<?php }?>
 
     
       
    </ul>
       
           
    <div id="pagesaghabersld" class="pagesaghabersld"></div>

  </div>

  <script type="text/javascript">
  $("#saghabersldsi").carouFredSel({
          pagination: "#pagesaghabersld",
            direction: "left",
          responsive: true,
          circular: false,
          responsive: true,
          auto: true,
           scroll : {
            items           : 1,
            easing          : "easeOutBack",
            duration        : 1000,                         
            pauseOnHover    : true
       
      
        }     
        });
  
</script>
  </div>
  
</div>
<div class="300x300 ortala fr"><?php echo  $reklam['300300']['reklam_icerik']; ?></div>
<!--sag haber end-->
 <?php include("sporhaberler.php"); ?> 
  <?php  include("koseyazarlari.php"); ?> 
<!--sag spor haber end-->
 <?php  //include("sagaltkur.php"); ?> 
<!--kurlar end-->
<div id="reklam3">
<?php echo  $reklam['300300']['reklam_icerik']; ?></div>
</div>
 