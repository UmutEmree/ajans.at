<?php

class Manset extends Controller{
	public function __construct() {
		parent::__construct();

        // Oturum Kontrolü
		Session::checkSession();
	}

	public function index(){
		header ('Location:'.SITE_URL.'Admin/Manset/Home');
	}

	
		// home fonksiyonu işlemleri
		// Content tum içeriği
		// select eder
		// contents_hm.php dosyasını load eder

	public function home(){
		global $mansetboyutlar;
		$id = $this->load->helper("Url")->get_int(3); 
		$helper = $this->load->helper("General");
		$data["tools"] = $helper->dizin_oku('public/files/tools/');
		$data["fontlar"] = $helper->dizin_oku('public/files/tools/font','ttf');
		$data["mansetboyutlar"] = $mansetboyutlar;
		$data["js"]  = array("form","tabs");
		$data["jsp"]  = array("manset",'ajaxform');

		$data["css"]  = array("form","tabs");				
		$data["page_label"] = "Manşet Yönetimi";
		$data["alert"] = "";

		$model = $this->load->admin_model("Manset_Model");

		$data["content"]= $model->listele();
		if ($id[0] == '-1') {
			$ilk_id = $data["content"][0]['news_id'];
		} else {
			$ilk_id = $id[0];
		}
		
		
		$data["current"]= $model->gecerli($ilk_id);		
		$this->load->admin_view("manset",$data);

	}



	public function resimkoy()
	{
		$img = $this->load->helper("SimpleImage");

		$mansetresmi = trim($_POST['resim']);
		$resima = explode('/',$mansetresmi);
		$resimad = explode('.',$resima[3]);
		$resimadi = $resimad[0];
		$tools = 'public/files/tools/'.trim($_POST['tool']);
		$x = trim($_POST['x']);
		$y = trim($_POST['y']);

		$img->load($mansetresmi)->overlay($tools, 'top left', 1,$x,$y)->save('public/files/temp/'.$resimadi.'_'.$_POST['tool']);

		$res = $resimadi.'_'.$_POST['tool'];
		$_SESSION["loglar"][$res] = array(
			"ilkhali"=>$_POST['resim'],
			"toolsu"=>$_POST['tool'],
			"konum"=>"yatay:".$x."px Dikey:".$y."px",
			"sonhali"=>$resimadi.'_'.$_POST['tool']
			);

		echo trim($res);


	}


	public function ResimSil($resimad,$manset = 'h',$mansetad = '')
	{ 

		global $boyutlar;
		global $mansetboyutlar;


		$yol = 'public/files/news/';
		 	//sadece haber ana resmi ve boyutları
		if($manset == 'h'){
			@unlink($yol.$resimad);
			foreach ($boyutlar as  $value) {
				@unlink($yol.$value.'_'.$resimad);
			}
			return true;

		}
			// haber resmi ve manset resmi beraber
		elseif ($manset == 'hm') {
			@unlink($yol.$resimad);
			foreach ($boyutlar as  $value) {
				@unlink($yol.$value.'_'.$resimad);
			}
			@unlink($yol.$mansetad);
			foreach ($mansetboyutlar as  $mval) {
				@unlink($yol.$mval.'_'.$mansetad);
			}
			return true;

		}
			//sadece manset resmi
		elseif ($manset == 'm') {

			@unlink($yol.$resimad);
			foreach ($mansetboyutlar as  $mval) {
				@unlink($yol.$mval.'_'.$resimad);
			}
			return true;	

		}
		else{
			return false;

		}

	} 

	public function logbilgi()
	{   $helper = $this->load->helper("General");
		if(isset($_SESSION["loglar"]) && !empty($_SESSION["loglar"])){
			echo '<table class="table table-striped table-flip-scroll cf col-md-12"><thead class="cf">
			<tr>
			<th>#No</th>
			<th>Yapılan İşlem</th>
			<th><button type="button" class="btn btn-danger tumsil  " onclick="tumsil();" title="İşlem Geri Alınamaz Tempteki Resimler Silinir">Tümünü Sil</button></th>
			</tr>
			</thead>
			<tbody>';
			$i = 1; 
			foreach ($_SESSION["loglar"] as $key => $value) {
				$idsibtn  = ($i = count($_SESSION["loglar"])-1 ) ? 'id="bironce"' : '' ;
				echo " <tr>
				<td>".$i." </td>
				<td><a href='javascript:;' title='bu işlemin final resmini görmek için tıklayınız' onclick=\"tempgoster('".$value["sonhali"]."');\">".$helper->kisalt($value["sonhali"],80).' adında resim oluşturuldu.</a></td>
				<td><button '.$idsibtn.'  type="button" onclick="geridon(\''.$value["sonhali"].'\')" class="btn btn-info pull-right btn-mini"><small>Bu İşleme dön</small></button></td>
				</tr>';
				$i++;}
				echo " </tbody>
				</table> ";
			}else{
				echo '<h3>Geçmiş Silinmiş Yada Yok...</h3>';
			}

		}

		function temptemizle()
		{
			$helper = $this->load->helper("General");
			$resimler = $helper->dizin_oku('public/files/temp/');
			foreach ($resimler as  $value) {
				unlink('public/files/temp/'.$value);
				unset($_SESSION["loglar"]);
			}


		}


		function resimgoster($q='')
		{
			$q = str_replace('../files', './files', $q);
			return $q;
		}


