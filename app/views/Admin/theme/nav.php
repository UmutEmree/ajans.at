<?php   

 $Page_Name="";

 $Page_Sub_Name= "";

 

$navigation_admin =     array(

						////---------------------------------------------------////////////

						'Anasayfa'	=>	array(

												"icon"  	=>	'<i class="fa fa-home"></i>',

												"sub"	    =>	"0",

												"link"      =>	SITE_URL."Admin/Dashboard/home",

												"cur"		=>	"Dashboard",

												

											

												

												

							),

						////---------------------------------------------------////////////

 		     			 'Haber Yönetimi'	=>	array(

												"icon"  	=>	'<i class="fa fa-th"></i>',

												"sub"	    =>	array(

																"Admin/Categories"=>"Kategori İşlemleri",

																"Admin/News"=>"Haber İşlemleri",

																"Admin/Manset"=>"Manşet Yönetimi",

																"Admin/Yorum"=>"Bütün Yorumlar"

																

																	 ),

												"link"      =>	"javascript:void(0);",

												

							),



 		     			 ///****************************************************



 		     			   'Video İşlemleri'	=>	array(

												"icon"  	=>	'<i class="fa fa-youtube"></i>',

												"sub"	    =>	array(

																"Admin/Video/"=>"Local Videolar",

																"Admin/Video/Youtube"=>"Youtube Kanalı"

																

																	 ),

												"link"      =>	"javascript:void(0);"

												

							),



 		     			 ///-------------------------------------------------------------------

 		     			  'Köşe Yazarları'	=>	array(

												"icon"  	=>	'<i class="fa fa-pencil"></i>',

												"sub"	    =>	array(

																"Admin/Yazarlar"=>"Tüm Yazarlar",

																"Admin/Kose"=>"Tüm Köşe Yazıları"

																

																

																	 ),

												"link"      =>	"javascript:void(0);",

												

							),

							////---------------------------------------------------////////////

							 'İçerik Yönetimi'	=>	array(

												"icon"  	=>	'<i class="fa fa-sort-amount-asc"></i>',

												"sub"	    =>	array(

																"Admin/Content"=>"İçerikler"

																 



																

																	 ),

												"link"      =>	"javascript:void(0);",

												

							),

							////---------------------------------------------------////////////

							

							 ////---------------------------------------------------////////////

						'Genel Ayarlar'	=>	array(

												"icon"  	=>	'<i class="fa fa-flag"></i>',

												"sub"	    =>	array(

																"Admin/Generalsettings"=>"Sistem Ayarları",

																

																"Admin/Admin"=>"Yönetici İşlemleri",

																"Admin/Reklam"=>"Reklam İşlemleri"

															 

																	 ),

												"link"      =>	"javascript:void(0);",

												

											

												

												

							),

						////---------------------------------------------------////////////

		

					);

 

 $navigation_yazar =     array(

						////---------------------------------------------------////////////

						'Anasayfa'	=>	array(

												"icon"  	=>	'<i class="fa fa-home"></i>',

												"sub"	    =>	"0",

												"link"      =>	SITE_URL."Admin/Yazarpanel/home",

												"cur"		=>	"Dashboard",

												

											

												

												

							),

					  'İşlemlerim'	=>	array(

												"icon"  	=>	'<i class="fa fa-pencil"></i>',

												"sub"	    =>	array(

																"Admin/Koseyazilari"=>"Tüm Yazılarım",

																"Admin/Yazarpanel/Profil"=>"Yazar Profilim",

																"Admin/Yazarpanel/Yorumlar"=>"Yorum Yöneticisi"

																

																	 ),

												"link"      =>	"javascript:void(0);",

												

							),



					 

		

					);





 if (isset($_SESSION['Yazar_Panel'])) {

 	$navigation =  $navigation_yazar;

 } else {

 	$navigation =  $navigation_admin;

 }

 

 

	   ?>



  <div class="page-sidebar" id="main-menu"> 

  <!-- BEGIN MINI-PROFILE -->

   <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper"> 

    

  <!-- END MINI-PROFILE -->

   

   <!-- BEGIN SIDEBAR MENU -->	

 

    <ul>	

     

     

     

     

        <?php $i=1;  foreach($navigation as $label=>$main_link){?>

        

  			<li class=" <?php if($main_link["sub"]=="0"){?> m_list<?php }?>" id="li<?php echo $i;?>"  >

  				<a href="<?php echo $main_link["link"]; ?>">

 				 <?php echo $main_link["icon"]; ?> 

				<span class="title"> <?php  echo $label ?> </span>

                <?php if($main_link["sub"]!="0"){?> <span class="arrow "></span><?php }?>

                 </a>

                 

<?php if($main_link["sub"]!="0"){?>

            <ul class="sub-menu">

           <?php  foreach($main_link["sub"] as $sub_link=>$sub_label){  ?>

             <li class="search-list"><a href="<?php echo SITE_URL.$sub_link ?>"

             data-id="li<?php echo $i;?>">

            <?php echo $sub_label  ?>

             </a>  </li> 

             

            <?php  }?>   

                

       </ul>

        <?php  }?> 

        </li>

                           

          <?php $i++; }?>                

           

      

	       

    </ul>

	 	

	<div class="clearfix"></div>

    <!-- END SIDEBAR MENU --> 

  </div>

  </div>

  <a href="#" class="scrollup">Scroll</a>

   <div class="footer-widget">		

	<div class="progress transparent progress-small no-radius no-margin">

		<div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>		

	</div>

	<div class="pull-right">

		<div class="details-status">

		<span data-animation-duration="560" data-value="86" class="animate-number"></span>%

	</div>	

	<a href="lockscreen.html"><i class="fa fa-power-off"></i></a></div>

  </div>