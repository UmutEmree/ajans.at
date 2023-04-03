<link href="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- END PLUGIN CSS -->
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_PUBLIC_ADMIN ?>assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_PUBLIC_ADMIN ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<?php if (isset($css) && in_array("table",$css)): ?>

<link href="<?php echo SITE_PUBLIC_ADMIN?>assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo SITE_PUBLIC_ADMIN?>assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_PUBLIC_ADMIN?>assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
 
<?php endif; ?>


<?php if (isset($css) && in_array("tabs",$css)): ?>
<link href="<?php echo SITE_PUBLIC_ADMIN?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo SITE_PUBLIC_ADMIN?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css">
 
<?php endif; ?>

 <link href="<?php echo SITE_PUBLIC_ADMIN?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_PUBLIC_ADMIN ?>assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITE_PUBLIC_ADMIN ?>assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>

<?php if (isset($css) && in_array("datepicker",$css)): ?>
	<link href="<?php echo SITE_PUBLIC_ADMIN?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<?php endif ?>