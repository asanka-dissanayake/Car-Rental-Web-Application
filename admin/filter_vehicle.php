<?php
//filter.php  
if (isset($_POST["from_date"], $_POST["to_date"])) {
     $dbh = mysqli_connect("localhost", "root", "", "carrental");
     $output = '';
     $query = "  
           SELECT * FROM tblvehicles 
           WHERE RegDate BETWEEN '" . $_POST["from_date"] . "' AND '" . $_POST["to_date"] . "'  
      ";
     $result = mysqli_query($dbh, $query);
     $output .= '  
           <table class="display table table-striped table-bordered table-hover">  
                <tr>  
                <th width="5%">id</th>
                <th width="30%">Vehicle Title</th>
                <th width="30%">Model Year</th>
                <th width="20%">Fuel type</th>
                <th width="12%">Reg Date</th>
                </tr>  
      ';
     if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
               $output .= '  
                     <tr>  
                          <td>' . $row["id"] . '</td>  
                          <td>' . $row["VehiclesTitle"] . '</td>  
                          <td>' . $row["ModelYear"] . '</td>  
                          <td> ' . $row["FuelType"] . '</td>  
                          <td>' . $row["RegDate"] . '</td>  
                     </tr>  
                ';
          }
     } else {
          $output .= '  
                <tr>  
                     <td colspan="5">No Record Found</td>  
                </tr>  
           ';
     }
     $output .= '</table>';
     echo $output;
}
?>