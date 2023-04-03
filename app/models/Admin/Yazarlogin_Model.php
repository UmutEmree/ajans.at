<?php

class Yazarlogin_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function userControl($array = array()){
      

		$count = $this->db->select('yazarlar')
						  ->from('count(yazarlar_id) as total')
						  ->where("yazar_mail",$array[0])
						  ->where("yazar_sifre",$array[1])
						  ->total();
                  
                  
      //  $this->db->affectedRows($sql, $array);
        
        if($count > 0){
           
			$data_login = array(
								"yazar_login_status" =>"1",
								"yazar_last_login"   =>date("Y-m-d H:i:s")
								);
			$login_update = $this->db->update("yazarlar")
								 ->where("yazar_mail",$array[0])
								 ->set($data_login);
								 
            return $this->db->select('yazarlar')
				     	  ->where("yazar_mail",$array[0])
						  ->where("yazar_sifre",$array[1])
						  ->run(1);
        }else{
            return false;
			 
        }
    }
    
}