<?php class Pages extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::checkSession();
    }
    
    
		
    public function index(){
		
		   
		$data["js"]  = array("table");
		$data["js"][]  = "editor";
		$data["jsp"]  = array("pages");
		$data["jsp"][]  = "confirm";
		$data["css"]  = array("table");				
		$data["page_label"] = "Pages Yönetimi";
				
	  $model = $this->load->admin_model("Pages_Model");
	
		$data["content"]= $model->listele();	
        $this->load->admin_view("pages",$data);
    	 
    }
	
	
	
	
	    public function Insert(){
		
		   
		$data["js"][]  = "editor";
		$data["jsp"]  = array("pages");
		$data["css"]  = array("");
		$data["alert"]  = "";				
		$data["page_label"] = "Pages Ekle";
	
        $this->load->admin_view("pages_insert",$data);
    	 
    }
	
	
	
	    public function Insert_Run(){
		
		   
		$data["js"][]  = "editor";
		$data["jsp"]  = array("pages");
		$data["css"]  = array("");
		$data["alert"]  = "";				
		$data["page_label"] = "Pages Ekle";
		
		$model = $this->load->admin_model("Pages_Model");
		 $form = $this->load->helper("Form");
		  $alert = $this->load->helper("General");
		  
		  
         
		 $form ->post("pages_name")->isEmpty("Başlık");
$form ->post("pages_content")->isEmpty("İçerik");

if($form->postresim("resim") != false){
        ///resim yukleme işlemi 
      
      
      $this->load->inc("Upload");
        $yukle = new Upload($_FILES["resim"]);
      $resimsi = $alert->seola($form->values["pages_name"])."_".rand(0,99);
       $resim_adi = $yukle->yukle($resimsi,"public/files/content");
       
      // resim yukleme işlemi end
       }else{
          $resim_adi = "";
         }



$data_array =  array(

"pages_name"      => $form->values["pages_name"],
"pages_content"      => $form->values["pages_content"],

"pages_insert_tarih"      => $resim_adi
);
		
		 
		
		if($form->submit()){	

	  $last_id = $model->insert($data_array);
	  
	      if($last_id){ 
		  
			$data["alert"] = $alert->alert("Pages Ekleme İşlemi Başarıyla  Tamamlandı.","success");	  
			$this->load->admin_view("pages_insert",$data); 		  
			  
            }else{
              
	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
		 $this->load->admin_view("pages_insert",$data);
            }
	  
		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
			$this->load->admin_view("pages_insert",$data); 
			
			}
    	 
    }
	
	
	
	    public function Update(){
		
		$id = $this->load->helper("Url")->get_int(3); 
		$model = $this->load->admin_model("Pages_Model");
		$data["content"] = $model->Guncelle_Form($id);
		 
		
		$data["js"][]  = "editor";
		$data["jsp"]  = array("pages");
		$data["css"]  = array("");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Pages Güncelle";
	
        $this->load->admin_view("pages_update",$data);
    	 
    }
	
	
	
		    public function Update_Run(){
				
			$model = $this->load->admin_model("Pages_Model");		
		$id = $this->load->helper("Url")->get_int(3); 
		$data["content"] = $model->Guncelle_Form($id);
		
		 
		
		$data["js"][]  = "editor";
		$data["css"]  = array("");
		$data["jsp"]  = array("pages");
		$data["alert"]  = "";
		$data["id"]  = $id;				
		$data["page_label"] = "Pages Güncelle";
	 
		 $form = $this->load->helper("Form");
		  $alert = $this->load->helper("General");
		  
		  
        $form ->post("pages_name")->isEmpty("Başlık");
$form ->post("pages_content")->isEmpty("İçerik");

if($form->postresim("resim") != false){
        ///resim yukleme işlemi 
      
      
      $this->load->inc("Upload");
        $yukle = new Upload($_FILES["resim"]);
      $resimsi = $alert->seola($form->values["pages_name"])."_".rand(0,99);
       $resim_adi = $yukle->yukle($resimsi,"public/files/content");
       
      // resim yukleme işlemi end
       }else{
          $resim_adi = "";
         }



$data_array =  array(

"pages_name"      => $form->values["pages_name"],
"pages_content"      => $form->values["pages_content"],

"pages_insert_tarih"      => $resim_adi
);
			 
		
		 
		
		if($form->submit()){	

	  $last_id = $model->update($data_array,$id);
	  
	      if($last_id){ 
		  
		    $alert->redirect(SITE_URL."Admin/Pages/Update/".$id);	  
			  
            }else{
              
	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
		$this->load->admin_view("pages_update",$data);
            }
	  
		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
		$this->load->admin_view("pages_update",$data);
			
			}
    	 
    }
	
	
	//delete
		public function Delete(){
		$url = $this->load->helper("Form")->post("id")->isEmpty();
		$model = $this->load->admin_model("Pages_Model");
	 
		
		$sil = $model->delete($url->values["id"]);
		
		if($sil){
		echo "1";	
			}else{
				echo "0";
				}
		
		
		}	



		public function list_update()
		{
			$model = $this->load->admin_model("Pages_Model");		
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
