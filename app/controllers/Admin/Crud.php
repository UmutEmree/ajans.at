<?php 
 /**
 * 
 */
class Crud extends Controller{
    public function __construct() {
        parent::__construct();
        
        // Oturum Kontrolü
        Session::checkSession();
    }
    
    public function index(){

    	$data["css"] = array('form');
    	$data["js"] = array('form');
      $data["jsp"] = array('crud');
      

    	$data["pagelabel"] = "Kaydet Oku Güncelle Sil Bileşeni Oluşturma";
    		 
    	$model = $this->load->admin_model("Crud_Model");
    	$data['all_table'] = $model->tables();
    	$this->load->admin_view("crud",$data);


 		
    }



    public function sema(){
 
       $table_adi =  $_POST['tablename'];
             
        $model = $this->load->admin_model("Crud_Model");
        $yapi = $model->sem($table_adi);
        $i = 0;
        $labeller ="";
        foreach ($yapi as $key => $value) {
            
            if ($key>0) {
              $labeller = $labeller."+".$value['Field'];
                 echo '<label class="col-md-4 pull-left ceksi">
  <input type="checkbox" class="eleman" onclick="labelyap();" checked id="yapi'.$i.'" name="eleman['.$value['Field'].']" value="'.$value['Field'].'"> '.$value['Field'].'
</label>';
$i++;
            }
            
        }
 
        echo '<div class="clearfix"></div><hr> <label class="form-label">Label isimleri</label>
                        <span class="help">Aralarında mutlaka + Olmalıdır ve toplam <b id="bcount">'.$i.'</b> Eleman içermelidir</span>
                        <div class="controls">
                  <textarea  class="form-control" rows="4" name="labeller" id="labeller">'.ltrim(trim($labeller),'+').'</textarea>
                        </div>'    
                          
                        ;


        
    }



    public function dosyavarmi(){

        $table_adi =  $_POST['tablename'];
 
       $dosya_controller = "app/controllers/admin/".ucwords($table_adi).'.php';
       $dosya_model = 'app/models/Admin/'.ucwords($table_adi).'_Model.php';
       $dosya_view = 'app/views/Admin/'.$table_adi.'_hm.php';
        
       $isfile = $this->load->helper('General');

      

       if (!file_exists($dosya_controller)) {
           # code...
       }else{

            echo $isfile->alert("Bu isimde bir kontrol dosyası zaten var <b>\"".$dosya_controller ."\"</b> Üzerine yazılacak");

       }


           if (!file_exists($dosya_model)) {
           # code...
       }else{

            echo $isfile->alert("Bu isimde bir Model dosyası zaten var <b>\"".$dosya_model ."\"</b> Üzerine yazılacak");

       }


             if (!file_exists($dosya_view)) {
           # code...
       }else{

            echo $isfile->alert("Bu isimde bir view dosyası zaten var  <b>\"".$dosya_view ."\"</b> Üzerine yazılacak");

       }


        
    }

       public function mabs($linesi,$name,$id,$insert_kodu,$update_kodu = '',$editsi)
	   {
              
              $name = str_replace("_", "", $name);
              $big_name = trim(ucwords($name));

               $linesi = str_replace("###", $big_name, $linesi);
               $linesi = str_replace("***", $name, $linesi);
               $linesi = str_replace("#id#", $id, $linesi);
               $linesi = str_replace("*##*", $insert_kodu, $linesi);

               if ($editsi == 1) {
               $linesi = str_replace("##editor##", '$data["js"][]  = "editor";', $linesi);
               }

           
          return $linesi;

       }




      public function mabjs($linesi,$name)
     {
              
              $name = str_replace("_", "", $name);
              $big_name = trim(ucwords($name));

               $linesi = str_replace("###", $big_name, $linesi);
               $linesi = str_replace("***", $name, $linesi);
              

           
          return $linesi;

       }


         public function mabm($linesi,$name,$id)
		 {
              
              $name = str_replace("_", "", $name);
              $big_name = trim(ucwords($name));

               $linesi = str_replace("###", $big_name, $linesi);
               $linesi = str_replace("***", $name, $linesi);
               $linesi = str_replace("#id#", $id, $linesi);
              

           
          return $linesi;

       }
           public function maform($linesi,$name,$elemanlar)
          {
             $name = str_replace("_", "", $name);
              $big_name = trim(ucwords($name));

               $linesi = str_replace("###", $big_name, $linesi);
               $linesi = str_replace("***", $name, $linesi);
               $linesi = str_replace("#**#", $elemanlar, $linesi);

            return $linesi;
          }



