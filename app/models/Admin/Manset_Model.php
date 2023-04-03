<?php //model 
class Manset_Model extends Model{
	public function __construct() {
		parent::__construct();
	}
	
	public function listele(){
		
		return $this->db->select("news")->where('news_konum_manset','1')->orderby('news_id','desc')->limit(0,20)->run();
		 			
						
	} 	
		

	public function gecerli($idsici = ''){
		
		return $this->db->select("news")
						->where('news_id',$idsici)
						->run(1);
	} 	
	
	
	
	public function update($array,$id){
		
		$sub_category = $this->db->update("news")->where("news_id",$id)->set($array);
		
		if($sub_category){
			return  true;
		}else{
			return  false;
		}
		
	}

	
	
}
