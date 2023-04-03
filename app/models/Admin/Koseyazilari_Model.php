<?php //model 
class Koseyazilari_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function listele($yazar_id = '-1'){
	 
	return $this->db->select("kose_yazilari")->where('yazar_id',$yazar_id)->run();
	 
        
    }

    public function listele2(){
	 
	return $this->db->select("kose_yazilari")
	->join('yazarlar', '%s.yazarlar_id = %s.yazar_id', 'left')
	->run();
	 
        
    }
	
	
	
	    public function Guncelle_Form($id){
 
	return $this->db->select("kose_yazilari")->where("yazi_id",$id)->run(1);	 
        
    }
	
	
	 	  public function insert($array){
		  
		$sub_category = $this->db->insert("kose_yazilari")->set($array);
		  
	    if($sub_category){
	   return  true;
		  }else{
			   return  false;
			  }
		  
		  }
		  
		  
		    public function update($array,$id){
		  
		$sub_category = $this->db->update("kose_yazilari")->where("yazi_id",$id)->set($array);
		  
	    if($sub_category){
	   return  true;
		  }else{
			   return  false;
			  }
		  
		  }
		  
		  
		  
		  	 public function delete($id){
		$query = $this->db->delete("kose_yazilari")->where("yazi_id",$id)->done(); 
		 if ( $query ){
        return true;
         }else{
			return false; 
			 }
		 }
	 
	
	
	
	
}
