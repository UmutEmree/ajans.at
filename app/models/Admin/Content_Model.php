<?php

class Content_Model extends Model{

    public function __construct() {

        parent::__construct();

    }

    

    public function listele($type="All"){

	if( $type=="All" ){

	return $this->db->select("contents")->run();

	}else{

	return $this->db->select("contents")->where("Content_Type",$type)->run();

	}

        

    }

	

	

	

	    public function Guncelle_Form($id){

 

	return $this->db->select("contents")->where("Content_id",$id)->run(1);	 

        

    }

	

	

	 	  public function content_insert($array){

		  

		$sub_category = $this->db->insert("contents")->set($array);

		  

	    if($sub_category){

	   return  true;

		  }else{

			   return  false;

			  }

		  

		  }

		  

		  

		    public function content_update($array,$id){

		  

		$sub_category = $this->db->update("contents")->where("Content_id",$id)->set($array);

		  

	    if($sub_category){

	   return  true;

		  }else{

			   return  false;

			  }

		  

		  }

		  

		  

		  

		  	 public function delete($id){

		$query = $this->db->delete("contents")->where("Content_id",$id)->done(); 

		 if ( $query ){

        return true;

         }else{

			return false; 

			 }

		 }

	 

	

	

	

	

}

?>

