<?php
$conn = new mysqli('localhost:8889', 'root', 'root', 'course_registration');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$courseid = $_POST['courseid'];
$title = $_POST['title'];
$quota = $_POST['quota'];
$creditHrs = $_POST['creditHrs'];
$semester = $_POST['semester'];
$year = $_POST['year'];

$sql = "INSERT INTO Course (CourseID, CourseTitle, CreditHrs, Quota, Semester, Year) VALUES ('$courseid', '$title', '$quota', '$creditHrs', '$semester', '$year')";


if ($conn->query($sql) === TRUE) {
    echo "New course created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<a href="users.php">Back to Users</a>