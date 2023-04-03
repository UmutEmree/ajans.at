

<div class="row">

	<!-- aylık analitik gosterimleri start -->
	<div class="col-md-4 col-vlg-3 col-sm-6">
		<div class="tiles green m-b-10">
			<div class="tiles-body">
				<div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
				<div class="tiles-title text-black"><?php $indis = date('m')-2+1; echo  $aylar[$indis];?> Ayı Ziyaret </div>
				<div class="widget-stats">
					<div class="wrapper transparent"> 
						<span class="item-title">Tekil Ziyaret</span> <span class="item-count animate-number semi-bold" data-value="<?php echo array_sum($teksi) ?>" data-animation-duration="700">0</span>
					</div>
				</div>
				<div class="widget-stats">
					<div class="wrapper transparent">
						<span class="item-title">Sayfa Gösterimi</span> <span class="item-count animate-number semi-bold" data-value="<?php echo array_sum($coksu) ?>" data-animation-duration="700">0</span> 
					</div>
				</div>
			 

				<div class="description"> <span class="text-white mini-description ">Google Analitics <span class="blend">Verileridir</span></span></div>
			</div>			
		</div>	
	</div>

	<!-- aylık kullanıcı trafiği -->
 
 
	<div class="col-md-4 col-vlg-3 col-sm-6">
		<div class="tiles blue m-b-10">
			<div class="tiles-body">
				<div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
				<div class="tiles-title text-black">İçerik Bilgilendirme</div>
				<div class="widget-stats">
					<div class="wrapper transparent"> 
						<span class="item-title">Haber Adedi</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $newscount ?>" data-     animation-duration="700">0</span>
					</div>
				</div>
				<div class="widget-stats">
					<div class="wrapper transparent">
						<span class="item-title">Kategori Adedi</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $catcount ?>" data-animation-duration="700">0</span> 
					</div>
				</div>


				<div class="description"> <span class="text-white mini-description ">Pasif olan içerikler <span class="blend">dahildir</span></span></div>
			</div>			
		</div>	
	</div>
	<div class="col-md-4 col-vlg-3 col-sm-6">
		<div class="tiles purple m-b-10">
			<div class="tiles-body">
				<div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
				<div class="tiles-title text-black">Mobil/Web Analitiği</div>
				<div class="widget-stats">
					<div class="wrapper transparent"> 
						<span class="item-title">Mobil Ziyaret</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $mobcount ?>" data-animation-duration="700">0</span>
					</div>
				</div>
				<div class="widget-stats">
					<div class="wrapper transparent">
						<span class="item-title">Desktop Ziyaret</span> <span class="item-count animate-number semi-bold" data-value="<?php echo array_sum($teksi)-intval($mobcount); ?>" data-animation-duration="700">0</span> 
					</div>
				</div>
				 
				<div class="description"> <span class="text-white mini-description ">Google Analitics <span class="blend">Verileridir</span></span></div>
			</div>			
		</div>	
	</div>	
 	
</div>

<div id="container" class="col-md-12 col-sm-12 col-xs-12"  ></div>
<div class="clearfix"></div>
<hr>

<!-- şehirlere göre ziyaretçiler -->
<div class="col-md-4">
	<div class="grid simple">
		<div class="grid-title no-border col-md-12">
			<h5>Şehirlere göre <span class="semi-bold">Ziyaretçiler</span></h5>
		</div>
		<div class="grid-body no-border">
			<div class="row-fluid">
				<div class="scroller scrollbar-dynamic" data-height="280px">

					<table class="table table-hover">
						<thead>
							<tr>
								<th>Şehir</th>
								<th>Oturum</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($sehir as  $var): ?>
							<tr>
								<td><?php echo $var[0] ?></td>
								<td><?php echo $var[1] ?></td>
							</tr>
						<?php endforeach ?>
						
					</tbody>
				</table>


			</div>
		</div>
	</div>
