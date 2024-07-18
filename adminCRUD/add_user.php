<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Add User</h2>
    
</body>
</html>

<?php
require_once 'login.php';
require_once 'sanitize.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if($result->num_rows > 0){

    while($row = $result->fetch_array(MYSQLI_ASSOC)){

        $category = $row['category'];
        $A=$B='';
        $A = $category == 'student' ? 'selected' : '';
        $B = $category == 'advisor' ? 'selected' : '';

    }
echo <<<_END
 
    <form action="add_user.php" method="post">
    Category: <select name='category'>
				<option value='student' $A >Student</option>
				<option value='advisor' $B >Advisor</option>
			</select>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="email">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>
        <button type="submit">Add User</button>
    </form>
_END;
}

if(isset($_POST['username'])){

	$firstname = sanitize($conn, $_POST['first_name']);
	$lastname = sanitize($conn, $_POST['last_name']);
	$phone = sanitize($conn, $_POST['phone']);
	$email = sanitize($conn, $_POST['email']);
    $category = $_POST['category'];
    $password = sanitize($conn, $_POST['password']);
	
	//password_hash code here
	$token = password_hash($password, PASSWORD_DEFAULT);

	//code to add user here
	$query = "insert into users(forename, surname, username, password) values ('$forename', '$surname', '$username', '$token')";
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	echo "User $username is successfully created <br>";
}

$conn->close();


?>


