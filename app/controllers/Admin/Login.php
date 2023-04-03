<?php

            class Login extends Controller{
                public function __construct() {
                    parent::__construct();
                }
                
                public function index(){
                    $this->login();
                }
                
                public function login(){
                    // Oturum Kontrolü
                    Session::init();
                    if(Session::get("Admin_Panel") == true){
                        header("Location: ". SITE_URL ."Admin/Dashboard/home");
                    }
                    $data['alert'] ="";
                    $this->load->tview("login",$data);
                }
                
                public function runLogin(){
                    $data = array($_POST["username"],md5($_POST["pass"]));
                    
                    // Veri tabanı işlemleri
                    $admin_model = $this->load->admin_model("Login_Model");      
                    $result = $admin_model->userControl($data);
                    
                    if($result == false){
                       //echo " // Yanlış bilgiler girildi.";
                      header("Location:". SITE_URL ."Admin/Login/Hata");
                  }else{
                    Session::init();
                    Session::set("Admin_Panel", true);
                    Session::set("Admin_Name", $result["Admin_Name"]);
                    Session::set("Admin_ID", $result["Admin_id"]);
                    
                    header("Location:". SITE_URL ."Admin/Dashboard/home");
                }
            }

            public function logout(){
                Session::init();
                Session::destroy();
                header("Location:". SITE_URL ."Admin/Login");
            }

            public function Hata(){
              
             $data['alert'] = $this->load->helper("General")->alert("Bilgiler Hatalı","danger");
             $this->load->tview("login",$data);
            }




            }
