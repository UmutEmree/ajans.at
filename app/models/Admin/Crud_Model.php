<?php

class Crud_Model extends Model{
 		public function __construct() {
        parent::__construct();
    }
    
   

		public function sem($table){
		  
		return  $this->db->schema($table);
		  
	    
		  
   			}  

 		public function tables(){
				  
		return  $this->db->list_tables();
		  
	    
		  
		} 

}