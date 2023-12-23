<?php 

// $conn = mysqli_connect($servername, $username, $password,$namedatabase);
$conn=mysqli_connect('localhost', 'ngongocthang', '18082004' ,'doan',);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo " ";
?>