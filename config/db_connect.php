<?php 
//connect to database
$conn = mysqli_connect('localhost', 'Admin', 'test12345', 'joblister');
//check connection
if (!$conn) {
	echo 'Connection error' . mysqli_connect_error();
}
?>