<?php class Admin extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::checkSession();
    }
    
    
		
    public function index(){
		
		   
		$data["js"]  = array("table");
		##editor##
		$data["jsp"]  = array("admin");
		$data["jsp"][]  = "confirm";
		$data["css"]  = array("table");				
		$data["page_label"] = "Admin Yönetimi";
				
	  $model = $this->load->admin_model("Admin_Model");
	
		$data["content"]= $model->listele();	
        $this->load->admin_view("admin",$data);
    	 
    }
	
	
	
	
	    public function Insert(){
		
		   
		##editor##
		$data["jsp"]  = array("admin");
		$data["css"]  = array("");
		$data["alert"]  = "";				
		$data["page_label"] = "Admin Ekle";
	
        $this->load->admin_view("admin_insert",$data);
    	 
    }
	
	
	
	    public function Insert_Run(){
		
		   
		##editor##
		$data["jsp"]  = array("admin");
		$data["css"]  = array("");
		$data["alert"]  = "";				
		$data["page_label"] = "Admin Ekle";
		
		$model = $this->load->admin_model("Admin_Model");
		 $form = $this->load->helper("Form");
		  $alert = $this->load->helper("General");
		  
		  
         
		 $form ->post("Admin_Name");
$form ->post("Admin_Mail");
$form ->post("Admin_User_Name");
$form ->post("Admin_Password");



$data_array =  array(

"Admin_Name"      => $form->values["Admin_Name"],
"Admin_Mail"      => $form->values["Admin_Mail"],
"Admin_User_Name"      => $form->values["Admin_User_Name"],
"Admin_Password"      => $form->values["Admin_Password"]
);
		
		 
		
		if($form->submit()){	

	  $last_id = $model->insert($data_array);
	  
	      if($last_id){ 
		  
			$data["alert"] = $alert->alert("Admin Ekleme İşlemi Başarıyla  Tamamlandı.","success");	  
			$this->load->admin_view("admin_insert",$data); 		  
			  
            }else{
              
	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
		 $this->load->admin_view("admin_insert",$data);
            }
	  
		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
			$this->load->admin_view("admin_insert",$data); 
			
			}
    	 
    }
	
	
	
	    public function Update(){
		
		$id = $this->load->helper("Url")->get_int(3); 
		$model = $this->load->admin_model("Admin_Model");
		$data["content"] = $model->Guncelle_Form($id);
		 
		
		##editor##
		$data["jsp"]  = array("admin");
		$data["css"]  = array("");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Admin Güncelle";
	
        $this->load->admin_view("admin_update",$data);
    	 
    }
	
	
	
		    public function Update_Run(){
				
			$model = $this->load->admin_model("Admin_Model");		
		$id = $this->load->helper("Url")->get_int(3); 
		$data["content"] = $model->Guncelle_Form($id);
		$oldsifre = $data["content"]["Admin_Password"];
		 
		
		##editor##
		$data["css"]  = array("");
		$data["jsp"]  = array("admin");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Admin Güncelle";
	 
		 $form = $this->load->helper("Form");
		  $alert = $this->load->helper("General");
		  
		  
        $form ->post("Admin_Name");
$form ->post("Admin_Mail");
$form ->post("Admin_User_Name");
$form ->post("Admin_Password");
 




$data_array =  array(

"Admin_Name"      => $form->values["Admin_Name"],
"Admin_Mail"      => $form->values["Admin_Mail"],
"Admin_User_Name"      => $form->values["Admin_User_Name"],
"Admin_Password"      => md5($form->values["Admin_Password"])
);
	

	if (isset($_POST["Admin_Password"]) && !empty($_POST["Admin_Password"])) {
	 

	 if ($oldsifre != md5($_POST["Admin_Passwordold"]) ) {
	 	unset($data_array["Admin_Password"]);
	 	
	 } 
	 
}		 
		
		 
		
		if($form->submit()){	

			
	  $last_id = $model->update($data_array,$id);
	  
	      if($last_id){ 
		  
		    $alert->redirect(SITE_URL."Admin/Admin/Update/".$id);	  
			  
            }else{
              
	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
		$this->load->admin_view("admin_update",$data);
            }
	  
		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
		$this->load->admin_view("admin_update",$data);
			
			}
    	 
    }
	
	
	//delete
		public function Delete(){
		$url = $this->load->helper("Form")->post("id")->isEmpty();
		$model = $this->load->admin_model("Admin_Model");
	 
		
		$sil = $model->delete($url->values["id"]);
		
		if($sil){
		echo "1";	
			}else{
				echo "0";
				}
		
		
		}	  
  
    
}
