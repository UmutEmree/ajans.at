<?php

class Index extends Controller{
  public function __construct() {
    parent::__construct();
  }

  public function index(){
    $this->anasayfa();
  }
  public function anasayfa(){
    $model = $this->load->model('Index_Model');

    $data['populer'] = $model->Populer();
    $data['spot'] = $model->Spot();     
    $data['son'] = $model->Son();   
    $data['newcat'] = $model->Newscat();   
    $data['latest'] = $model->latest();
    $data['home'] = $model->Homenews();
    $data['son'] = $model->Sondak();


           /*
      echo "<pre>";
      print_r($data['newcat']);
      die();
      */
      
      $data['sporhaberleri'] = $model->Catfilternews(52);
      $data['gundemhaberleri'] = $model->Catfilternews(50);   
      $data['ekonomi'] = $model->Eko(58);   
      $data['gundem'] = $model->Catfilternews(57);  
      $data['dunya'] = $model->Catfilternews(59); 
      $data['yasam'] = $model->Catfilternews(61);  
      $data['spor'] = $model->Spor(60);  
      $data['album'] = $model->Eko(64); 
      $data['albumb'] = $model->Eko(64);
      $data['magazin'] = $model->Spor(63);
      $data['magpop'] = $model->Mag(63);
      $data['sporpop'] = $model->Mag(60);
      

      $this->load->view("index",$data);
    }




  }
