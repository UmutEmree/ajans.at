<?php

class Session{
    public static function init(){
        if(!isset($_SESSION)){
        session_start();
    }
    }
    
    public static function set($key, $val , $ekkey = false){
        if ($ekkey == false) {
        $_SESSION[$key] = $val;
        }else{
        $_SESSION[$key][$ekkey] = $val;
    }
    }
    
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
    
    public static function checkSession($kimi = 'Admin_Panel',$go = "Admin/Login/index/"){
        self::init();      

      


        if(self::get($kimi) == false){          
                
            self::unsetci($kimi);
            header("Location: ". SITE_URL .$go.time());
        }
    }


    public static function destroy(){
        session_destroy();
    }

    public static function unsetci($q){
        $_SESSION[$q] = NULL;
        unset($_SESSION[$q]);
    }


}