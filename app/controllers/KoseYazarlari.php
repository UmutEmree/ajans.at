<?php

class KoseYazarlari extends Controller{
  public function __construct() {
    parent::__construct();
  }

  public function index(){
    $model = $this->load->model('Koseyazarlari_Model');
    $modelana = $this->load->model('Index_Model');
    $data['yazarlar'] = $model->listele();


    $data['spotnews'] = $modelana->Spotnews();
    $data['koseyazarlari'] = $modelana->Koseyazarlarim();
    $this->load->view("index",$data);

  }

  public function Detay($id)
  {

    $model = $this->load->model('Koseyazarlari_Model');
    $modelana = $this->load->model('Index_Model');
    $data['yazar'] = $model->yazarbilgi($id);
     $data['spotnews'] = $modelana->Spotnews();
    $data['koseyazarlari'] = $modelana->Koseyazarlarim();
    $data['newcat'] = $modelana->Newscat();
    $data['rightcat'] = $modelana->Rightcat();
    $data['rightnews'] = $modelana->Rightnews(); 

    $data['sporhaberleri'] = $modelana->Catfilternews(52);
    $data['gundemhaberleri'] = $modelana->Catfilternews(50);   
    $this->load->view("koseyazari",$data);


  }

  public function KoseYazisi($id)
  {

    $model = $this->load->model('Koseyazarlari_Model');
    $modelana = $this->load->model('Index_Model');
    $data['yazilar'] = $model->yazi($id);
    
     $data['spotnews'] = $modelana->Spotnews();
    $data['koseyazarlari'] = $modelana->Koseyazarlarim();
    $data['newcat'] = $modelana->Newscat();
    $data['rightcat'] = $modelana->Rightcat();
    $data['rightnews'] = $modelana->Rightnews(); 

    $data['sporhaberleri'] = $modelana->Catfilternews(52);
    $data['gundemhaberleri'] = $modelana->Catfilternews(50);   
    $this->load->view("yazi",$data);


  }



}