           public function maformup($linesi,$name,$elemanlar,$id)
          {
             $name = str_replace("_", "", $name);
              $big_name = trim(ucwords($name));

               $linesi = str_replace("###", $big_name, $linesi);
               $linesi = str_replace("***", $name, $linesi);
               $linesi = str_replace("#**#", $elemanlar, $linesi);
               $linesi = str_replace("#id#", $id, $linesi);

            
            return $linesi;
          }

        public function malist($linesi,$name,$id,$thler,$tdler)
        {
             $name = str_replace("_", "", $name);
              $big_name = trim(ucwords($name));

               $linesi = str_replace("###", $big_name, $linesi);
               $linesi = str_replace("#row#", $thler, $linesi);
               $linesi = str_replace("#line#", $tdler, $linesi);
               $linesi = str_replace("#id#", $id, $linesi);

              

           
          return $linesi;
        }





 public function formyap($yapi,$formeleman,$labeller,$up = ""){

                  $datalar = "";
                  
                  $labeller_array = explode("+",$labeller);
              $i = 0;
                  //yapiyi aç
                foreach ($yapi as   $eleman) {


                      //dizide varmı

                        $fi = trim($eleman["Field"]);
						
						

                if (in_array($fi,$formeleman)) {

                //  $indis=array_search(trim($eleman["Field"]),$formeleman);

                    $valuse = "";
                  if ($up == 1) {

                   $valuse = 'value="<?php echo $content[\''.trim($eleman["Field"]).'\']; ?>"';
                   $valse = '<?php echo $content[\''.trim($eleman["Field"]).'\']; ?>';
                  }else{
					 $valuse = ""; 
           $valse = ""; 
					  
					  }


                   if (!isset($labeller_array[$i]) || empty($labeller_array[$i])) {
                      $lbl = trim($eleman["Field"]);
                    }else{

                      $lbl = $labeller_array[$i];
                    }

                    if (trim($eleman["Null"]) == "NO") {
                      $zor = 'zor';
                    } else{ $zor = '';}

                  //varchar 255 mi

                    $i++;
                  
                  if (trim($eleman["Type"]) == "varchar(255)") {

                   
                    
                   $datalar = $datalar.PHP_EOL.'<div class="form-group">'.PHP_EOL.'
                  <label class="col-sm-3 control-label">'.$lbl.':</label>'.PHP_EOL.'
                  <div class="col-sm-9">'.PHP_EOL.'
                    <input type="text" name="'.trim($eleman["Field"]).'"  '.$valuse.' class="form-control '. $zor.'">'.PHP_EOL.'
                  </div>'.PHP_EOL.'
                </div>'.PHP_EOL;


                  }//varchar 255 mi end


                    //bigint(11) mi
                  
                  elseif (trim($eleman["Type"]) == "bigint(11)") {

                     
                    
                   $datalar = $datalar.PHP_EOL.'<div class="form-group">'.PHP_EOL.'
                  <label class="col-sm-3 control-label">'. $lbl .'</label>'.PHP_EOL.'
                  <div class="col-sm-9">'.PHP_EOL.'
                    <select name="'.trim($eleman["Field"]).'"  class="form-control '. $zor .'">'.PHP_EOL.'
                 <option value="1" >ayarlanması gerek</option>'.PHP_EOL.'
                    </select>'.PHP_EOL.'
                  </div>'.PHP_EOL.'
                </div> '.PHP_EOL;


                  }//bigint(11) mi end



                      //varchar(260) title mi    

                    elseif (trim($eleman["Type"]) == "varchar(260)" || preg_match("/title/i", trim($eleman["Field"]))) {
                    
 
                   $datalar = $datalar.PHP_EOL.'<div class="form-group">'.PHP_EOL.'
                  <label class="col-sm-3 control-label">'. $lbl.' '.PHP_EOL.'
                  <small class="tip_top" title="Seo uyumluluğu için uygun görülen max karakter sayısı 70 dir. fazla girdiğinizde seo puanınızın düşmesi haricinde her hangi bir zarar vermeyektir.">(Page Title max 70 Karakter)</small>:</label>'.PHP_EOL.'
                  <div class="col-sm-9">'.PHP_EOL.'
                    <textarea name="'.trim($eleman["Field"]).'" data-say="70" class="form-control say '. $zor.'" name="'.trim($eleman["Field"]).'">'.$valse.'</textarea>'.PHP_EOL.'
                    <p class="help-block" id="'.trim($eleman["Field"]).'_say"></p>
                  </div>
                </div>'.PHP_EOL;


                  }//varchar(260) title mi  end


                   //varchar(500) desc mi    

                    elseif (trim($eleman["Type"]) == "varchar(500)" || preg_match("/desc/i", trim($eleman["Field"]))) {
                    
 

                   $datalar = $datalar.PHP_EOL.'<div class="form-group">'.PHP_EOL.'
                  <label class="col-sm-3 control-label">'. $lbl.' '.PHP_EOL.'
                  <small class="tip_top" title="Açıklama meta etiketi 160 karakterden az olmalıdır. 160 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Page Title max 160 Karakter)</small>:</label>'.PHP_EOL.'
                  <div class="col-sm-9">'.PHP_EOL.'
                    <textarea  data-say="160" rows="4" class="form-control say '. $zor .'" name="'.trim($eleman["Field"]).'">'.$valse.'</textarea>'.PHP_EOL.'
                    <p class="help-block" id="'.trim($eleman["Field"]).'_say"></p>
                  </div>
                </div>'.PHP_EOL;


                  }//varchar(500) desc  mi  end



                       //varchar(600) keyw mi    

                    elseif (trim($eleman["Type"]) == "varchar(600)" || preg_match("/keyw/i", trim($eleman["Field"]))) {
 
                   $datalar = $datalar.PHP_EOL.'<div class="form-group">'.PHP_EOL.'
                  <label class="col-sm-3 control-label">'. $lbl.''.PHP_EOL.'
                  <small class="tip_top" title="Anahtar kelime meta etiketi 260 karakterden az olmalıdır. 260 karakterden uzun olması arama motorları tarafından spam olarak yorumlanmaktadır.">(Keywords max 260 Karakter)</small>:</label>'.PHP_EOL.'
                  <div class="col-sm-9">'.PHP_EOL.'
                    <textarea name="'.trim($eleman["Field"]).'" data-say="260" rows="4" class="form-control say '. $zor.'" name="'.trim($eleman["Field"]).'">'.$valse.'</textarea>'.PHP_EOL.'
                    <p class="help-block" id="'.trim($eleman["Field"]).'_say"></p>
                  </div>
                </div>'.PHP_EOL;


                  }//varchar(600) keyw  mi  end



                     //text mi    

                    elseif (trim($eleman["Type"]) == "text" || preg_match("/content/i", trim($eleman["Field"]))) {
                
                   $datalar = $datalar.PHP_EOL.'<div class="form-group col-sm-12">'.PHP_EOL.'
                  <label class="col-sm-5 control-label pull-left text-left"><h2>'. $lbl.'</h2> </label>'.PHP_EOL.'
                  <div class="clearfix"></div>'.PHP_EOL.'
                  <div class="col-sm-10 text-right">'.PHP_EOL.'
                     <textarea name="'.trim($eleman["Field"]).'" rows="4" class="form-control editor col-md-12"  >'.$valse.'</textarea>'.PHP_EOL.'
                 
                  </div>'.PHP_EOL.'
                </div>'.PHP_EOL;


                  }//text mi  end




                      //resimmi mi    

                    elseif (trim($eleman["Type"]) == "varchar(321)"  || preg_match("/image/i", trim($eleman["Field"]))) {
                    


                   $datalar = $datalar.PHP_EOL.' <hr class="bir">'.PHP_EOL.'
             <div class="form-group">'.PHP_EOL.'
                  <label class="col-sm-3 control-label">'. $lbl.':</label>'.PHP_EOL.'
                  <div class="col-sm-9">'.PHP_EOL.'
                    <input type="file" name="resim" onchange="resim_on_izle(this)" >'.PHP_EOL.'
                    <img id="onizle" src="" width="100" style="display:none;" />'.PHP_EOL.'
                  </div>'.PHP_EOL.'
                </div>'.PHP_EOL.'
                
                    <hr class="bir">'.PHP_EOL;


                  }else{



                   
                    
                   $datalar = $datalar.PHP_EOL.'<div class="form-group">'.PHP_EOL.'
                  <label class="col-sm-3 control-label">'.$lbl.':</label>'.PHP_EOL.'
                  <div class="col-sm-9">'.PHP_EOL.'
                    <input type="text" name="'.trim($eleman["Field"]).'"  '.$valuse.' class="form-control '. $zor.'">'.PHP_EOL.'
                  </div>'.PHP_EOL.'
                </div>'.PHP_EOL;


                  }//varchar 255 mi end

                   





              }//dizide varmı end



                }//yapiyi aç end
                    return $datalar;

                }







