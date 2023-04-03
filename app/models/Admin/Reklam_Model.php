<?php //model 
class Reklam_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function listele(){
	 
	return $this->db->select("reklam")->run();
	 
        
    }
	
	
	
	    public function Guncelle_Form($id){
 
	return $this->db->select("reklam")->where("reklam_id",$id)->run(1);	 
        
    }
	
	
	 	  public function insert($array){
		  
		$sub_category = $this->db->insert("reklam")->set($array);
		  
	    if($sub_category){
	   return  true;
		  }else{
			   return  false;
			  }
		  
		  }
		  
		  
		    public function update($array,$id){
		  
		$sub_category = $this->db->update("reklam")->where("reklam_id",$id)->set($array);
		  
	    if($sub_category){
	   return  true;
		  }else{
			   return  false;
			  }
		  
		  }
		  
		  
		  
		  	 public function delete($id){
		$query = $this->db->delete("reklam")->where("reklam_id",$id)->done(); 
		 if ( $query ){
        return true;
         }else{
			return false; 
			 }
		 }
	 
	
	
	
	
}
