          <?php

          class General{
            public $html;

            public function __construct() {}

            public function alert($alert,$tip="danger"){
              $this->html = '<div class="alert alert-'.$tip.' fade in">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              '.$alert.'  </div>';
              return $this->html;
            }


            public function alerts($array,$tip){
             $alertsi = "";

             foreach($array as $ar){
              $alertsi = $alertsi."<li>".$ar."</li>" ;
            }

            $this->html = '<div class="alert alert-'.$tip.' fade in">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <ul>'.$alertsi.'</ul>  </div>';
            return $this->html;
          }


          public function d_url( $url = '' ){
           return SITE_URL.$url;
         } 

         public  function redirect( $url= '' ){
           if( strpos($url, '://') === false ) {
            $url = $this->d_url($url);
          }
          header('Location:'.$url);
          die;
          return;
        }
        public function last_page(){
          $this->redirect($_SERVER['HTTP_REFERER']);
          return;
        }



        public function kisas($a,$i){

          $a_len = strlen($a); 

          $b = substr($a, 0, $i); 

          while(($z = substr($a,$i,1)) != ' ' && $i < $a_len){ 

            $b .= $z; 
            $i++; 

          } 
          if(strlen($a)>$i){
           $b= $b."...";
         }
         return $b;
       }

       public function kisalt($a,$i){

         $b = mb_substr($a,0,$i,"UTF-8");

         if(strlen($a)>$i){
           $b= $b."...";
         }
         return $b;
       }




       public function seola($s) {
        $tr = array('ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','%');
        $eng = array('s','s','i','i','g','g','u','u','o','o','c','c','yuzde');
        $s = str_replace($tr,$eng,$s);
        $s = strtolower($s);
        $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
        $s = preg_replace('/[^%a-z0-9 _-]/', '', $s);
        $s = preg_replace('/\s+/', '-', $s);
        $s = preg_replace('|-+|', '-', $s);
        $s = trim($s, '-');
        $s = substr($s,0,60);
        return $s;
      }


      public	function mb_ucfirst($string, $encoding='UTF-8')
      {
        $string  =  mb_strtolower($string,$encoding) ;
        $strlen = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
      }


      public  function  mb_upper($string, $encoding='UTF-8')
      {
        $string = str_replace("i","İ",$string);
        
        return mb_strtoupper($string, $encoding);
      }

      public function dizin_oku($dizin='',$uzanti='png')
      {
        $dizin = opendir($dizin);
        $export = array();
        while($dosya = readdir($dizin)) {

         if(preg_match("/".$uzanti."/i", $dosya)){

          $export[] =$dosya;

        }


      }

      return $export;
      }






 public function tarihset($value='',$yild=true)
      {
        global $aylar;

        $trh = explode('-', $value);
        $yil  = $trh[0];
        $ay = $trh[1]-1;
        $gun = $trh[2];
        if ($yild == true) {
        return substr($gun,0,2).' '.$aylar[$ay].' '.$yil;
        } else {
           return substr($gun,0,2).' '.$aylar[$ay];
        }

        

      }

      }