       public function formget($sema,$eleman,$labeller){


               $labeller = explode("+",$labeller);

              $i = 1;
              $b = 0;
              $datalar ="";
              foreach($eleman as $Field){


                  $durum = $sema[$i]["Null"];
                  $tip = trim($sema[$i]["Type"]);
                  $Fieldp = trim($sema[$i]["Field"]);

                $ek = "";

                  //is emty durumu
                  if ($durum == 'NO') {
                    $ek = '->isEmpty("'.$labeller[$b].'")';
                  }
                  //bitti

 

                  //resim varmı
                  if($tip  == "varchar(321)" || preg_match("/image/i", $Field) || preg_match("/resim/i", $Field)){


          $datalar =$datalar.PHP_EOL.'if($form->postresim("resim") != false){
        ///resim yukleme işlemi 
      
      
      $this->load->inc("Upload");
        $yukle = new Upload($_FILES["resim"]);
      $resimsi = $alert->seola($form->values["'.$sema[1]["Field"].'"])."_".rand(0,99);
       $resim_adi = $yukle->yukle($resimsi,"public/files/content");
       
      // resim yukleme işlemi end
       }else{
          $resim_adi = "";
         }'.PHP_EOL;
       } 
          else{

            $datalar =  $datalar.'$form ->post("'.$Field.'")'.$ek .';'.PHP_EOL;
                  
                }

                $i++;
                $b++;

}
     $c = 1;

