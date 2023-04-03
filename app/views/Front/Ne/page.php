<?php include_once 'app/helper/General.php'; $helper = new General();?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from webyzona.com/templates/themeforest/globalnews/author-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 13:50:32 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $set['General_desc'] ?>" />
<meta name="keywords" content="<?php echo $set['General_keyw'] ?>" />

<meta property="fb:app_id" content="<?php echo $set['fb_app_id'] ?>" /> 
<meta property="fb:admins" content="<?php echo $set['fb_admin_id'] ?>" />
<meta property="og:url" content="http://<?php echo $set['General_Site_Domain'] ?>"/>
<meta property="og:title" content="<?php echo $set['General_title'] ?>"/>
<meta property="og:image" content="http://<?php echo SITE_UPLOAD_DIR ?>content/logo.png"/>
<meta property="og:locale" content="tr_TR"/>
<meta property="og:type" content="website"/>
<title><?php echo $pg['Content_Name'] ?></title>




<?php include 'theme/src.php'; ?>




</head>
<body>
<!-- /END THEME SWITCHER--> <!-- wrapper start -->
<div class="wrapper">


<div class="hidden-xs hidden-sm">
<?php include 'theme/header.php'; ?>
  </div>
  <!-- header toolbar end --> 
  <!-- sticky header start -->

  <?php include 'theme/top.php'; ?>
  <!-- sticky header end -->
  
  <div class="container"> 
    
    <!-- bage header start -->
    <div class="col-sm-16">
    <div class="page-header">
      
      <h1><?php echo $pg['Content_Name'] ?></h1>
    
      <div class="hidden-sm hidden-xs">
      <ol class="breadcrumb">
        <li><a href="<?php echo SITE_URL ?>">NeLaanBu</a></li>
        <li><?php echo $pg['Content_Name'] ?></li>
      </ol>
      </div>
    </div>
    </div>
    <!-- bage header end --> 
    
  </div>
  
  <!-- data start -->
  <section>
    <div class="container ">
      <div class="row "> 
        <!-- left sec start -->
        <div class="col-md-16 col-sm-16">
          <div class="row">
            <div class="col-sm-16 author-box">
              <div class="row">
                <div class="col-xs-16 col-sm-16 col-md-16">
                  <?php echo $pg['Content_Details'] ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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

<!-- Mirrored from webyzona.com/templates/themeforest/globalnews/author-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Nov 2015 13:50:32 GMT -->
</html>