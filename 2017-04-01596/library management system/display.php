<!doctype <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<a href="index.php">addbook</a>


<?php
include("connect.php");
$sql = "SELECT * FROM  book2 ORDER BY id;";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {?>
    <table width="600" border="1" cellpadding="3" cellspacing="2">
<tr>
<th> id</th>
<th>title</th>
<th>publisher</th>
<th>author</th>
<th>category</th>
<th>description</th>
<th>date</th>
<th>delete</th>
<th>update</th>
<tr>
    <!-- // output data of each row -->
    
  <?php  while($row = mysqli_fetch_assoc($result)) {
        // echo "<tr><td>".$row["id"]."</td><td>".$row["title"] ."</td></tr>";
        ?>
        <tr>
        <td><?php echo $row["id"];?> </td>
        <td><?php echo $row["title"];?> </td>
        <td><?php echo $row["publisher"];?> </td>
        <td><?php echo $row["author"];?> </td>
        <td><?php echo $row["category"];?> </td>
        <td><?php echo $row["description"];?> </td>
        <td><?php echo $row["date"];?> </td>
       
        <td><a href="delete.php?id='.$row['id'].'">Delete</a>  </td>
        
    
        
       <td> <a href="update.php ?id= '.$row['id'].'" >update</a> </td>
        
      
        </tr>
 <?php
}
}

    
    else {
    echo "0 results";
}


mysqli_close($link);
?>


</table>
</body>
</html>