     $altdata= PHP_EOL.PHP_EOL.'$data_array =  array('.PHP_EOL.PHP_EOL;
    
     foreach($eleman as $Field){
               $tip = $sema[$c]["Type"];

                 if($tip  == "varchar(321)" || preg_match("/image/i", $Field) || preg_match("/resim/i", $Field)){

                  $altdata= $altdata.PHP_EOL.'"'.$sema[$c]["Field"].'"      => $resim_adi,'.PHP_EOL.PHP_EOL;

               }else{

               $altdata= $altdata.'"'.$Field.'"      => $form->values["'.$Field.'"],'.PHP_EOL;

             }
                
                 $c++;}

                  $altdata = rtrim(rtrim($altdata) ,',');
                $altdata =  $altdata.PHP_EOL.");";

                 return $datalar.PHP_EOL.$altdata;

       
   }

 

      public function kogs(){
 
       $table_name        = $_POST["table_name"];
       $controller_name   = $_POST["controller_name"]; 
       $view_name         = $_POST["view_name"]; 
       $formeleman        = $_POST["eleman"];
       $labeller          = $_POST["labeller"];

       $model = $this->load->admin_model("Crud_Model");
        $yapi = $model->sem($table_name);


            $insert_kodlari = $this->formget($yapi,$formeleman,$labeller);
              $editort = 0;
              $labeli_ne = '';
            foreach ($yapi as  $valsi) {
              if (trim($valsi['Type']) == "text") {

                $editort = 1;
                $labeli_ne  = trim($valsi['Field']);
                 
              }

            }





        $id_label = $yapi[0]['Field'];
          $table_name = str_replace("_", "", $table_name);
          $big_name = trim(ucwords($table_name));

       $dt = fopen("app/controllers/admin/".$big_name.".php", "w");

        $yazdir= fputs($dt,'<?php');

       $con_text = fopen('app/controllers/admin/bin/controller.txt', "r");

       while ($line = fgets($con_text)) {
    
       $dt = fopen("app/controllers/admin/".$big_name.".php", "a");
            $lineci = $this->mabs($line,$table_name,$id_label,$insert_kodlari,$insert_kodlari,$editort);
         $yazdir= fputs($dt,$lineci);
}

       fclose($con_text);
       fclose($dt);



       //model olusturuluyor
 $dtmodel = fopen("app/models/Admin/".$big_name."_Model.php", "w");

        $yazdir_model= fputs($dtmodel,'<?php ');

       $con_text_model = fopen('app/controllers/admin/bin/model.txt', "r");

       while ($line_model = fgets($con_text_model)) {
    
       $dtmodel = fopen("app/models/Admin/".$big_name."_Model.php", "a");
            $lineci_model = $this->mabm($line_model,$table_name,$id_label);
         $yazdir_model = fputs($dtmodel,$lineci_model);
}

       fclose($con_text_model);
       fclose($dtmodel);
       //model olusumu bitti

   $data_formusu = self::formyap($yapi,$formeleman,$labeller,0);

       //insert formu yapmaya baslıcam insallah
        $dtform = fopen("app/views/Admin/".$table_name."_insert_hm.php", "w");

        //$yazdir_form= fputs($dtform,'<?php');

       $con_text_form = fopen('app/controllers/admin/bin/insertform.txt', "r");

       while ($line_form = fgets($con_text_form)) {
    
        $dtform = fopen("app/views/Admin/".$table_name."_insert_hm.php", "a");
            $lineci_form = $this->maform($line_form,$table_name,$data_formusu);
         $yazdir_form = fputs($dtform,$lineci_form);
}

       fclose($con_text_form);
       fclose($dtform);



       //insert formunu yaptım insallah


              //list  yapmaya baslıcam insallah


          $thler = '';

          foreach ($formeleman as $thm) {
            

            $thler =$thler.'<th>'.$thm.'</th>'.PHP_EOL;
          }


           $tdler = '';

          foreach ($formeleman as $tdm) {
            

            $tdler =$tdler.'<td><?=$content_row["'.$tdm.'"]; ?></td>'.PHP_EOL;
          }


        $dtlist = fopen("app/views/Admin/".$table_name."_hm.php", "w");

        //$yazdir_form= fputs($dtform,'<?php');

       $con_text_list = fopen('app/controllers/admin/bin/list.txt', "r");

       while ($line_list = fgets($con_text_list)) {
    
        $dtlist = fopen("app/views/Admin/".$table_name."_hm.php", "a");
            $lineci_list = $this->malist($line_list,$table_name,$id_label,$thler,$tdler);
         $yazdir_list = fputs($dtlist,$lineci_list);
}

       fclose($con_text_list);
       fclose($dtlist);



       //list formunu yaptım insallah
                    

        //update formu yapılıyor şimdide
       $data_formu_update = self::formyap($yapi,$formeleman,$labeller,true);

        
        $dtformup = fopen("app/views/Admin/".$table_name."_update_hm.php", "w");

        //$yazdir_form= fputs($dtform,'<?php');

       $con_text_formup = fopen('app/controllers/admin/bin/updateform.txt', "r");

       while ($line_formup = fgets($con_text_formup)) {
    
        $dtformup = fopen("app/views/Admin/".$table_name."_update_hm.php", "a");
            $lineci_formup = $this->maformup($line_formup,$table_name,$data_formu_update,$id_label);
         $yazdir_form = fputs($dtformup,$lineci_formup);
}

       fclose($con_text_formup);
       fclose($dtformup);

 
       //update formu bitti cok sukur


        //js creat edilecek şimdide
         
        
        $dtjs = fopen("public/admin/assets/js/page/".$table_name.".js", "w");

        //$yazdir_form= fputs($dtform,'<?php');

       $con_text_js = fopen('app/controllers/admin/bin/js.txt', "r");

       while ($line_js = fgets($con_text_js)) {
    
        $dtformup = fopen("public/admin/assets/js/page/".$table_name.".js", "a");
            $lineci_js = $this->mabjs($line_js,$table_name);
         $yazdir_js = fputs($dtjs,$lineci_js);
}

       fclose($con_text_js);
       fclose($dtjs);

 
       //edilmiştir her halde



echo "<ul>
        <li><b>Controller Dosyası Oluşturuldu </b><pre>app/controllers/admin/".$big_name.".php</pre></li>
        <li><b>Model Dosyası Oluşturuldu </b><pre>app/models/admin/".$big_name."_Model.php</pre></li>
        <li><b>Ekleme Formu Oluşturuldu </b><pre>app/views/admin/".$table_name."_insert_hm.php</pre></li>
        <li><b>Güncelleme Formu Oluşturuldu </b><pre>app/views/admin/".$table_name."_update_hm.php</pre></li>
        <li><b>Listeleme Sayfası Oluşturuldu </b><pre>app/views/admin/".$table_name."_hm.php</pre></li>
        <li><b>Javascript Sayfası Oluşturuldu </b><pre>public/admin/assets/js/page/".$table_name.".js</pre></li>
<hr>
<a href='".SITE_URL."Admin/".$big_name."' target='_blank' class=\"btn btn-info\"> Test Et</a>
        </ul>

        <script>
        $(document).ready(function() {
$('#makseform').fadeOut();
  
});

        </script>
        ";

      


    }



 }

