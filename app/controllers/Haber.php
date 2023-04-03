<?php

class Haber extends Controller{
  public function __construct() {
    parent::__construct();
  }

  public function index(){
    $url = $this->load->helper('Url');
    $katurl = $url->get(0);
    $haberurl = $url->get(1);

    $model = $this->load->model('Haber_Model');
        	// kategori bilgisi alınıyor
    $kategor_bilgisi = $model->bilgi($katurl);
        // haber bilgisi alınıyor
    $haber_bilgisi = $model->bilgihaber($haberurl);

    if ( $kategor_bilgisi == false  || $haber_bilgisi == false) {
      if (!isset($_SESSION)) {
        session_start();
        $_SESSION['hata'] = 'Hatalı Parametre';
      }
      header('Location:'.SITE_URL.'Hata');


    } else {


     $data['js'] = array('detay');
     $data['currentcat'] = $kategor_bilgisi;
     $data['currentnews'] = $haber_bilgisi;
           // $data['altkat'] = $model->altkat($kategori_id);

     $data['homenews'] = $model->Homenews($kategor_bilgisi['Cat_id'],$haber_bilgisi['news_id']);  
     $data['benzer'] = $model->Benzer($kategor_bilgisi['Cat_id'],$haber_bilgisi['news_id']); 


     $data['ortak'] = $model->Ortak($kategor_bilgisi['Cat_Main'],$haber_bilgisi['news_id']);      

     /*sabitler*/  

     $data['son'] = $model->Son();
     $data['gundem'] = $model->Catfilternews(57);
     $data['ekonomi'] = $model->Catfilternews(58);
     $data['yasam'] = $model->Catfilternews(61);
     $data['dunya'] = $model->Catfilternews(59);
     $data['spor'] = $model->Catfilternews(60);
     $data['magazin'] = $model->Catfilternews(63);


     $data['spotnews'] = $model->Spotnews();
     $data['populer'] = $model->Populer();

     $data['newcat'] = $model->Newscat(); 
     /*sabitler*/
     $model->Countnews($haber_bilgisi['news_id']); 

     $data['galeri'] = $model->Habergaleri($haber_bilgisi['news_id']);
     $this->load->view("detail",$data);
   }
 }


 



}
