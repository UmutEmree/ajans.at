	<?php //model 
	class Yorum_Model extends Model{
		public function __construct() {
			parent::__construct();
		}

		public function listele(){

			return $this->db->select("yorum")->join('news', '%s.news_id = %s.haberi', 'left')->orderby('yorum_id','desc')->run();


		}


		public function listelehaber($id){

			return $this->db->select("yorum")->join('news', '%s.news_id = %s.haberi', 'left')->where('haberi',$id)->orderby('yorum_id','desc')->run();


		}
		
		
		
		
		public function Guncelle_Form($id){

			return $this->db->select("yorum")->where("yorum_id",$id)->run(1);	 

		}
		
		
		public function insert($array){

			$sub_category = $this->db->insert("yorum")->set($array);

			if($sub_category){
				return  true;
			}else{
				return  false;
	 }

		}


		public function update($array,$id){

			$sub_category = $this->db->update("yorum")->where("yorum_id",$id)->set($array);

			if($sub_category){
				return  true;
			}else{
				return  false;
			}

		}



		public function delete($id){
			$query = $this->db->delete("yorum")->where("yorum_id",$id)->done(); 
			if ( $query ){
				return true;
			}else{
				return false; 
			}
		}

		
		
		
		
	}
