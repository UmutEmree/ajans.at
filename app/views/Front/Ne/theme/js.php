<script src="<?php echo $theme_patch ?>/js/jquery.min.js"></script> 
<!--jQuery easing--> 
<script src="<?php echo $theme_patch ?>/js/jquery.easing.1.3.js"></script> 
<!-- bootstrab js --> 
<script src="<?php echo $theme_patch ?>/js/bootstrap.js"></script> 
<!--style switcher--> 
  
<script src="<?php echo $theme_patch ?>/js/wow.min.js"></script> 
<!-- time and date --> 
<script src="<?php echo $theme_patch ?>/js/moment.min.js"></script> 


<!-- owl carousel --> 
<script src="<?php echo $theme_patch ?>/js/owl.carousel.js"></script> 
<!-- magnific popup --> 
<script src="<?php echo $theme_patch ?>/js/jquery.magnific-popup.js"></script> 
<!-- weather --> 
<script src="<?php echo $theme_patch ?>/js/jquery.simpleWeather.min.js"></script> 
<!-- calendar--> 
<script src="<?php echo $theme_patch ?>/js/jquery.pickmeup.js"></script> 
<!-- go to top --> 
<script src="<?php echo $theme_patch ?>/js/jquery.scrollUp.js"></script> 
<!-- scroll bar --> 
<script src="<?php echo $theme_patch ?>/js/jquery.nicescroll.js"></script> 
<script src="<?php echo $theme_patch ?>/js/jquery.nicescroll.plus.js"></script> 
<!--masonry--> 
<script src="<?php echo $theme_patch ?>/js/masonry.pkgd.js"></script> 
<!--media queries to js--> 
<script src="<?php echo $theme_patch ?>/js/enquire.js"></script> 
<!--custom functions--> 
<script src="<?php echo $theme_patch ?>/js/custom-fun.js"></script>


<?php if (isset($js) && in_array("detay",$js)): ?>
	

<!--news ticker--> 
<script src="<?php echo $theme_patch ?>/js/detay.js"></script> 

<?php endif ?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5657214ddc99593c" async="async"></script>


<input type="hidden" value="<?php echo SITE_URL ?>" id="site_url">