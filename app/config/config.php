<?php
define("BASE", __FILE__);
define("SITE_URL", "https://ajans.at/");
define("ADMIN_ROOT", "admin");
define("SITE_PUBLIC", SITE_URL."public/"); 
define("SITE_PUBLIC_ADMIN", SITE_PUBLIC."admin/");
define("SITE_UPLOAD_DIR", SITE_PUBLIC."files/");
define("ADMIN_TITLE", "BeeCreative Web Haber Sistemi v.1.1");
/*veri tabanı bilgileri*/
define("DB_NAME", "okolay_ajans");
define("DB_USER_NAME", "okolay_ajans");
define("DB_PASSWORD", "ajans**//");
define("DB_HOST", "0");
/*veri tabanı bilgileri sonu*/

date_default_timezone_set('Europe/Istanbul');

//haber boyutları
$boyutlar = array("565x343",'268x163','780x400','327x206','385x212','77x77','272x169','380x239','237x148','384x158','178x110','254x117');
$mansetboyutlar = array('565x343','134x81');
$galeriboyutlar = array("780x450",'385x234','140x86');

$reklamboyutlari = array("120x600","160x600","200x200","250x250","300x250","300x300","336x280","468x60","728x90",'popup');
												 
$sociallink = array('facebook','twitter','linkedin','google-plus','pinterest');

$smtp_set = array(
					'gonderen_ad'=>'Tugra Test Mail',
					'gonderen_mail'=>'noperly@tugraweb.com',
					'host'=>'mail.tugraweb.com',
					'user_name'=>'noperly@tugraweb.com',
					'user_password'=>'pAO24nH0LDfJ',
					'port'=>'587'
					);

$aylar =   array("Ocak",
				 "Şubat",
				 "Mart",
				 "Nisan",
				 "Mayıs",
				 "Haziran",
				 "Temmuz",
				 "Ağustos",
				 "Eylül",
				 "Ekim",
				 "Kasım",
				 "Aralık");

$konumlar = array(
				"news_konum_manset" => 'Populer',
				"news_konum_ana"    => "Anasayfa Orta",
				"news_konum_sld"    => "Son Eklenenler",
				"news_konum_spot"   => "Spot Haberler",
				"news_konum_hafta"  => "Maç Sonuçları",
				"news_konum_resim_son" => "Son Dakika");
 