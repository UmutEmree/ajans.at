<?php

class Bootstrap{

    public $route;
    public $routeadmin;
    
    
    public $Controller_Name = 'Index';

    public $Method_Name = 'index';
    

    public $Controller_Path = 'app/controllers/';

    public $Controller_AdminPath = 'app/controllers/Admin/';
    

    public $Controller;
    

    public function __construct() {
        $this->getUrl();
        $this->loadController();        
        $this->callMethod();
    }
    

    public function getUrl(){
        $this->route = isset($_GET["url"]) ? $_GET["url"] : null;
        $this->routeadmin = isset($_GET["url"]) ? $_GET["url"] : null;
        if($this->route != null){
            $this->route = rtrim($this->route, "/");
            $this->routeadmin = rtrim($this->routeadmin, "/");
            $this->route = explode("/", $this->route);
            $this->routeadmin = explode("/", $this->routeadmin);

			//$linkler = $this->route;
            if($this->routeadmin[0] == "Admin" || $this->routeadmin[0] == 'admin'){
                unset($this->route[0]);
                $this->route = array_values($this->route);
                if(count($this->routeadmin) == 1){
                    header("Location: ". SITE_URL ."Admin/Login/index/".time());
                }

			//	print_r($this->route);
            }

        }else{
         unset($this->route);
         unset($this->routeadmin); 
     }
 }


 public function hata($mesaj = ''){

    if (!isset($_SESSION)) {
        session_start();
        $_SESSION['hata'] = $mesaj;
    }
    if($this->routeadmin[0] == "Admin" || $this->routeadmin[0] == "admin"){
       header ('Location:'.SITE_URL.'Admin/Hata');
   }else{
      header ('Location:'.SITE_URL.'Hata');
  }

}


public function loadController(){

    //hiç rota tanımlı değilse
    if (!isset($this->route[0])) {
        include  $this->Controller_Path . $this->Controller_Name.'.php';
        $this->Controller = new $this->Controller_Name();



    }
        //rotalar varsa

    else {
        $this->Controller_Name = $this->route[0];

            //ADMİN KONTROLU


        if($this->routeadmin[0] == "Admin" || $this->routeadmin[0] == "admin"   ){
            $fileName = $this->Controller_AdminPath . $this->Controller_Name . ".php";


        }else{
            $fileName = $this->Controller_Path . $this->Controller_Name . ".php";

        }
            //ADMİN kONTROLU END



           //dosya kontrolu
        if(file_exists($fileName)){
            include $fileName;                
                //class controlu
            if(class_exists($this->Controller_Name)){
                $this->Controller = new $this->Controller_Name();
            }else{$this->Hata('Zaten Böyle bir class tanımlı');}
                //class controlu end
        }
            //dosya kontrolu end

            //dosya yoksa
        else{

                //dosya yok ama rota 0 tanımlı rota 1 tanımsız
            if (!isset($this->route[1]) && isset($this->route[0])) {
                $this->Controller_Name = "Kategori";

                $fileName = $this->Controller_Path . $this->Controller_Name . ".php";
                include $fileName;
                $this->Controller = new $this->Controller_Name();
            } 
                //dosya yok ama rota 0 tanımlı rota 1 tanımsız end

            //dosya yok ama rota 0 tanımlı rota 1 tanımlı rota 2 tanımsız
            elseif(isset($this->route[1]) && isset($this->route[0]) && !isset($this->route[2])) {
               $this->Controller_Name = "Haber";

               $fileName = $fileName = $this->Controller_Path . $this->Controller_Name . ".php";
               include $fileName;
               $this->Controller = new $this->Controller_Name();
               unset($this->route);
               $this->route[0] ="Haber";
               $this->route[1] = "index";
               

            //  print_r($this->routeadmin);


                

           }
            //dosya yok ama rota 0 tanımlı rota 1 tanımlı rota 2 tanımsız
            //bunların dısında
           else{   $this->hata('Controller Adı hatalı'); }
       } 
            //dosya yoksa end



   }
   // rotalar var end

//loadController end
}






public function callMethod(){
   if(isset($this->route[2])){
    $this->Method_Name = $this->route[1];
    if(method_exists($this->Controller, $this->Method_Name)){
        $this->Controller->{$this->Method_Name}($this->route[2]);
    }else{
       
             $this->hata('metod bulunamadı');
         
   }
}else{
    if(isset($this->route[1])){
        $this->Method_Name = $this->route[1];

        if(method_exists($this->Controller, $this->Method_Name)){
            $this->Controller->{$this->Method_Name}();
        }else{
            $this->hata();
        }
    }else{
        if(method_exists($this->Controller, $this->Method_Name)){
            $this->Controller->{$this->Method_Name}();
        }else{
           $this->hata();
       }
   }
}
}
}
