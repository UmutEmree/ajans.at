<?php



class Koseyazarlari_Model extends Model{

    public function __construct() {

        parent::__construct();

    }

     



     public function listele()

     {

         return $this->db->select('yazarlar')->where('yazar_durum',0,'>')->run();

     }





     public function yazarbilgi($id)

     {

         return $this->db->select('kose_yazilari')->join('yazarlar', '%s.yazarlar_id = %s.yazar_id', 'left')->where('yazar_id',$id)->where('yazi_durum',1)->run();

     }



     public function yazi($id)

     {

         return $this->db->select('kose_yazilari')->join('yazarlar', '%s.yazarlar_id = %s.yazar_id', 'left')->where('yazi_id',$id)->where('yazi_durum',1)->run(1);

     }



}

