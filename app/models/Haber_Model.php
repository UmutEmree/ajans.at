<?php

class Haber_Model extends Model{
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
   



    public function bilgihaber($seohabername){  

        $varmi = $this->db->select('news')->from('count(news_id) as total')->where('news_durum',1)->where('news_seo_name',$seohabername)->total();  
        if ($varmi  > 0) {
            return  $this->db->select('news')->where('news_seo_name',$seohabername)->where('news_durum',1)->run(1);
        } 
        else{

            return false; 
        }    
        
    }


    
    
    public function Homenews($catid,$istisna){
        $idler = $this->db->select('category_join')->where("category_id",$catid)->run();
        

        if ($idler) {
        # code...

            $idim = array();
            foreach ($idler as   $value) {
                if ($value['new_id'] != $istisna) {


                    $idim[] = $value['new_id'];
                }
            }
            if (count($idim)>0) {
             $idsi = implode(',', $idim);

         } else {
             $idsi = '-1';

         }



     }else{
        $idsi = '-1';
    }

    $ekhaberler = $this->db->query('select * from news where news_id in ('.$idsi.') AND news_durum = 1')->fetchAll(PDO::FETCH_ASSOC);
    $haberler =   $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_cat_id',$catid)->where('news_id',$istisna,'!=')->where('news_durum',1)->orderby('news_id','desc')->limit(0,20)->run();
    
    return  array_merge ( $haberler, $ekhaberler );
}



public function Spotnews(){         
    return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_spot','1')->orderby('news_id','desc')->limit(0,10)->run();
}
public function Benzer($cid,$newsid){         
    return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_cat_id',$cid)->where('news_id',$newsid,'!=')->orderby('news_id','desc')->limit(0,6)->run();
}

public function Populer(){         
    return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_manset','1')->orderby('news_id','desc')->limit(0,5)->run();
}


public function Ortak($cid,$hid){


  $karderskat =   $this->db->select('categories')->where('Cat_Main',$cid)->run();

  if ($karderskat) {
    # code...

      foreach ($karderskat as   $kardes) {

        $krd[] = $kardes['Cat_id'];


      }//end each

      $kardes_idler = implode(',', $krd);

  }//end if
  else{
    $kardes_idler  = -1;
}


return  $this->db->query('select * from news LEFT JOIN categories 
    ON (news.news_cat_id=categories.Cat_id)  where news_cat_id in ('.$kardes_idler.') AND news_durum = 1 AND news_id !='.$hid.' order by news_id desc limit 0,3')->fetchAll(PDO::FETCH_ASSOC);


}



public function Newscat(){         
    return  $this->db->select('categories')->where('Cat_Main','0')->where('Cat_top',1)->limit(0,20)->run();
}
public function Son(){         
        return $this->db->select('news')->join('categories', '%s.Cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_resim_son','1')->orderby('news_id','desc')->limit(0,5)->run();
    }

public function Catfilternews($kid='')
{
    return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_manset','1')->where('news_cat_id',$kid)->orderby('news_id','desc')->limit(0,3)->run();
}

public function Habergaleri($id='')
{

    return  $this->db->select('news_gallery')->where('news_gallery_main_id',$id)->limit(0,20)->run();
}

public function galeridetay($id='')
{

    return  $this->db->select('news_gallery')->where('news_gallery_id',$id)->run(1);
}


public function altkat($id='')
{
    return  $this->db->select('categories')->where('Cat_Main',$id)->run();
}


public function Countnews($id='')
{
    $haber = $this->db->select('news')->where('news_id',$id)->run(1);
    $newscount = $haber['news_ziyaret']-1+2;
    $this->db->update('news')->where('news_id',$id)->set(array('news_ziyaret'=>$newscount));
}
    

/*end*/
}

