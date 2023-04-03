<?php
class Dashboard_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function gapi(){
	

       return $this->db->select("general_settings")->where("General_Set_id",1)->run(1);

		 }

  public function newscount()
  {
  	 return $this->db->select("news")->from('count(news_id) as total')->total();
  }
	
 public function catcount()
  {
  	 return $this->db->select("categories")->from('count(Cat_id) as total')->total();
  }


 public function reklamcount()
  {
  	 return $this->db->select("reklam")->from('count(reklam_id) as total')->total();
  }
} 