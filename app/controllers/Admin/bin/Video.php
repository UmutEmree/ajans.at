<?php class Video extends Controller{
	public function __construct() {
		parent::__construct();

        // Oturum Kontrolü
		Session::checkSession();
	}



	public function index(){
		

		$data["js"]  = array("table");
		$data["js"][]  = "editor";
		$data["jsp"]  = array("video");
		$data["jsp"][]  = "confirm";
		$data["css"]  = array("table");				
		$data["page_label"] = "Video Yönetimi";

		$model = $this->load->admin_model("Video_Model");

		$data["content"]= $model->listele();	
		$this->load->admin_view("video",$data);

	}
	
	
	
	
	public function Insert(){
		$id = $this->load->helper("Url")->get_int(3); 
		$model = $this->load->admin_model("News_Model");

		$data['haber'] = $model->Guncelle_Form($id);
		
		
		$data["js"][]  = "editor";
		$data["jsp"]  = array("video");
		$data["css"]  = array("");
		$data["alert"]  = "";		
		$data["id"]  = $id ;			
		$data["page_label"] = "Video Ekle";

		$this->load->admin_view("video_insert",$data);

	}
	
	
	
	public function Insert_Run(){
		$model = $this->load->admin_model("Video_Model");
		$form = $this->load->helper("Form");
		$alert = $this->load->helper("General");



		$form ->post("video_name");
		$form ->post("video_news_id");

		if($form->postresim("resim") != false){
        ///resim yukleme işlemi 


			$this->load->inc("Upload");
			$yukle = new Upload($_FILES["resim"]);
			$resimsi = $alert->seola($form->values["video_name"])."_".rand(0,99);
			$resim_adi = $yukle->yukle($resimsi,"public/files/video","video/*");

      // resim yukleme işlemi end
		}else{
			$resim_adi = "";
		}
		$form ->post("video_tags");
		$form ->post("video_desc");
		

		$videokod = "0";
		if (isset($_POST['video_kod']) && !empty($_POST['video_kod'])) {
			$kod = explode('watch?v=', $_POST['video_kod']);
			$videokod = substr($kod[1],0,11);
		}


		$data_array =  array(

			"video_name"      => $form->values["video_name"],
			"video_news_id"      => $form->values["video_news_id"],

			"video_file"      => $resim_adi,

			"video_kod"      => $videokod,
			"video_desc"      => $form->values["video_desc"],
			"video_tags"      => $form->values["video_tags"],
			"video_durum"      => 1
			);
		
		if (isset($_POST['video_tags']) && !empty($_POST['video_tags']) && preg_match("/,/i", $_POST['video_tags'])) {
			$tagsci = explode(',', $_POST['video_tags']);
		} else {
			$tagsci =  array($form->values["video_tags"]);
		}
		
		
		if($form->submit()){	

			$last_id = $model->insert($data_array);

			if($last_id != false){ 
				$vidar = array(
					'file' => "public/files/video/".$resim_adi, 
					'title' =>$form->values["video_name"],
					'desc' =>$form->values["video_desc"],
					'tags'=> $tagsci,
					'lastid' =>$last_id,
					'kod' =>$videokod,
					'news_id' => $form->values["video_news_id"]
					);

				if ($videokod == '0' || empty($_POST['video_kod'])) {
					# code...
				
				
				echo "<h4>Videonuz Youtube'a Ekleniyor Bekleyiniz</h4>";
				$durumcu = $this->youtubesend($vidar);	

				if (is_array($durumcu)) {
					echo "<pre>";  
					print_r($durumcu);
					echo "</pre>";
				} else {
					echo $durumcu;
				}


				} else {
					$this->kodsave($vidar);
					echo "<h4>Video kodunuz Eklendi.</h4>";
				}



			}else{

				echo $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  

			}

		}else{
			
			$hata = $form->errors;
			echo $alert->alerts($hata,"danger");	  

			
		}

	}
	
	
	
	public function Update(){
		
		$id = $this->load->helper("Url")->get_int(3); 
		$model = $this->load->admin_model("Video_Model");
		$data["content"] = $model->Guncelle_Form($id);

		
		$data["js"][]  = "editor";
		$data["jsp"]  = array("video");
		$data["css"]  = array("");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Video Güncelle";

		$this->load->admin_view("video_update",$data);

	}
	
	
	
	public function Update_Run(){

		$model = $this->load->admin_model("Video_Model");		
		$id = $this->load->helper("Url")->get_int(3); 
		$data["content"] = $model->Guncelle_Form($id);
		

		
		$data["js"][]  = "editor";
		$data["css"]  = array("");
		$data["jsp"]  = array("video");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Video Güncelle";

		$form = $this->load->helper("Form");
		$alert = $this->load->helper("General");


		$form ->post("video_name")->isEmpty("Video Başlık");
		$form ->post("video_news_id")->isEmpty("Haber ID");

		if($form->postresim("resim") != false){
        ///resim yukleme işlemi 


			$this->load->inc("Upload");
			$yukle = new Upload($_FILES["resim"]);
			$resimsi = $alert->seola($form->values["video_name"])."_".rand(0,99);
			$resim_adi = $yukle->yukle($resimsi,"public/files/content");

      // resim yukleme işlemi end
		}else{
			$resim_adi = "";
		}
		$form ->post("video_kod");
		$form ->post("video_content")->isEmpty("İçerik");
		$form ->post("video_durum")->isEmpty("Durum");



		$data_array =  array(

			"video_name"      => $form->values["video_name"],
			"video_news_id"      => $form->values["video_news_id"],

			"video_file"      => $resim_adi,

			"video_kod"      => $form->values["video_kod"],
			"video_content"      => $form->values["video_content"],
			"video_durum"      => $form->values["video_durum"]
			);

		

		
		if($form->submit()){	

			$last_id = $model->update($data_array,$id);

			if($last_id){ 

				$alert->redirect(SITE_URL."Admin/Video/Update/".$id);	  

			}else{

				$data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
				$this->load->admin_view("video_update",$data);
			}

		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
			$this->load->admin_view("video_update",$data);
			
		}

	}
	
	
	//delete
	public function Delete(){
		$url = $this->load->helper("Form")->post("id")->isEmpty();
		$id = explode('+',$url->values["id"]);
		$model = $this->load->admin_model("Video_Model");

		
		$sil = $model->delete($id[0]);
		@unlink('public/files/video/'.$id[1]);
		
		if($sil){
			echo "1";	
		}else{
			echo "0";
		}
		
		
	}	


	public function youtubesend($value=array())
	{
		$model = $this->load->admin_model("Generalsettings_Model");
			
			$file_info = $value['file'];
			if (file_exists($file_info)) {
				 
			

		$yt_set = $model->Guncelle_Form();
		$ytset_array = array(
							'id' => $yt_set['yapi_id'],
							'secret'=> $yt_set['yapi_secret'],
							"appname" => $yt_set['yapi_name'],
							'redirect' => SITE_URL.'Admin/Video/Authrun'
							);


		if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
			$this->load->inc('Yapi');
			$video_kod =  yapi($value,$ytset_array); 
			if ($video_kod['hata'] == "0") {


				$_SESSION['videobilgi'] = $value;
			return '<script>$(document).ready(function(){window.location.href = "'.SITE_URL.'Admin/Video/Auth";});</script>';
			} else {
				return $video_kod['hata'];
			 
           }
		} else {
			$_SESSION['videobilgi'] = $value;
			return '<script>$(document).ready(function(){window.location.href = "'.SITE_URL.'Admin/Video/Auth";});</script>';
		}

		}else{

					return 'Video Dosyası yüklenme aşamasında bir hata olmuş olabilir. Youtube\'a gönderilecek dosya sunucuda bulunamadı';
	
		}

	}  

	public function Auth($durum = false)
	{
 
		$model = $this->load->admin_model("Generalsettings_Model");	
		$yt_set = $model->Guncelle_Form();
		$ytset_array = array(
							'id' => $yt_set['yapi_id'],
							'secret'=> $yt_set['yapi_secret'],
							'redirect' => SITE_URL.'Admin/Video/Authrun');

		$this->load->inc('Yapivideolar'); 
		$data['res']= yapivideo($ytset_array);
		if ($durum == false) {
			$data['durum'] ="Siteye yüklenen video Youtube için bekliyor.";
		} else {
			$data['durum'] = $durum;
		}
		

		$this->load->admin_view("video_auth",$data);


	}

  
   public function Authrun()
	{
		$modelrun = $this->load->admin_model("Generalsettings_Model");
			

		$yt_set = $modelrun->Guncelle_Form();
		$ytset_array = array(
							'id' => $yt_set['yapi_id'],
							'secret'=> $yt_set['yapi_secret'],
							"appname" => $yt_set['yapi_name']
							);

		if (isset($_SESSION['token']) && !empty($_SESSION['token']) && isset($_SESSION['videobilgi']) && !empty($_SESSION['videobilgi'])) {
			file_put_contents('app/helper/gapi/key.txt', $_SESSION['token']);
			$this->load->inc('Yapi');
		$video_kod = yapi2($_SESSION['videobilgi'],$ytset_array);
		$this->kodkaydet($_SESSION['videobilgi'],$video_kod);
			$durum = "Youtube a yüklendi. Youtube videoyu işliyor. Detayları aç sekmesinden görebilirsiniz";

		} 
		 
        $this->Auth($durum);


	}

