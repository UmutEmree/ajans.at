<?php

class Content extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::checkSession();
    }
    
    public function index(){
        $this->home();
    }
    
	
		// home fonksiyonu işlemleri
		// Content tum içeriği
		// select eder
		// contents_hm.php dosyasını load eder
		
    public function home(){
		
		   
		$data["js"]  = array("form","table");
		$data["jsp"]  = array("content","confirm");

		$data["css"]  = array("form","table");				
		$data["page_label"] = "İçerik Yönetimi";
				
	  $model = $this->load->admin_model("Content_Model");
	
		$data["content"]= $model->listele();	
        $this->load->admin_view("contents",$data);
    	 
    }
	
	
	
	
	    public function Insert(){
		
		   
		$data["js"]  = array("form","table","editor");
		$data["jsp"]  = array("content");
		$data["css"]  = array("form","table");
		$data["alert"]  = "";				
		$data["page_label"] = "İçerik Ekle";
	
        $this->load->admin_view("cont_insert",$data);
    	 
    }
	
	
	
	    public function Insert_Run(){
		
		   
		$data["js"]  = array("form","table","editor");
		$data["jsp"]  = array("content");
		$data["css"]  = array("form","table");
		$data["alert"]  = "";				
		$data["page_label"] = "İçerik Ekle";
		
		$model = $this->load->admin_model("Content_Model");
		 $form = $this->load->helper('Form');
		  $alert = $this->load->helper('General');
		  
		  
        $form   ->post('Content_Name')->isEmpty("Başlık");
       
		$form   ->post('Content_Type')->isEmpty("İçerik Türü");
		$form   ->post('Content_Meta_Desc');
		$form   ->post('Content_Keyw');
		$form   ->post('Content_Details')->isEmpty("Detay");
		
		
		 $data_array =  array(
	  						"Content_Name"			=> $form->values['Content_Name'],
							"Content_Type"				=> $form->values['Content_Type'],
							"Content_Meta_Desc"		=> $form->values['Content_Meta_Desc'],
							"Content_Keyw"			=> $form->values['Content_Keyw'],
							"Content_Details"			=> $form->values['Content_Details']
	  						);
			 
		
		 
		
		if($form->submit()){	

	  $last_id = $model->content_insert($data_array);
	  
	      if($last_id){ 
		  
			$data["alert"] = $alert->alert("İçerik Ekleme İşlemi Başarıyla  Tamamlandı.","success");	  
			$this->load->admin_view("cont_insert",$data); 		  
			  
            }else{
              
	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
		 $this->load->admin_view("cont_insert",$data);
            }
	  
		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
			$this->load->admin_view("cont_insert",$data); 
			
			}
    	 
    }
	
	
	
	    public function Update(){
		
		$url = $this->load->helper('Url')->get_int(3); 
		$model = $this->load->admin_model("Content_Model");
		$data["content"] = $model->Guncelle_Form($url);
		 
		
		$data["js"]  = array("form","table", "content","editor");
		$data["css"]  = array("form","table");
		$data["alert"]  = "";				
		$data["page_label"] = "İçerik Güncelle";
	
        $this->load->admin_view("cont_update",$data);
    	 
    }
	
	
	
		    public function Update_Run(){
				
			$model = $this->load->admin_model("Content_Model");		
		$url = $this->load->helper('Url')->get_int(3); 
		$data["content"] = $model->Guncelle_Form($url);
		
		 
		
		$data["js"]  = array("form","table", "content","editor");
		$data["css"]  = array("form","table");
		$data["alert"]  = "";				
		$data["page_label"] = "İçerik Güncelle";
	 
		 $form = $this->load->helper('Form');
		  $alert = $this->load->helper('General');
		  
		  
        $form   ->post('Content_Name')->isEmpty("Başlık");
       
		$form   ->post('Content_Type')->isEmpty("İçerik Türü");
		$form   ->post('Content_Meta_Desc');
		$form   ->post('Content_Keyw');
		$form   ->post('Content_Details')->isEmpty("Detay");
		$form   ->post('Content_id')->isEmpty("Sistem ID");
		
		
		 $data_array =  array(
	  						"Content_Name"			=> $form->values['Content_Name'],
							"Content_Type"				=> $form->values['Content_Type'],
							"Content_Meta_Desc"		=> $form->values['Content_Meta_Desc'],
							"Content_Keyw"			=> $form->values['Content_Keyw'],
							"Content_Details"			=> $form->values['Content_Details']
	  						);
			 
		
		 
		
		if($form->submit()){	

	  $last_id = $model->content_update($data_array,$form->values['Content_id']);
	  
	      if($last_id){ 
		  
		    $alert->redirect(SITE_URL."Admin/Content/Update/".$form->values['Content_id']);	  
			  
            }else{
              
	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
		$this->load->admin_view("cont_update",$data);
            }
	  
		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
		$this->load->admin_view("cont_update",$data);
			
			}
    	 
    }
	
	
	//delete
		public function Delete(){
		$url = $this->load->helper('Form')->post('id')->isEmpty();
		$model = $this->load->admin_model("Content_Model");
	 
		
		$sil = $model->delete($url->values['id']);
		
		if($sil){
		echo "1";	
			}else{
				echo "0";
				}
		
		
		}	  
  
    
}
