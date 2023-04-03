<?php

class Form{
    public $currentValue;
    public $values = array();
    public $errors = array();
    
    public function __construct() {}
    public function post($key){
        $this->values[$key]     = trim($_POST[$key]);
        $this->currentValue    = $key;
        return $this;
    }

      public function p($key){
       
        return trim($_POST[$key]);
    }
	
	public function postresim($key){
		
		if(isset($_FILES[$key]['tmp_name']) && !empty($_FILES[$key]['tmp_name'])){
			return $_FILES[$key];
			}else{
				return false;
				}
		}
	
	
    public function isEmpty($label = "İsim"){
        if ($label == 0 || $label == '0') {
           return $this;
        }else{
        if(empty($this->values[$this->currentValue])){
            $this->errors[] = "Lütfen <b>".$label."</b> alanını boş bırakmayınız.";
        }
        return $this;
    }
    }
    public function length($min = 0, $max,$label){
        if(strlen($this->values[$this->currentValue]) < $min OR strlen($this->values[$this->currentValue]) > $max){
            $this->errors[] = "Lütfen ".$label." alanına " . $min . " ve " . $max . " karakter arasında bir yazı giriniz.";
        }
        return $this;
    }
    public function isMail($label = "Mail") {
        if(!filter_var($this->values[$this->currentValue], FILTER_VALIDATE_EMAIL)){
            $this->errors[] = "Lütfen ".$label." alanına geçerli bir mail adresi giriniz.";
        }
    }
	
	 public function isInt($label = "Sayı") {
        if(!is_numeric($this->values[$this->currentValue])){
            $this->errors[] = "Lütfen <b>".$label."</b> alanına sayısal bir değer giriniz.";
        }
    }
    
    public function submit(){
        if(empty($this->errors)){
            return true;
        }else{
            return false;
        }
    }
	
	
	
	
}

