<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// if($conn){
//   echo "success";

// }
// else{
//   die("Error!".Mysqli_connect_error());
// }
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?> 