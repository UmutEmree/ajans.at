<?php

class Yazarlogin extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->login();
    }
    
    public function login(){
        // Oturum Kontrolü
        Session::init();
        if(Session::get("Yazar_Panel") == true){
            header("Location: ". SITE_URL ."Admin/YazarPanel/home");
        }
        $data['alert'] ="";
        $this->load->tview("yazarlogin",$data);
    }
    
    public function runLogin(){
        $data = array($_POST["username"],$_POST["pass"]);
        
        // Veri tabanı işlemleri
        $admin_model = $this->load->admin_model("Yazarlogin_Model");      
        $result = $admin_model->userControl($data);
        
        if($result == false){
           //echo " // Yanlış bilgiler girildi.";
          header("Location:". SITE_URL ."Admin/Yazarlogin/Hata");
        }else{
            Session::init();
            Session::set("Yazar_Panel", true);
            Session::set("yazar_name", $result["yazar_name"]);
            Session::set("yazarlar_id", $result["yazarlar_id"]);
        
            header("Location:". SITE_URL ."Admin/YazarPanel/home");
        }
    }
    
    public function logout(){
        Session::init();
        Session::destroy();
        header("Location:". SITE_URL ."Admin/Yazarlogin");
    }
    
     public function Hata(){
      
         $data['alert'] = $this->load->helper("General")->alert("Bilgiler Hatalı","danger");
        $this->load->tview("Yazarlogin",$data);
    }
    
    
    
    
}
