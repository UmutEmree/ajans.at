<?php class Yazarlar extends Controller{
	public function __construct() {
		parent::__construct();

        // Oturum Kontrolü
		Session::checkSession();
	}



	public function index(){
		

		$data["js"]  = array("table");
		##editor##
		$data["jsp"]  = array("yazarlar","confirm");
		
		$data["css"]  = array("table");				
		$data["page_label"] = "Köşe Yazarı Yönetimi";

		$model = $this->load->admin_model("Yazarlar_Model");

		$data["content"]= $model->listele();	
		$this->load->admin_view("yazarlar",$data);

	}
	
	
	
	
	public function Insert(){
		

		##editor##
		$data["jsp"]  = array("yazarlar");
		$data["css"]  = array("");
		$data["alert"]  = "";				
		$data["page_label"] = "Köşe Yazarı Ekle";
		$this->load->admin_view("yazarlar_insert",$data);

	}
	
	
	
	public function Insert_Run(){
		global $yazarboyutlar;

		##editor##
		$data["jsp"]  = array("yazarlar");
		$data["css"]  = array("");
		$data["alert"]  = "";				
		$data["page_label"] = "Köşe Yazarı Ekle";
		
		$model = $this->load->admin_model("Yazarlar_Model");
		$form = $this->load->helper("Form");
		$alert = $this->load->helper("General");



		$form ->post("yazar_name")->isEmpty("İsim");
		$form ->post("yazar_mail")->isEmpty("Eposta");
		$form ->post("yazar_sifre")->isEmpty("Şifre");

		if($form->postresim("resim") != false){
        ///resim yukleme işlemi 


			$this->load->inc("Upload");
			$yukle = new Upload($_FILES["resim"]);
			$resimsi = $alert->seola($form->values["yazar_name"])."_".rand(0,99);
			$resim_adi = $yukle->yukle_th($resimsi,"public/files/yazarlar",true,$yazarboyutlar);


      // resim yukleme işlemi end
		}else{
			$resim_adi = "";
		}
		$form ->post("yazar_durum")->isEmpty("durum");



		$data_array =  array(

			"yazar_name"      => $form->values["yazar_name"],
			"yazar_mail"      => $form->values["yazar_mail"],
			"yazar_sifre"      => $form->values["yazar_sifre"],

			"yazar_resim"      => $resim_adi,

			"yazar_durum"      => $form->values["yazar_durum"]
			);
		

		
		if($form->submit()){	

			$last_id = $model->insert($data_array);

			if($last_id){ 

				$data["alert"] = $alert->alert("Köşe Yazarı Ekleme İşlemi Başarıyla  Tamamlandı.","success");	  
				$this->load->admin_view("yazarlar_insert",$data); 		  

			}else{

				$data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
				$this->load->admin_view("yazarlar_insert",$data);
			}

		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
			$this->load->admin_view("yazarlar_insert",$data); 
			
		}

	}
	
	
	
	public function Update(){
		
		$id = $this->load->helper("Url")->get_int(3); 
		$model = $this->load->admin_model("Yazarlar_Model");
		$data["content"] = $model->Guncelle_Form($id);

		
		##editor##
		$data["jsp"]  = array("yazarlar");
		$data["css"]  = array("");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Köşe Yazarı Güncelle";

		$this->load->admin_view("yazarlar_update",$data);

	}
	
	
	
	public function Update_Run(){
		global $yazarboyutlar;

		$model = $this->load->admin_model("Yazarlar_Model");		
		$id = $this->load->helper("Url")->get_int(3); 
		$data["content"] = $model->Guncelle_Form($id);
		

		
		##editor##
		$data["css"]  = array("");
		$data["jsp"]  = array("yazarlar");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Köşe Yazarı Güncelle";

		$form = $this->load->helper("Form");
		$alert = $this->load->helper("General");


		$form ->post("yazar_name")->isEmpty("İsim");
		$form ->post("yazar_mail")->isEmpty("Eposta");
		$form ->post("yazar_sifre")->isEmpty("Şifre");

		if($form->postresim("resim") != false){
        ///resim yukleme işlemi 


			$this->load->inc("Upload");
			$yukle = new Upload($_FILES["resim"]);
			$resimsi = $alert->seola($form->values["yazar_name"])."_".rand(0,99);
			$resim_adi =  $yukle->yukle_th($resimsi,"public/files/yazarlar",true,$yazarboyutlar);

      // resim yukleme işlemi end
		}else{
			$resim_adi = $data["content"]["yazar_resim"];
		}
		$form ->post("yazar_durum")->isEmpty("durum");



		$data_array =  array(

			"yazar_name"      => $form->values["yazar_name"],
			"yazar_mail"      => $form->values["yazar_mail"],
			"yazar_sifre"      => $form->values["yazar_sifre"],

			"yazar_resim"      => $resim_adi,

			"yazar_durum"      => $form->values["yazar_durum"]
			);

		

		
		if($form->submit()){	

			$last_id = $model->update($data_array,$id);

			if($last_id){ 

				$alert->redirect(SITE_URL."Admin/Yazarlar/Update/".$id);	  

			}else{

				$data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
				$this->load->admin_view("yazarlar_update",$data);
			}

		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
			$this->load->admin_view("yazarlar_update",$data);
			
		}

	}
	
	
	//delete
	public function Delete(){
		$url = $this->load->helper("Form")->post("id")->isEmpty();
		$model = $this->load->admin_model("Yazarlar_Model");

		
		$sil = $model->delete($url->values["id"]);
		
		if($sil){
			echo "1";	
		}else{
			echo "0";
		}
		
		
	}	  


	public function list_update()
		{
			$model = $this->load->admin_model("Yazarlar_Model");		
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



}
