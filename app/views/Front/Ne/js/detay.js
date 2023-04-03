

$('.go').click(function() {

	var sira = $(this).data('id');

	window.location.href='#'+sira;

	navci();

	gitme();

	linkayarla();

	 


 });


 


 function linkayarla(){

 	var siras = window.location.hash.substr(1); 

if (siras != '') {

	sira = siras
}else{
	sira = 1;
}


$('.relink').css('background','#fff');
$('.relink').removeAttr('disabled');

  $('#link'+sira).css('background','#ccc');
  $('#link'+sira).attr('disabled','disabled');

 }


	function gitme(){

site_url = $('#site_url').val();





var siras = window.location.hash.substr(1); 

if (siras != '') {

	sira = siras
}else{
	sira = 1;
}


curid = $('#link'+sira).data('id');

 
 sonsira = $('#lastusak').val();

$.post( site_url+"Galeri/galeriresim", { id: curid, sira: sira,sonsira:sonsira })
  .done(function( data ) {

  	$('#rgaleri').html(data);
   
  });

 


} 


$(document).ready(function() {

	var siras = window.location.hash.substr(1); 

if (siras != '' && siras >1) {

	$('#left_go').css('display','block');
}else{
	$('#left_go').css('display','none');
}



navci();

	gitme();

	linkayarla();

	
	
});



function navci(){


	var siras = window.location.hash.substr(1); 

if (siras != '' && siras >1) {

	$('#left_go').css('display','block');
}else{
	$('#left_go').hide();
}


}



$('.relink').click(function() {

	var sira = $(this).html();

	window.location.href='#'+sira;

	navci();

	gitme();

	linkayarla();

	 


 });