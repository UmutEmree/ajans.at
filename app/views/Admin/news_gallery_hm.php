
<div class="row">

	<div class="col-md-12">
		<div class="grid simple " style="padding-top:10px;">
			<!-- header -->
			<div class="grid-title no-border"> 
				<h3 class="content-header pull-left"><?php echo $page_label; ?> </h3>
<button type="button" class="btn btn-success pull-right btn-small" onclick=" $('#resimmodal2').modal({backdrop: 'static'});"><i class="fa fa-plus"></i> Yeni Ekle</button>
			</div>

			<!-- header end -->
			<div class="grid-body no-border">
				<div class="col-md-12">
					<div class="row">
						<?php  foreach ($resimler as $key => $resim) {$fi=$resim['news_gallery_id'];
							?>

							<div class="col-md-2 pointer " data-id="<?php echo $fi.'+'.$resim['news_gallery_image'] ?>" id="resimci<?php echo $fi ?>" style="margin-bottom:5px; cursor: pointer;"><img src="<?php echo SITE_UPLOAD_DIR ?>gallery/140x86_<?php echo $resim['news_gallery_image'] ?>" alt="<?php echo $resim['news_gallery_name']  ?>" class="img-thumbnail"></div>
							<div class="col-md-12 panel dnone" id="pn<?php echo $fi ?>" style="position:releative; clear:both; background:#f4f4f4; margin:10px auto; padding:15px;">
								<form action="<?php echo SITE_URL ?>Admin/News/galeriedit/<?php echo $resim['news_gallery_id'] ?>" method="post" class="form-horizontal row-border col-md-7 pull-left" id="galeriedit<?php echo $fi ?>" enctype="multipart/form-data">     
									<div id="sonucu<?php echo $fi ?>"></div>
									<div class="form-group"><label   class="control-label col-sm-3"></label>
										<div class="col-sm-9 dnone">
											<input type="file" name="resim" id="re<?php echo $fi ?>" onchange="resim_on_izle(this,'<?php echo $fi ?>');">
											<input type="hidden" name="oldresim" value="<?php echo $resim['news_gallery_image'] ?>"  >
										</div>
										<div class="col-sm-9">
											<button type="button" class="btn btn-success" onclick="$('#re<?php echo $fi ?>').click();">Yeni Resim Seç</button>
											<button type="button" class="btn btn-danger delete_gallery" data-id="<?php echo $fi.'+'.$resim['news_gallery_image'] ?>" >Bu resmi Sil</button>
											</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Resim için bir başlık giriniz :</label>
										<div class="col-sm-9">
											<input type="text" name="news_gallery_name" id="news_gallery_name" class="form-control" value="<?php echo $resim['news_gallery_name'] ?>" >
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-3 control-label">Resim için bir açıklama giriniz :</label>
										<div class="col-sm-9">
											<textarea   name="news_gallery_content" id="news_gallery_content" class="form-control" ><?php echo $resim['news_gallery_content'] ?></textarea>

										</div>
									</div>
								<div class="form-group">
 <button type="button" class="btn btn-info pull-right" onclick="formkaydet('<?php echo $fi ?>');">Kaydet</button>
 									</div>
								</form>
								<div class="col-md-4 pull-right" style="position:releative">
									<button type="button" onclick="$('#pn<?php echo $fi ?>').slideUp('slow');" class="btn btn-link btn-mini" style="position:absolute; right:-10px; top:-10px;"><i class="fa fa-times"></i></button>
									<img src="<?php echo SITE_UPLOAD_DIR ?>gallery/<?php echo $resim['news_gallery_image'] ?>" id="onizle<?php echo $fi ?>" alt="<?php echo $resim['news_gallery_name']  ?>" class="img-thumbnail"></div>
							</div>
							<?php  } ?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>


			</div>
		</div>
	</div>


	<!-- modal -->

	<div id="resimmodal2" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="false" >
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" id="modalkapatbig" onclick="modalkapat('resimmodal2')"  >×</button>
					<h4 class="modal-title mymodalinh4ubig" id="mySmallModalLabel"><?php echo $content['news_name'] ?></h4>
				</div>
				<div class="clearfix"></div>
				<div class="modal-body mymodalinbodisibig" >
					<div class="col-md-12">
						<div id="onbilgiupload" class="col-md-12"><b><?php echo $content['news_name'] ?></b> Haberi için galeri oluşturuyorsunuz.</div>

						<form action="<?php echo SITE_URL ?>Admin/News/galeriupload/" method="post" class="form-horizontal row-border col-md-12" id="galeriform" enctype="multipart/form-data">     

							<hr class="bir">

							<div class="form-group col-md-12 pull-left">



								<div class="col-sm-8 dnone">
									<input type="hidden" id="haberidsi" name="haberid" value="<?php echo $content['news_id'] ?>" >
									<input type="hidden" id="haberadi" name="adi" value="<?php echo $content['news_name'] ?>" >
									<input type="file" id="resimler" name="resim[]" multiple > 
								</div>
								<div class="col-md-6">
									<button type="button" class="btn btn-success btn-large" onclick="$('#resimler').click();"><i class="fa fa-picture-o" style="margin:5px"></i>Galeri Resimleri Seçiniz</button>
								</div>
								<div class="col-md-6">
									<button type="submit" class="btn btn-primary btn-large col-md-12 pull-left"  >Yüklemeye Başla</button>
								</div>
							</div>


							<div class="col-md-12">

								<div class="progress progress-striped active progress-large" style="background:#fff">
									<div data-percentage="0%" style="width: 0%;" id="bar" class="progress-bar percent progress-bar-success"></div>
								</div>

							</div>


							<div id="sonucfmupload"></div>

							<div class="bottom text-right">

							</div>

						</form>

					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				<hr>
				<div class="clearfix"></div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

