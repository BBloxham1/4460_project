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
    
    <h3>Add a course</h1>
    <form method='post' action='courseAdd.php'>
			<pre>
                CourseID: <input type='text' name='courseid'>
				Title: <input type='text' name='title'>
				Quota: <input type='text' name='quota'>
				Credit Hours: <input type='text' name='creditHrs'>
				Semester: <input type='text' name='semester'>
				Year: <input type='text' name='year'>
				<input type='submit' value='Add Course'>
			</pre>
		</form>
</body>
</html>

<?php

$page_roles = array('student', 'advisor');

require_once '../authentication/login.php';
require_once '../authentication/checksession.php';
require_once '../sanitize.php';
require_once '../authentication/User.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$user = $_SESSION['user'];
echo $_SESSION['user'];
$userid = $user->username;

echo $userid;
echo 'fuck';

//check if title exists
if(isset($_POST['courseid'])) 
{
	//Get data from POST object
	$courseid = sanitize($conn, $_POST['courseid']);
	$title = sanitize($conn, $_POST['title']);
	$year = sanitize($conn, $_POST['year']);
	$description = sanitize($conn, $_POST['description']);
	$rating = sanitize($conn, $_POST['rating']);
	$genre = sanitize($conn, $_POST['genre']);
	$budget = sanitize($conn, $_POST['budget']);
	$runtime = sanitize($conn, $_POST['runtime']);
	
	$query = "INSERT INTO movie (title, director, release_year, description, rating, genre, budget, runtime) 
	VALUES ('$title', '$director','$year', '$description', '$rating', '$genre', '$budget', '$runtime')";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: viewSchedule.php?userid='$userid'");
	
}



$conn->close();


function sanitize($conn, $string) {
    $string = stripslashes($string);               // Remove backslashes from the string
    $string = $conn->real_escape_string($string);  // Sanitize the string for the database
    $string = htmlentities($string);               // Convert special characters to HTML entities
	return $string;
}




?>