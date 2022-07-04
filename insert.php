<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "project";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname,"3308");
 
// Check connection
if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
$gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
$weight = mysqli_real_escape_string($conn, $_REQUEST['weight']);
$height = mysqli_real_escape_string($conn, $_REQUEST['height']);
 
// attempt insert query execution
$sql = "INSERT INTO details (name, dob, gender, weight, height) VALUES ('$name', '$dob', '$gender','$weight','$height')";
 $result = mysqli_query($conn, $sql);
 
   if($result){
    echo("<script>alert('Details updated successfully')</script>");
	  echo("<script>window.location = 'list.php';</script>");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	echo("<script>window.location = 'insert.php';</script>");
}
 
// close connection
mysqli_close($conn);
//test
?>