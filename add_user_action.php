<?php
$conn = new mysqli('localhost:8889', 'root', 'root', 'course_registration');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$category = $_POST['category'];

if ($category == 'student'){
    $sql = "INSERT INTO Student (FirstName, LastName, PhoneNumber, Email, Address, GPA) VALUES ('$first_name', '$last_name', '$phone', '$email', '$address', 0.0)";

}

elseif ($category == 'admin'){
    $sql = "INSERT INTO Admin (FirstName, LastName, PhoneNumber, Email, Address) VALUES ('$first_name', '$last_name', '$phone', '$email', '$address')";

}

if ($conn->query($sql) === TRUE) {
    echo "New user created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<a href="users.php">Back to Users</a>