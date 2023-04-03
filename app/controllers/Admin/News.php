<?php class News extends Controller{
		public function __construct() {
			parent::__construct();

	        // Oturum Kontrolü
			Session::checkSession();
		}

		public function index(){

			header ('Location:'.SITE_URL.'Admin/News/Home/1');

		}

		public function Home(){			
			global $konumlar;
	     		//haber konumları
			$data["Haber_Konumlari"] = $konumlar; 
			//haber konumları end

			$data["js"]  = array("editor","form");	 
			$data["jsp"]  = array("ajaxform","news","confirm");		 
			$data["css"]  = array("");				
			$data["page_label"] = "Haber Yönetimi";



			$model = $this->load->admin_model("News_Model");
			$url = $this->load->helper('Url');

			$katmainci = 0;

			if (isset($_SESSION['label']) && isset($_SESSION['val'])) {
				$kosul = array('label'=>$_SESSION['label'],'val'=>$_SESSION['val']);
				$data["current_input"] = $kosul;
				if ($_SESSION['label'] == 'news_cat_id') {
					$katmainci = $_SESSION['kat_id'];
				}  



			}else{
				$kosul = array();	

				$data["current_input"]  = array('label'=>"0",'val'=>0);

			}






			$pageno = $url->get(3);
			$toplam_sonuc = $model->toplam($kosul);



			$next_page = ($pageno + 1 < ceil($toplam_sonuc/20)) ? $pageno + 1 : ceil($toplam_sonuc/20);
			$prev_page = ($pageno - 1 > 0) ? $pageno - 1 : 1;




			$data["selectfill"] = $model->selectboxfill($katmainci);
			$data['next_page'] = SITE_URL.'Admin/News/Home/'.$next_page;
			$data['prev_page'] = SITE_URL.'Admin/News/Home/'.$prev_page;
			$data['pageno'] = $pageno;
			$pag = $model->pagsi(SITE_URL.'Admin/News/Home/[page]',$pageno,$kosul);
			$data['pag'] = $pag;
			$data["toplam_sonuc"] = $toplam_sonuc;
			$data["content"]= $model->sayfala($kosul,$pageno);	
			$this->load->admin_view("news",$data);

		}



		public function Ara()
		{

			$field = $_POST['label'];
			$value = $_POST['val'];

			$_SESSION["label"] = $field;
			$_SESSION["val"]  = $value;

			if( $field == 'news_cat_id'){

				$_SESSION["kat_id"] = $value;

			}

			echo SITE_URL.'Admin/News/Home/1';

		}

		public function ekkategori()
		{

			$olmayan_id = $_POST['id'];
			$model = $this->load->admin_model("News_Model");
			$ekkategoriler = $model->ekkategori($olmayan_id);
			$htmlsi = '<label class="col-sm-3 control-label">Ek Kategori Seçiniz:<br><small>Zorunlu Değildir.</small></label><div class="col-sm-9">';
			foreach($ekkategoriler as $ekkat){   		 
				$htmlsi .=' 
				<div class="row-fluid col-md-3 pull-left">
				<div class="checkbox check-primary checkbox-circle" >
				<input id="checkbox'.$ekkat['Cat_id'].'" name="ekkat[]" type="checkbox" value="'.$ekkat['Cat_id'].'"  >
				<label for="checkbox'.$ekkat['Cat_id'].'">'.$ekkat['Cat_Name'].'</label>
				</div>
				</div>';
			}

			$htmlsi .='</div>';
			echo $htmlsi;


		}

			public function ekkategoriup()
		{
			
			$olmayan_id = $_POST['id'];
			$newsid = $_POST['curid'];
			$model = $this->load->admin_model("News_Model");
			$ekkategoriler = $model->ekkategori($olmayan_id);
			$htmlsi = '<label class="col-sm-3 control-label">Ek Kategori Seçiniz:<br><small>Zorunlu Değildir.</small></label><div class="col-sm-9">';
			foreach($ekkategoriler as $ekkat){ 
			$cheks = $model->ekcheck(array('category_id'=>$ekkat['Cat_id'],'new_id'=>$newsid)); 
			if ($cheks>0) {
			 		 	$checkthtml = "checked";
			 		 } else{ $checkthtml = "";}		 
				$htmlsi .=' 
				<div class="row-fluid col-md-3 pull-left">
				<div class="checkbox check-primary checkbox-circle" >
				<input id="checkbox'.$ekkat['Cat_id'].'" name="ekkat[]" type="checkbox" '.$checkthtml.' value="'.$ekkat['Cat_id'].'"  >
				<label for="checkbox'.$ekkat['Cat_id'].'">'.$ekkat['Cat_Name'].'</label>
				</div>
				</div>';
			}

			$htmlsi .='</div>';
			echo $htmlsi;


		}
		
		
		
		
		public function Insert(){
				global $konumlar;
	     		//haber konumları
			$data["Haber_Konumlari"] = $konumlar; 

		 
			

			$data["js"]  = array("editor","form");
			$data["jsp"]  = array("ajaxform","news","confirm");	
			$data["css"]  = array("");
			$data["alert"]  = "";				
			$data["page_label"] = "Haber Ekle";
			$model = $this->load->admin_model("News_Model");
			$data["selectfill"] = $model->selectboxfill();
			$this->load->admin_view("news_insert",$data);

		}
		
		
		
		public function Insert_Run(){

			global $konumlar;
	     		//haber konumları
			$data["Haber_Konumlari"] = $konumlar; 

			global $boyutlar;
			global $mansetboyutlar;

			

			$data["js"]  = array("editor","form");
			$data["jsp"]  = array("news");
			$data["css"]  = array("");
			$data["alert"]  = "";				
			$data["page_label"] = "Haber Ekle";
			
			$model = $this->load->admin_model("News_Model");
			$data["selectfill"] = $model->selectboxfill();
			$form = $this->load->helper("Form");
			$alert = $this->load->helper("General");
			$this->load->inc("Upload");


			$form ->post("news_name")->isEmpty("Haber Başlığı Giriniz");
			$form ->post("news_cat_id")->isEmpty("Haber kategorisi Seçmediniz");
			$form ->post("news_title")->isEmpty("Page Title Giriniz");
			$form ->post("news_desc")->isEmpty("Meta Açıklamalar Giriniz");
			$form ->post("news_keyw")->isEmpty("Anahtar Kelimeler Giriniz");
			$form ->post("news_jenerik")->isEmpty("Haber Jeneriği Belirleyiniz");
			$form ->post("news_tags");

			if($form->postresim("resim1") != false){
	        ///resim yukleme işlemi 
				$yukle = new Upload($_FILES["resim1"]);
				$resimsi = $alert->seola($form->values["news_name"])."_".rand(0,99);
				$haber_resmi = $yukle->yukle_th($resimsi,"public/files/news",true,$boyutlar);

	      // resim yukleme işlemi end
			}else{
				$haber_resmi = "";
			}

			if($form->postresim("resim2") != false){
	        ///resim yukleme işlemi 

				$yukle2 = new Upload($_FILES["resim2"]);
				$resimsi2 = $alert->seola($form->values["news_name"])."_".rand(0,99);
				$manset_resmi = $yukle2->yukle_th($resimsi2,"public/files/news",true, $mansetboyutlar);

	      // resim yukleme işlemi end
			}else{
				$manset_resmi = "";
			}

			$form ->post("news_durum");			 
			$form ->post("news_content")->isEmpty("news_content");
			$form ->post("news_video");

			$haber_adi = $alert->seola($form->values["news_name"]);
			$seo_name_varmi = $model->seoname($haber_adi);

			if ($seo_name_varmi == 0) {
				$seo_namesi = $haber_adi;
			} else {
				$seo_namesi = $haber_adi."_".rand(0,99);
			}


			$data_array =  array(

				"news_name"      => $form->values["news_name"],
				"news_cat_id"      => $form->values["news_cat_id"],
				"news_title"      => $form->values["news_title"],
				"news_desc"      => $form->values["news_desc"],
				"news_keyw"      => $form->values["news_keyw"],
				"news_jenerik"      => $form->values["news_jenerik"],
				"news_tags"      => $form->values["news_tags"],

				"news_image_main"      => $haber_resmi,


				"news_image_manset"      => $manset_resmi,

				"news_seo_name"      => $seo_namesi,
				"news_durum"      => $form->values["news_durum"],

				"news_ziyaret"      => 0,
				"news_content"      => $form->values["news_content"],
				"news_video"      => $form->values["news_video"],

				);

			$ekkategoriler = $_POST['ekkat'];

			foreach ($data["Haber_Konumlari"] as $key => $value) {

				if (isset($_POST[$key])) {
					$data_array[$key] = 1;
				} else {
					$data_array[$key] = 0;
				}

			}

			

			
			if($form->submit()){	

				$last_id = $model->insert($data_array);

				if($last_id != false){ 

					foreach($ekkategoriler as $katidleri){

						$ekler = $model->ekkatinsert(array('category_id'=>$katidleri,'new_id'=>$last_id));
						
					}
					$model->contentcount($form->values["news_cat_id"]);
					$data["alert"] = $alert->alert("Haber Ekleme İşlemi Başarıyla  Tamamlandı.","success");	  
					$this->load->admin_view("news_insert",$data); 		  

				}else{

					$data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
					$this->load->admin_view("news_insert",$data);
				}

			}else{
				
				$hata = $form->errors;
				$data["alert"] = $alert->alerts($hata,"danger");	  
				$this->load->admin_view("news_insert",$data); 
				
			}

		}
		
		
		
		public function Update(){
			
			$id = $this->load->helper("Url")->get_int(3); 
			$model = $this->load->admin_model("News_Model");
			$data["content"] = $model->Guncelle_Form($id);
			$data["selectfill"] = $model->selectboxfill($data["content"]["news_cat_id"]);
			
			$data["js"]  = array("editor","form");
			$data["jsp"]  = array("ajaxform","news","confirm");	
			$data["css"]  = array("");
			$data["alert"]  = "";
			$data["id"]  = $id;				
			$data["page_label"] = "Haber Güncelle";

			$this->load->admin_view("news_update",$data);

		}
		
		
		
		public function Update_Run(){

			$model = $this->load->admin_model("News_Model");		
			$id = $this->load->helper("Url")->get_int(3); 
			$data["content"] = $model->Guncelle_Form($id);
			global $boyutlar;
			global $mansetboyutlar;

			
			$data["js"]  = array("news","form");
			$data["css"]  = array("");
			$data["jsp"]  = array("ajaxform","news","confirm");	
			$data["alert"]  = "";
			$data["id"]  = $id;				
			$data["page_label"] = "News Güncelle";

			$form = $this->load->helper("Form");
			$alert = $this->load->helper("General");
			$this->load->inc("Upload");

			$form ->post("news_name")->isEmpty("haber Başlığı Giriniz");
			$form ->post("news_cat_id")->isEmpty("Kategori Seçiniz");
			$form ->post("news_title")->isEmpty("Page title Zorunludur.");
			$form ->post("news_desc")->isEmpty("Meta Açıklamaları girmeyi unuttunuz");
			$form ->post("news_keyw")->isEmpty("Anahtar kelimeler boş bırakılmamalı");
			$form ->post("news_jenerik");
			$form ->post("news_tags");

			if($form->postresim("resim1") != false){
	        ///resim yukleme işlemi 
				$oldresim = $_POST['oldresim1'];
				$this->ResimSil($oldresim,'h');
				$yukle = new Upload($_FILES["resim1"]);
				$resimsi = $alert->seola($form->values["news_name"])."_".rand(0,99);
				$haber_resmi = $yukle->yukle_th($resimsi,"public/files/news",true,$boyutlar);

	      // resim yukleme işlemi end
			}else{
				$haber_resmi = $_POST['oldresim1'];
			}

			if($form->postresim("resim2") != false){
	        ///resim yukleme işlemi 
				$oldresim2 = $_POST['oldresim2'];
				$this->ResimSil($oldresim2,'m');
				$yukle2 = new Upload($_FILES["resim2"]);
				$resimsi2 = $alert->seola($form->values["news_name"])."_".rand(0,99);
				$manset_resmi = $yukle2->yukle_th($resimsi2,"public/files/news",true, $mansetboyutlar);

	      // resim yukleme işlemi end
			}else{
				$manset_resmi = $_POST['oldresim2'];
			}


			$form ->post("news_content")->isEmpty("news_content");
			$form ->post("news_video");




			$data_array =  array(

				"news_name"      => $form->values["news_name"],
				"news_cat_id"      => $form->values["news_cat_id"],
				"news_title"      => $form->values["news_title"],
				"news_desc"      => $form->values["news_desc"],
				"news_keyw"      => $form->values["news_keyw"],
				"news_jenerik"      => $form->values["news_jenerik"],
				"news_tags"      => $form->values["news_tags"],
				"news_image_main"      => $haber_resmi,
				"news_image_manset"      => $manset_resmi, 
				"news_content"      => $form->values["news_content"],
				"news_video"      => $form->values["news_video"],
				"news_update_tarih" => date('Y-m-d H:i:s')
				);

			
			$ekkategoriler = $_POST['ekkat'];
			
			if($form->submit()){	

				$last_id = $model->update($data_array,$id);
				$model->eksil($id);

				if($last_id){ 


					foreach($ekkategoriler as $katidleri){

						$ekler = $model->ekkatinsert(array('category_id'=>$katidleri,'new_id'=>$id));
						 
					}
//542 719 18 44
					//cemkrt@gmail.com
					$alert->redirect(SITE_URL."Admin/News/Update/".$id);
					$model->contentcount($form->values["news_cat_id"]);

				}else{

					$data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
					$this->load->admin_view("news_update",$data);
				}

			}else{
				
				$hata = $form->errors;
				$data["alert"] = $alert->alerts($hata,"danger");	  
				$this->load->admin_view("news_update",$data);
				
			}

		}
		
		
		//delete
		public function Delete(){
			$url = $this->load->helper("Form")->post("id")->isEmpty();
			$model = $this->load->admin_model("News_Model");

			
			$sil = $model->delete($url->values["id"]);
			
			if($sil){
				echo "1";	
			}else{
				echo "0";
			}
			
			
		}	 


		public function ResimSil($resimad,$manset = 'h',$mansetad = '')
		{ 

			global $boyutlar;
			global $mansetboyutlar;


			$yol = 'public/files/news/';
		 	//sadece haber ana resmi ve boyutları
			if($manset == 'h'){
				@unlink($yol.$resimad);
				foreach ($boyutlar as  $value) {
					@unlink($yol.$value.'_'.$resimad);
				}
				return true;

			}
			// haber resmi ve manset resmi beraber
			elseif ($manset == 'hm') {
				@unlink($yol.$resimad);
				foreach ($boyutlar as  $value) {
					@unlink($yol.$value.'_'.$resimad);
				}
				@unlink($yol.$mansetad);
				foreach ($mansetboyutlar as  $mval) {
					@unlink($yol.$mval.'_'.$mansetad);
				}
				return true;

			}
			//sadece manset resmi
			elseif ($manset == 'm') {

				@unlink($yol.$resimad);
				foreach ($mansetboyutlar as  $mval) {
					@unlink($yol.$mval.'_'.$resimad);
				}
				return true;	

			}
			else{
				return false;

			}

		} 



// hızlı guncelleme formu 
		public function q_update_form(){
			
			$id = $_POST['id']; 
			$model = $this->load->admin_model("News_Model");
			$content = $model->Guncelle_Form($id);
			$selectfill = $model->selectboxfill($content["news_cat_id"]);
			

			echo '
			<div class="col-md-12">


			<form action="'.SITE_URL.'Admin/News/quick_Update_Run/'.$id.'" method="post" class="form-horizontal row-border col-md-12" id="hizliguncelleform" enctype="multipart/form-data">
			<div id="sonucfm"></div>
			<div class="form-group">

			<label class="col-sm-3 control-label">Başlık:</label>

			<div class="col-sm-9">

			<input type="text" name="news_name"  value="'.$content['news_name'].'" class="form-control zor">

			</div>

			</div>

			<div class="form-group">

			<label class="col-sm-3 control-label">Kategori:</label>

			<div class="col-sm-9">

			<select name="news_cat_id"  class="form-control zor">

			'.$selectfill.'

			</select>

			</div>

			</div> 



			<div class="form-group">

			<label class="col-sm-3 control-label">Haber Jeneriği:</label>

			<div class="col-sm-9">

			<textarea  name="news_jenerik" rows="4"   class="form-control zor">'.$content['news_jenerik'].'</textarea>
			</div>

			</div>

			<hr class="bir">

			<div class="form-group col-md-6 pull-left">

			<label class="col-sm-3 control-label">Ana resim:</label>

			<div class="col-sm-9">

			<input type="file" name="resim1" onchange="resim_on_izle(this,1)" >
			<input type="hidden" name="oldresim1" value="'.$content['news_image_main'].'" >

			<img id="onizle1" src="'.SITE_UPLOAD_DIR.'news/'.$content['news_image_main'].'" width="100" style="display:block;" />

			</div>

			</div>




			<div class="form-group  col-md-6 pull-left">

			<label class="col-sm-3 control-label">Manşet Resmi:</label>

			<div class="col-sm-9">

			<input type="file" name="resim2" onchange="resim_on_izle(this,2)" >
			<input type="hidden" name="oldresim2" value="'.$content['news_image_manset'].'"  >

			<img id="onizle2" src="'.SITE_UPLOAD_DIR.'news/'.$content['news_image_manset'].'" width="100" style="display:block;" />

			</div>

			</div>


			<hr class="bir">





			<div class="form-group col-sm-12">

			<label class="col-sm-12 control-label pull-left text-left"><h2>Haber Detayı</h2> </label>

			<div class="clearfix"></div>

			<div class="col-sm-12 text-right">

			<textarea name="news_content" rows="4" class="form-control editor col-md-12"  >'.$content['news_content'].'</textarea>


			</div>

			</div>






			<div class="bottom text-right">
			<button type="button" data-id="news" class="btn btn-primary   col-md-4 pull-right" onclick="guncelle(\''.$content['news_id'].'\')">Güncelle</button>

			</div>

			</form>

			</div>
			<div class="clearfix"></div>


			<script src="'.SITE_PUBLIC_ADMIN.'assets/plugins/tinymce/tinymce.min.js"></script>
			<script src="'.SITE_PUBLIC_ADMIN.'assets/plugins/tinymce/setting.js"></script>
			';

		}



		public function quick_Update_Run(){

			

			$model = $this->load->admin_model("News_Model");		
			$id = $this->load->helper("Url")->get_int(3); 

			global $boyutlar;
			global $mansetboyutlar;

			


			$form = $this->load->helper("Form");
			$alert = $this->load->helper("General");
			$this->load->inc("Upload");

			$form ->post("news_name")->isEmpty("haber Başlığı Giriniz");
			$form ->post("news_cat_id")->isEmpty("Kategori Seçiniz");
			$form ->post("news_jenerik");


			if($form->postresim("resim1") != false){
	        ///resim yukleme işlemi 
				$oldresim = $_POST['oldresim1'];
				$this->ResimSil($oldresim,'h');
				$yukle = new Upload($_FILES["resim1"]);
				$resimsi = $alert->seola($form->values["news_name"])."_".rand(0,99);
				$haber_resmi = $yukle->yukle_th($resimsi,"public/files/news",true,$boyutlar);

	      // resim yukleme işlemi end
			}else{
				$haber_resmi = $_POST['oldresim1'];
			}

			if($form->postresim("resim2") != false){
	        ///resim yukleme işlemi 
				$oldresim2 = $_POST['oldresim2'];
				$this->ResimSil($oldresim2,'m');
				$yukle2 = new Upload($_FILES["resim2"]);
				$resimsi2 = $alert->seola($form->values["news_name"])."_".rand(0,99);
				$manset_resmi = $yukle2->yukle_th($resimsi2,"public/files/news",true, $mansetboyutlar);

	      // resim yukleme işlemi end
			}else{
				$manset_resmi = $_POST['oldresim2'];
			}


			$form ->post("news_content")->isEmpty("news_content");





			$data_array =  array(

				"news_name"      => $form->values["news_name"],
				"news_cat_id"      => $form->values["news_cat_id"],

				"news_jenerik"      => $form->values["news_jenerik"],

				"news_image_main"      => $haber_resmi,
				"news_image_manset"      => $manset_resmi, 
				"news_content"      => $form->values["news_content"],
				"news_update_tarih" => date('Y-m-d H:i:s')
				);

			

			
			if($form->submit()){	

				$last_id = $model->update($data_array,$id);

				if($last_id){ 

					echo $alert->alert("Güncelleme Başarıyla Tamamlandı.","success");	
						$model->contentcount($form->values["news_cat_id"]);

				}else{

					echo $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  

				}

			}else{
				
				$hata = $form->errors;
				echo $alert->alerts($hata,"danger");	  

				
			}

		}
		
		public function list_update()
		{
			$model = $this->load->admin_model("News_Model");		
			$id = $this->load->helper("Url")->get_int(3); 
			$label = $_POST['label'];
			$val = $_POST['val'];

			$data_array = array($label =>$val  );

			$last_id = $model->update($data_array,$id);

			if ($last_id) {
				echo 'Güncelleme İşlemi Başarılı';
			} else {
				echo 'Bir hata oldu Yeniden deneyiniz';
			}
			
		}


		//coklu dosya upload



		public function galeriupload()
		{
			if (!isset($_POST['haberid'])) {
				die('Hatalı istek');
			}
			global $galeriboyutlar;
			$randid = rand(0,999);
			$id = $_POST['haberid'];
			$adi = $_POST['adi'];
			$helper = $this->load->helper("General");
			$resimler_adi = $helper->seola($adi);
			$model = $this->load->admin_model("News_Model");
			$galerili = $model->update(array('news_gallery'=>1),$id);
			$this->load->inc("Upload");

			$resimler = array();

			//sart each
			foreach ($_FILES['resim'] as $k => $l) {
				foreach ($l as $i => $v) {
					if (!array_key_exists($i, $resimler))
						$resimler[$i] = array();
					$resimler[$i][$k] = $v;
				}
			}

			//end each

			//start each
			$pli = 1;
			foreach ($resimler as $resim){				  

				$yukle = new Upload($resim);
				$resimsi = $resimler_adi."_".$id."_".$pli.'_'.$randid;
				$haber_resmi = $yukle->yukle_th($resimsi,"public/files/gallery",true,$galeriboyutlar);
				$resim_dizi[] = $haber_resmi;
				$pli++;

				$data = array(
					'news_gallery_main_id'  => $id,
					'news_gallery_name'		=> $adi,
					'news_gallery_image'	=> $haber_resmi,
					'news_gallery_content'	=> $adi
					);

				
				$model->galeriekle($data);

			}
			//end each

			foreach ($resim_dizi as   $mapf) {
				echo '<img src="'.SITE_UPLOAD_DIR.'gallery/140x86_'.$mapf.'" class="img-thumbnail pull-left" alt="'.$adi.'">';
			}

			echo '<div class="clearfix"></div><hr><a href="'.SITE_URL.'Admin/News/Gallery/'.$id.'" class="btn btn-primary col-md-6"><i class="fa fa-link"></i> Tümünü Gör</a>';

		}

		//gallery page
		public function Gallery(){
			
			$id = $this->load->helper("Url")->get_int(3); 
			$model = $this->load->admin_model("News_Model");
			$data["content"] = $model->Guncelle_Form($id);
			$data["resimler"] = $model->Haber_Galerisi($id);
			
			$data["js"]  = array("form");
			$data["jsp"]  = array("news",'ajaxform','confirm');
			$data["css"]  = array("");
			$data["alert"]  = "";
			$data["id"]  = $id;				
			$data["page_label"] = "Haber Galerisi";

			$this->load->admin_view("news_gallery",$data);

		}

		public function galeriedit()
		{ global $galeriboyutlar;
			$id = $this->load->helper("Url")->get_int(3); 
			$model = $this->load->admin_model("News_Model");
			$resimadi = explode('.',$_POST['oldresim']);		 
			$this->load->inc("Upload");
			$oldresim = $_POST['oldresim'];

			if(isset($_FILES['resim']['tmp_name']) && !empty($_FILES['resim']['tmp_name'])){
				 @unlink("public/files/gallery/".$oldresim);
				 @unlink("public/files/gallery/140x86_".$oldresim);
				 $yukle = new Upload($_FILES['resim']);				 
				$haber_resmi = $yukle->yukle_th($resimadi[0],"public/files/gallery",true,$galeriboyutlar);
			 		

			}else
			{
				$haber_resmi= $oldresim;
			}


					$data = array(
					
					'news_gallery_name'		=> $_POST['news_gallery_name'],
					'news_gallery_image'	=> $haber_resmi,
					'news_gallery_content'	=> $_POST['news_gallery_content']
					);

				
				$gun = $model->galeriguncelle($data,$id);

				if ($gun) {
					echo '<div class="alert alert-info">Güncelleme İşlemi Başarılı</div>';
				} else {
					echo '<div class="alert alert-danger">Bir hata oldu İşlem Başarısız</div>';
				}
				

		}
		public function GalleryDelete()
		{
			$resimi = $_POST['resim'];
			$idsi = $_POST['id'];
            @unlink("public/files/gallery/".$resimi);
			@unlink("public/files/gallery/140x86_".$resimi);
			$model = $this->load->admin_model("News_Model");
			

			$sil = $model->gallerydelete($idsi);
			
			if($sil){
				echo "1";	
			}else{
				echo "0";
			}



		}



		public function Resimset(){
		
		$model = $this->load->admin_model("News_Model");
		$helper = $this->load->helper("General");
		$tumresimler = $helper->dizin_oku('public/files/news','jpg');

	 
		foreach ($tumresimler as $key => $value) {

			$varmi = $model->resimsor('news_image_main',$value);

			if ($varmi == 0) {
				$this->ResimSil($value,'h');
	 
			}

			$varmi2 = $model->resimsor('news_image_manset',$value);

			if ($varmi2 == 0) {
				$this->ResimSil($value,'m');
								 

			}

		}
  

	}


//end




	}