//youtube den gelen kod için
	public function kodkaydet($value='',$video_kod)
	{
		$newsmodel = $this->load->admin_model("News_Model");	
		//$videomodel = $this->load->admin_model("Video_Model");
			$iframeci  = '<iframe width="640" height="480"';
			$iframeci .= ' src="https://www.youtube.com/embed/'.$video_kod['kod'].'?rel=0&amp;controls=0&amp;showinfo=0"';
			$iframeci .= ' frameborder="0" allowfullscreen></iframe>';

			$vid_kodu = array('news_video'=>$iframeci);
			$haberekle = $newsmodel->update($vid_kodu,$value['news_id']);

			$vid_key = array('video_kod'=>$video_kod['kod']);
			//$videoyaekle = $videomodel->update($vid_key,$value['lastid']);

			if ($haberekle ==  true ) {
				return 'Video Başarıyla Eklendi';
			} else {
				return 'Bir hata oluştu';
			}
			
			
	}
// formdan gelen kod için
	public function kodsave($value=array())
	{
		$newsmodel = $this->load->admin_model("News_Model");	
		 
			$iframeci  = '<iframe width="640" height="480"';
			$iframeci .= ' src="https://www.youtube.com/embed/'.$value['kod'].'?rel=0&amp;controls=0&amp;showinfo=0"';
			$iframeci .= ' frameborder="0" allowfullscreen></iframe>';

			$vid_kodu = array('news_video'=>$iframeci);
			$haberekle = $newsmodel->update($vid_kodu,$value['news_id']);
 

			if ($haberekle ==  true ) {
				return 'Video Başarıyla Eklendi';
			} else {
				return 'Bir hata oluştu';
			}
	}


}
