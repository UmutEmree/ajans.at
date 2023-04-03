<?php class Yorum extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::checkSession();
    }
    
    
		
    public function index(){
		
		   
		$data["js"]  = array("table");
		##editor##
		$data["jsp"]  = array("yorum");
		$data["jsp"][]  = "confirm";
		$data["css"]  = array("table");				
		$data["page_label"] = "Yorum Yönetimi";
				
	  $model = $this->load->admin_model("Yorum_Model");
	
		$data["content"]= $model->listele();	
        $this->load->admin_view("yorum",$data);
    	 
    }
	


	public function listhaber($id){
		
		   
		$data["js"]  = array("table");
		##editor##
		$data["jsp"]  = array("yorum");
		$data["jsp"][]  = "confirm";
		$data["css"]  = array("table");				
		$data["page_label"] = "Yorum Yönetimi";
				
	  $model = $this->load->admin_model("Yorum_Model");
	
		$data["content"]= $model->listelehaber($id);	
        $this->load->admin_view("yorum",$data);
    	 
    }
	 
	  
	
	    public function Update(){
		
		$id = $this->load->helper("Url")->get_int(3); 
		$model = $this->load->admin_model("Yorum_Model");
		$data["content"] = $model->Guncelle_Form($id);
		 
		
		##editor##
		$data["jsp"]  = array("yorum");
		$data["css"]  = array("");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Yorum Güncelle";
	
        $this->load->admin_view("yorum_update",$data);
    	 
    }
	
	
	
		    public function Update_Run(){
				
			$model = $this->load->admin_model("Yorum_Model");		
		$id = $this->load->helper("Url")->get_int(3); 
		$data["content"] = $model->Guncelle_Form($id);
		
		 
		
		##editor##
		$data["css"]  = array("");
		$data["jsp"]  = array("yorum");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Yorum Güncelle";
	 
		 $form = $this->load->helper("Form");
		  $alert = $this->load->helper("General");
		  
		   
			$form ->post("yorum_name")->isEmpty("Yorumcu");
			$form ->post("yorum_baslik")->isEmpty("Yorum Başlığı");
			$form ->post("yorum_content")->isEmpty("Yorumu");
			$form ->post("yorum_durum")->isEmpty("Durum");
 



					$data_array =  array(

						
								"yorum_name"      => $form->values["yorum_name"],
								"yorum_baslik"      => $form->values["yorum_baslik"],
								"yorum_content"      => $form->values["yorum_content"],
								"yorum_durum"      => $form->values["yorum_durum"]
					 
					);
			 
		
		 
		
		if($form->submit()){	

	  $last_id = $model->update($data_array,$id);
	  
	      if($last_id){ 
		  
		    $alert->redirect(SITE_URL."Admin/Yorum/Update/".$id);	  
			  
            }else{
              
	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
		$this->load->admin_view("yorum_update",$data);
            }
	  
		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
		$this->load->admin_view("yorum_update",$data);
			
			}
    	 
    }
	
	
	//delete
		public function Delete(){
		$url = $this->load->helper("Form")->post("id")->isEmpty();
		$model = $this->load->admin_model("Yorum_Model");
	 
		
		$sil = $model->delete($url->values["id"]);
		
		if($sil){
		echo "1";	
			}else{
				echo "0";
				}
		
		
		}	  


		public function list_update()
		{
			$model = $this->load->admin_model("Yorum_Model");		
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
