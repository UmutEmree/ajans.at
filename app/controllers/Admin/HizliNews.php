	<?php class HizliNews extends Controller{
		public function __construct() {
			parent::__construct();

	        // Oturum Kontrolü
			Session::checkSession();
		}

		public function index(){

			header ('Location:'.SITE_URL.'Admin/News/Home/1');

		}

		 
		
		public function Video(){
				global $konumlar;
	     		//haber konumları
			$data["Haber_Konumlari"] = $konumlar; 

		 
			

			$data["js"]  = array("editor","form");
			$data["jsp"]  = array("ajaxform","news2","confirm");	
			$data["css"]  = array("");
			$data["alert"]  = "";				
			$data["page_label"] = "Video Haber Ekle";
			$model = $this->load->admin_model("News_Model");
			$data["selectfill"] = $model->selectboxfill();
			$this->load->admin_view("news_insert_video",$data);

		}
		
		
		
		public function Videorun(){

			global $konumlar;
	     		//haber konumları
			$data["Haber_Konumlari"] = $konumlar; 

			global $boyutlar;
			global $mansetboyutlar;

			 
			
			$model = $this->load->admin_model("News_Model");
			$modelvideo = $this->load->admin_model("Video_Model");
		 
			$form = $this->load->helper("Form");
			$alert = $this->load->helper("General");

			$this->load->inc("Upload");


			$form ->post("news_name")->isEmpty("Haber Başlığı Giriniz");
			$form ->post("news_cat_id")->isEmpty("Haber kategorisi Seçmediniz");
			$form ->post("news_title")->isEmpty("Page Title Giriniz");
			$form ->post("news_desc")->isEmpty("Meta Açıklamalar Giriniz");
			$form ->post("news_keyw")->isEmpty("Anahtar Kelimeler Giriniz");
			$form ->post("news_jenerik")->isEmpty("Haber Jeneriği Belirleyiniz");
			 

			if($form->postresim("resim1") != false){
	        ///resim yukleme işlemi 
				$yukle = new Upload($_FILES["resim1"]);
				$resimsi = $alert->seola($form->values["news_name"])."_".rand(0,99);
				$haber_resmi = $yukle->yukle_th($resimsi,"public/files/news",true,$boyutlar);
				$resimsi2 = $alert->seola($form->values["news_name"])."_".rand(0,99);
				$manset_resmi = $yukle->yukle_th($resimsi2,"public/files/news",true, $mansetboyutlar);

	      // resim yukleme işlemi end
			}else{
				$haber_resmi = "";
				$manset_resmi ="";
			}

			if($form->postresim("dosya") != false){
	        ///resim yukleme işlemi 

				$yukle2 = new Upload($_FILES["resim2"]);
				$videofile = $alert->seola($form->values["news_name"])."_".rand(0,99);
				$videofile_name = $yukle->yukle($videofile,"public/files/video","video/*");

	      // resim yukleme işlemi end
			}else{
				$videofile_name = 0;
			}
 		 
			$form ->post("news_content")->isEmpty("news_content");
			$form ->post("news_video");

			$haber_adi = $alert->seola($form->values["news_name"]);
			$seo_name_varmi = $model->seoname($haber_adi);

			if ($seo_name_varmi == 0) {
				$seo_namesi = $haber_adi;
			} else {
				$seo_namesi = $haber_adi."_".rand(0,99);
			}

			if (isset($_POST['news_video']) && !empty($_POST['news_video']) && preg_match("/embed/i", $_POST['news_video']) ) {
				$kod = explode('embed/', $_POST['news_video']);
			$videokod = substr($kod[1],0,11);
			} else {
				$videokod = '';
			}
			


			$data_array =  array(

				"news_name"      => $form->values["news_name"],
				"news_cat_id"      => $form->values["news_cat_id"],
				"news_title"      => $form->values["news_title"],
				"news_desc"      => $form->values["news_desc"],
				"news_keyw"      => $form->values["news_keyw"],
				"news_jenerik"      => $form->values["news_jenerik"],
				 

				"news_image_main"      => $haber_resmi,


				"news_image_manset"      => $manset_resmi,

				"news_seo_name"      => $seo_namesi,
			 

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
				//ek kategorilere ekleme
					foreach($ekkategoriler as $katidleri){

						$ekler = $model->ekkatinsert(array('category_id'=>$katidleri,'new_id'=>$last_id));
						
					}
					$model->contentcount($form->values["news_cat_id"]);

			 // videolara ekleme
					$data_array_video = array(
											'video_name'=>$form->values["news_name"],
											'video_desc'=>$form->values["news_desc"],
											'video_tags'=>$form->values["news_name"],
											'video_news_id'=>$last_id,
											'video_file' =>$videofile_name,
											'video_kod'=> $videokod
											);
					$last_video_id = $modelvideo->insert($data_array_video);
					  
					  //youtube a ekleme
					 if ($videofile_name != 0) {
					  
					  	$vidar = array(
					'file' => "public/files/video/".$videofile_name, 
					'title' =>$form->values["news_name"],
					'desc' =>$form->values["news_jenerik"],
					'tags'=> array($form->values["news_name"]),
					'lastid' =>$last_video_id,
					'kod' =>$videokod,
					'news_id' => $last_id
									);
					
					
					$_SESSION['video_info'] = $vidar ;

					echo "<script>$(document).ready(function(){window.location.href = \"".SITE_URL."Admin/Video/Auth\";});</script>";

					 		  }	

					echo   $alert->alert("Ekleme Başarılı.","success");	  

				}else{

					echo   $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
				 
				}

			}else{
				
				$hata = $form->errors;
				echo $alert->alerts($hata,"danger");	  
				 
				
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
				echo '<img src="'.SITE_UPLOAD_DIR.'gallery/148x97_'.$mapf.'" class="img-thumbnail pull-left" alt="'.$adi.'">';
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

		 
 
//end




	}