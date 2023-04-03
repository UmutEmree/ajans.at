<?php

class Page_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function sayfa($id){  

                $varmi = $this->db->select('contents')->from('count(Content_id) as total')->where('Content_id',$id)->total();  
                if ($varmi  > 0) {
                        return  $this->db->select('contents')->where('Content_id',$id)->run(1);
                     } 
                    else{

                        return false; 
                    }    
       
   }
    public function Manset(){         
        return $this->db->select('news')->join('categories', '%s.Cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_manset','1')->orderby('news_id','desc')->limit(0,10)->run();
    }

 
}
