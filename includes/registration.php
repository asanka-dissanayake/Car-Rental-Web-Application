<?php
//error_reporting(0);
include("includes/config");

if (isset($_POST['signup'])) {

  $fname = $_POST['fullname'];
  $email = $_POST['emailid'];
  $mobile = $_POST['mobileno'];
  $role = $_POST['role'];
  $password = md5($_POST['password']);
  $confirmpassword = md5($_POST["confirmpassword"]);

  if ($password == $confirmpassword) {

    $sql = "INSERT INTO  tblusers(FullName,EmailId,Role,ContactNo,Password) VALUES(:fname,:email,:role,:mobile,:password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':role', $role, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();

    if ($query) {

      echo '<script type="text/javascript"> alert("You are Successfully Sign Up")</script>';

    } else {

      echo '<script type="text/javascript"> alert("Register Fail")</script>';

    }
  } else {
    echo '<script type="text/javascript"> alert("Password and Confirm Password does not match")</script>';

  }
}





?>

<!-- password check  -->

<script>
  function stp() {
    var x = document.getElementById("msg");
    x.innerHTML = "Enter 8 digit Password !";
    var z = x.length;
    window.alert(z);

  }
  function check() {
    var x = document.getElementById("msg");
    x.style.display = "none";

    var y = document.getElementById("loader");
    y.style.opacity = 1;

    var z = document.getElementById("password").value;
    var len = z.length;

    var chk = document.getElementById("check");
    len > 7 ? chk.style.opacity = 1 : y.style.opacity = 1;
    len > 7 ? y.style.opacity = 0 : chk.style.opacity = 0;


  }
</script>



<script>
  function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check_availability.php",
      data: 'emailid=' + $("#emailid").val(),
      type: "POST",
      success: function (data) {
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
      },
      error: function () { }
    });
  }
</script>


<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post" name="signup" onSubmit="return valid();">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="mobileno" placeholder="Mobile Number" maxlength="10"
                    required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()"
                    placeholder="Email Address" required="required">
                  <span id="user-availability-status" style="font-size:12px;"></span>
                </div>
                <div class="form-group">

                  <select class="form-control" id="exampleFormControlSelect1" name="role">
                    <option select class="rolebar">Select Role</option>
                    <option value="CarOwner">Car Owner</option>
                    <option value="Driver">Driver</option>

                  </select>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" onclick="stp()" oninput="check ()"
                    placeholder="Password" id="password" required="required"><span style="color:red" id="msg"></span><i
                    id="loader" class="fa-solid fa-spinner fa-spin" style="opacity:0;"></i><i id="check"
                    class="fa-solid fa-check" style="opacity :0; color:green;"></i>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password"
                    required="required">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>
  </div>
</div>