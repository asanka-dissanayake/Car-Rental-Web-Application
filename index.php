<!--Asanka -->
<?php
session_start();
include ('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>ShareCar Car Rental Portal</title>
  <!--Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">



  <link rel="shortcut icon" href="assets/images/favicon-icon/sharecar.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>



  <!--Header-->
  <?php include ('includes/header.php'); ?>
  <!-- /Header -->

  <!-- Banners -->
  <section id="banner" class="banner-section">

    <div class="container">

      <div class="search">

        <div class="banner-search_bar">
          <form action="car-listing.php" method="post" action="">


            <div class="form-group">
              <label class="col-sm-2 control-label" style="color:white">Pick Up Date</label>
              <div class="col-sm-4">
                <input type="date" name="fromdate" class="form-control" required
                  value="<?php echo date("Y-m-d H:i", strtotime($_GET['fromdate'])) ?>" autocomplete="off">
              </div>
              <label class="col-sm-2 control-label" style="color:White">Select Brand</label>
              <div class="col-sm-4">
                <select class="form-control" name="brandname" required>
                  <option value="0"> Any </option>

                  <?php $ret = "select id,BrandName from tblbrands";
                  $query = $dbh->prepare($ret);
                  //$query->bindParam(':id',$id, PDO::PARAM_STR);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  if ($query->rowCount() > 0) {
                    foreach ($results as $result) {
                      ?>
                      <option value="<?php echo htmlentities($result->id); ?>">
                        <?php echo htmlentities($result->BrandName); ?>
                      </option>
                    <?php }
                  } ?>

                </select>
              </div> &nbsp;&nbsp;
              <center>
                <input type="button" class="btn" id="search" value="Search">
              </center>
            </div>


          </form>

        </div>
      </div>





    </div>
  </section>
  <!-- /Banners -->


  <!-- Resent Cat-->
  <section class="section-padding gray-bg">
    <div class="container">

      <div class="row">
        <div class="section-header text-center">
          <h2>Welcome to ShareCar</h2>
          <p>Your Journey, Your Way! Discover a seamless and premium car rental experience right at your fingertips.
            Whether you're planning a business trip or a leisurely drive, our extensive fleet of vehicles awaits to
            elevate your travel adventures. Explore our user-friendly platform, find the perfect vehicle for your needs,
            and embark on the road with confidence. At ShareCar, we're not just offering cars; we're delivering freedom,
            comfort, and unparalleled service. Start your journey now and let us drive your dreams!</p>
        </div>
        <!-- Recently Listed New Cars -->

        <div class="tab-content">

          <div role="tabpanel" class="tab-pane active" id="resentnewcar">
            <!--slider-->
            <section>
              <div id="testimonial-slider">


                <?php
                $tid = 1;
                $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                  foreach ($results as $result) {
                    ?>


                    <div class="testimonial-m">
                      <div class="testimonial-img"> <a
                          href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img
                            src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>"
                            class="img-responsive" alt="image"></a> </div>
                      <div class="testimonial-content">
                        <div class="testimonial-heading">
                          <div class="car-title-m">
                            <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                                <?php echo htmlentities($result->BrandName); ?> ,
                                <?php echo htmlentities($result->VehiclesTitle); ?>
                              </a></h6>
                            <span class="price">$
                              <?php echo htmlentities($result->PricePerDay); ?> /Day
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php }
                } ?>
              </div>

          </div>
  </section>
  </div>
  </div>

  </div>
  </section>
  <!-- /Resent Cat -->



  <!--Testimonial -->
  <section class="section-padding testimonial-section parallex-bg">
    <div class="container div_zindex">
      <div class="section-header white-text text-center">
        <h2>Your Satisfaction, Our Priority</h2>
      </div>
      <div class="row">
        <div id="testimonial-slider">
          <?php
          $tid = 1;
          $sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid";
          $query = $dbh->prepare($sql);
          $query->bindParam(':tid', $tid, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>



              <div class="testimonial-m">
                <div class="testimonial-img"> <img src="assets/images/star.png" alt="" /> </div>
                <div class="testimonial-content">
                  <div class="testimonial-heading">
                    <h5>
                      <?php echo htmlentities($result->FullName); ?>
                    </h5>
                    <p>
                      <?php echo htmlentities($result->Testimonial); ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php }
          } ?>



        </div>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <!-- /Testimonial-->

  <!--Footer -->
  <?php include ('includes/footer.php'); ?>
  <!-- /Footer-->



  <!--Login-Form -->
  <?php include ('includes/login.php'); ?>
  <!--/Login-Form -->

  <!--Register-Form -->
  <?php include ('includes/registration.php'); ?>

  <!--/Register-Form -->

  <!--Forgot-password-Form -->
  <?php include ('includes/forgotpassword.php'); ?>
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