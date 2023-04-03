<div id="footerhaber">
<div id="footerhaberhed"><div id="shd"></div> 

<div id="cokokunanhed">
<a href="#">Çok Okunanlar</a>
</div>
<a href="#">Çok Yorumlananlar</a>
<div id="sonefect"><i></i></div>

 

</div>
<ul class="foterpan">
<?php  for($ifs = 1;$ifs<50;$ifs++){?>
<li><a href="#"><?php echo $helper->mb_ucfirst($helper->kisalt('Test Haber Başlığı',50)); ?></a></li>
<?php
if($ifs%20==0){
	echo '</ul>
<ul class="foterpan">';
	}
 $ifs++;  } ?>

 
 
</ul>

</div>
