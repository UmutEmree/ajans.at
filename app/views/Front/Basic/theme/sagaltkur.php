 <?php
$link = "http://finans.mynet.com/";
$parcala1='#<li><a href="(.*?)"><strong>(.*?)</strong>(.*?)</a></li>#'; // kur
$parcala2='#<li class="(.*?)"></li>#'; // kur
$botara = file_get_contents($link);
preg_match_all($parcala1,$botara,$dovizcek); // döviz
preg_match_all($parcala2,$botara,$ikoncek); // kur
$imkb = $dovizcek[2][0];
$imkbDeger = $dovizcek[3][0];
$imkbikon = $ikoncek[1][0];
$Dolar = $dovizcek[2][1];
$DolarDeger = $dovizcek[3][1];
$Dolarikon = $ikoncek[1][1];
$Euro = $dovizcek[2][2];
$EuroDeger = $dovizcek[3][2];
$Euroikon = $ikoncek[1][2];
$Parite = $dovizcek[2][3];
$PariteDeger = $dovizcek[3][3];
$Pariteikon = $ikoncek[1][3];
$Altin = $dovizcek[2][4];
$AltinDeger = $dovizcek[3][4];
$Altinikon = $ikoncek[1][4];
function cevir($ikon){
switch($ikon){
case 'fnArrow green-arw': return '<span style="color:green;">&uarr;</span>'; break;
case 'ndt-Right dtBlueIco': return '<span style="color:blue;">&mdash;</span>'; break;
case 'fnArrow red-arw': return '<span style="color:red;">&darr;</span>'; break;
case 'fnNoMrg fnArrow red-arw': return '<span style="color:red;">&darr;</span>'; break;
}
}
?>

<div id="sagkurmap">
<ul>
<li><?=$DolarDeger?> <br><?php echo cevir($Dolarikon); ?></li>
<li> <?=$EuroDeger?> <br> <?php echo cevir($Euroikon); ?></li>
<li><?=$AltinDeger?><br> <?php echo cevir($Altinikon); ?></li>
<li style="width:65px; margin-right:0"><?=$imkbDeger?> <?php echo cevir($imkbikon); ?></li>
</ul>

 </div>