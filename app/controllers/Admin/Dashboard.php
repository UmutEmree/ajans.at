<?php

class Dashboard extends Controller{
  public function __construct() {
    parent::__construct();

        // Oturum Kontrolü
    Session::checkSession();
  }

  public function index(){
    $this->home();
  }

  public function home(){

    global $aylar;
    
    $model = $this->load->admin_model('Dashboard_Model');

      
            if (!isset($_SESSION['gapi'])) {
                # code...
           
    
    $gapi_set = $model->gapi();
    $gapi_mail = $gapi_set['analiticsmail'];
    $gapi_pass = $gapi_set['analiticspass'];
    $gapi_pid = $gapi_set['analiticsprofilid'];
    $this->load->inc('Gapi');

    $analytics = getService($gapi_mail,$gapi_pass);
    $profile = $gapi_pid;
    $results = getResults($analytics,$profile );
    $sehir = getResultsmetric($analytics,$profile,'ga:city');
    $browser = getResultsmetric($analytics,$profile,'ga:browser');
    $os = getResultsmetric($analytics,$profile,'ga:operatingSystem'); 
    $mobilci = getResultsmetric($analytics,$profile,'ga:mobileDeviceModel,ga:mobileDeviceBranding');
    $keywe = getResultsmetric($analytics,$profile,'ga:fullReferrer'); 
    $landingpage = getResultsmetric($analytics,$profile,'ga:landingPagePath');
    
 
    
    for($i=0;$i<count($results["rows"]);$i++) {
      $tekil[] = $results["rows"][$i][2];
      $cogul[]= $results["rows"][$i][1];
      $tarih[] = $results["rows"][$i][0];

    }
    $mobcount = 0;
    foreach ($mobilci['rows'] as  $val) {
      $mobcount += $val[2];
    }

    //session a al

     $_SESSION['gapi']['landingpage']= $landingpage['rows'];
    $_SESSION['gapi']['keywe']= $keywe['rows'];
    $_SESSION['gapi']['mobcount']= $mobcount; 
    $_SESSION['gapi']['mobilci']= $mobilci['rows']; 
    $_SESSION['gapi']['sehir']= $sehir['rows'];
    $_SESSION['gapi']['browser']= $browser['rows'];
    $_SESSION['gapi']['os']= $os['rows'];

    
    $_SESSION['gapi']['teksi'] =$tekil;
    $_SESSION['gapi']['coksu'] =$cogul;
    $_SESSION['gapi']['tarih'] =implode(',',$tarih);
    $_SESSION['gapi']['tek'] = implode(',',$tekil);
    $_SESSION['gapi']['cok'] = implode(',', $cogul);

    //session alma bitti



   } else {
                # code...
            }

    $data['landingpage']= $_SESSION['gapi']['landingpage'];
    $data['keywe']=  $_SESSION['gapi']['keywe'];
    $data['mobcount']= $_SESSION['gapi']['mobcount']; 
    $data['mobilci']= $_SESSION['gapi']['mobilci']; 
    $data['sehir']= $_SESSION['gapi']['sehir'];
    $data['browser']= $_SESSION['gapi']['browser'];
    $data['os']= $_SESSION['gapi']['os'];

    
    $data['teksi'] = $_SESSION['gapi']['teksi'];
    $data['coksu'] = $_SESSION['gapi']['coksu'];
    $data['tarih'] =$_SESSION['gapi']['tarih'];
    $data['tek'] = $_SESSION['gapi']['tek'];
    $data['cok'] = $_SESSION['gapi']['cok'];
    $data['aylar'] =  $aylar;
    $data['js'][] = 'gapi';
    $data['newscount'] = $model->newscount();
    $data['catcount'] = $model->catcount();
    $data['reklamcount'] = $model->reklamcount();




    $this->load->admin_view("home",$data);


  }
  
  
}
