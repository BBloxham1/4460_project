<?php
$conn = new mysqli('localhost', 'root', '', 'course_registration');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];

$sql = "UPDATE User SET FirstName='$first_name', LastName='$last_name', PhoneNumber='$phone', Email='$email', Address='$address' WHERE UserID=$id";

if ($conn->query($sql) === TRUE) {
    echo "User updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<a href="users.php">Back to Users</a>