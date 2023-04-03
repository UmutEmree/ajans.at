<?php

class Url{
	 
      public $values = array();
      public $errors = array();
    
    public function __construct() {}
	
	public function get($i){
		
		$this->values = isset($_GET["url"]) ? $_GET["url"] : null;
		    if($this->values != null){
            $this->values = rtrim($this->values, "/");
		 
            $this->values = explode("/", $this->values);
			if(isset($this->values[$i])){
			return $this->values[$i];
			}else{
				$this->errors = "-1";
				return $this->errors;
				}
			}
		
		
		}
		
		
		
		
		public function get_int($i){
		
		$this->values = isset($_GET["url"]) ? $_GET["url"] : null;
		    if($this->values != null){
            $this->values = rtrim($this->values, "/");
		 
            $this->values = explode("/", $this->values);
			if(isset($this->values[$i]) && is_numeric($this->values[$i])){
			return $this->values[$i];
			}else{
				$this->errors[] = "-1";
				return $this->errors;
				}
			}
		
		
		}
   
   
	
}
 
