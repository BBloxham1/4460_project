<html>
	<head></head>
	
	<body>
		<form method='post' action='authenticate.php'>
			Username: <input type='text' name='userid'><br>
			Password: <input type='password' name='password'>
			<input type='submit' value='Login'>
		</form>
	</body>

</html>

<?php

require_once '../sanitize.php';
require_once 'login.php';
require_once 'User.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['userid']) && isset($_POST['password'])) {
	
	//Get values from login screen
	$tmp_userid = sanitize($conn, $_POST['userid']);
	$tmp_password = sanitize($conn, $_POST['password']);
	
	//get password from DB w/ SQL
	$query = "SELECT password FROM User WHERE UserID = '$tmp_userid'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	
	}
	//Compare passwords
	if(password_verify($tmp_password,$passwordFromDB))
	{
		echo "successful login<br>";
		session_start();
			
		$user = new User($tmp_userid);			
		$_SESSION['user'] = $user;

		$user_role = $user->getRoles();

		if ($user_role[0] == 'student') {
			header("Location: ../studentCRUD/studentschedule.php?userid='$tmp_userid'");
		}

		elseif ($user_role[0] == advisor) {
			header("Location: ../advisorCRUD/advisor-home.php?userid='$tmp_userid'");
		}
	}
	else
	{
		echo "login error<br>";
	}	
	
}

$conn->close();



?>