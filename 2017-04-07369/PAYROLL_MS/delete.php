<?php
         if(isset($_POST['delete'])) {
           
            $severname="Localhost";
            $dbusername="root";
            $dbspassword="";
            $dbname="payrolldb";
            $conn=mysqli_connect($severname,$dbusername,$dbspassword,$dbname);
            if(!$conn){
                die("connection failed:".mysqli_connect_error());
            }

            $ID = $_POST['id'];
            
            $sql = "DELETE FROM employee WHERE id = '$ID'" ;

            
            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            
            $conn->close();
            
         }else {
            ?>

               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                     
                     <tr>
                        <td width = "100">ID</td>
                        <td><input name = "id" type = "text" 
                           id = "id"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "delete" type = "submit" 
                              id = "delete" value = "Delete">
                        </td>
                     </tr>
                     
                  </table>
               </form>
            <?php
         }
      ?>