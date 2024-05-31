<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
  $email = $_POST['username'];
  $password = md5($_POST['password']);
  $sql = "SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $_SESSION['alogin'] = $_POST['username'];
    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
  } else {

    echo "<script>alert('Invalid Details');</script>";

  }

}

?>

<link id="pagestyle" href="assets/css/material-dashboard.min.css?" rel="stylesheet" />

<body>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100"
      style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Admin Dashboard</h4>
                  <h3 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign In</h3>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-body">
                <form role="form" class="text-start" method="post">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" name="login">Sign in</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>











      <!-- <body>

  <div class="login-page bk-img" style="background-image: url(img/adminlogin.jpg);">
    <div class="form-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h1 class="text-center text-bold text-light mt-4x">Sign in</h1>
            <div class="well row pt-2x pb-3x bk-light">
              <div class="col-md-8 col-md-offset-2">
                <form method="post">

                  <label for="" class="text-uppercase text-sm">Your Username </label>
                  <input type="text" placeholder="Username" name="username" class="form-control mb">

                  <label for="" class="text-uppercase text-sm">Password</label>
                  <input type="password" placeholder="Password" name="password" class="form-control mb">



                  <button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->



</body>

</html>