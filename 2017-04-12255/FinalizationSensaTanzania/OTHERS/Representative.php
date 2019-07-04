<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="Representative.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="" type="text/css" href="Representative.php">
     
  <title></title>
</head>
<body>
     <?php

   //  $save=echo "<script></script>";
         if(isset($_POST['regForm'])) {

include ("Connect_inc.php");



            if(! get_magic_quotes_gpc() ) {
                $ServantID =addslashes ($_POST['servantid']);
                $RepresentativeCountry =addslashes($_POST['country']);
                $RepresentativeRegion =addslashes($_POST['Region']);
                $RepresentativeDistrict =addslashes($_POST['District']);
                $RepresentativeWard =addslashes($_POST['Ward']);
                $RepresentativeStreet_Village =addslashes($_POST['Street_Village']);
                $FirstName =addslashes($_POST['firstname']);
                $MiddleName =addslashes($_POST['middlename']);
                $SurName =addslashes($_POST['lastname']);
                $BirthDate =($_POST['date']);
                $Gender =addslashes($_POST['gender']);
                $Email =addslashes($_POST['email']);
                $Phone_No =addslashes($_POST['phone']);
           
            }else {
               $ServantID =($_POST['servantid']);
               $Street_VillageRegNo =($_POST['Street_Village']);
               $RepresentativeCountry =($_POST['country']);
               $RepresentativeRegion =($_POST['Region']);
                $RepresentativeDistrict =($_POST['District']);
               $RepresentativeWard =($_POST['Ward']);
               $RepresentativeStreet_Village =($_POST['Street_Village']);
               $FirstName =($_POST['firstname']);
               $MiddleName =($_POST['middlename']);
                $SurName =($_POST['lastname']);
               $Gender =($_POST['gender']);
               $BirthDate =($_POST['date']);
               $Email =($_POST['email']);
               $Phone_No =($_POST['phone']);
            }
               


            $sql = "INSERT INTO servant_detail ". "(ServantID,ServantFName,ServantMidName,ServantSurName,BirthDate,Gender) ". "VALUES('$ServantID','$FirstName','$MiddleName','$SurName','$Gender','$BirthDate')";
 
if ($conn->multi_query($sql) === TRUE) {
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}           

if ($conn->multi_query($sql) === TRUE) {
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

            $sql = "INSERT INTO servant_work_area ". "(ServantCountry,ServantRegion,ServantDistrict,ServantLocalArea) ". "VALUES('Tanzania','$RepresentativeRegion','$RepresentativeDistrict','$RepresentativeWard','$RepresentativeStreet_Village')";
        

if ($conn->multi_query($sql) === TRUE) {
} else {
  echo "Error creating table: " . $conn->error;
}
        
            $sql = "INSERT INTO servant_email ". "(ServantID,Email) ". "VALUES('$ServantID','$Email')";
        

if ($conn->multi_query($sql) === TRUE) {
} else {
  echo "Error creating table: " . $conn->error;
}
            $sql = "INSERT INTO servant_phone ". "(ServantID,Phone_No) ". " VALUES('$ServantID','$Phone_No')";
 
if ($conn->multi_query($sql) === TRUE) {
} else {
  echo "Error creating table: " . $conn->error;
  }

  $sql = "INSERT INTO region  ". "(country,RName) ". "VALUES('Tanzania','$RepresentativeRegion')";
        

if ($conn->multi_query($sql) === TRUE) {
} else {
  echo "Error creating table: " . $conn->error;
}
            $sql = "INSERT INTO district ". "(DName,RName) ". " VALUES('$RepresentativeRegion','$RepresentativeDistrict')";
 
if ($conn->multi_query($sql) === TRUE) {
} else {
  echo "Error creating table: " . $conn->error;
  }
  $sql = "INSERT INTO ward ". "(WName,DName) ". "VALUES('$RepresentativeWard','$RepresentativeDistrict')";
        

if ($conn->multi_query($sql) === TRUE) {
} else {
echo "Error creating table: " . $conn->error;
}
            $sql = "INSERT INTO local_area ". "(LocalName) ". " VALUES('$RepresentativeStreet_Village')";
 
if ($conn->multi_query($sql) === TRUE) {
  echo "data created good";
} else {
 
 echo "Error creating table: " . $conn->error;
  }

$conn->close();
         }  ?>
 
 </body>
</html>