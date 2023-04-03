<?php



class Index_Model extends Model{

    public function __construct() {

        parent::__construct();

    }

    

    public function Populer(){         

        return $this->db->select('news')->join('categories', '%s.Cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_manset','1')->orderby('news_id','desc')->limit(0,5)->run();

    }

   

    public function Spot(){         

        return $this->db->select('news')->join('categories', '%s.Cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_spot','1')->orderby('news_id','desc')->limit(0,15)->run();

    }

    public function Son(){         

        return $this->db->select('news')->join('categories', '%s.Cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_sld','1')->orderby('news_id','desc')->limit(0,10)->run();

    }

    public function Homenews(){         

        return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_ana',1)->orderby('news_id','desc')->limit(0,10)->run();

    }

    

    public function latest(){         

        return $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_manset','1','!=')->orderby('news_id','desc')->limit(0,4)->run();

    }

    public function Sondak(){         

        return $this->db->select('news')->join('categories', '%s.Cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_resim_son','1')->orderby('news_id','desc')->limit(0,4)->run();

    }





    public function Newscat(){         

        $cana =   $this->db->select('categories')->where('Cat_Main','0')->orderby('cat_row','asc')->where('Cat_top',1)->limit(0,10)->run();

        $return = array();

        foreach ($cana as $var) {

            $indis = $var['Cat_id'];

            $return[$indis]['Cat_Name'] = $var['Cat_Name'];

            $return[$indis]['Cat_Seo_Name'] = $var['Cat_Seo_Name'];

            $return[$indis]['subno'] = $this->db->select('categories')->from('count(Cat_id) as total')->where('Cat_Main',$indis)->where('Cat_top',1)->total();

            $return[$indis]['sub'] = $this->db->select('categories')->where('Cat_Main',$indis)->where('Cat_top',1)->limit(0,10)->run();

            unset($indis);

        }

        return $return;

    }







    public function Catfilternews($kid='')

    {

        return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_cat_id',$kid)->orderby('news_id','desc')->limit(0,4)->run();

    }

    public function Eko($kid='')

    {

        return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_cat_id',$kid)->orderby('news_id','desc')->limit(0,6)->run();

    }

     public function Spor($kid='')

    {

        return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_cat_id',$kid)->orderby('news_id','desc')->limit(0,10)->run();

    }

     public function Mag($kid='')

    {

        return  $this->db->select('news')->join('categories', '%s.cat_id = %s.news_cat_id', 'left')->where('news_durum',1)->where('news_konum_manset','1')->where('news_cat_id',$kid)->orderby('news_id','desc')->limit(0,4)->run();

    }







    

}

