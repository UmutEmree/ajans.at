<?php

class Model{
    
    protected $db = array();
    
    public function __construct() {
     
	 $this->db = new Database(DB_HOST, DB_NAME, DB_USER_NAME, DB_PASSWORD);
    }
}
