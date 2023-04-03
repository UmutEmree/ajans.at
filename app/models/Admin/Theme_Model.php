<?php //model 
class Theme_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function listele(){
	 
	return $this->db->select("theme")->run();
	 
        
    }
	
	
	
	 
	   public function Guncelle_Form($id){
 
	return $this->db->select("theme")->where("theme_id",$id)->run(1);	 
        
    }

       public function current_theme(){
 
	return $this->db->select("theme")->where("theme_durum",1)->run(1);	 
        
    }
	
	 	  public function insert($array){
		  
		$sub_category = $this->db->insert("theme")->set($array);
		  
	    if($sub_category){
	   return  true;
		  }else{
			   return  false;
			  }
		  
		  }
		  
		  
		    public function update($array,$id){
		  
		$sub_category = $this->db->update("theme")->where("theme_id",$id)->set($array);
		  
	    if($sub_category){
	   return  true;
		  }else{
			   return  false;
			  }
		  
		  }
		  
		  
		  
		  	 public function delete($id){
		$query = $this->db->delete("theme")->where("theme_id",$id)->done(); 
		 if ( $query ){
        return true;
         }else{
			return false; 
			 }
		 }
	 
	public function SettingsAll(){
 
	return $this->db->select("general_settings")->where("General_Set_id",1)->run(1);	 
        
    }
	
	public function reklam($boyut='200x200')
	{
		return $this->db->query("select * from reklam where reklam_boyut = '".$boyut."' order by rand() limit 1")->fetch(PDO::FETCH_ASSOC);
	}
	
	
}
