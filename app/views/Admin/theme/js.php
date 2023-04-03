

<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK --> 
<!-- BEGIN PAGE LEVEL JS --> 
<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/js/bootstrap-growl.js" type="text/javascript"></script>  
<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS --> 	
<!-- BEGIN CORE TEMPLATE JS --> 



<?php if (isset($js) && in_array("editor",$js)): ?>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/tinymce/tinymce.min.js"></script>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/tinymce/setting.js"></script>
<?php endif; ?>


<?php if (isset($js) && in_array("table",$js)): ?>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript" ></script>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript" ></script>
	<script type="text/javascript" src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
	<script type="text/javascript" src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/datatables-responsive/js/lodash.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/js/datatables.js" type="text/javascript"></script>
<?php endif; ?>


<?php if (isset($js) && in_array("form",$js)): ?>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/js/form_elements.js" type="text/javascript"></script>

<?php endif; ?>
<?php if (isset($js) && in_array("tabs",$js)): ?>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/js/tabs_accordian.js" type="text/javascript"></script>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
<?php endif; ?>
<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/js/core.js" type="text/javascript"></script> 
<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/js/chat.js" type="text/javascript"></script> 
<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/js/jquery.cookie.js"></script>
<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/js/general.js"></script>

<?php if (isset($js) && in_array("datepicker",$js)):?>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.tr.js" type="text/javascript"></script>

<?php endif ?>



<?php if (isset($jsp) && isset($jsp)){ foreach ($jsp as $j) {?>
<script src="<?php echo SITE_PUBLIC_ADMIN ?>assets/js/page/<?php echo $j ?>.js"></script>		
<?php } }  ?>		


<?php if (isset($js) && in_array("gapi",$js)){ 
include 'gapi.php';		
} ?>	
