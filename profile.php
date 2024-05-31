<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['updateprofile'])) {
    $name = $_POST['fullname'];
    $mobileno = $_POST['mobilenumber'];
    $dob = $_POST['dob'];
    $adress = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $email = $_SESSION['login'];
    $pp = $_FILES["pp"]["name"];

    move_uploaded_file($_FILES["pp"]["tmp_name"], "upload/" . $_FILES["pp"]["name"]);

    $sql = "update tblusers set FullName=:name,ContactNo=:mobileno,dob=:dob,Address=:adress,City=:city,Country=:country,Propic=:pp where EmailId=:email";

    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
    $query->bindParam(':dob', $dob, PDO::PARAM_STR);
    $query->bindParam(':adress', $adress, PDO::PARAM_STR);
    $query->bindParam(':city', $city, PDO::PARAM_STR);
    $query->bindParam(':country', $country, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':pp', $pp, PDO::PARAM_STR);
    $query->execute();

    $msg = "Profile Updated Successfully";
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
    <title>Car Rental Portal | My Profile</title>
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
            <h1>Your Profile</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Profile</li>
          </ul>
        </div>
      </div>
      <!-- Dark Overlay-->
      <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <section class="user_profile inner_pages">
      <div class="container">
        <img src="assets/images/propic.png" class=" js-image img-fluid rounded"
          style="width: 200px; height: 200px; object-fit: cover">
        <div>

          <?php
          $useremail = $_SESSION['login'];
          $sql = "SELECT * from tblusers where EmailId=:useremail";
          $query = $dbh->prepare($sql);
          $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <?php include('includes/sidebar.php'); ?>
                  <div class="col-md-6 col-sm-8">
                    <div class="profile_wrap">
                      <h5 class="uppercase underline">Genral Settings</h5>
                      <?php
                      if ($msg) { ?>
                        <div class="succWrap"><strong>SUCCESS</strong>:
                          <?php echo htmlentities($msg); ?>
                        </div>
                      <?php } ?>
                      <form method="post">
                        <div class="form-group">
                          <label class="control-label">Reg Date -</label>
                          <?php echo htmlentities($result->RegDate); ?>
                        </div>
                        <div class="form-group">
                          <label class="control-label"></label>
                          <div class="col-sm-4">
                            <input type="file" name="pp">
                          </div>

                          <div class="form-group">
                            <label class="control-label">Full Name</label>
                            <input class="form-control white_bg" name="fullname"
                              value="<?php echo htmlentities($result->FullName); ?>" id="fullname" type="text" required>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Email Address</label>
                            <input class="form-control white_bg" value="<?php echo htmlentities($result->EmailId); ?>"
                              name="emailid" id="email" type="email" required readonly>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Phone Number</label>
                            <input class="form-control white_bg" name="mobilenumber"
                              value="<?php echo htmlentities($result->ContactNo); ?>" id="phone-number" type="text" required>
                          </div>


                          <div class="form-group">
                            <label class="control-label">Date of Birth&nbsp;(dd/mm/yyyy)</label>
                            <input type="date" value="<?php echo htmlentities($result->dob); ?>" name="dob"
                              placeholder="dd/mm/yyyy" id="birth-date" type="text">
                          </div>
                          <div class="form-group">
                            <label class="control-label">Your Address</label>
                            <textarea class="form-control white_bg" name="address"
                              rows="4"><?php echo htmlentities($result->Address); ?></textarea>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Country</label>
                            <input class="form-control white_bg" id="country" name="country"
                              value="<?php echo htmlentities($result->City); ?>" type="text">
                          </div>
                          <div class="form-group">
                            <label class="control-label">City</label>
                            <input class="form-control white_bg" id="city" name="city"
                              value="<?php echo htmlentities($result->City); ?>" type="text">
                          </div>
                        <?php }
          } ?>

                      <div class="form-group">
                        <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i
                              class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                      </div>
                  </form>
                </div>
              </div>
            </div>

    </section>
    <!--/Profile-setting-->

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
    <!--/Forgot-password-Form -->

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/interface.js"></script>

    <!--bootstrap-slider-JS-->
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <!--Slider-JS-->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

    <script>


      <script>
        $(document).ready(function(){
          $("#btn1").click(function () {
            $("p").append(" <b>Appended text</b>.");
          });

        $("#btn2").click(function(){
          $("ol").append("<li>Appended item</li>");
                });
                });
    </script>
    console.log(URL);
    function display_image(file)
    {
    var img= document.querySelector(".js-image");
    img.src=URL.createObjectURL(file);

    }

    </script>



  </body>

  </html>
<?php } ?>