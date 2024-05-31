<?php
//filter.php  
if (isset($_POST["from_date"], $_POST["to_date"])) {
     $dbh = mysqli_connect("localhost", "root", "", "carrental");
     $output = '';
     $query = "  
           SELECT * FROM tblbooking 
           WHERE PostingDate BETWEEN '" . $_POST["from_date"] . "' AND '" . $_POST["to_date"] . "'  
      ";
     $result = mysqli_query($dbh, $query);
     $output .= '  
           <table class="display table table-striped table-bordered table-hover">  
                <tr>  
                     <th width="5%">ID</th>  
                     <th width="30%">Email</th>  
                     <th width="30%">From date</th>  
                     <th width="20%">To date</th>  
                     <th width="12%">booked date</th>  
                </tr>  
      ';
     if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
               $output .= '  
                     <tr>  
                          <td>' . $row["id"] . '</td>  
                          <td>' . $row["userEmail"] . '</td>  
                          <td>' . $row["FromDate"] . '</td>  
                          <td>' . $row["ToDate"] . '</td>  
                          <td>' . $row["PostingDate"] . '</td>  
                     </tr>  
                ';
          }
     } else {
          $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';
     }
     $output .= '</table>';
     echo $output;
}
?>