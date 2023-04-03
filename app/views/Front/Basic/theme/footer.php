 <div id="footer">
  
  <div id="footermain">
  
  
  
<div class="footerpanel">
<?php $i5 = 1; foreach ($newcat as   $row_fotkat) { ?>
<a href="<?php echo SITE_URL.$row_fotkat['Cat_Seo_Name'] ?>"><?php echo $helper->mb_upper($row_fotkat['Cat_Name']); ?></a>


<?php
if($i5%5==0){
	echo '</div><div class="footerpanel">';
	}

 $i5++;}  ?>

</div>

<div class="footerpanel " style="background:none;">

<a href="Kunye">Künye</a>
<a href="Iletisim">İletişim</a>
<a href="#">Giriş Sayfam Yap</a>
<a href="#">Sık Kullanılanlara Ekle</a>
<a href="#">Sitene Ekle</a>

</div>
<div class="clr10"></div>
<div style="background:url(files/theme/alt/logolar.jpg) no-repeat; width:791px; height:71px; margin:10px auto;" ></div>
  </div> 
  <!--footer main end -->
</div>
 
