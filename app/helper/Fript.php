<?php

class Fript{

    const frp ="A*?*,*:*;*+*/*<*>*B*ç*d*e*f*g*ğ*h*ı*C*Ç*4*5*6*D*E*J*8*9*-*_*K*L*M*N*i*j*k*l*O*Ö*P*R*S*Ş*z*0*1*2*T*U*Ü*V*Y*Z*a*b*c*m*n*o*ö*p*F*G*Ğ*H*I*İ*r*s*ş*t*u*ü*v*y*3*7*."; // Sabit bildirimi	
    public function __construct() {}
	
    public function gizle($str){
	
	$chars=self::frp;
		$chars_dizi = explode("*",$chars);
		$harfsayisi = strlen($str);
		$keym = "";
		for($i = 0; $i < $harfsayisi ; $i++){
			$key = array_search($str[$i], $chars_dizi);
			if($key<=9){
				$key = "0".$key;
				}
			$keym =$key.$keym;
			}
			
		
		 $datesi = mktime(date("h"), 0, 0, date("m"), date("d"),   date("Y"));	
		return $keym.$datesi."260295";
		
		
 
	  }
      
   
    public function ac($key){
		$datesi = mktime(date("h"), 0, 0, date("m"),date("d"),date("Y"));
		
		$str = explode($datesi,$key);
		
		$harfler = $str[0];
		
		$chars=self::frp;
		$chars_dizi = explode("*",$chars);
		
		$harfsayi = strlen($harfler);
		$yeni_key = "";
	 
	   $c = array();
    while (strlen($harfler) > 0) {
        $c[] = substr($harfler,0,2);
        $harfler = substr($harfler,2);
    }
	
	foreach($c as $f){
		if(substr($f,0,1)=="0"){
			$f = $f[1];
			}
		$yeni_key = $chars_dizi[$f].$yeni_key;
		}
		return $yeni_key;
	 
    }
   
 
	
	
}
 
