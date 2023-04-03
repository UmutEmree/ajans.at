<?php //model 
class Video_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function listele(){
	 
	return $this->db->select("video")->run();
	 
        
    }
	
	
	 
	    public function Guncelle_Form($id){
 
	return $this->db->select("video")->where("video_id",$id)->run(1);	 
        
    }
	
	
	 	  public function insert($array){
		  
		$sub_category = $this->db->insert("video")->set($array);
		  
	    if($sub_category){
	   return  $this->db->lastId();
		  }else{
			   return  false;
			  }
		  
		  }
		  
		  
		    public function update($array,$id){
		  
		$sub_category = $this->db->update("video")->where("video_id",$id)->set($array);
		  
	    if($sub_category){
	   return  true;
		  }else{
			   return  false;
			  }
		  
		  }
		  
		  
		  
		  	 public function delete($id){
		$query = $this->db->delete("video")->where("video_id",$id)->done(); 
		 if ( $query ){
        return true;
         }else{
			return false; 
			 }
		 }
	 
	
	
	
	
}
