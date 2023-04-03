 
<div id="centerhaberlist">
<?php  
	 
mysql_select_db($database_verisi_tabanisi, $verisi_tabanisi);
$query_centerhab = "SELECT * FROM koseyazilari where yazarid = '$yazarid' ORDER BY id desc";
$centerhab = mysql_query($query_centerhab, $verisi_tabanisi) or die(mysql_error());
$row_centerhab = mysql_fetch_assoc($centerhab);
$totalRows_centerhab = mysql_num_rows($centerhab);	
	if($totalRows_centerhab>0){
	?>
<h2 class="kh"><i></i> <p>Bu Yazarın Diğer Yazıları</p></h2>
<ul>
<?php do{?><a href="Cf-<?php echo $row_centerhab['id']; ?>-<?php echo seola($row_centerhab['baslik']); ?>">
<li  ><img src="files/writer/<?php echo $row_centerhab['yazarimg'] ?>" ><h2><?php echo $row_centerhab['baslik'] ?></h2>
<p><?php echo kisalt($row_centerhab['jenerik'],100) ?> </p>

</li></a>
<?php }while($row_centerhab = mysql_fetch_assoc($centerhab));?>
</ul>

<?php }?>
</div>
 
