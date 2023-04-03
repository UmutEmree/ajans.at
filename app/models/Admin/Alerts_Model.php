<?php //model 

class Alerts_Model extends Model{

    protected function __construct() {

        parent::__construct();

    }

    

    public function listele(){

	 

	return $this->db->select("alerts")->run();
 

    }



        public function listele_active($durum = '0'){

	 

	return $this->db->select("alerts")->where('alerts_durum',$durum)->orderby('alerts_id','desc')->limit(0,10)->run();

	 

        

    }



    public function active_count($durum = '0')

    {

	return $this->db->select("alerts")->from('count(alerts_id) as total')->where('alerts_durum',$durum)->total();

    }

	

	

	

	    public function Guncelle_Form($id){

 

	return $this->db->select("alerts")->where("alerts_id",$id)->run(1);	 

        

    }

	

	

	 	  public function insert($array){

		  

		$sub_category = $this->db->insert("alerts")->set($array);

		  

	    if($sub_category){

	   return  true;

		  }else{

			   return  false;

			  }

		  

		  }

		  

		  

		    public function update($array,$id){

		  

		$sub_category = $this->db->update("alerts")->where("alerts_id",$id)->set($array);

		  

	    if($sub_category){

	   return  true;

		  }else{

			   return  false;

			  }

		  

		  }

		  

		  

		  

		  	 public function delete($id){

		$query = $this->db->delete("alerts")->where("alerts_id",$id)->done(); 

		 if ( $query ){

        return true;

         }else{

			return false; 

			 }

		 }

	 

	

	

	

	

}

