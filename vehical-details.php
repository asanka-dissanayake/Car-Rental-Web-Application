<?php
session_start();
include('includes/config.php');


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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <title>ShareCar Car Rental Portal</title>
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
</head>

<body>



  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!-- /Header -->

  <!--Listing-Image-Slider-->

  <?php
  $vhid = intval($_GET['vhid']);
  $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:vhid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    foreach ($results as $result) {
      $_SESSION['brndid'] = $result->bid;
      ?>

      <section id="listing_img_slider">
        <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive"
            alt="image" width="500" height="360"></div>
        <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" class="img-responsive"
            alt="image" width="500" height="360"></div>
        <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" class="img-responsive"
            alt="image" width="500" height="360"></div>
        <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" class="img-responsive"
            alt="image" width="500" height="360"></div>
        <?php if ($result->Vimage5 == "") {

        } else {
          ?>
          <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5); ?>" class="img-responsive"
              alt="image" width="500" height="360"></div>
        <?php } ?>
      </section>
      <!--/Listing-Image-Slider-->


      <!--Listing-detail-->
      <section class="listing-detail">
        <div class="container">
          <div class="listing_detail_head row">
            <div class="col-md-9">
              <h2>
                <?php echo htmlentities($result->BrandName); ?> ,
                <?php echo htmlentities($result->VehiclesTitle); ?>
              </h2>
            </div>
            <div class="col-md-3">
              <div class="price_info">
                <p>£
                  <?php echo htmlentities($result->PricePerDay); ?>
                </p>Per Day

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              <div class="main_features">
                <ul>

                  <li>
                    <h4>Reg.Year</h4>
                    <h5>
                      <?php echo htmlentities($result->ModelYear); ?>
                    </h5>

                  </li>
                  <li>
                    <h4>Fuel Type</h4>
                    <h5>
                      <?php echo htmlentities($result->FuelType); ?>
                    </h5>

                  </li>

                  <li>
                    <h4>Seats</h4>
                    <h5>
                      <?php echo htmlentities($result->SeatingCapacity); ?>
                    </h5>

                  </li>
                </ul>
              </div>
              <div class="listing_more_info">
                <div class="listing_detail_wrap">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs gray-bg" role="tablist">
                    <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview"
                        role="tab" data-toggle="tab">Vehicle Overview </a></li>


                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- vehicle-overview -->
                    <div role="tabpanel" class="tab-pane active" id="vehicle-overview">

                      <p>
                        <?php echo htmlentities($result->VehiclesOverview); ?>
                      </p>
                    </div>
                    <table>
                      <thead>
                        <tr>
                          <th colspan="2">Accessories</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Air Conditioner</td>
                          <?php if ($result->AirConditioner == 1) {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          <?php } ?>
                        </tr>

                        <tr>
                          <td>AntiLock Braking System</td>
                          <?php if ($result->AntiLockBrakingSystem == 1) {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          <?php } ?>
                        </tr>

                        <tr>
                          <td>Power Steering</td>
                          <?php if ($result->PowerSteering == 1) {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          <?php } ?>
                        </tr>


                        <tr>

                          <td>Power Windows</td>

                          <?php if ($result->PowerWindows == 1) {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          <?php } ?>
                        </tr>

                        <tr>
                          <td>CD Player</td>
                          <?php if ($result->CDPlayer == 1) {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          <?php } ?>
                        </tr>

                        <tr>
                          <td>Leather Seats</td>
                          <?php if ($result->LeatherSeats == 1) {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          <?php } ?>
                        </tr>

                        <tr>
                          <td>Central Locking</td>
                          <?php if ($result->CentralLocking == 1) {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          <?php } ?>
                        </tr>

                        <tr>
                          <td>Power Door Locks</td>
                          <?php if ($result->PowerDoorLocks == 1) {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          <?php } ?>
                        </tr>
                        <tr>
                          <td>Brake Assist</td>
                          <?php if ($result->BrakeAssist == 1) {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          <?php } ?>
                        </tr>

                        <tr>
                          <td>Driver Airbag</td>
                          <?php if ($result->DriverAirbag == 1) {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          <?php } ?>
                        </tr>

                        <tr>
                          <td>Passenger Airbag</td>
                          <?php if ($result->PassengerAirbag == 1) {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          <?php } ?>
                        </tr>

                        <tr>
                          <td>Crash Sensor</td>
                          <?php if ($result->CrashSensor == 1) {
                            ?>
                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          <?php } else { ?>
                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                          <?php } ?>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          <?php }
  } ?>


        <!--Side-Bar-->
        <aside class="col-md-3">


          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5></i>Book Now</h5>
            </div>



            <?php

            if (isset($_POST['submit'])) {
              $fromdate = $_POST['fromdate'];
              $todate = $_POST['todate'];
              $message = $_POST['message'];
              $PricPerDay = $_POST['PricePerDay'];
              $useremail = $_SESSION['login'];
              $status = 0;
              $vhid = $_GET['vhid'];
              $sql = "INSERT INTO  tblbooking(userEmail,VehicleId,FromDate,ToDate,message,Status,PricePerDay) VALUES(:useremail,:vhid,:fromdate,:todate,:message,:status,:PricePerDay)";
              $query = $dbh->prepare($sql);
              $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
              $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
              $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
              $query->bindParam(':todate', $todate, PDO::PARAM_STR);
              $query->bindParam(':message', $message, PDO::PARAM_STR);
              $query->bindParam(':status', $status, PDO::PARAM_STR);
              $query->bindParam(':PricePerDay', $status, PDO::PARAM_STR);
              $query->execute();


              echo $_POST['fromdate'] . "<br>";
              echo $_POST['todate'] . "<br>";


            } else {
              ?>


              <form method="post" action="">

                <div class="form-group">
                  <input type="date" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
                </div>
                <div class="form-group">
                  <input type="date" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
                </div>


                <?php if ($_SESSION['login']) { ?>
                  <div class="form-group">
                    <input type="submit" class="btn" name="submit" value="Book Now"><br /><br />

                  </div>


                <?php } else { ?>
                  <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For
                    Book</a>


                <?php } ?>
              </form>
            <?php } ?>
            <!-- Booking-->



            <!--booking finish-->


            <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">

              <input type="hidden" name="business" value="sb-ie4gi26167310@business.example.com">
              <input type="hidden" name="item_name" value="<?php echo htmlentities($result->BrandName); ?>">
              <input type="hidden" name="item_number" value="<?php echo htmlentities($result->id); ?>">
              <input type="hidden" name="amount" value="<?php echo htmlentities($result->PricePerDay); ?>">
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="no_shipping" value="1">
              <input type="hidden" name="cmd" value="_xclick">
              <input type="hidden" name="return" value="http://localhost/carrental/success.php">
              <input type="hidden" name="cancel_return" value="http://localhost/carrental/cancel.php">
              <div class="form-group">

                <p class="card-text">
                  <?php echo htmlentities($result->BrandName); ?>
                </p>

                <p class="card-text">Total Amount £
                  <?php echo htmlentities($result->PricePerDay); ?>
                </p>
                <input type="submit" class="btn" name="submit" value="Pay">
              </div>

            </form>


          </div>
        </aside>
        <!--/Side-Bar-->
      </div>

      <div class="space-20"></div>
      <div class="divider"></div>


    </div>
  </section>
  <!--/Listing-detail-->

  <!--Footer -->
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

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/interface.js"></script>
  <script src="assets/switcher/js/switcher.js"></script>
  <script src="assets/js/bootstrap-slider.min.js"></script>
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>