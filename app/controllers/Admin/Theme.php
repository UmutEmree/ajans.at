<?php class Theme extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::checkSession();
    }
    
    
		
    public function index(){
		
		   
		$data["js"]  = array("table");
		##editor##
		$data["jsp"]  = array("theme");
		$data["jsp"][]  = "confirm";
		$data["css"]  = array("table");				
		$data["page_label"] = "Tema Yönetimi";
				
	  $model = $this->load->admin_model("Theme_Model");
	
		$data["content"]= $model->listele();	
        $this->load->admin_view("theme",$data);
    	 
    }
	
	
	
	
	    public function Insert(){
		
		   
		##editor##
		$data["jsp"]  = array("theme");
		$data["css"]  = array("");
		$data["alert"]  = "";				
		$data["page_label"] = "Theme Ekle";
	
        $this->load->admin_view("theme_insert",$data);
    	 
    }
	
	
	
	    public function Insert_Run(){
		
		   
		##editor##
		$data["jsp"]  = array("theme");
		$data["css"]  = array("");
		$data["alert"]  = "";				
		$data["page_label"] = "Tema Ekle";
		
		$model = $this->load->admin_model("Theme_Model");
		 $form = $this->load->helper("Form");
		  $alert = $this->load->helper("General");
		  
		  
         
		 $form ->post("theme_name")->isEmpty("theme_name");

if($form->postresim("resim") != false){
        ///resim yukleme işlemi 
      
      
      $this->load->inc("Upload");
        $yukle = new Upload($_FILES["resim"]);
      $resimsi = $alert->seola($form->values["theme_name"])."_".rand(0,99);
       $resim_adi = $yukle->yukle($resimsi,"public/files/content");
       
      // resim yukleme işlemi end
       }else{
          $resim_adi = "";
         }
$form ->post("theme_folder")->isEmpty("theme_folder");
 



$data_array =  array(

"theme_name"      => $form->values["theme_name"],

"theme_image"      => $resim_adi,

"theme_folder"      => $form->values["theme_folder"]
);
		
		 
		
		if($form->submit()){	

	  $last_id = $model->insert($data_array);
	  
	      if($last_id){ 
		  
			$data["alert"] = $alert->alert("Tema Ekleme İşlemi Başarıyla  Tamamlandı.","success");	  
			$this->load->admin_view("theme_insert",$data); 		  
			  
            }else{
              
	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
		 $this->load->admin_view("theme_insert",$data);
            }
	  
		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
			$this->load->admin_view("theme_insert",$data); 
			
			}
    	 
    }
	
	
	
	    public function Update(){
		
		$id = $this->load->helper("Url")->get_int(3); 
		$model = $this->load->admin_model("Theme_Model");
		$data["content"] = $model->Guncelle_Form($id);
		 
		
		##editor##
		$data["jsp"]  = array("theme");
		$data["css"]  = array("");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Tema Güncelle";
	
        $this->load->admin_view("theme_update",$data);
    	 
    }
	
	
	
		    public function Update_Run(){
				
			$model = $this->load->admin_model("Theme_Model");		
		$id = $this->load->helper("Url")->get_int(3); 
		$data["content"] = $model->Guncelle_Form($id);
		
		 
		
		##editor##
		$data["css"]  = array("");
		$data["jsp"]  = array("theme");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Tema Güncelle";
	 
		 $form = $this->load->helper("Form");
		  $alert = $this->load->helper("General");
		  
		  
        $form ->post("theme_name")->isEmpty("theme_name");

if($form->postresim("resim") != false){
        ///resim yukleme işlemi 
      
      
      $this->load->inc("Upload");
        $yukle = new Upload($_FILES["resim"]);
      $resimsi = $alert->seola($form->values["theme_name"])."_".rand(0,99);
       $resim_adi = $yukle->yukle($resimsi,"public/files/content");
       
      // resim yukleme işlemi end
       }else{
          $resim_adi = "";
         }
$form ->post("theme_folder")->isEmpty("theme_folder");
 



$data_array =  array(

"theme_name"      => $form->values["theme_name"],

"theme_image"      => $resim_adi,

"theme_folder"      => $form->values["theme_folder"],
 
);
			 
		
		 
		
		if($form->submit()){	

	  $last_id = $model->update($data_array,$id);
	  
	      if($last_id){ 
		  
		    $alert->redirect(SITE_URL."Admin/Theme/Update/".$id);	  
			  
            }else{
              
	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
		$this->load->admin_view("theme_update",$data);
            }
	  
		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
		$this->load->admin_view("theme_update",$data);
			
			}
    	 
    }
	
	
	//delete
		public function Delete(){
		$url = $this->load->helper("Form")->post("id")->isEmpty();
		$model = $this->load->admin_model("Theme_Model");
	 
		
		$sil = $model->delete($url->values["id"]);
		
		if($sil){
		echo "1";	
			}else{
				echo "0";
				}
		
		
		}	  
  
    
}
