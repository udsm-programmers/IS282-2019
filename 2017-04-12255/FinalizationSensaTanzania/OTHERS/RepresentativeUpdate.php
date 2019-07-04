<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include("Connect.php");
         if(isset($_POST['change'])) {


              $FamilyID =($_POST['regno']);
               $Street_VillageRegNo =($_POST['street_village']);
               $RepresentativeCountry =($_POST['country']);
               $RepresentativeRegion =($_POST['region']);
                $RepresentativeDistrict =($_POST['district']);
               $RepresentativeWard =($_POST['ward']);
               $RepresentativeStreet_Village =($_POST['street_village']);
               $FirstName =($_POST['firstname']);
               $MiddleName =($_POST['middlename']);
                $SurName =($_POST['lastname']);
               $Gender =($_POST['gender']);
               $BirthDate =($_POST['birthdate']);
               $Email =($_POST['email']);
               $Phone_No =($_POST['phone_no']);
            }
               
$sql = "UPDATE familyrepresentativeaddress ". "SET FamilyID = '$FamilyID',Street_VillageRegNo='$Street_VillageRegNo',RepresentativeCountry='$RepresentativeCountry',RepresentativeRegion='$RepresentativeRegion',RepresentativeDistrict='$RepresentativeDistrict',RepresentativeWard='$RepresentativeWard',RepresentativeStreet_Village='$RepresentativeStreet_Village' ". 
               "WHERE id = '$ID'" ;
               if (mysqli_query($conn, $sql)) {
                
            } 
            mysqli_close($conn); } ?>

</body>
</html>