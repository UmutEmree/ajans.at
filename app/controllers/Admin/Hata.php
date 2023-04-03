<?php

class Hata extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::checkSession();
    }
    
    public function index(){
        
       	$data["content"]= $_SESSION['hata'];	
		$this->load->admin_view("404",$data);
    }
     
}
