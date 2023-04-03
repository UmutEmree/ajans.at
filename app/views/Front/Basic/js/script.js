	
	/* header yazarlar*/
 
	$(document).ready(function() {
		$site_url = $('#site_url').val();
		 var sagid = $('#sagtab1').data('id');		 
		$('#tabs-1').load($site_url+'Index/saghaber/'+sagid);	 
		
		$('blockquote').quovolver();
		
		wid = $( window ).width();
		 aramabarwid = wid/2-130;
		$('#aramabarbg').css('width',aramabarwid+'px');
		
		//$( "#saghaber" ).tabs();
		
		
		
		//-------------------resim slider
		
			$('#resimslider32').carouFredSel({
					prev: '#prevrs12',
					next: '#nextrs12',
					pagination: "#pagerres3",
					auto: false
				});
		
			//-------------------sag haber slider
			

			
 
 
/* spot slider*/ 

			$('#spotslider').carouFredSel({
					prev: '#prevspt',
					next: '#nextspt',
					pagination: "#pagerspt",
					auto: false
				});

	/* spot slider*/
	
	$('#sagsporhaberler .contentsi li:last').css('border','none');
	$('#guneyansiyanhaberler .contentsi li:last').css('border','none');
	
	
		});
		
		
		
		
		 function sagislem(id,renk,tabno){
		 	$site_url = $('#site_url').val();
			if(tabno == 5) {
				tans = 1;
				}else{
					tans = tabno-1+2;
					}
					
					
			$('#sagtab1').removeClass('actx1');
			$('#sagtab2').removeClass('actx2');
			$('#sagtab3').removeClass('actx3');
			$('#sagtab4').removeClass('actx4');
			$('#sagtab5').removeClass('actx5');
		 $('#tabs-1').load($site_url+'Index/saghaber/'+id);	 
	 $('#tabs-1').attr('data-id',tans);
	 $('#sagtab'+tabno).addClass('actx'+tabno);
	 setTimeout(function(){
	  $('#pagesaghabersld').css('background-color',renk);
	   $('#pagesaghabersld a').css('border-color','rgba(204,204,204,1)');
	 
 
	  
	 },200);
	 }
	  