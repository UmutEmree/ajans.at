<?php class Reklam extends Controller{
	public function __construct() {
		parent::__construct();

        // Oturum Kontrolü
		Session::checkSession();
	}



	public function index(){
		

		$data["js"]  = array("table","datepicker");
		$data["js"][]  = "editor";
		$data["jsp"]  = array("reklam");
		$data["jsp"][]  = "confirm";
		$data["css"]  = array("table");				
		$data["page_label"] = "Reklam Yönetimi";

		$model = $this->load->admin_model("Reklam_Model");

		$data["content"]= $model->listele();	
		$this->load->admin_view("reklam",$data);

	}
	
	
	
	
	public function Insert(){
		
		global $reklamboyutlari;
		$data["js"] = array("editor","datepicker");
		$data["jsp"]  = array("reklam");
		$data["css"]  = array("datepicker");
		$data["alert"]  = "";				
		$data["page_label"] = "Reklam Ekle";
		$data["boytlar"] = $reklamboyutlari;

		$this->load->admin_view("reklam_insert",$data);

	}
	
	
	
	public function Insert_Run(){
		

		global $reklamboyutlari;
		$data["js"] = array("editor","datepicker");
		$data["jsp"]  = array("reklam");
		$data["css"]  = array("datepicker");
		$data["alert"]  = "";				
		$data["page_label"] = "Reklam Ekle";
		$data["boytlar"] = $reklamboyutlari;
		
		$model = $this->load->admin_model("Reklam_Model");
		$form = $this->load->helper("Form");
		$alert = $this->load->helper("General");



		$form ->post("reklam_name")->isEmpty("Reklam Firması");
		$form ->post("reklam_boyut")->isEmpty("Reklam Boyutu");
		$form ->post("reklam_durum")->isEmpty("Reklam Durumu");
		$form ->post("reklam_icerik")->isEmpty("Reklam İçeriği");
		$form ->post("reklam_bitis")->isEmpty("Bitiş Tarihi");



		$data_array =  array(

			"reklam_name"      => $form->values["reklam_name"],
			"reklam_boyut"      => $form->values["reklam_boyut"],
			"reklam_durum"      => $form->values["reklam_durum"],
			"reklam_icerik"      => $form->values["reklam_icerik"],
			"reklam_bitis"      => $form->values["reklam_bitis"]
			);
		

		
		if($form->submit()){	

			$last_id = $model->insert($data_array);

			if($last_id){ 

				$data["alert"] = $alert->alert("Reklam Ekleme İşlemi Başarıyla  Tamamlandı.","success");	  
				$this->load->admin_view("reklam_insert",$data); 		  

			}else{

				$data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
				$this->load->admin_view("reklam_insert",$data);
			}

		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
			$this->load->admin_view("reklam_insert",$data); 
			
		}

	}
	
	
	
	public function Update(){
		
		$id = $this->load->helper("Url")->get_int(3); 
		$model = $this->load->admin_model("Reklam_Model");
		$data["content"] = $model->Guncelle_Form($id);
		 
		$data["id"]  = $id;				
		$data["page_label"] = "Reklam Güncelle";

		global $reklamboyutlari;
		$data["js"] = array("editor","datepicker");
		$data["jsp"]  = array("reklam");
		$data["css"]  = array("datepicker");
		$data["alert"]  = "";				

		$data["boytlar"] = $reklamboyutlari;




		$this->load->admin_view("reklam_update",$data);

	}
	
	
	
	public function Update_Run(){

		$model = $this->load->admin_model("Reklam_Model");		
		$id = $this->load->helper("Url")->get_int(3); 
		$data["content"] = $model->Guncelle_Form($id);
		

		
		$data["id"]  = $id;				
		$data["page_label"] = "Reklam Güncelle";

		global $reklamboyutlari;
		$data["js"] = array("editor","datepicker");
		$data["jsp"]  = array("reklam");
		$data["css"]  = array("datepicker");
		$data["alert"]  = "";				

		$data["boytlar"] = $reklamboyutlari;

		$form = $this->load->helper("Form");
		$alert = $this->load->helper("General");


		$form ->post("reklam_name")->isEmpty("Reklam Firması");
		$form ->post("reklam_boyut")->isEmpty("Reklam Boyutu");
		$form ->post("reklam_durum")->isEmpty("Reklam Durumu");
		$form ->post("reklam_icerik")->isEmpty("Reklam İçeriği");
		$form ->post("reklam_bitis")->isEmpty("Bitiş Tarihi");



		$data_array =  array(

			"reklam_name"      => $form->values["reklam_name"],
			"reklam_boyut"      => $form->values["reklam_boyut"],
			"reklam_durum"      => $form->values["reklam_durum"],
			"reklam_icerik"      => $form->values["reklam_icerik"],
			"reklam_bitis"      => $form->values["reklam_bitis"]
			);

		

		
		if($form->submit()){	

			$last_id = $model->update($data_array,$id);

			if($last_id){ 

				$alert->redirect(SITE_URL."Admin/Reklam/Update/".$id);	  

			}else{

				$data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
				$this->load->admin_view("reklam_update",$data);
			}

		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
			$this->load->admin_view("reklam_update",$data);
			
		}

	}
	
	
	//delete
	public function Delete(){
		$url = $this->load->helper("Form")->post("id")->isEmpty();
		$model = $this->load->admin_model("Reklam_Model");

		
		$sil = $model->delete($url->values["id"]);
		
		if($sil){
			echo "1";	
		}else{
			echo "0";
		}
		
		
	}	 


	public function list_update()
		{
			$model = $this->load->admin_model("Reklam_Model");		
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
