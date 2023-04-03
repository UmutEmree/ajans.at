				<?php

				class Dbtablo extends Controller{
					public function __construct() {
						parent::__construct();

				        // Oturum Kontrolü
						Session::checkSession();
					}


					


					public function index(){
						
						$alert = $this->load->helper('General');
						$data["js"]  = array("form");
						$data["jsp"][]  = "dbtablo";
						$uyari  = array(
							'Tüm Harfler küçük olmalı',
							'id ve insert date otomatik olarak eklenecektir. onları sayınıza dahil etmeyiniz.',
							'Ad - Başlık - vb gibi satırlar için varchar 255 Seçilmelidir. <b>"name"</b> geçmesi önerilir.',
							'Resim alanı için  varchar 321 Satır adında <b>"image"</b> geçmesi zorunludur.',
							'Selectbox için bigint seçilmelidir. Mesela Kategori Seçimi gibi durumlarda.',
							'Zenginleştirilmiş Text Editör için türü <b>"text"</b> yapmalısınız',
							'Meta Desc ve Keywords alanları için <b>"desc ve keyw" </b> ibareleri geçmelidir.',
							'Page Title için <b>"varchar(260)"</b> Desc için <b>"varchar(500)"</b> Keywords için <b>"varchar(600)"</b> Seçilmelidir.',
							'Satır adında <b>"content"</b> ibaresi geçerse o satır text olarak zenginleştirilmiş metin yapısında form oluşturulur.'

							);
						$data["alert"] = $alert->alerts($uyari,"info");

						$data["css"]  = array("form","table");				
						$data["page_label"] = "DB Tablo Yönetimi";

						$this->load->admin_view("dbtablo",$data);
					}


					public function pagereset($alertim){
						
						$alert = $this->load->helper('General');
						$data["js"]  = array("form");
						$data["jsp"][]  = "dbtablo";
						$uyari  = $alertim;
						$data["alert"] = $alert->alert($uyari,"info");

						$data["css"]  = array("form","table");				
						$data["page_label"] = "DB Tablo Yönetimi";

						$this->load->admin_view("dbtablo",$data);
					}



					public function Yapi(){

						$model = $this->load->admin_model("Dbtablo_Model");
						$tablolar_dizi = $model->listtablo();



						$ad = $_POST['ad'];
						$adet = trim($_POST['adet']);


						$ad = str_replace(' ', '', $ad);
						$ad = trim($ad);
						$ad = strtolower($ad);
						if(in_array($ad, $tablolar_dizi)){

							echo "<h2><b>".$ad."</b> isimli bir tablo zaten var</h2>";
							die();

						}

						$formelemanlari = '<script>


						$(\'.kaldir\').click(function() {

							var isi = $(this).data(\'id\');
							var contsu = $("#rowsu").val();
							$("#rowsu").val(contsu-1);
							$(\'#line\'+isi).html(\'\');



						});
				</script> <div class="form-group col-md-12" id="line0">

				<div class="col-sm-3">
				<input type="text" name="field[0]" readonly class="form-control zor" value="'.$ad.'_id" >
				</div>

				<div class="col-sm-3">
				<select name="type[0]" class="form-control zor" readonly>

				<option value="int(11)">int(11) ID Zorunlu</option>

				</select>
				</div>

				<div class="col-sm-3">
				<label class="radio-inline">
				<input type="radio" disabled name="bosmu[0]" id="bosmu0_0" value="0"> Boş
				</label>
				<label class="radio-inline">
				<input type="radio" name="bosmu[0]" id="bosmu0_1" value="1" checked> Boş Olamaz
				</label>
				</div>




				</div>';



				for ($i=1; $i <= $adet ; $i++) { 

					$val_deault = '_';
					$selectedsi = "";
					if ($i == 1) {
						$val_deault = '_name';
						$selectedsi = "selected";
					}


					$formelemanlari = $formelemanlari.' <div class="form-group col-md-12" id="line'.$i.'">

					<div class="col-sm-3">
					<input type="text" name="field['.$i.']" class="form-control zor" value="'.$ad.$val_deault.'" >
					</div>

					<div class="col-sm-3">
					<select name="type['.$i.']" class="form-control zor">
					<option value="-1">Tip Seçiniz</option>
					<option value="bigint(11)">bigint(11) Selectbox için</option>
					<option value="varchar(255)" '.$selectedsi .'>varchar(255) Başlık - Ad vb.</option>
					<option value="varchar(260)">varchar(260) Page Title.</option>
					<option value="varchar(500)">varchar(500) Meta Desc.</option>
					<option value="varchar(600)">varchar(600) Meta Keyw.</option>
					<option value="text">text acıklama content editor.</option>
					<option value="varchar(321)">varchar(321) Resim.</option>
					<option value="varchar(1000)">varchar(1000) Diğer.</option>
					</select>
					</div>

					<div class="col-sm-3">
					<label class="radio-inline">
					<input type="radio" name="bosmu['.$i.']" id="bosmu'.$i.'_0" value="0"> Boş
					</label>
					<label class="radio-inline">
					<input type="radio" name="bosmu['.$i.']" id="bosmu'.$i.'_1" value="1" checked> Boş Olamaz
					</label>
					</div>

					<div class="col-sm-3">
					<button class="btn btn-info btn-sm kaldir" type="button" data-id="'.$i.'">Sil</button>
					</div>



					</div>';


				}

				$p = $i;

				$formelemanlari = $formelemanlari.'<div class="form-group col-md-12" id="line'.$p.'">

				<div class="col-sm-3">
				<input type="text" name="field['.$p.']" readonly class="form-control zor" value="'.$ad.'_insert_tarih" >
				</div>

				<div class="col-sm-3">
				<select name="type['.$p.']" class="form-control zor" readonly>

				<option value="timestamp">timestamp Tarih Zorunlu</option>

				</select>
				</div>

				<div class="col-sm-3">
				<label class="radio-inline">
				<input type="radio" disabled name="bosmu['.$p.']" id="bosmu0_0" value="'.$p.'"> Boş
				</label>
				<label class="radio-inline">
				<input type="radio" name="bosmu['.$p.']" id="bosmu0_1" value="1" checked> Boş Olamaz
				</label>
				</div>




				</div>';

				echo $formelemanlari;


				}





				public function YapiRun(){

					$ad = $_POST['tablo_name'];
					$adet = trim($_POST['rowsu']);


					$ad = str_replace(' ', '', $ad);
					$ad = trim($ad);
					$ad = strtolower($ad);


					$yapisi =	"CREATE TABLE IF NOT EXISTS `".$ad."` (`".$ad."_id` int(11) NOT NULL,";
						for ($i=1; $i <=$adet; $i++) { 
							$adi = $_POST['field'][$i];
							$tip = $_POST['type'][$i];
							if ($_POST['bosmu'][$i] == 1) {
								$durum = "NOT NULL";
							}else {

								$durum = "";

							}

							$yapisi =$yapisi."`".$adi."` ".$tip." COLLATE utf8_turkish_ci ".$durum.","; 
						}


						$yapisi= $yapisi."`".$ad."_insert_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
						) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;";

				$yapisi= $yapisi."ALTER TABLE `".$ad."`
				MODIFY `".$ad."_id` int(11) NOT NULL AUTO_INCREMENT;";

				$yapisi .= "ALTER TABLE ".$ad."
							ADD PRIMARY KEY (".$ad."_id)";

				$model = $this->load->admin_model("Dbtablo_Model");

				$oldumu = $model->yaptaplo($yapisi);

				if($oldumu == false)

				{ 

					$son = "Bu kod Çalıştırılamadı.<br><hr><pre>".$yapisi."</pre>";

				} 
				else{

					$son = "Başarılı.<br><hr><pre>".$yapisi."</pre>";

				}  


				self::pagereset($son);




				}












				}

