<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="assets/images/sharecar.png" alt="image" width="100"
                height="80" /></a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets">
              <div class=""> </div>
              <div class="circle_icon"> <i class="fa fa-phone" style="color:white" aria-hidden="true"></i> </div>
              <h7 style="color:white">+44-7778877666 </h7>
            </div>





            <?php if (strlen($_SESSION['login']) == 0) {
              ?>
              <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal"
                  data-dismiss="modal"> Login </a> </div>
              <div class="login_btn"> <a href="#signupform" class="btn btn-xs uppercase" data-toggle="modal"
                  data-dismiss="modal"> Register</a> </div>
            <?php } else {

              echo "Welcome To Car rental portal" . "<br>";
              $email = $_SESSION['login'];
              $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email ";
              $query = $dbh->prepare($sql);
              $query->bindParam(':email', $email, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {


                  echo '<div style="font-size:30px; color:#ffd700"> Welcome ' . htmlentities($result->FullName) . '</div>';
                }
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse"
          class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span
            class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                  class="" aria-hidden="true">Welcome</i>
                <?php
                $email = $_SESSION['login'];
                $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email ";
                $query = $dbh->prepare($sql);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                  foreach ($results as $result) {

                    echo htmlentities($result->FullName);
                  }
                } ?><i class="fa fa-angle-down" aria-hidden="true"></i>
              </a>
              <ul class="dropdown-menu">
                <?php if ($_SESSION['login']) { ?>
                  <li><a href="profile.php">Profile Settings</a></li>
                  <li><a href="update-password.php">Update Password</a></li>
                  <li><a href="my-booking.php">Booking History</a></li>
                  <li><a href="post-testimonial.php">Post a Review</a></li>

                  <li><a href="logout.php">Sign Out</a></li>
                <?php } else { ?>
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Update Password</a></li>
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Booking History</a></li>
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Post a Review</a></li>

                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Sign Out</a></li>

                <?php } ?>
              </ul>
            </li>
          </ul>
        </div>

      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="car-listing.php">Car Listing</a>
          <li><a href="service.php">Service</a></li>
          <li><a href="page.php?type=aboutus">About Us</a></li>


          <li><a href="contact-us.php">Contact Us</a></li>

        </ul>
      </div>
      <div class="header_search">
        <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
        <form action="#" method="get" id="header-search-form">
          <input type="text" placeholder="Search..." class="form-control">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>