<?php



class Kategori_Model extends Model{

    public function __construct() {

        parent::__construct();

    }

    

    public function bilgi($seoname){  



        $varmi = $this->db->select('categories')->from('count(Cat_id) as total')->where('Cat_Seo_Name',$seoname)->total();  

        if ($varmi  > 0) {

            return  $this->db->select('categories')->where('Cat_Seo_Name',$seoname)->run(1);

        } 

        else{



            return false; 

        }    



    }





    public function Manset($catid){         

        return $this->db->select('news')->join('categories', '%s.Cat_id = %s.news_cat_id', 'left')->where('news_konum_manset','1')->where('news_cat_id',$catid)->orderby('news_id','desc')->limit(0,15)->run();



    }
     public function listele()

     {

         return $this->db->select('yazarlar')->where('yazar_durum',0,'>')->run();

     }

 public function Yazar(){         
        return $this->db->select('kose_yazilari')->join('yazarlar', '%s.yazarlar_id = %s.yazar_id', 'left')->where('yazi_durum',1)->orderby('yazi_id','desc')->limit(0,5)->run();
    }

    public function Homenews($catid){

        $idler = $this->db->select('category_join')->where("category_id",$catid)->run();

        $altkat =  $this->db->select('categories')->where('Cat_Main',$catid)->run();





        if ($altkat) {



         foreach ($altkat as   $v) {

            $idima[] = $v['Cat_id'];



        }







        $idsia = implode(',', $idima);



    }else{



        $idsia = '-1'; 

    }



    if ($idler) {

        # code...



        $idim = array();

        foreach ($idler as   $value) {

            $idim[] = $value['new_id'];

        }





        $idsi = implode(',', $idim);



    }else{

        $idsi = '-1';

    }



    $ekhaberler = $this->db->query('select * from news LEFT JOIN categories 

        ON (news.news_cat_id=categories.Cat_id)  where news_id in ('.$idsi.') AND news_durum = 1')->fetchAll(PDO::FETCH_ASSOC);

    $haberler =   $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_cat_id',$catid)->where('news_durum',1)->orderby('news_id','desc')->limit(0,20)->run();

    $althaberler = $this->db->query('select * from news LEFT JOIN categories 

        ON (news.news_cat_id=categories.Cat_id)  where news_cat_id in ('.$idsia.') AND news_durum = 1')->fetchAll(PDO::FETCH_ASSOC);



    return  array_merge ( $haberler, $althaberler,$ekhaberler );

}





public function Rightnews(){         

    return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_konum_sld','1')->where('news_durum',1)->orderby('news_id','desc')->limit(0,20)->run();

}





public function Spotnews(){         

    return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_spot','1')->orderby('news_id','desc')->limit(0,10)->run();

}





public function Koseyazarlarim(){         

    return  $this->db->select('kose_yazilari')->join('yazarlar', '%s.yazarlar_id = %s.yazar_id', 'left')->orderby('yazi_id','desc')->limit(0,20)->run();

}



public function Newscat(){         

    return  $this->db->select('categories')->orderby('Cat_row','asc')->where('Cat_Main','0')->where('Cat_top',1)->limit(0,20)->run();

}



public function Rightcat(){         

    return  $this->db->select('categories')->where('Cat_rigth','1')->limit(0,5)->run();

}









public function Catfilternews($kid='')

{

    return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_cat_id',$kid)->where('news_durum',1)->limit(0,5)->run();

}



public function Sagnews($c_id = '-1'){         

    return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_konum_sld','1')->where('news_durum',1)->where('news_cat_id',$c_id)->orderby('news_id','desc')->limit(0,8)->run();

}



public function altkat($id='')

{

    return  $this->db->select('categories')->where('Cat_Main',$id)->run();

}

public function Pop($kid='')

{

    return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_cat_id',$kid)->where('news_konum_manset','1')->orderby('news_id','desc')->limit(0,4)->run();

}



 public function Sondak(){         

        return $this->db->select('news')->join('categories', '%s.Cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_resim_son','1')->orderby('news_id','desc')->limit(0,5)->run();

    }

    









}

