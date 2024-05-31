<?php
$dbh = mysqli_connect("localhost", "root", "", "carrental");
$query = "SELECT * FROM tblbooking ORDER BY id desc";
$result = mysqli_query($dbh, $query);


?>


<!DOCTYPE html>
<html>

<head>
     <title>Webslesson Tutorial | Ajax PHP MySQL Date Range Search using jQuery DatePicker</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />    -->
     <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>


<?php include('includes/header.php'); ?>


<?php include('includes/sidebar.php'); ?>

<body>

     <div class="container-fluid py-4">

          <div class="row">
               <div class="col-12">


                    <div class="card my-4">

                         <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                              <div class="container" style="width:900px;">
                                   <h2 class="page-title text-center">Booking Deatils Report</h2>

                                   <nav class="">
                                        <form class="form-inline">
                                             <a href="report_vehicles.php">
                                                  <button class="btn btn-outline-primary" type="button">Registed Vehicle
                                                       Report</a>
                                             <a href="report_booking.php">
                                                  <button class="btn btn-outline-primary" type="button">Booking Details
                                                       Report</button></a>
                                             <a href="report_users.php">
                                                  <button class="btn btn-outline-primary" type="button">Registered Users
                                                       Report</button></a>
                                        </form>
                                   </nav>




                                   <div class="form-control">
                                        <div class="col-md-3">
                                             <input type="text" name="from_date" id="from_date" class=""
                                                  placeholder="From Date" />
                                        </div>
                                        </br>

                                        <div class="col-md-3">
                                             <input type="text" name="to_date" id="to_date" class=""
                                                  placeholder="To Date" />
                                        </div>
                                        </br>
                                        <div class="col-md-5">
                                             <input type="button" name="filter" id="filter" value="Filter"
                                                  class="btn btn-primary" />
                                        </div>
                                        <div style="clear:both"></div>
                                        <br />
                                        <div id="order_table">
                                             <table class="display table table-striped table-bordered table-hover">
                                                  <tr>

                                                       <th width="5%">id</th>
                                                       <th width="30%">Email</th>
                                                       <th width="30%">From date</th>
                                                       <th width="20%">To date</th>
                                                       <th width="12%">booked date</th>
                                                  </tr>
                                                  <?php
                                                  while ($row = mysqli_fetch_array($result)) {
                                                       ?>
                                                       <tr>

                                                            <td>
                                                                 <?php echo $row["id"]; ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo $row["userEmail"]; ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo $row["FromDate"]; ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo $row["ToDate"]; ?>
                                                            </td>
                                                            <td>
                                                                 <?php echo $row["PostingDate"]; ?>
                                                            </td>
                                                       </tr>
                                                       <?php
                                                  }
                                                  ?>
                                             </table>
                                        </div>

                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

          </div>

</body>

</html>
<script>
     $(document).ready(function () {
          $.datepicker.setDefaults({
               dateFormat: 'yy-mm-dd'
          });
          $(function () {
               $("#from_date").datepicker();
               $("#to_date").datepicker();
          });
          $('#filter').click(function () {
               var from_date = $('#from_date').val();
               var to_date = $('#to_date').val();
               if (from_date != '' && to_date != '') {
                    $.ajax({
                         url: "filter_booking.php",
                         method: "POST",
                         data: { from_date: from_date, to_date: to_date },
                         success: function (data) {
                              $('#order_table').html(data);
                         }
                    });
               }
               else {
                    alert("Please Select Date");
               }
          });
     });  
</script>