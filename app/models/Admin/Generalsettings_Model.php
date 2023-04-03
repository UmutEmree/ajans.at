<?php //model 
class Generalsettings_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    
	
	    public function Guncelle_Form(){
 
	return $this->db->select("general_settings")->where("General_Set_id",1)->run(1);	 
        
    }
	
	    public function yapi_set(){
 
	return $this->db->select("general_settings")->from('yapi_id,yapi_secret,yapi_name')->where("General_Set_id",1)->run(1);	 
        
    }
		  
		    public function update($array,$id){
		  
		$sub_category = $this->db->update("general_settings")->where("General_Set_id",1)->set($array);
		  
	    if($sub_category){
	   return  true;
		  }else{
			   return  false;
			  }
		  
		  }
		  
	 
	
	
	
	
}
