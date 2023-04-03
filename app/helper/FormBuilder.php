<?php

class FormBuilder{

    
    public function __construct() {}
	
    public function startform($action,$class,$id,$diger = ''){
       
 $formstart = "<form action='".$action."' class='".$class."' name='".$id."' id='".$id."' method='post' enctype='multipart/form-data'  ".$diger." >";
	 
	  echo  $formstart;
    }
	
    public function endform(){
        $formend = "</form>";
	   echo  $formend;
	  }
      
   
    public function input($array){
		
	
		 
		 
		
	$formInput = "";
	$ek			 = (isset($array["ek"]))     	?		 $array["ek"]  		  :   "";
	$label		 = (isset($array["label"]))	    ? 		 $array["label"]	  :   "";
	$type 		 = (isset($array["type"]))      ? 		 $array["type"]       :   "";
	$class 		 = (isset($array["class"]))     ?        $array["class"]      :   "";
	$name 		 = (isset($array["name"]))      ?        $array["name"]       :   "";
	$ph    	     = (isset($array["ph"]))	    ? 	     $array["ph"]		  :   "";
	$val  		 = (isset($array["val"]))       ?        $array["val"]		  :   "";

		
	// input text 	
		
		
	if($array["type"] == "text" || $array["type"] == "password" ){
		
		if($array["label_type"] == 'inline'){
			
			
		$formInput  = '<div class="form-group">';
		$formInput .= '<label class="col-sm-3 control-label">'.$label.'</label>';
		$formInput .= '<div class="col-sm-9">';
			if(isset($array["after"])){
		$formInput .= '<div class="input-group">';
			}
		$formInput .= '<input type="'.$type.'"';
        $formInput .= 'class="form-control '.$class.' " ';
		$formInput .= 'id="'.$name.'"';
		$formInput .= 'placeholder="'.$ph.'"';        
        $formInput .= 'name="'.$name.'"';
		$formInput .= 'value="'.$val.'"  '.$ek.'>';
		
		if(isset($array["after"])){
		$formInput .= '<span class="input-group-addon">'.$array["after"].'</span> </div>';
			}
		
        $formInput .= '</div></div>';
        
			

		}else{
  
  		$formInput  = '<div class="form-group">';
		$formInput .= '<label for="'.$name.'">'.$label.'</label>';
    	$formInput .= '<input type="'.$type.'" ';
        $formInput .= 'class="form-control '.$class.' "';
		$formInput .= 'id="'.$name.'"';
		$formInput .= 'placeholder="'.$ph.'"';
		$formInput .= 'name="'.$name.'"';
		$formInput .= 'value="'.$val.'">';
        $formInput .= '</div>';
  
				
		}
		
	// checkbox radio
  
	}else if($array["type"] == "checkbox"  || $array["type"] == "radio"){
		
		
		
		$formInput = '<div class="form-group">'; $valsi = $array["val"]; $i = 1;
		
		 foreach($valsi as $key=>$vl){
			 
$formInput .=	'<label class="'.$array["class"].'">';
$formInput .=	'<input type="'.$array["type"].'"';
$formInput .=	'id="'.$array["name"].$i.'"';
$formInput .=	'value="'.$vl.'"';
$formInput .=	'name="'.$array["name"].'">';
$formInput .=	 $key.'</label>';
 
							$i++;	}

	$formInput .="</div>";
		
		
		
		}
  
 echo $formInput;
  
    }
   
 
	
	
}
 