<?php

class Login_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function userControl($array = array()){
       // $sql = "SELECT * FROM Admin WHERE Admin_User_Name = :Admin_User_Name AND Admin_Password = :Admin_Password";

		$count = $this->db->select('admin')
						  ->from('count(Admin_id) as total')
						  ->where("Admin_User_Name",$array[0])
						  ->where("Admin_Password",$array[1])
						  ->total();
                  
                  
      //  $this->db->affectedRows($sql, $array);
        
        if($count > 0){
           
			$data_login = array(
								"Admin_Login_Status" =>"1",
								"Admin_Last_Login"   =>date("Y-m-d H:i:s")
								);
			$login_update = $this->db->update("admin")
								 ->where("Admin_User_Name",$array[0])
								 ->set($data_login);
								 
            return $this->db->select('admin')
				     	  ->where("Admin_User_Name",$array[0])
						  ->where("Admin_Password",$array[1])
						  ->run(1);
        }else{
            return false;
			echo "hata";
        }
    }
    
}