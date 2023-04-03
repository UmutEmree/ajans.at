<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="<?php echo $set['General_desc'] ?>" />
<meta name="keywords" content="<?php echo $set['General_keyw'] ?>" />
<meta name="author" content="Infinitum Creative Agency">


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
  <!-- preloader start -->

  <!-- preloader end --> 

  <!-- wrapper start -->
  <div class="wrapper"> 

    <!-- sticky header start -->
    <?php include 'theme/top.php'; ?>
    <!-- sticky header end --> 



    <!-- top sec start -->
    <?php include 'theme/banner.php'; ?>
    <!-- top sec end --> 

    <!-- data start -->

    <div class="container ">
      <div class="row "> 
        <!-- left sec start -->
        <?php include 'theme/left.php'; ?>      
        <!-- left sec end --> 
        <!-- right sec start -->
        <div class="col-sm-5 hidden-xs hidden-sm right-sec">
        <div class="bordered top-margin">
          <div class="row ">
        <?php include 'theme/right.php'; ?>  
        </div>
        </div>
        </div>    
        <!-- right sec end --> 
      </div>
    </div>
    <!-- data end --> 
    <?php include 'theme/footer.php'; ?>


    <?php include 'theme/popup.php'; ?>

  </div>
  <!-- wrapper end --> 

  <?php include 'theme/js.php'; ?>
</body>
</html>