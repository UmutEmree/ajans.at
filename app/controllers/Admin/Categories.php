<?php

class Categories extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::checkSession();
    }
    
    public function index(){
        $this->home();
    }
    
	
	// home fonksiyonu işlemleri
	//---kategorileri listeleme
	//---kategorileri listeleme
	
	
    public function home(){

    	//haber konumları
			$data["Kategori_Konumlari"] = array(
				"Cat_home" => 'Anasayfa',
				"Cat_rigth" => "Sağ Slider",
				'Cat_top'=>'Üst Menü'); 
			//haber konumları end
    
		$data["js"]  = array("form","table");
		$data["jsp"]  =  array("category","confirm");
		$data["css"]  = array("form","table");
		
				
		$data["page_label"] = "Kategori Yönetimi";
				
		$all_cat_model = $this->load->admin_model("Category_Model");
		
		
		$all_cat = $all_cat_model->allcategories();
		
		
		$selectboxfills = $all_cat_model->selectboxfill();			
		$data["cat"] = $all_cat;
		$data["slct"] = $selectboxfills;
			
        $this->load->admin_view("category",$data);
    
        
    }
	
		// HizliEkle fonksiyonu işlemleri
		// Cat_Name  Cat_Main Cat_Page_Title Cat_Meta_Desc Cat_Meta_Keyw
		// parametrelerini eklemek için form sayfasını getirir
		// formda q_insert fonksiyonunu çalıstırır
		
	  public function HizliEkle(){
		  
		$data["css"][] = "form";
		$data["page_label"] = "Hızlı Kategori Ekleme Formu";
		$data["js"][] = "form";
		$data["js"][] = "cat";
		
		$all_cat_model = $this->load->admin_model("Category_Model");	
		$selectboxfills = $all_cat_model->selectboxfill();	
		$data["slct"] = $selectboxfills;
	    $data["alert"] = "";
		  
		  $this->load->admin_view("quick_cat_insert",$data);
		  }
		  
		  
		// q_insert fonksiyonu işlemleri
		// Cat_Name  Cat_Main Cat_Page_Title Cat_Meta_Desc Cat_Meta_Keyw
		// Ekler
		// quick_cat_insert_hm.php dosyasını load eder
		
		
	public function q_insert(){
		$all_cat_model = $this->load->admin_model("Category_Model");
		$form = $this->load->helper('Form');
		$alert = $this->load->helper('General');
		
		
 		$data["css"][] = "form";
		$data["page_label"] = "Hızlı Kategori Ekleme Formu";
		$data["js"][] = "form";
		$data["js"][] = "cat";
			
		$data["slct"] = $all_cat_model->selectboxfill();	    		
		
		$form   ->post('Cat_Name')->isEmpty("Kategori Adı");
        $form   ->post('Cat_Main');
		$form   ->post('Cat_Page_Title')->isEmpty("Title");
		$form   ->post('Cat_Meta_Desc')->isEmpty("Description");
		$form   ->post('Cat_Meta_Keyw')->isEmpty("Keywords");

		$cat_seo_name = $alert->seola($form->values['Cat_Name']);
		 $seo_name_varmi = $all_cat_model->seoname($cat_seo_name);

			if ($seo_name_varmi == 0) {
				$seo_namesi = $cat_seo_name;
			} else {
				$seo_namesi = $cat_seo_name."_".rand(0,99);
			}
			 
	  
	  $data_array =  array(
	  						"Cat_Name"				=> $form->values['Cat_Name'],
	  						"Cat_Seo_Name"          => ucwords($seo_namesi),
							"Cat_Main"				=> $form->values['Cat_Main'],
							"Cat_Page_Title"		=> $form->values['Cat_Page_Title'],
							"Cat_Meta_Desc"			=> $form->values['Cat_Meta_Desc'],
							"Cat_Meta_Keyw"			=> $form->values['Cat_Meta_Keyw']
	  						);
							
		if($form->submit()){	

	  $q_last_id = $all_cat_model->q_insertdb($data_array);
	  
	      if($q_last_id){ 
		  
			$data["alert"] = $alert->alert("Kategori Ekleme İşlemi Başarıyla  Tamamlandı.","success");	  
			$this->load->admin_view("quick_cat_insert",$data);  		  
			  
            }else{
              
	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  
		  $this->load->admin_view("quick_cat_insert",$data); 
            }
	  
		}else{
			
			$hata = $form->errors;
			$data["alert"] = $alert->alerts($hata,"danger");	  
			$this->load->admin_view("quick_cat_insert",$data); 
			
			}
		 
		  }
		  
		// q_update fonksiyonu işlemleri
		// Kategori listesindeki hızlı guncelleme için ajax ile tetiklenen metoddur
		// metod çalısıp sonucu yazdırır 
		  
		  
		  
	public function q_update(){
			 
	  $form = $this->load->helper('Form');
        
        $form   ->post('id')->isEmpty()->isInt();
        $form   ->post('ne')->isEmpty();
		$form   ->post('valu')->isEmpty(); 
		$devam = 1;
		if($form->values['valu'] == $form->values['id'] ){
			echo "Bir Kategori Kendini Main olarak Seçemez. Lütfen Başka Bir Üst Kategori Seçiniz";
			$devam = 0;
			}     
                
      if($form->submit() && $devam == 1){
            $data = array(
                $form->values['ne'] => $form->values['valu']
				      );            
            $model = $this->load->admin_model("Category_Model");
            $result = $model->q_updatedb($data,$form->values['id']);
            if($result){
                echo "Güncelleme Başarılı";
            }else{
                echo "Bir Hata Oldu Yeniden Deneyiniz";
            }
        }else{
            $form->errors;
            
           foreach($form->errors as $hata){
			   foreach($hata as $h){
				   echo $h."<br>";
				   }
			   }
        }
		
		 
		 
		  }
		
		
	// Delete fonksiyonu işlemleri
	// Kategori listesinde silme işlemi metodudur.
	// Henüz ürünleri silme işlemini yapmadım
		  
	public function Delete(){
		$url = $this->load->helper('Form')->post('id')->isEmpty();
		$model = $this->load->admin_model("Category_Model");
		$resimvarmi = $model->is_image($url->values['id']);
		if($resimvarmi != false){
			@unlink('public/files/kategori/'.$resimvarmi);
			}
		
		$sil = $model->delete($url->values['id']);
		
		if($sil){
		echo "1";	
			}else{
				echo "0";
				}
		
		
		}	  
	
	
	
	
	  public function Cat_insert(){
		  
		$data["css"] = array("form");
		$data["page_label"] = "Kategori Ekleme Formu";
		$data["js"]= array("form","cat","editor");
		 
		
		$all_cat_model = $this->load->admin_model("Category_Model");	
		$selectboxfills = $all_cat_model->selectboxfill();	
		$data["slct"] = $selectboxfills;
	    $data["alert"] = "";
		  
		  $this->load->admin_view("cat_insert",$data);
		  }	  
		  
		  
		  
 	  public function Cat_insert_Run(){
		  
		$data["css"] = array("form");
		$data["page_label"] = "Kategori Ekleme Formu";
		$data["js"]= array("form","cat","editor");
		 
		
		$all_cat_model = $this->load->admin_model("Category_Model");	
		$selectboxfills = $all_cat_model->selectboxfill();	
		$data["slct"] = $selectboxfills;
	    $data["alert"] = "";
		
	
		
    	$general = $this->load->helper('General');
		$form = $this->load->helper('Form');
		$form   ->post('Cat_Name')->isEmpty("Kategori Adı");
        $form   ->post('Cat_Main');
		$form   ->post('Cat_Page_Title')->isEmpty("Title");
		$form   ->post('Cat_Meta_Desc')->isEmpty("Description");
		$form   ->post('Cat_Meta_Keyw')->isEmpty("Keywords");
		$form   ->post('Cat_Content');
		 
		 if($form->postresim("resim") != false){
			  ///resim yukleme işlemi 
		  
		  
			$this->load->inc("Upload");
		  	$yukle = new Upload($_FILES["resim"]);
			$resimsi = $general->seola($form->values['Cat_Name'])."_".rand(0,99);
			 $resim_adi = $yukle->yukle($resimsi,"public/files/kategori");
			 
		  // resim yukleme işlemi end
			 }else{
				  $resim_adi = "";
				 }


		 $cat_seo_name = $general->seola($form->values['Cat_Name']);
		 $seo_name_varmi = $all_cat_model->seoname($cat_seo_name);

			if ($seo_name_varmi == 0) {
				$seo_namesi = $cat_seo_name;
			} else {
				$seo_namesi = $cat_seo_name."_".rand(0,99);
			}
			 
	  
	  $data_array =  array(
	  						"Cat_Name"				=> $form->values['Cat_Name'],
	  						"Cat_Seo_Name"          => ucwords($seo_namesi),
							"Cat_Main"				=> $form->values['Cat_Main'],
							"Cat_Page_Title"		=> $form->values['Cat_Page_Title'],
							"Cat_Meta_Desc"			=> $form->values['Cat_Meta_Desc'],
							"Cat_Meta_Keyw"			=> $form->values['Cat_Meta_Keyw'],
							"Cat_Content"			=> $form->values['Cat_Content'],
							"Cat_image"			    => $resim_adi
	  						);
							
		if($form->submit()){	

	  $q_last_id = $all_cat_model->cat_insertdb($data_array);
	  
	      if($q_last_id){ 
		  
		  
			$data["alert"] = $general->alert("Kategori Ekleme İşlemi Başarıyla  Tamamlandı.","success");	  
			
		$this->load->admin_view("cat_insert",$data); 		  
			  
            }else{
              
	      $data["alert"] = $general->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");		  
		  $this->load->admin_view("cat_insert",$data); 
            }
	  
		}else{
			
			$hata = $form->errors;
			$data["alert"] = $general->alerts($hata,"danger");	  
			$this->load->admin_view("cat_insert",$data); 
			
			}
		  
		  
		  
		  }	

  public function siraupdate()
  {
  	$id = $_POST['id'];
  	$sira = trim($_POST['val']);

  	$data_array = array('Cat_Row'=>$sira );
  	$model = $this->load->admin_model("Category_Model");
            $result = $model->q_updatedb($data_array,$id);
            if($result){
                echo "Güncelleme Başarılı";
            }else{
                echo "Bir Hata Oldu Yeniden Deneyiniz";
            }
  }


  public function list_update()
		{
			$model = $this->load->admin_model("Category_Model");		
			$id = $this->load->helper("Url")->get_int(3); 
			$label = $_POST['label'];
			$val = $_POST['val'];

			$data_array = array($label =>$val  );

			$last_id = $model->q_updatedb($data_array,$id);

			if ($last_id) {
				echo 'Güncelleme İşlemi Başarılı';
			} else {
				echo 'Bir hata oldu Yeniden deneyiniz';
			}
			
		}
// class end    
}