   //shape koyuluyor

		public function shapekoy()
		{
			$img = $this->load->helper("SimpleImage");

			$mansetresmi = $_POST['resim'];
			$resima = explode('/',$mansetresmi);
			$resimad = explode('.',$resima[3]);
			$resimadi = trim($resimad[0]);

			$renk = trim($_POST['prenk']);
			$gen = trim($_POST['pgen']);
			$yuk = trim($_POST['pyuk']);
			$x = $_POST['px'];
			$y = $_POST['py'];

			//resim uret
			$img->create($gen, $yuk, $renk)->save('public/files/temp/'.$gen.'_'.$yuk.'_'.ltrim($renk,'#').'_shape.png');

			//üretilen resmi koy
			$tools = 'public/files/temp/'.$gen.'_'.$yuk.'_'.ltrim($renk,'#').'_shape.png';

			$img->load($mansetresmi)->overlay($tools, 'top left', 1,$x,$y)->save('public/files/temp/'.$resimadi.'_'.$gen.'_'.$yuk.'_'.ltrim($renk,'#').'.png');

			$res = $resimadi.'_'.$gen.'_'.$yuk.'_'.ltrim($renk,'#').'.png';
			$_SESSION["loglar"][$res] = array(
				"ilkhali"=>$_POST['resim'],
				"toolsu"=>$gen.'_'.$yuk.'_'.ltrim($renk,'#').'_shape.png',
				"konum"=>"yatay:".$x."px Dikey:".$y."px",
				"sonhali"=>$resimadi.'_'.$gen.'_'.$yuk.'_'.ltrim($renk,'#').'.png'
				);
			@unlink($tools);
			echo trim($res);
			


		}


//yazı ekleniyor
		public function yaziekle()
		{
			$img = $this->load->helper("SimpleImage");
			$helper = $this->load->helper("General");
			$mansetresmi = $_POST['resim'];
			$resima = explode('/',$mansetresmi);
			$resimad = explode('.',$resima[3]);
			$resimadi = trim($resimad[0]);

			$renk = trim($_POST['prenk']);
			$x = $_POST['px']-5;
			$y = $_POST['py']-5+10;
			$yazi = trim($_POST['pyazi']);
			$font = 'public/files/tools/font/'.trim($_POST['fond']);
			$fontsize = trim($_POST['fondsize']);
			if ($fontsize<=25) {
				$fontsize = $fontsize -2;
			} else if($fontsize<=30) {
				$fontsize = $fontsize -8;
			} else if($fontsize>30) {
				$fontsize = $fontsize -12;
			}
			
			$seoluyazi = $helper->seola($yazi);



			$img->load($mansetresmi)->text($yazi, $font, $fontsize ,$renk, 'top left', $x,$y)->save('public/files/temp/'.$resimadi.'_'.substr($seoluyazi,0,10).'_'.$fontsize.'_'.ltrim($renk,'#').'.png');

			$res = $resimadi.'_'.substr($seoluyazi,0,10).'_'.$fontsize.'_'.ltrim($renk,'#').'.png';
			$_SESSION["loglar"][$res] = array(
				"ilkhali"=>$_POST['resim'],
				"toolsu"=>$yazi,
				"konum"=>"yatay:".$x."px Dikey:".$y."px",
				"sonhali"=>$resimadi.'_'.substr($seoluyazi,0,10).'_'.$fontsize.'_'.ltrim($renk,'#').'.png'
				);

			echo trim($res);		 


		}



        //Uploads a file


		public function reupload()
		{
			global $mansetboyutlar;
			$model = $this->load->admin_model("Manset_Model");
			$form = $this->load->helper("Form");			
			$this->load->inc("Upload");
			if($form->postresim("resim") != false){
	        ///resim yukleme işlemi 
				$id = $_POST['haberid'];
				$oldresim = $_POST['oldresim'];
				$resimadi = explode('.',$_POST['oldresim']);
				$this->ResimSil($oldresim,'m');
				$yukle  = new Upload($_FILES["resim"]);
				$resimsi  = $resimadi[0].rand(0,9); 
				$manset_resmi = $yukle->yukle_th($resimsi,"public/files/news",true, $mansetboyutlar);

	      // resim yukleme işlemi end
			} 
			$data_array =  array("news_image_manset" => $manset_resmi);



			if($form->submit()){	

				$last_id = $model->update($data_array,$id);

				if($last_id){ 

					echo $manset_resmi;	


				}else{

					echo "0";	  

				}

			}else{
				
				echo "0";	 	  

				
			} 

		}

		//resim guncelleme end

		public function sonkaydet()
		{
			global $mansetboyutlar;
			$resize =explode('x', $mansetboyutlar[0]);
			$th =explode('x', $mansetboyutlar[1]);

			$img = $this->load->helper("SimpleImage");
			$idsi 		= $_POST['id'];
			$yeniresim 	= $_POST['resim'];
			$oldresim 	= $_POST['oldresim'];
			 
			$img->load($yeniresim)->save('public/files/news/'.$oldresim);
			$img->load($yeniresim)->thumbnail($th[0],$th[1])->save('public/files/news/'.$mansetboyutlar[1].'_'.$oldresim);
			$img->load($yeniresim)->resize($resize[0],$resize[1])->save('public/files/news/'.$mansetboyutlar[0].'_'.$oldresim);

			$this->temptemizle();

		}


	}
