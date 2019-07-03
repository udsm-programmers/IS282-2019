<?php

    include("connect.php");

    //if(isset($_GET['submit']))
    //{
        $id = $_REQUEST['id'];  
    


        $sql = "DELETE FROM  book2 WHERE id= '$id'";

        if(mysqli_query($link , $sql)){ 
            header('location:http://localhost/LIBRARY2/display.php'); 
           // echo"delete";
            
           
        }
        else{ 
            echo "erro";
            

        }
        
    //}

?>