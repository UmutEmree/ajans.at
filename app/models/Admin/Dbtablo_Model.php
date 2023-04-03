<?php
class Dbtablo_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function yaptaplo($query){
	

       return $this->db->tabloyap($query);

		 }

    public function listtablo(){	

       return $this->db->list_tables();

		 }
	 
	
	
	
	
} 