<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Update User Info</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['userid'])){
	
$user = $_GET['userid'];

$query = "SELECT * FROM User WHERE userid = '$user'";

$result = $conn->query($query); 
if(!$result) die($conn->error);

if($result->num_rows > 0){  //there is more than 0 row

	while($row = $result->fetch_array(MYSQLI_ASSOC)){	
		
echo <<<_END

        <div class="container-md">
            <h1>Update $row[LastName], $row[FirstName]</h1>
                <form method="post" action="movie-update.php">
                        <h2>First Name:</h2>
                        <input type="text" 
                                name="firstname">
                        <h2>Last Name:</h2>
                        <input type="text" 
                                name="lastname">
                        <h2>Phone #:</h2>
                        <input type="text" 
                                name="phonenumber">
                        <h2>Email:</h2>
                        <input type="text" 
                                name="email">
                        <h2>Address:</h2>
                        <input type="text" 
                                name="address">
                        <input type='hidden' name='userid' value='$user'>
                        <input type="submit" value="Update" class="btn btn-primary"
                                name='update'>
                </form>
        </div
	
_END;
	}
}else{
	echo "No data found <br>";
}

}

if(isset($_POST['update'])){
	
	//Get data from POST object
	$firstname = sanitize($conn, $_POST['firstname']);
	$lastname = sanitize($conn, $_POST['lastname']);
	$phonenumber = sanitize($conn, $_POST['phonenumber']);
	$email = sanitize($conn, $_POST['email']);
	$address = sanitize($conn, $_POST['address']);
	
        $query = "UPDATE User set FirstName='$firstname', LastName='$lastname', PhoneNumber='$phonenumber', 
            Email='$email', Address='$address'";

	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: viewSchedule.php");
		
}

$conn->close();

function sanitize($conn, $string) {
    $string = stripslashes($string);               // Remove backslashes from the string
    $string = $conn->real_escape_string($string);  // Sanitize the string for the database
    $string = htmlentities($string);               // Convert special characters to HTML entities
	return $string;
}





?>