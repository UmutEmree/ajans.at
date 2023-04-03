<?php

class YazarPanel extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::checkSession('Yazar_Panel','Admin/YazarLogin/');
    }
    
    public function index(){
        $this->home();
    }
    
    public function home(){
     $semasi = $this->load->admin_model("Category_Model");

		 $data['sema'] = $semasi->sem('categories');  
		 $data['tablo'] = $semasi->tables();
		  	$data["css"][] = "form";
		$data["css"][] = "table";
		$data["js"][] = "form";
		$data["js"][] = "table";
		$data["js"][] = "cat";
        $this->load->admin_view("home",$data);
    
        
    }


    public function Profil(){
        
        $id =  $_SESSION['yazarlar_id'];
        $model = $this->load->admin_model("Yazarlar_Model");
        $data["content"] = $model->Guncelle_Form($id);

        
        ##editor##
        $data["jsp"]  = array("yazarlar");
        $data["css"]  = array("");
        $data["alert"]  = "";
        $data["id"]  = $id;             
        $data["page_label"] = "Köşe Yazarı Güncelle";

        $this->load->admin_view("kose_yazarlar_update",$data);

    }



    public function Update_Run(){
        global $yazarboyutlar;

        $model = $this->load->admin_model("Yazarlar_Model");        
        $id = $_SESSION['yazarlar_id'];
        $data["content"] = $model->Guncelle_Form($id);
        

        
        ##editor##
        $data["css"]  = array("");
        $data["jsp"]  = array("yazarlar");
        $data["alert"]  = "";
        $data["id"]  = $id;             
        $data["page_label"] = "Profil";

        $form = $this->load->helper("Form");
        $alert = $this->load->helper("General");


        $form ->post("yazar_name")->isEmpty("İsim");
        $form ->post("yazar_mail")->isEmpty("Eposta");
        $form ->post("yazar_sifre")->isEmpty("Şifre");
        $form ->post("oldresim");

        if($form->postresim("resim") != false){
        ///resim yukleme işlemi 


            $this->load->inc("Upload");
            $yukle = new Upload($_FILES["resim"]);
            $resimsi = $alert->seola($form->values["yazar_name"])."_".rand(0,99);
            $resim_adi =  $yukle->yukle_th($resimsi,"public/files/yazarlar",true,$yazarboyutlar);

      // resim yukleme işlemi end
        }else{
            $resim_adi = $form->values["oldresim"];
        }
         



        $data_array =  array(

            "yazar_name"      => $form->values["yazar_name"],
            "yazar_mail"      => $form->values["yazar_mail"],
            "yazar_sifre"      => $form->values["yazar_sifre"],

            "yazar_resim"      => $resim_adi
            );

        

        
        if($form->submit()){    

            $last_id = $model->update($data_array,$id);

            if($last_id){ 

                $alert->redirect(SITE_URL."Admin/YazarPanel/Profil/");      

            }else{

                $data["alert"] = $alert->alert("Bir hata Oluştu. Yeniden Deneyiniz.","danger");   
                $this->load->admin_view("kose_yazarlar_update",$data);
            }

        }else{
            
            $hata = $form->errors;
            $data["alert"] = $alert->alerts($hata,"danger");      
            $this->load->admin_view("kose_yazarlar_update",$data);
            
        }

    }
    
  
    
}