</div>
</div>

<!-- brovser tipi -->

<div class="col-md-4">
	<div class="grid simple">
		<div class="grid-title no-border">
			<h5>Browsera göre <span class="semi-bold">Ziyaretçiler</span></h5>
		</div>
		<div class="grid-body no-border">
			<div class="row-fluid">
				<div class="scroller scrollbar-dynamic" data-height="280px">

					<table class="table table-hover">
						<thead>
							<tr>
								<th>Browser</th>
								<th>Oturum</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($browser as  $var): ?>
							<tr>
								<td><?php echo $var[0] ?></td>
								<td><?php echo $var[1] ?></td>
							</tr>
						<?php endforeach ?>
						
					</tbody>
				</table>


			</div>
		</div>
	</div>
</div>
</div>


<!-- işletim sistemine göre -->

<div class="col-md-4">
	<div class="grid simple">
		<div class="grid-title no-border">
			<h5>İşletim Sistemine göre <span class="semi-bold">Ziyaretçiler</span></h5>
		</div>
		<div class="grid-body no-border">
			<div class="row-fluid">
				<div class="scroller scrollbar-dynamic" data-height="280px">

					<table class="table table-hover">
						<thead>
							<tr>
								<th>İşletim Sistemi</th>
								<th>Oturum</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($os as  $var): ?>
							<tr>
								<td><?php echo $var[0] ?></td>
								<td><?php echo $var[1] ?></td>
							</tr>
						<?php endforeach ?>
						
					</tbody>
				</table>


			</div>
		</div>
	</div>
</div>
</div>

<!-- mobil kaynaklar -->
<div class="col-md-4">
	<div class="grid simple">
		<div class="grid-title no-border">
			<h5>Mobil Kaynaklara göre <span class="semi-bold">Ziyaretçiler</span></h5>
		</div>
		<div class="grid-body no-border">
			<div class="row-fluid">
				<div class="scroller scrollbar-dynamic" data-height="280px">

					<table class="table table-hover">
						<thead>
							<tr>
								<th>Cihaz</th>
								<th>Oturum</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($mobilci as  $var): ?>
							<tr>
								<td><?php echo $var[1].' '.$var[0] ?></td>
								<td><?php echo $var[2] ?></td>
							</tr>
						<?php endforeach ?>
						
					</tbody>
				</table>


			</div>
		</div>
	</div>
</div>
</div>

<div class="col-md-8">
	<div class="grid simple">
		<div class="grid-title no-border">
			<h5>Nerden Gelmiş <span class="semi-bold">Analitiği</span></h5>
		</div>
		<div class="grid-body no-border">
			<div class="row-fluid">
				<div class="scroller scrollbar-dynamic" data-height="280px">

					<table class="table table-hover">
						<thead>
							<tr>
								<th>Url</th>
								<th>Oturum</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($keywe as  $var): ?>
							<tr>
								<td><?php echo $var[0] ?></td>
								<td><?php echo $var[1] ?></td>
							</tr>
						<?php endforeach ?>
						
					</tbody>
				</table>


			</div>
		</div>
	</div>
</div>
</div>



<div class="col-md-8">
	<div class="grid simple">
		<div class="grid-title no-border">
			<h5>İlk Ziyaret Edilen Sayfa <span class="semi-bold">Analitiği</span></h5>
		</div>
		<div class="grid-body no-border">
			<div class="row-fluid">
				<div class="scroller scrollbar-dynamic" data-height="280px">

					<table class="table table-hover">
						<thead>
							<tr>
								<th>Url</th>
								<th>Oturum</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($landingpage as  $var): ?>
							<tr>
								<td><?php echo substr($var[0],0,50) ?></td>
								<td><?php echo $var[1] ?></td>
							</tr>
						<?php endforeach ?>
						
					</tbody>
				</table>


			</div>
		</div>
	</div>
</div>
</div>