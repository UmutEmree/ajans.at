<?php

class Kategori extends Controller{
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $url = $this->load->helper('Url');
        $katurl = $url->get(0);

        $model = $this->load->model('Kategori_Model');

        $kategor_bilgisi = $model->bilgi($katurl);

        if ( $kategor_bilgisi == false ) {
            if (!isset($_SESSION)) {
                session_start();
                $_SESSION['hata'] = 'Hatalı Parametre';
            }
            header('Location:'.SITE_URL.'Hata');


        } else {
            # code...
            $kategori_id = $kategor_bilgisi['Cat_id'];
            $kategori_adi = $kategor_bilgisi['Cat_Name'];
            $kategori_seo_adi = $kategor_bilgisi['Cat_Seo_Name'];

            $data['currentcat']['name'] = $kategori_adi;
            $data['currentcat']['seoname'] = $kategori_seo_adi;
            $data['currentcat']['id'] = $kategori_id;
            $data['currentcat'] = $kategor_bilgisi;
            $data['altkat'] = $model->altkat($kategori_id);
            
            $data['manset'] = $model->Manset($kategori_id);
            $data['homenews'] = $model->Homenews($kategori_id);        
            $data['spotnews'] = $model->Spotnews();

            $data['newcat'] = $model->Newscat();
            $data['rightcat'] = $model->Rightcat();
            $data['rightnews'] = $model->Rightnews(); 
            $data['son'] = $model->Sondak();

            $data['popyasam'] = $model->Pop(61);    

            
            $this->load->view("category",$data);
        }
    }


    
}
