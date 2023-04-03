<?php

class Galeri extends Controller{
  public function __construct() {
    parent::__construct();
  }

  public function index(){


    echo  "empty";



    
  }



  public function galeriresim()
  {


    $resimid = intval($_POST['id']);
    $sira = $_POST['sira'];
    $next = $sira-1+2;
    $prev = $sira -1;

 $nextcss = '';
  $prevcss = '';

    if ($sira <=1) {
      $prev = 1;
       $prevcss = 'style="display:none;"';
    }

 if ($sira ==$_POST['sonsira']) {
      $next = $_POST['sonsira'];

      $nextcss = 'style="display:none;"';
    }





    $model = $this->load->model('Haber_Model');

    $resimsi = $model->galeridetay($resimid);

 

    $html ='<input type="hidden" value="'.$resimsi['news_gallery_id'].'" data-id="'.$next.'" id="cuid">';
    $html .= '<div id="right_go" class="go" data-id="'.$next.'" '.$nextcss.'><i class="ion-chevron-right"></i> </div>';
    $html .= '<div id="left_go" class="go" data-id="'.$prev.'" '.$prevcss.'><i class="ion-chevron-left"></i></div>';
    $html .='<div class="captiongallery">';
    $html .='<h5>'.$resimsi['news_gallery_name'].'</h5>';
    $html .=' <p>'.$resimsi['news_gallery_content'].'</p></div>';
    $html .= '<img src="';
    $html .= SITE_UPLOAD_DIR.'gallery/780x450_'.$resimsi['news_gallery_image'].'"';
    $html .= ' class="img-responsive" alt="Image">'; 
    $html .= "<script>$('.go').click(function() {

  var sira = $(this).data('id');

  window.location.href='#'+sira;

  navci();

  gitme();

  linkayarla();

 

 });

 



</script>";

    echo $html;


  }


}
