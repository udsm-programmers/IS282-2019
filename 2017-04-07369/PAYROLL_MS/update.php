         <?php
         if(isset($_POST['update'])) {
         include('includes/connect.php');
         $first_name=$_POST['firstName'];
         $last_name=$_POST['lastName'];
         $email=$_POST['email'];
         $job=$_POST['job'];
         $ID = $_POST['id'];
         $sql = "UPDATE employee ". "SET first_name= '$first_name',last_name=' $last_name',email='$email',job='$job' ". 
         "WHERE id = '$ID'" ;
                           if (mysqli_query($conn, $sql)) {
                           header("location:http://localhost:82/PAYROLL_MS/profile.php");
            } 
                           else {
                               echo "Error updating record: " . mysqli_error($conn);
            }
            
            mysqli_close($conn); }else {
            ?>

<div class ="header">
            <h1> PAYROLL MANAGEMENT SYSTEM </h1>
            </div>
            
            <div class ="myform1">
            <div class ="myform">

               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                     <tr>
                        <td width = "100">ID</td>
                        <td><input name = "id" type = "text" 
                           id = "id"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">first_name</td>
                        <td><input name = "firstName" type = "text" 
                           id = "title"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">last_name</td>
                        <td><input name = "lastName" type = "text" 
                           id = "publisher"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">email</td>
                        <td><input name = "email" type = "text" 
                           id = "description"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100">job</td>
                        <td><input name = "reg" type = "text" 
                           id = "category"></td>
                     </tr>
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            <?php
         }
      ?>
   </body>
</html>