<?php class Kose extends Controller{
	public function __construct() {
		parent::__construct();

        // Oturum Kontrolü
		Session::checkSession();
	}



	public function index(){
		

		$data["js"]  = array("table");
		$data["jsp"]  = array("koseyazilari","confirm");
		$data["css"]  = array("table");				
		$data["page_label"] = "Köşe Yazısı Yönetimi";

		$model = $this->load->admin_model("Koseyazilari_Model");

		$data["content"]= $model->listele2();	
		$this->load->admin_view("kose",$data);

	}
	
	
	
	
	
	public function Update(){
		
		$id = $this->load->helper("Url")->get_int(3); 
		$model = $this->load->admin_model("Koseyazilari_Model");
		$data["content"] = $model->Guncelle_Form($id);

		
		$data["js"][]  = "editor";
		$data["jsp"]  = array("koseyazilari");
		$data["css"]  = array("");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Köşe Yazısı Güncelle";

		$this->load->admin_view("kose_update",$data);

	}
	
	
	
	public function Update_Run(){

		$model = $this->load->admin_model("Koseyazilari_Model");		
		$id = $this->load->helper("Url")->get_int(3); 
		$data["content"] = $model->Guncelle_Form($id);
		

		
		$data["js"][]  = "editor";
		$data["css"]  = array("");
		$data["jsp"]  = array("koseyazilari");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Koseyazilari Güncelle";

		$form = $this->load->helper("Form");
		$alert = $this->load->helper("General");


		$form ->post("yazi_name")->isEmpty("Köşe Yazısı Başlığı");		
		$form ->post("yazi_desc")->isEmpty("Desciription");
		$form ->post("yazi_keyw")->isEmpty("Anahtar Kelimeler");
		$form ->post("yazi_jenerik")->isEmpty("Jenerik");
		$form ->post("oldresim");

		if($form->postresim("resim") != false){
        ///resim yukleme işlemi 


			$this->load->inc("Upload");
			$yukle = new Upload($_FILES["resim"]);
			$resimsi = $alert->seola($form->values["yazi_name"])."_".rand(0,99);
			$resim_adi = $yukle->yukle($resimsi,"public/files/content");

      // resim yukleme işlemi end
		}else{
			$resim_adi = $form->values["oldresim"];
		}
		$form ->post("yazi_content")->isEmpty("İçerik");



		$data_array =  array(

			"yazi_name"      => $form->values["yazi_name"],
			"yazi_desc"      => $form->values["yazi_desc"],
			"yazi_keyw"      => $form->values["yazi_keyw"],
			"yazi_jenerik"      => $form->values["yazi_jenerik"],
			"yazi_image"      => $resim_adi,
			"yazi_content"      => $form->values["yazi_content"]
			);

		

		
		if($form->submit()){	

			$last_id = $model->update($data_array,$id);

			if($last_id){ 

				$alert->redirect(SITE_URL."Admin/Kose/Update/".$id);	  

			}else{

				$data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
				$this->load->admin_view("koseyazilari_update",$data);
			}

		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
			$this->load->admin_view("koseyazilari_update",$data);
			
		}

	}
	
	
	//delete
	public function Delete(){
		$url = $this->load->helper("Form")->post("id")->isEmpty();
		$model = $this->load->admin_model("Koseyazilari_Model");

		
		$sil = $model->delete($url->values["id"]);
		
		if($sil){
			echo "1";	
		}else{
			echo "0";
		}
		
		
	}	



	public function list_update()
		{
			$model = $this->load->admin_model("Koseyazilari_Model");		
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
