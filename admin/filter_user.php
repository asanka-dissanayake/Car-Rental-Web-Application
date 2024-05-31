<?php
//filter.php  
if (isset($_POST["from_date"], $_POST["to_date"])) {
     $dbh = mysqli_connect("localhost", "root", "", "carrental");
     $output = '';
     $query = "  
           SELECT * FROM tblusers 
           WHERE RegDate BETWEEN '" . $_POST["from_date"] . "' AND '" . $_POST["to_date"] . "'  
      ";
     $result = mysqli_query($dbh, $query);
     $output .= '  
           <table class="display table table-striped table-bordered table-hover">  
                <tr>  
                <th width="5%">ID</th>
                <th width="30%">Name</th>
                <th width="30%">Email</th>
                <th width="20%">Contact</th>
                <th width="40%">Address</th>
                <th width="20%">Reg Date</th>
                </tr>  
      ';
     if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
               $output .= '  
                     <tr>  
                          <td>' . $row["id"] . '</td>  
                          <td>' . $row["FullName"] . '</td>  
                          <td>' . $row["EmailId"] . '</td>  
                          <td>' . $row["ContactNo"] . '</td>  
                          <td>' . $row["Address"] . '</td>
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