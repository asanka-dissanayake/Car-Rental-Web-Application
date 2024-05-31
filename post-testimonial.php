<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['submit'])) {
    $testimonoial = $_POST['testimonial'];
    $email = $_SESSION['login'];
    $sql = "INSERT INTO  tbltestimonial(UserEmail,Testimonial) VALUES(:email,:testimonoial)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':testimonoial', $testimonoial, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);

    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      $msg = "Testimonail submitted successfully";
    } else {
      $error = "Something went wrong. Please try again";
    }

  }
  ?>
  <!DOCTYPE HTML>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title> ShareCar Car Rental Portal |Post testimonial</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!--Custome Style -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!--slick-slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!--bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">



    <link rel="shortcut icon" href="assets/images/favicon-icon/sharecar.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <style>
      .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      }

      .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      }
    </style>
  </head>

  <body>



    <!--Header-->
    <?php include('includes/header.php'); ?>
    <!-- /Header -->
    <!--Page Header-->
    <section class="page-header profile_page">
      <div class="container">
        <div class="page-header_wrap">
          <div class="page-heading">
            <h1>Post Reviews</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Post Reviews</li>
          </ul>
        </div>
      </div>
      <!-- Dark Overlay-->
      <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->
    <section class="user_profile inner_pages">
      <div class="container">


        <div class="row">
          <div class="col-md-3 col-sm-3">
            <?php include('includes/sidebar.php'); ?>
            <div class="col-md-6 col-sm-8">
              <div class="profile_wrap">
                <h5 class="uppercase underline">Post a Review</h5>
                <?php if ($error) { ?>
                  <div class="errorWrap"><strong>ERROR</strong>:
                    <?php echo htmlentities($error); ?>
                  </div>
                <?php } else if ($msg) { ?>
                    <div class="succWrap"><strong>SUCCESS</strong>:
                    <?php echo htmlentities($msg); ?>
                    </div>
                <?php } ?>
                <form method="post">


                  <div class="form-group">
                    <label class="control-label">Review</label>
                    <textarea class="form-control white_bg" name="testimonial" rows="4" required=""></textarea>
                  </div>


                  <div class="form-group">
                    <button type="submit" name="submit" class="btn">Save <span class="angle_arrow"><i
                          class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!--/Profile-setting-->

    <<!--Footer -->
      <?php include('includes/footer.php'); ?>
      <!-- /Footer-->

      <!--Login-Form -->
      <?php include('includes/login.php'); ?>
      <!--/Login-Form -->

      <!--Register-Form -->
      <?php include('includes/registration.php'); ?>

      <!--/Register-Form -->

      <!--Forgot-password-Form -->
      <?php include('includes/forgotpassword.php'); ?>
      <!--/Forgot-password-Form -->

      <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/interface.js"></script>
      <!--Switcher-->
      <script src="assets/switcher/js/switcher.js"></script>
      <!--bootstrap-slider-JS-->
      <script src="assets/js/bootstrap-slider.min.js"></script>
      <!--Slider-JS-->
      <script src="assets/js/slick.min.js"></script>
      <script src="assets/js/owl.carousel.min.js"></script>

  </body>

  </html>
<?php } ?>