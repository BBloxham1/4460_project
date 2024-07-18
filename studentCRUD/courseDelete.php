<?php

$page_roles = array('student', 'advisor', 'admin');

//import credentials for db
require_once  '../authentication/login.php';
require_once '../authentication/checksession.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete']))
{
	$enrollid = $_POST['enrollid'];

	$query = "DELETE FROM Enrollment WHERE enrollid='$enrollid' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	//Return to the viewAllClassics page
	header("Location: viewSchedule.php");
	
}

?>