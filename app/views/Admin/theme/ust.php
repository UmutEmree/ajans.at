<input id="site_url" value="<?php echo SITE_URL; ?>" type="hidden" />

<div class="header navbar navbar-inverse "> 

  <!-- BEGIN TOP NAVIGATION BAR -->

  <div class="navbar-inner">

	<div class="header-seperation"> 

		<ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">	

		 <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" > <div class="iconset top-menu-toggle-white"></div> </a> </li>		 

		</ul>

      <!-- BEGIN LOGO -->	

      <a href="index.html"><img src="<?php echo SITE_PUBLIC_ADMIN ?>/media/admlogo.png" class="logo" alt=""  data-src="<?php echo SITE_PUBLIC_ADMIN ?>/media/admlogo.png" data-src-retina="<?php echo SITE_PUBLIC_ADMIN ?>/media/admlogo.png"  height="30"/></a>

      <!-- END LOGO --> 

      <ul class="nav pull-right notifcation-center">	

        


      </ul>

      </div>

      <!-- END RESPONSIVE MENU TOGGLER --> 

      <div class="header-quick-nav" > 

      <!-- BEGIN TOP NAVIGATION MENU -->

	  <div class="pull-left"> 

        <ul class="nav quick-section">

          <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle" >

            <div class="iconset top-menu-toggle-dark"></div>

            </a> </li>

        </ul>

        <ul class="nav quick-section">

          <li class="quicklinks"> <a href="#" class="" >

            <div class="iconset top-reload"></div>

            </a> </li>

          <li class="quicklinks"> <span class="h-seperate"></span></li>

        

			<li class="m-r-10 input-prepend inside search-form no-boarder" <?php if (isset($_SESSION['yazarlar_id'])) { echo 'style="display:none"';   } ?>>

				<span class="add-on"> <span class="iconset top-search"></span></span>

				 <input name="" type="text"  class="no-boarder " placeholder="Adminde Ara" style="width:250px;">

			</li>

			<?php if (isset($_SESSION['yazarlar_id'])) { ?> <li><b>Hoş Geldin </b><?php echo $_SESSION['yazar_name'];  ?></li> 

			<li style="position:absolute; right:10px;" ><a href="<?php echo SITE_URL ?>Admin/Yazarlogin/logout" class="btn  btn-link tip_bottom" title="çıkış yap"><i class="fa fa-power-off fa-2x"></i> </a>	</li>

			<?php } ?>

			 

		  

		  </ul>

	  </div>

	 <!-- END TOP NAVIGATION MENU -->

	 <!-- BEGIN CHAT TOGGLER -->

    <div class="pull-right <?php if (isset($_SESSION['yazarlar_id'])) { echo 'dnone'; } ?>"> 

     

   

		<div class="chat-toggler">	

				<a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom"  data-content='' data-toggle="dropdown" data-original-title="Son 10 bildirim">

					<div class="user-details"> 

						<div class="username">

							<span class="badge badge-important dnone">3</span> 

							Site bildirimleri									

						</div>						

					</div> 

					<div class="iconset top-down-arrow"></div>

				</a>	

				<div id="notification-list" style="display:none">

					<div style="width:300px">
					
					<?php
						$i =0;
						foreach ($alerts as   $var){ ?>

							

						

						  <div class="notification-messages info alertblocksu<?php echo $var['alerts_id'] ?>">

						  	<button type="button" class="close" onclick="alertkapat('<?php echo $var['alerts_id'] ?>')"  >&times;</span></button>

									<div class="user-profile">

										<i class="fa fa-bell fa-2x"></i>

									</div>

									<div class="message-wrapper">

										<div class="heading">

										<a href="<?php echo $var['alerts_link'] ?>"><?php echo $var['alerts_name'] ?></a>	

										</div>

										<div class="description">

										<?php echo $var['alerts_not'] ?>

										</div>

										<div class="date pull-left">

										<?php echo $var['alerts_insert_tarih'] ?>

										</div>										

									</div>

									<div class="clearfix"></div>									

								</div>	

					<?php $i++; } ?>

						 						

						</div>				

				</div>

				<div  id="alertcounts"  style="bacground:#f4f4f4; position:releative; left:-10px;  padding:5px; color:red; display:<?php echo $durum_block = ($i>0) ? 'block' : 'none' ; ?>;"> 



				<span class="badge alertcount"><?php echo $i ?></span>

				</div>       			

			</div>

		 <ul class="nav quick-section ">

			<li class="quicklinks"> 

				<a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">						

					<div class="iconset top-settings-dark "></div> 	

				</a>

				<ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">

                  <li><a href="<?php echo SITE_URL.'Admin/Admin'; ?>"> Yönetici Hesapları</a>

                  </li>

                  <li><a href="<?php echo SITE_URL.'Admin/Generalsettings' ?>">Site Ayarları</a>

                  </li>

                 

                  

                   <li><a href="<?= SITE_URL ?>" target="_blank" >Siteye Git</a></li>

                  <li class="divider"></li>                

                  <li><a href="<?= SITE_URL ?>Admin/Login/Logout"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Çıkış</a></li>

               </ul>

			</li> 

			<li class="quicklinks"> <span class="h-seperate"></span></li> 

		 

		</ul>

      </div>

	   <!-- END CHAT TOGGLER -->

      </div> 

      <!-- END TOP NAVIGATION MENU --> 

   

  </div>

  <!-- END TOP NAVIGATION BAR --> 

</div>