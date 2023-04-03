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
		

		$videokod = "";
		if (isset($_POST['video_kod']) && !empty($_POST['video_kod'])  && preg_match("/watch?v/i", $_POST['video_kod'])) {
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

			if($last_id){ 

				$vidar = array(
					'file' => "public/files/video/".$resim_adi, 
					'title' =>$form->values["video_name"],
					'desc' =>$form->values["video_desc"],
					'tags'=> $tagsci,
					'lastid' =>$last_id,
					'kod' =>$videokod,
					'news_id' => $form->values["video_news_id"]
					
					);

				if ($resim_adi != '' || $videokod == '' ) {





					$_SESSION['video_info'] = $vidar ;

					echo "<script>$(document).ready(function(){window.location.href = \"".SITE_URL."Admin/Video/Auth\";});</script>";
				}else
				{

					$islem = $this->kodsave($vidar);

					echo "<h4>".$islem."</h4>";

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

		//print_r($sil);
		//echo $sil;
		if($sil){
			echo "1";	
		}else{
			echo "0";
		}
		
		
	}	



	public function Auth()
	{
		$data["js"][]  = "";
		$data["jsp"]  = array("video2");
		$data["css"]  = array("");


		$model = $this->load->admin_model("Generalsettings_Model");	
		$yt_set = $model->Guncelle_Form();
		$ytset_array = array(
			'id' => $yt_set['yapi_id'],
			'secret'=> $yt_set['yapi_secret'],
			'redirect' => SITE_URL.'Admin/Video/Authrun');

		$this->load->inc('Yapi'); 
		$durum = yapi($_SESSION['video_info'],$ytset_array);


		$data['durum'] = $durum;


		$this->load->admin_view("video_auth",$data);


	}

	public function AuthRun()
	{
		$data["js"][]  = "";
		$data["jsp"]  = array("video2");
		$data["css"]  = array("");


		$model = $this->load->admin_model("Generalsettings_Model");	
		$yt_set = $model->Guncelle_Form();
		$ytset_array = array(
			'id' => $yt_set['yapi_id'],
			'secret'=> $yt_set['yapi_secret'],
			'redirect' => SITE_URL.'Admin/Video/Authrun');

		$this->load->inc('Yapi'); 
		$durum = yapi($_SESSION['video_info'],$ytset_array);


		$data['durum'] = $durum;


		$this->load->admin_view("video_auth",$data);


	}



//youtube den gelen kod için
	public function kodkaydet()
	{
		$id = $_POST['id'];
		if(strlen($id) == 11){

			$value = $_SESSION['video_info'];
			$newsmodel = $this->load->admin_model("News_Model");	
			$videomodel = $this->load->admin_model("Video_Model");
			$iframeci  = '<iframe class="embed-responsive-item" ';
			$iframeci .= ' src="https://www.youtube.com/embed/'.$id.'?rel=0"';
			$iframeci .= ' frameborder="0" allowfullscreen></iframe>';

			$vid_kodu = array('news_video'=>$iframeci);
			$haberekle = $newsmodel->update($vid_kodu,$value['news_id']);

			$vid_key = array('video_kod'=>$id);
			$videoyaekle = $videomodel->update($vid_key,$value['lastid']);

			if ($haberekle ==  true &&  $videoyaekle == true ) {
				$sonuc = 'Video Başarıyla Eklendi';
			} else {
				$sonuc =  'Bir hata oluştu';
			}

			echo $sonuc;
		}else{

			echo "...";
		}
	}
// formdan gelen kod için
	public function kodsave($value=array())
	{
		$newsmodel = $this->load->admin_model("News_Model");	

		$iframeci  = '<iframe class="embed-responsive-item"';
		$iframeci .= ' src="https://www.youtube.com/embed/'.$value['kod'].'?rel=0"';
		$iframeci .= ' frameborder="0" allowfullscreen></iframe>';

		$vid_kodu = array('news_video'=>$iframeci);
		$haberekle = $newsmodel->update($vid_kodu,$value['news_id']);


		if ($haberekle ==  true ) {
			return '<script>$(document).ready(function(){$(".videobtn").attr("disabled","disabled");});</script>Video Başarıyla Eklendi<br><img src="https://i.ytimg.com/vi/'.$value['kod'].'/default.jpg" class="img-circle">';
		} else {
			return 'Bir hata oluştu....';
		}
	}


	public function Youtube()
	{
		$data["js"][]  = "";
		$data["jsp"]  = array("video");
		$data["css"]  = array("");


		$model = $this->load->admin_model("Generalsettings_Model");	
		$yt_set = $model->Guncelle_Form();
		$ytset_array = array(
			'id' => $yt_set['yapi_id'],
			'secret'=> $yt_set['yapi_secret'],
			'redirect' => SITE_URL.'Admin/Video/Youtube');

		$this->load->inc('Yapivideolar'); 
		$data['res'] = yapivideo($ytset_array);


		$this->load->admin_view("video_yt",$data);


	}


	public function YoutubeSil($id)
	{
		$data["js"][]  = "";
		$data["jsp"]  = array("video");
		$data["css"]  = array("");


		$model = $this->load->admin_model("Generalsettings_Model");	
		$yt_set = $model->Guncelle_Form();
		$ytset_array = array(
			'id' => $yt_set['yapi_id'],
			'secret'=> $yt_set['yapi_secret'],
			'redirect' => SITE_URL.'Admin/Video/Youtube',
			'sil' => 1,
			'video_id' => $id
			);

		$this->load->inc('Yapivideolar'); 
		$data['res'] = yapivideo($ytset_array);


		$this->load->admin_view("video_yt",$data);


	}

}
