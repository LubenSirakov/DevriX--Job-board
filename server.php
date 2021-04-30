<?php
session_start();
//connect to database
$db = mysqli_connect('localhost', 'root', '', 'crud');
//initialize variables
$titile = 0;
$description = "";
$company = "";
$salary = 0;
$edit_state = false;

//if save button is clicked
if (isset($_POST['save'])) {
    $titile = $_POST['titile'];
    $address = $_POST['address'];

    mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')"); 
    mysqli_query($db, $qerry);
	$_SESSION['msg'] = "Address saved"; 
	header('location: index.php'); //redirect to index page after inserting
}






?>