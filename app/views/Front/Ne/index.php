<?php include_once 'app/helper/General.php'; $helper = new General();?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="<?php echo $set['General_desc'] ?>" />
<meta name="keywords" content="<?php echo $set['General_keyw'] ?>" />
<meta name="author" content="TugraWeb">



<meta property="fb:app_id" content="<?php echo $set['fb_app_id'] ?>" /> 
<meta property="fb:admins" content="<?php echo $set['fb_admin_id'] ?>" />
<meta property="og:url" content="http://www.<?php echo $set['General_Site_Domain'] ?>/"/>
<meta property="og:title" content="<?php echo $set['General_title'] ?>"/>
<meta property="og:image" content="http://<?php echo SITE_UPLOAD_DIR ?>content/logo.png"/>
<meta property="og:type" content="video" />
<title><?php echo $set['General_title'] ?></title>




<?php include 'theme/src.php'; ?>
 
</head>
<body>
 

<!-- wrapper start -->
<div class="wrapper"> 
  <div class="hidden-xs hidden-sm">
<?php include 'theme/header.php'; ?>
  </div>

<?php include 'theme/top.php'; ?>


  
  <div class="container">
    <div class="row"> 



      <!-- banner outer start -->

      <?php include 'theme/banner.php'; ?>
      <!-- banner outer end --> 
      
    </div>
  </div>
  <!-- top sec end --> 
  
  <!-- data start -->
  
  <div class="container ">
    <div class="row "> 



      <!-- left sec start -->
      <?php include 'theme/left.php'; ?>
      
      <!-- left sec end --> 



      <div class="col-sm-5  hidden-sm right-sec">
        <div class="bordered top-margin">
          <div class="row ">
      <!-- right sec start -->
      <?php include 'theme/right.php'; ?>
    </div>
    </div>

    </div>
    

      <!-- right sec end --> 
    </div>
  </div>
  <!-- data end --> 
  
  <!-- Footer start -->
  <?php include 'theme/footer.php'; ?>
  <!-- Footer end -->


  <?php include 'theme/popup.php'; ?>
      
  
</div>
<!-- wrapper end --> 

<!-- jQuery -->
<?php include 'theme/js.php'; ?> 

</body>

</html>
