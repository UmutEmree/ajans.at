<script type="text/javascript">
 	$('#saghabersldsi').carouFredSel({
					pagination: "#pagesaghabersld",
						direction: 'left',
					responsive: true,
					circular: false,
					responsive: true,
					auto: true,
					 scroll : {
            items           : 1,
            easing          : "easeOutBack",
            duration        : 1000,                         
            pauseOnHover    : true
			 
			
        }     
				});
 	</script>
        
       <div class="saghabersld">
    
 
    
<ul id="saghabersldsi" >

<?php foreach($rightnews as $rnews){?>
	<li>
	
    <a href="#"  title="<?php echo $rnews['ad']; ?>" >
   <img src="<?php echo SITE_UPLOAD_DIR ?>/news/320x180_<?php echo $rnews['resim']; ?>" height="180" />
	 </a>
      <p class="saghabername" ><?php echo $rnews['news_name']; ?></p>       </li>
		
<?php }?>
 
     
       
		</ul>
			 
           
	  <div id="pagesaghabersld" class="pagesaghabersld"></div>

	</div>
 