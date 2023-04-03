<?php

class Hata extends Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
    	if (!isset($_SESSION)) {
            session_start();
           
        }
        echo "<h1>".$_SESSION['hata']."</h1>";
    }
    
}
