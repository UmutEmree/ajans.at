<?php

class Category_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function allcategories(){
        $main_category = $this->db->select("categories")->where("Cat_Main",0)->orderby('Cat_Row','asc')->run();
		$opt = '';
		$category_Array = array();
		/*-------each first start -------------*/
		foreach($main_category as $cat){
		 
			/*---------------------------------------level 1 start*/
			$cat_id = $cat["Cat_id"];
			$category_Array[$cat_id] = array(
											"Cat_id"     => $cat["Cat_id"],
            								"Cat_Name"   => $cat["Cat_Name"],
											"Cat_Main"   => $cat["Cat_Main"],
      										"Cat_Row"    => $cat["Cat_Row"],
											"Cat_Status" => $cat["Cat_Status"],
											"Cat_rigth" => $cat["Cat_rigth"],
											"Cat_home" => $cat["Cat_home"],
											"Cat_top" => $cat["Cat_top"],
											"Cat_M_Name" => "Ana Kategori",
											"Cat_Depht"  => array()
											);
			$sub_category = $this->db->select("categories")->where("Cat_Main",$cat_id)->orderby('Cat_Row','asc')->run();
			/*-------if first start -------------*/
			if($sub_category){
			/*-------each 2 start -------------*/
			
			foreach($sub_category as $sub_cat){
				
 
		/*---------------------------------------level 2 start*/
		
	$category_Array[$cat_id]["Cat_Depht"][] = $sub_cat["Cat_id"];
	$sub_cat_id = $sub_cat["Cat_id"];
	$category_Array[$cat_id][$sub_cat_id] = array(
											"Cat_id"     => $sub_cat["Cat_id"],
            								"Cat_Name"   => $sub_cat["Cat_Name"],
											"Cat_Main"   => $sub_cat["Cat_Main"],
      										"Cat_Row"    => $sub_cat["Cat_Row"],
											"Cat_Status" => $sub_cat["Cat_Status"],
											"Cat_rigth" => $sub_cat["Cat_rigth"],
											"Cat_home" => $sub_cat["Cat_home"],
											"Cat_top" => $sub_cat["Cat_top"],
											"Cat_M_Name" => $cat["Cat_Name"],
											"Cat_Depht"  => array()
											);
											
		$sub_2_category = $this->db->select("categories")->where("Cat_Main",$sub_cat_id)->orderby('Cat_Row','asc')->run();
		
		/*-------if 2 start -------------*/
			if($sub_2_category){
		/*-------each 3 start -------------*/
				foreach($sub_2_category as $sub_2_cat){
 
	$sub_2_cat_id = $sub_2_cat["Cat_id"];
	$category_Array[$cat_id][$sub_cat_id]["Cat_Depht"][] =$sub_2_cat["Cat_id"];
	$category_Array[$cat_id][$sub_cat_id][$sub_2_cat_id] = array(
											"Cat_id"     => $sub_2_cat["Cat_id"],
            								"Cat_Name"   => $sub_2_cat["Cat_Name"],
											"Cat_Main"   => $sub_2_cat["Cat_Main"],
      										"Cat_Row"    => $sub_2_cat["Cat_Row"],
											"Cat_Status" => $sub_2_cat["Cat_Status"],
											"Cat_rigth" => $sub_2_cat["Cat_rigth"],
											"Cat_home" => $sub_2_cat["Cat_home"],
											"Cat_top" => $sub_2_cat["Cat_top"],
											"Cat_M_Name" => $sub_cat["Cat_Name"],
											"Cat_Depht"  => array()
											);
					
				}
		/*-------each 3 end -------------*/
				
				}
				
		/*-------if 2 end -------------*/
			}
       /*-------each 2 end -------------*/  
			}
	/*-------if first end -------------*/								
											
			}
			
	/*-------each first end -------------*/
	 
        return $category_Array;
       
    }
	
	
	
	  public function selectboxfill(){
        $main_category = $this->db->select("categories")->where("Cat_Main",0)->orderby('Cat_Row','asc')->run();
		$opt = '<option value="0">Ana Kategori</option>';
		 
		/*-------each first start -------------*/
		foreach($main_category as $cat){
			$cat_id = $cat["Cat_id"];
		$opt = $opt.'<option value="'.$cat["Cat_id"].'">¦&nbsp;'.$cat["Cat_Name"].'</option>';	
			/*---------------------------------------level 1 start*/
			 
			$sub_category = $this->db->select("categories")->where("Cat_Main",$cat_id)->orderby('Cat_Row','asc')->run();
			/*-------if first start -------------*/
			if($sub_category){
			/*-------each 2 start -------------*/
			
			foreach($sub_category as $sub_cat){
				$sub_cat_id = $sub_cat["Cat_id"];	
 $opt = $opt.'<option value="'.$sub_cat["Cat_id"].'">¦&nbsp;&nbsp;&nbsp;&nbsp;¦&nbsp;'.$sub_cat["Cat_Name"].'</option>';
		/*---------------------------------------level 2 start*/
		
	 

		/*-------if 2 end -------------*/
			}
       /*-------each 2 end -------------*/  
			}
	/*-------if first end -------------*/								
											
			}
			
	/*-------each first end -------------*/
		 
        return $opt;
       
    }
	
	
	  public function q_insertdb($array){
		  
		$sub_category = $this->db->insert("categories")->set($array);
		  
	    if($sub_category){
	   return  true;
		  }else{
			   return  false;
			  }
		  
		  }
		  
		  
	  public function q_updatedb($array,$id){
		  
		$sub_category = $this->db->update("categories")->where("Cat_id",$id)->set($array);
		  if($sub_category){
	   return  true;
		  }else{
			   return  false;
			  }
		  
		  }
		  
	 public function delete($id){
		$query = $this->db->delete("categories")->where("Cat_id",$id)->done(); 
		 if ( $query ){
        return true;
         }else{
			return false; 
			 }
		 }
		 public function is_image($id){
			 
			 $query = $this->db->select("categories")->where("Cat_id",$id)->run(1);
			 if($query){
				 return $query["Cat_image"];
				 }else{
					 return false;
					 }
			  
			 
			 } 
	
	 
	 
	 
	 	  public function cat_insertdb($array){
		  
		$sub_category = $this->db->insert("categories")->set($array);
		  
	    if($sub_category){
	   return  true;
		  }else{
			   return  false;
			  }
		  
		  }
		  
	
	 	  public function edit_form($id){
		  
		return $this->db->select("categories")->where("Cat_id",$id)->run(1);		  
	 
		  
		  }	
		  
		  
	 	  public function edit_run($array,$id){
		  
		$sub_category = $this->db->update("categories")->where("Cat_id",$id)->set($array);
		  
	    if($sub_category){
	   return  true;
		  }else{
			   return  false;
			  }
		  
		  }  
    

 public function sem($table){
		  
		return  $this->db->schema($table);
		  
	    
		  
		  }  

		   public function tables(){
		  
		return  $this->db->list_tables();
		  
	    
		  
		  } 


		  public function seoname($value='')
	 {
	  return $this->db->select('categories')->from('count(Cat_id) as total')->where('Cat_Seo_Name',$value)->total(); 
	 }
	

}