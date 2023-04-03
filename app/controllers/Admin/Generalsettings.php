<?php class Generalsettings extends Controller{
	public function __construct() {
		parent::__construct();

        // Oturum Kontrolü
		Session::checkSession();
	}


	
	public function index(){
		
		$model = $this->load->admin_model("Generalsettings_Model");
		$data["content"] = $model->Guncelle_Form();

		
		##editor##
		$data["jsp"]  = array("generalsettings");
		$data["css"]  = array("");
		$data["alert"]  = "";			
		$data["page_label"] = "Genel Ayarlar";
		global $sociallink;
		$data["sociallink"]  = $sociallink;

		$this->load->admin_view("generalsettings_update",$data);

	}
	
	
	
	public function Update_Run(){

		$model = $this->load->admin_model("Generalsettings_Model");	
		$data["content"] = $model->Guncelle_Form();	

		
		##editor##
		$data["css"]  = array("");
		$data["jsp"]  = array("generalsettings");
		$data["alert"]  = "";
		$data["id"]  = 1;				
		$data["page_label"] = "Genel Ayarlar";
		global $sociallink;
		$data["sociallink"]  = $sociallink;

		$form = $this->load->helper("Form");
		$alert = $this->load->helper("General");


		$form ->post("General_Site_Name")->isEmpty("Site Adı");
		$form ->post("General_Site_Domain")->isEmpty("Site Domain");
		$form ->post("General_Site_Status")->isEmpty("Site Durumu");
		$form ->post("yorum_durumu");
		$form ->post("General_desc");
		$form ->post("General_keyw");
		$form ->post("General_title");
		$form ->post("fb_app_id");
		$form ->post("fb_app_secret");
		$form ->post("fb_admin_id");
		$form ->post("googleanalitics");
		$form ->post("analiticsmail");
		if($form->postresim("dosya") != false){
			$name = $_FILES['dosya']['name'];
			$dosya_adi = basename($name);
			$uzanti = substr($name,-3);
			$konum = 'app/helper/';
			$dosya = $konum.$dosya_adi;
			if ($uzanti == 'p12') {
				@unlink($konum.$_POST['olddosya']);
				move_uploaded_file($_FILES['dosya']['tmp_name'], $dosya);
			}else{
				$_POST['hatadosya'] = "";
				$form ->post("hatadosya")->isEmpty("Sadece p12 uzantılı dosya yüklenmelidir. Dosya");

			}


		} else {
			$dosya_adi = $_POST['olddosya'];
		}
		$form ->post("analiticsprofilid");
		$form ->post("yapi_id");
		$form ->post("yapi_secret");
		$form ->post("yapi_name");
		$form ->post("adres");
		$form ->post("tel");
		$form ->post("gsm");
		$form ->post("fax");
		$form ->post("maps");

		$socialci = json_encode($_POST['social']);
	 





		$data_array =  array(

			"General_Site_Name"      => $form->values["General_Site_Name"],
			"General_Site_Domain"      => $form->values["General_Site_Domain"],
			"General_Site_Status"      => $form->values["General_Site_Status"],
			"General_desc"      => $form->values["General_desc"],
			"General_keyw"      => $form->values["General_keyw"],
			"General_title"      => $form->values["General_title"],
			"fb_app_id"      => $form->values["fb_app_id"],
			"fb_app_secret"      => $form->values["fb_app_secret"],
			"fb_admin_id"      => $form->values["fb_admin_id"],
			"yorum_durumu"      => $form->values["yorum_durumu"],
			"googleanalitics"      => $form->values["googleanalitics"],
			"analiticsmail"      => $form->values["analiticsmail"],
			"analiticspass"      => $dosya_adi,
			"analiticsprofilid" => $form->values["analiticsprofilid"],
			"yapi_id" => $form->values["yapi_id"],
			"yapi_secret" => $form->values["yapi_secret"],
			"yapi_name" => $form->values["yapi_name"],
			"adres"      => $form->values["adres"],
			"tel"      => $form->values["tel"],
			"gsm"      => $form->values["gsm"],
			"fax"      => $form->values["fax"],
			"maps"      => $form->values["maps"],
			'social' => $socialci
			);

		

		
		if($form->submit()){	

			$last_id = $model->update($data_array,$id);

			if($last_id){ 

				$alert->redirect(SITE_URL."Admin/Generalsettings/index");	  

			}else{

				$data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
				$this->load->admin_view("generalsettings_update",$data);
			}

		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
			$this->load->admin_view("generalsettings_update",$data);
			
		}

	}
	



}
