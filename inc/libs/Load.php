<?php

class Load{
    public function __construct() {
        
    }
    

    public function tview($fileName, $data = false){
         if($data == true){
            extract($data);
        }
       
          
          include "app/views/Admin/" . $fileName . "_hm.php";
           
    }
    public function view($fileName, $data = false){

        global $reklamboyutlari;
 


         $model = $this->admin_model("Theme_Model");
         $theme_model = $model->current_theme();
         $set = $model->SettingsAll();

         foreach ($reklamboyutlari as   $value) {

         $indis = str_replace('x', '', $value);             

          $data['reklam'][$indis] = $model->reklam($value);   
         }
         




         $theme_folder = $theme_model['theme_folder'];
         $theme_patch = SITE_URL."app/views/Front/".$theme_folder;

         $data['theme_patch'] = $theme_patch;
         $data['set'] = $set;


        if($data == true){
            extract($data);
        }

        include "app/views/Front/".$theme_folder.'/' . $fileName . ".php";
    }
	
	  public function admin_view($fileName, $data = false){
         // $modelmz = $this->admin_model("Alerts_Model");
       $data['uyari'] = "";// $modelmz->listele_active();
        if($data == true){
            extract($data);
        }
       
		 include "app/views/Admin/header.php";
		  include "app/views/Admin/" . $fileName . "_hm.php";
		   include "app/views/Admin/footer.php";
  
    }
    
    public function model($fileName){
        include "app/models/" . $fileName . ".php";
        return new $fileName();
    }
	
     public function admin_model($fileName){
        include "app/models/Admin/" . $fileName . ".php";
        return new $fileName();
    }
    
    public function helper($fileName){
        include "app/helper/" . $fileName . ".php";
        return new $fileName();
    }
	
	 public function inc($fileName){
        include "app/helper/" . $fileName . ".php";
       
    }
}
