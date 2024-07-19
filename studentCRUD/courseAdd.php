<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="viewSchedule.php">My Schedule</a> |
    <a href="scheduleUpdate.php">Update Schedule</a> |
	<a href="../authentication/authenticate.php">Logout</a> |
    
    <h3>Add a course</h1>
    <form method='post' action='courseAdd.php'>
			<pre>
                CourseID: <input type='text' name='courseid'>
				<input type='submit' value='Add Course'>
			</pre>
		</form>
</body>
</html>

<?php

$page_roles = array('student', 'advisor');



require_once '../authentication/login.php';
require_once '../authentication/checksession.php';


$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//check if title exists
if(isset($_POST['courseid'])) 
{
	//Get data from POST object
	$courseid = sanitize($conn, $_POST['courseid']);

	$query = "INSERT INTO Enrollment (UserID, Grade, CourseID) 
	VALUES ('$username', NULL,'$courseid')";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: studentschedule.php?userid='$username'");
	
}



$conn->close();


function sanitize($conn, $string) {
    $string = stripslashes($string);               // Remove backslashes from the string
    $string = $conn->real_escape_string($string);  // Sanitize the string for the database
    $string = htmlentities($string);               // Convert special characters to HTML entities
	return $string;
}




?>