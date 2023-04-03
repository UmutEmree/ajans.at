<?php //model 
class News_Model extends Model{
	public function __construct() {
		parent::__construct();
	}

	public function listele(){

		return $this->db->select("news")->run();


	}



	public function toplam($kosul = array())
	{
		if(count($kosul) > 0 && $kosul['val'] !="-1" && $kosul['val'] !="0"){
			$sart = '=';
			if($kosul['label'] == 'news_name' ){

				$sart = 'like';
			}

			return $this->db->select('news')->from('count(news_id) as total')->where($kosul['label'],$kosul['val'],$sart)->total(); 
		}else{

			return $this->db->select('news')->from('count(news_id) as total')->total(); 
		}

	}


	public function sayfala($kosul = array(),$pageNo){




		$totalRecord  = $this->toplam($kosul);
		$pageLimit = 20;
		$pageParam = $pageNo;
		$pagination = $this->db->pagination($totalRecord, $pageLimit, $pageParam);




		if(count($kosul) > 0 && $kosul['val'] !="-1" && $kosul['val'] !="0"){

			$sart = '=';
			if($kosul['label'] == 'news_name' ){

				$sart = 'like';
			}
			$query = $this->db->select('news')
			->join('categories', '%s.Cat_id = %s.news_cat_id', 'left')
			->orderby('news_id', 'DESC')
			->where($kosul['label'],$kosul['val'],$sart)
			->limit($pagination['start'], $pagination['limit'])
			->run();


		}else{

			$query = $this->db->select('news')
			->join('categories', '%s.Cat_id = %s.news_cat_id', 'left')
			->orderby('news_id', 'DESC')
			->limit($pagination['start'], $pagination['limit'])
			->run();

		}


		return $query;


	}


	public function selectboxfill($katmain = 0){


		$sec = '';

		$main_category = $this->db->select("categories")->where("Cat_Main",0)->run();

		if ($katmain == 0) {
        	# code...
		}

		$opt = '<option value="0">Kategori Seçiniz</option>';

		/*-------each first start -------------*/
		foreach($main_category as $cat){
			$cat_id = $cat["Cat_id"];

			if ($cat["Cat_id"] == $katmain) {
				$sec = 'selected';
			}else{

				$sec = '';
			}


			$opt = $opt.'<option '.$sec.' value="'.$cat["Cat_id"].'">¦&nbsp;'.$cat["Cat_Name"].'</option>';	
			/*---------------------------------------level 1 start*/

			$sub_category = $this->db->select("categories")->where("Cat_Main",$cat_id)->run();
			/*-------if first start -------------*/
			if($sub_category){
				/*-------each 2 start -------------*/

				foreach($sub_category as $sub_cat){
					$sub_cat_id = $sub_cat["Cat_id"];

					if ($sub_cat["Cat_id"] == $katmain) {
						$sec = 'selected';
					}else{

						$sec = '';
					}


					$opt = $opt.'<option '.$sec.' value="'.$sub_cat["Cat_id"].'">¦&nbsp;&nbsp;&nbsp;&nbsp;¦&nbsp;'.$sub_cat["Cat_Name"].'</option>';
					/*---------------------------------------level 2 start*/
					$sub_category2 = $this->db->select("categories")->where("Cat_Main",$sub_cat_id)->run();
					/*  if 3 ---------------*/

					if ($sub_category2 ) {

						/*-------each 3 start     -***/

						foreach ($sub_category2 as $sub_cat2) {

							if ($sub_cat2["Cat_id"] == $katmain) {
								$sec = 'selected';
							}else{

								$sec = '';
							}


							$opt = $opt.'<option '.$sec.' value="'.$sub_cat2["Cat_id"].'">¦&nbsp;&nbsp;&nbsp;&nbsp;¦&nbsp;&nbsp;&nbsp;¦&nbsp;'.$sub_cat2["Cat_Name"].'</option>';
						}

						/*-------each 3 end --------*/



					}  



					/*---------if 3 end --------*/




					/*-------if 2 end -------------*/
				}
				/*-------each 2 end -------------*/  
			}
			/*-------if first end -------------*/								

		}

		/*-------each first end -------------*/

		return $opt;

	}




	public function pagsi($url,$id,$kosul = array())
	{
		$totalci  = $this->toplam($kosul);
		$pageLimit = 20;
		$fpagecount =  ceil($totalci / $pageLimit);

		return $this->db->showPagination($url,$totalci,$pageLimit,$id,$fpagecount);
	}

	
	
	
	public function Guncelle_Form($id){

		return $this->db->select("news")->where("news_id",$id)->run(1);	 

	}
	
	
	public function insert($array){

		$sub_category = $this->db->insert("news")->set($array);

		if($sub_category){
			return  $this->db->lastId();
		}else{
			return  false;
		}

	}
	public function ekcheck($array)
	{
		return	$varmi = $this->db->select("category_join")->from('count(join_id) as total')->where('category_id',$array['category_id'])->where('new_id',$array['new_id'])->total();

	}

	public function eksil($id)
	{
$query = $this->db->delete("category_join")->where("new_id",$id)->done(); 
		if ( $query ){
			return true;
		}else{
			return false; 
		}
	}

	public function ekkatinsert($array){

		$varmi = $this->db->select("category_join")->from('count(join_id) as total')->where('category_id',$array['category_id'])->where('new_id',$array['new_id'])->total();
		if ($varmi == 0) {
			# code...

			$sub_category = $this->db->insert("category_join")->set($array);

			if($sub_category){
				return  true;
			}else{
				return  false;
			}
		}else{
			return  false;
		}

	}


	public function update($array,$id){

		$sub_category = $this->db->update("news")->where("news_id",$id)->set($array);

		if($sub_category){
			return  true;
		}else{
			return  false;
		}

	}







	public function delete($id){
		$query = $this->db->delete("news")->where("news_id",$id)->done(); 
		if ( $query ){
			return true;
		}else{
			return false; 
		}
	}


	public function ekkategori($value='')
	{
		return $this->db->select('categories')->where('Cat_id',$value,'!=')->where('Cat_Main',0)->run(); 
	}

	
	public function seoname($value='')
	{
		return $this->db->select('news')->from('count(news_id) as total')->where('news_seo_name',$value)->total(); 
	}
	

	public function galeriekle($array){

		$sub_category = $this->db->insert("news_gallery")->set($array);

		if($sub_category){
			return  true;
		}else{
			return  false;
		}

	}

	public function Haber_Galerisi($id='')
	{
		return  $this->db->select("news_gallery")->where('news_gallery_main_id',$id)->orderby('news_gallery_id','desc')->run();
	}


	public function galeriguncelle($array,$id){

		$sub_category = $this->db->update("news_gallery")->where('news_gallery_id',$id)->set($array);

		if($sub_category){
			return  true;
		}else{
			return  false;
		}

	}


	public function gallerydelete($id='')
	{
		$query = $this->db->delete("news_gallery")->where("news_gallery_id",$id)->done(); 
		if ( $query ){
			return true;
		}else{
			return false; 
		}
	}


	public function contentcount($id='-1')
	{   
		$adet =  $this->db->select('news')->from('count(news_id) as total')->where('news_cat_id',$id)->total(); 

		$this->db->update("categories")->where("Cat_id",$id)->set(array('Cat_content_count' => $adet  ));
	}


	public function resimsor($q,$v){

		return $this->db->select("news")->from('count(news_id) as total')->where($q,$v)->total();


	}
	
}
