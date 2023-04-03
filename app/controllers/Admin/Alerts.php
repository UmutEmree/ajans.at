<?php class Alerts extends Controller{

    public function __construct() {

        parent::__construct();

        

        // Oturum Kontrolü

        Session::checkSession();

    }

    

    

		

    public function index(){

		

		   

		$data["js"]  = array("table");

		##editor##

		$data["jsp"]  = array("alerts");

		$data["jsp"][]  = "confirm";

		$data["css"]  = array("table");				

		$data["page_label"] = "Alerts Yönetimi";

				

	  $model = $this->load->admin_model("Alerts_Model");

	

		$data["alerts_name"]= $model->listele();	

        $this->load->admin_view("alerts",$data);

    	 

    }

	

	

	

	

	    public function Insert(){

		

		   

		##editor##

		$data["jsp"]  = array("alerts");

		$data["css"]  = array("");

		$data["alert"]  = "";				

		$data["page_label"] = "Alerts Ekle";

	

        $this->load->admin_view("alerts_insert",$data);

    	 

    }

	

	

	

	    public function Insert_Run(){

		

		   

		##editor##

		$data["jsp"]  = array("alerts");

		$data["css"]  = array("");

		$data["alert"]  = "";				

		$data["page_label"] = "Alerts Ekle";

		

		$model = $this->load->admin_model("Alerts_Model");

		 $form = $this->load->helper("Form");

		  $alert = $this->load->helper("General");

		  

		  

         

		 $form ->post("alerts_name")->isEmpty("alerts_name");

$form ->post("alerts_type")->isEmpty("alerts_type");

$form ->post("alerts_durum")->isEmpty("alerts_durum");

$form ->post("alerts_link")->isEmpty("alerts_link");

$form ->post("alerts_not");

$form ->post("alerts_insert_tarih")->isEmpty("alerts_insert_tarih");







$data_array =  array(



"alerts_name"      => $form->values["alerts_name"],

"alerts_type"      => $form->values["alerts_type"],

"alerts_durum"      => $form->values["alerts_durum"],

"alerts_link"      => $form->values["alerts_link"],

"alerts_not"      => $form->values["alerts_not"],

"alerts_insert_tarih"      => $form->values["alerts_insert_tarih"]

);

		

		 

		

		if($form->submit()){	



	  $last_id = $model->insert($data_array);

	  

	      if($last_id){ 

		  

			$data["alert"] = $alert->alert("Alerts Ekleme İşlemi Başarıyla  Tamamlandı.","success");	  

			$this->load->admin_view("alerts_insert",$data); 		  

			  

            }else{

              

	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  

		 $this->load->admin_view("alerts_insert",$data);

            }

	  

		}else{

			

			$hata = $form->errors;

			$data["alert"] = $alert->alerts($hata,"danger");	  

			$this->load->admin_view("alerts_insert",$data); 

			

			}

    	 

    }

	

	

	

	    public function Update(){

		

		$id = $this->load->helper("Url")->get_int(3); 

		$model = $this->load->admin_model("Alerts_Model");

		$data["content"] = $model->Guncelle_Form($id);

		 

		

		##editor##

		$data["jsp"]  = array("alerts");

		$data["css"]  = array("");

		$data["alert"]  = "";

		$data["id"]  = $id;				

		$data["page_label"] = "Alerts Güncelle";

	

        $this->load->admin_view("alerts_update",$data);

    	 

    }

	

	

	

		    public function Update_Run(){

				

			$model = $this->load->admin_model("Alerts_Model");		

		$id = $this->load->helper("Url")->get_int(3); 

		$data["content"] = $model->Guncelle_Form($id);

		

		 

		

		##editor##

		$data["css"]  = array("");

		$data["jsp"]  = array("alerts");

		$data["alert"]  = "";

		$data["id"]  = $id;				

		$data["page_label"] = "Alerts Güncelle";

	 

		 $form = $this->load->helper("Form");

		  $alert = $this->load->helper("General");

		  

		  

        $form ->post("alerts_name")->isEmpty("alerts_name");

$form ->post("alerts_type")->isEmpty("alerts_type");

$form ->post("alerts_durum")->isEmpty("alerts_durum");

$form ->post("alerts_link")->isEmpty("alerts_link");

$form ->post("alerts_not");

$form ->post("alerts_insert_tarih")->isEmpty("alerts_insert_tarih");







$data_array =  array(



"alerts_name"      => $form->values["alerts_name"],

"alerts_type"      => $form->values["alerts_type"],

"alerts_durum"      => $form->values["alerts_durum"],

"alerts_link"      => $form->values["alerts_link"],

"alerts_not"      => $form->values["alerts_not"],

"alerts_insert_tarih"      => $form->values["alerts_insert_tarih"]

);

			 

		

		 

		

		if($form->submit()){	



	  $last_id = $model->update($data_array,$id);

	  

	      if($last_id){ 

		  

		    $alert->redirect(SITE_URL."Admin/Alerts/Update/".$id);	  

			  

            }else{

              

	      $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");	  

		$this->load->admin_view("alerts_update",$data);

            }

	  

		}else{

			

			$hata = $form->errors;

			$data["alert"] = $alert->alerts($hata,"danger");	  

		$this->load->admin_view("alerts_update",$data);

			

			}

    	 

    }

	

	

	//delete

		public function Delete(){

		$url = $this->load->helper("Form")->post("id")->isEmpty();

		$model = $this->load->admin_model("Alerts_Model");

	 

		

		$sil = $model->delete($url->values["id"]);

		

		if($sil){

		echo "1";	

			}else{

				echo "0";

				}

		

		

		}	  





		public function kapat($id)

		{

			$model = $this->load->admin_model("Alerts_Model");

			$durum = $model->update(array('alerts_durum'=>1),$id);

			$sayi = $model->active_count();



			if($durum){

				echo $sayi;

			} else{

				echo '0';

			}

		}

  

    

}

