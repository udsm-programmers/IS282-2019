<?php

include("connect.php");

//1 =CREATION OF REGION TABLE
$sql = "CREATE TABLE REGION (
Country char(8) NOT NULL,
RName VARCHAR(30) NOT NULL ,
PRIMARY KEY(RName)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table REGION created successfully";
}

//2=CREATION OF DISTRICT TABLE
$sql1 = "CREATE TABLE DISTRICT (
DName VARCHAR(30) NOT NULL PRIMARY KEY,
RName VARCHAR(30) NOT NULL ,
FOREIGN KEY(RName) REFERENCES REGION(RName)

)";

if ($conn->query($sql1) === TRUE) {
    echo "Table MyGuests created successfully";
}

//3=CREATION OF WARD TABLE
$sql2 = "CREATE TABLE WARD (
WRegNo INT AUTO_INCREMENT PRIMARY KEY , 
WName VARCHAR(30) NOT NULL,
DName VARCHAR(30) NOT NULL,

FOREIGN KEY(DName) REFERENCES DISTRICT(DName)

)";

if ($conn->query($sql2) === TRUE) {
    echo "Table MyGuests created successfully";
}
//4=CREATION OF LOCAL AREA TABLE

$sql3 = "CREATE TABLE LOCAL_AREA (
Local_AreaRegNo INT  AUTO_INCREMENT PRIMARY KEY , 
WRegNo int NOT NULL,
LocalName VARCHAR(30) NOT NULL,

FOREIGN KEY(WRegNo) REFERENCES WARD(WRegNo)

)";

if ($conn->query($sql3) === TRUE) {
    echo "Table MyGuests created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}
//5=CREATION OF FAMILY REPRESENTATIVE TABLE
$sql4 = "CREATE TABLE REPRESENTATIVE (
FamilyID INT AUTO_INCREMENT PRIMARY KEY , 
RepFName VARCHAR(30) NOT NULL,
RepMidName VARCHAR(30) ,
RepSurName VARCHAR(30) NOT NULL,
Birthdate date NOT NULL,
Gender CHAR(6) NOT NULL ,
RepCountry VARCHAR(30) NOT NULL,
RepRegion VARCHAR(30) NOT NULL,
RepDistrict VARCHAR(30) NOT NULL,
RepLocaArea VARCHAR(30) NOT NULL,
Local_AreaRegNo INT NOT NULL,
ServantID INT  NOT NULL , 


FOREIGN KEY(ServantID) REFERENCES SERVANT_DETAIL(ServantID),
FOREIGN KEY(Local_AreaRegNo) REFERENCES LOCAL_AREA(Local_AreaRegNo)

)";

if ($conn->query($sql4) === TRUE) {
    echo "Table MyGuests created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}
//6=CREATION OF REPRESENTATIVE EMAIL
$sql5 = "CREATE TABLE REPRESENTATIVE_EMAIL (
FamilyID INT  AUTO_INCREMENT NOT NULL , 
Email VARCHAR(50) NOT NULL, 
PRIMARY KEY(FamilyID,Email)
)";

if ($conn->query($sql5) === TRUE) {
    echo "Table MyGuests created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}
//7=CREATION OF REPRESENTATIVE PHONE
$sql6 = "CREATE TABLE REPRESENTATIVE_PHONE(
FamilyID INT AUTO_INCREMENT NOT NULL , 
PhoneNo VARCHAR(13) NOT NULL,
PRIMARY KEY(FamilyID,PhoneNo)

)";

if ($conn->query($sql6) === TRUE) {
    echo "Table MyGuests created successfully <br>";
}
else {
    echo "Error creating table: <br> " . $conn->error;
}

//8=CREATION OF SERVANT TABLE
$sql7 = "CREATE TABLE SERVANT_DETAIL(
ServantID INT AUTO_INCREMENT PRIMARY KEY , 
ServantFName VARCHAR(30) NOT NULL,
ServantMidName VARCHAR(30) ,
ServantSurName VARCHAR(30) NOT NULL,
Birthdate date NOT NULL,
Gender CHAR(6) NOT NULL 

)";

if ($conn->query($sql7) === TRUE) {
    echo "Table MyGuests created successfully <br>";
}
//9=CREATION OF SERVANT WORKING PLACE
$sql8 = "CREATE TABLE SERVANT_WORK_AREA(
ServantID INT NOT NULL , 
ServantCountry VARCHAR(30) NOT NULL,
ServantRegion VARCHAR(30) NOT NULL,
ServantDistrict VARCHAR(30) NOT NULL,
ServantLocaArea VARCHAR(30) NOT NULL,
Local_AreaRegNo INT NOT NULL ,
PRIMARY KEY(Local_AreaRegNo,ServantID),
FOREIGN KEY(ServantID) REFERENCES SERVANT_DETAIL(ServantID),
FOREIGN KEY(Local_AreaRegNo) REFERENCES LOCAL_AREA(Local_AreaRegNo)
)";

if ($conn->query($sql8) === TRUE) {
    echo "Table MyGuests created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}

//10=CREATION OF SERVANT EMAIL
$sql9 = "CREATE TABLE SERVANT_EMAIL (
ServantID INT  AUTO_INCREMENT , 
Email VARCHAR(50) NOT NULL,
PRIMARY KEY(ServantID,Email)
)";

if ($conn->query($sql9) === TRUE) {
    echo "Table MyGuests created successfully";
}
 else {
    echo "Error creating table: " . $conn->error;
}

//11=CREATION OF SERVANT PHONE
$sql10 = "CREATE TABLE SERVANT_PHONE (
ServantID INT  AUTO_INCREMENT  , 
PhoneNo VARCHAR(13) NOT NULL ,
PRIMARY KEY(ServantID,PhoneNo)

)";

if ($conn->query($sql10) === TRUE) {
    echo "Table MyGuests created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}


//12=CREATION OF CENSUS FORM
$sql11 = "CREATE TABLE CENSUS_FORM(
FamilyID INT NOT NULL , 
Occupation CHAR(30),
EducationLevel VARCHAR(30) NOT NULL,
OtherOccupation VARCHAR(30) ,
RepfName VARCHAR(30) NOT NULL,
Age int(3) NOT NULL,
Gender CHAR(6) NOT NULL ,
RepCountry VARCHAR(30) NOT NULL,
RepRegion VARCHAR(30) NOT NULL,
RepDistrict VARCHAR(30) NOT NULL,
RepLocaArea VARCHAR(30) NOT NULL,
Local_AreaRegNo INT NOT NULL,
ServantID INT  NOT NULL , 

PRIMARY KEY(ServantID,FamilyID),

FOREIGN KEY(ServantID) REFERENCES SERVANT_DETAIL(ServantID),
FOREIGN KEY(Local_AreaRegNo) REFERENCES LOCAL_AREA(Local_AreaRegNo),
FOREIGN KEY(FamilyID) REFERENCES REPRESENTATIVE(FamilyID),
check (Age>0)
)";

if ($conn->query($sql11) === TRUE) {
    echo "Table MyGuests created successfully";
}

 else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>