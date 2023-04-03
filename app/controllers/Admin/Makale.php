<?php class Makale extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::checkSession();
    }
    
    
		
    public function index(){
		
		   
		$data["js"]  = array("table");
		$data["js"][]  = "editor";
		$data["jsp"]  = array("makale");
		$data["jsp"][]  = "confirm";
		$data["css"]  = array("table");				
		$data["page_label"] = "Makale Yönetimi";
				
	  $model = $this->load->admin_model("Makale_Model");
	
		$data["content"]= $model->listele();	
        $this->load->admin_view("makale",$data);
    	 
    }
	
	
	
	
	    public function Insert(){
		
		   
		$data["js"][]  = "editor";
		$data["jsp"]  = array("makale");
		$data["css"]  = array("");
		$data["alert"]  = "";				
		$data["page_label"] = "Makale Ekle";
	
        $this->load->admin_view("makale_insert",$data);
    	 
    }
	
	
	
	    public function Insert_Run(){
		
		   
		$data["js"][]  = "editor";
		$data["jsp"]  = array("makale");
		$data["css"]  = array("");
		$data["alert"]  = "";				
		$data["page_label"] = "Makale Ekle";
		
		$model = $this->load->admin_model("Makale_Model");
		 $form = $this->load->helper("Form");
		  $alert = $this->load->helper("General");
		  
		  
         
		 $form ->post("makale_name")->isEmpty("MakaleBaşlık");
$form ->post("makale_title")->isEmpty("makale_title");

if($form->postresim("resim") != false){
        ///resim yukleme işlemi 
      
      
      $this->load->inc("Upload");
        $yukle = new Upload($_FILES["resim"]);
      $resimsi = $alert->seola($form->values["makale_name"])."_".rand(0,99);
       $resim_adi = $yukle->yukle($resimsi,"public/files/content");
       
      // resim yukleme işlemi end
       }else{
          $resim_adi = "";
         }
$form ->post("makale_desc")->isEmpty("makale_desc");
$form ->post("makale_keyw")->isEmpty("makale_keyw");
$form ->post("makale_content");



$data_array =  array(

"makale_name"      => $form->values["makale_name"],
"makale_title"      => $form->values["makale_title"],

"makale_image"      => $resim_adi,

"makale_desc"      => $form->values["makale_desc"],
"makale_keyw"      => $form->values["makale_keyw"],
"makale_content"      => $form->values["makale_content"]
);
		
		 
		
		if($form->submit()){	

	  $last_id = $model->insert($data_array);
	  
	      if($last_id){ 
		  
			$data["alert"] = $alert->alert("Makale Ekleme İşlemi Başarıyla  Tamamlandı.","success");	  
			$this->load->admin_view("makale_insert",$data); 		  
			  
            }else{
              
	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
		 $this->load->admin_view("makale_insert",$data);
            }
	  
		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
			$this->load->admin_view("makale_insert",$data); 
			
			}
    	 
    }
	
	
	
	    public function Update(){
		
		$id = $this->load->helper("Url")->get_int(3); 
		$model = $this->load->admin_model("Makale_Model");
		$data["content"] = $model->Guncelle_Form($id);
		 
		
		$data["js"][]  = "editor";
		$data["jsp"]  = array("makale");
		$data["css"]  = array("");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Makale Güncelle";
	
        $this->load->admin_view("makale_update",$data);
    	 
    }
	
	
	
		    public function Update_Run(){
				
			$model = $this->load->admin_model("Makale_Model");		
		$id = $this->load->helper("Url")->get_int(3); 
		$data["content"] = $model->Guncelle_Form($id);
		
		 
		
		$data["js"][]  = "editor";
		$data["css"]  = array("");
		$data["jsp"]  = array("makale");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Makale Güncelle";
	 
		 $form = $this->load->helper("Form");
		  $alert = $this->load->helper("General");
		  
		  
        $form ->post("makale_name")->isEmpty("MakaleBaşlık");
$form ->post("makale_title")->isEmpty("makale_title");

if($form->postresim("resim") != false){
        ///resim yukleme işlemi 
      
      
      $this->load->inc("Upload");
        $yukle = new Upload($_FILES["resim"]);
      $resimsi = $alert->seola($form->values["makale_name"])."_".rand(0,99);
       $resim_adi = $yukle->yukle($resimsi,"public/files/content");
       
      // resim yukleme işlemi end
       }else{
          $resim_adi = "";
         }
$form ->post("makale_desc")->isEmpty("makale_desc");
$form ->post("makale_keyw")->isEmpty("makale_keyw");
$form ->post("makale_content");



$data_array =  array(

"makale_name"      => $form->values["makale_name"],
"makale_title"      => $form->values["makale_title"],

"makale_image"      => $resim_adi,

"makale_desc"      => $form->values["makale_desc"],
"makale_keyw"      => $form->values["makale_keyw"],
"makale_content"      => $form->values["makale_content"]
);
			 
		
		 
		
		if($form->submit()){	

	  $last_id = $model->update($data_array,$id);
	  
	      if($last_id){ 
		  
		    $alert->redirect(SITE_URL."Admin/Makale/Update/".$id);	  
			  
            }else{
              
	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
		$this->load->admin_view("makale_update",$data);
            }
	  
		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
		$this->load->admin_view("makale_update",$data);
			
			}
    	 
    }
	
	
	//delete
		public function Delete(){
		$url = $this->load->helper("Form")->post("id")->isEmpty();
		$model = $this->load->admin_model("Makale_Model");
	 
		
		$sil = $model->delete($url->values["id"]);
		
		if($sil){
		echo "1";	
			}else{
				echo "0";
				}
		
		
		}	  
  
    
}
