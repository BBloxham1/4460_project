<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="scheduleUpdate.php">Update Schedule</a> |
    <a href="info_update.php">Update Information</a> |
    <a href="../authentication/authenticate.php">Logout</a> |

    <h1>My Class Schedule</h1>
    

    </pre>
</body>
</html>

<?php

$page_roles = array('student', 'advisor');

require_once '../authentication/login.php';
require_once '../authentication/checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['userid'])){

echo "<a href='courseAdd.php'>Add Course</a>"; 

$query = "SELECT * FROM Course INNER JOIN Enrollment ON Course.CourseID=Enrollment.CourseID
            WHERE Enrollment.UserID=$username";

$result = $conn->query($query); 
if(!$result) die($conn->error);

if($result->num_rows > 0){  //there is more than 0 row

	while($row = $result->fetch_array(MYSQLI_ASSOC)){	
		
echo <<<_END
		<pre>
			Course: $row[CourseTitle]</a>
			Credits: $row[CreditHrs]
			Semester: $row[Semester]
			Year: $row[Year]
			EnrollID: $row[Enrollment.EnrollID]	
			
			<form action="courseDelete.php" method='post'>
				<input type='hidden' name='delete' value='yes'>
				<input type='hidden' name='enrollid' value='$row[EnrollID]'>
				<input type='submit' value='DELETE COURSE'>	
			</form>
		
		</pre>
	
_END;
	}
}else{
	echo "No data found <br>";
}
}

$result->close();
$conn->close();







?>