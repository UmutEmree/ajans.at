<?php

class Page extends Controller{
  public function __construct() {
    parent::__construct();
  }

 public function index($value='')
 {
       header('Location:'.SITE_URL.'Page/Detay/1');
 }
  public function Detay()
  {
    $id = $this->load->helper('Url')->get(2);


    $model = $this->load->model('Page_Model');


    $data['manset'] = $model->Manset();

    


    
    $modelana = $this->load->model('Index_Model');

    $data['pg'] = $model->sayfa($id);



 
 
    $data['newcat'] = $modelana->Newscat();
 
 
    $this->load->view("page",$data);


  }

  


}
