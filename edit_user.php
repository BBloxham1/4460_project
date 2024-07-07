<?php
$conn = new mysqli('localhost', 'root', '', 'course_registration');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM User WHERE UserID=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Edit User</h2>
    <form action="edit_user_action.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['UserID']; ?>">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $user['FirstName']; ?>" required><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $user['LastName']; ?>" required><br>
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $user['PhoneNumber']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['Email']; ?>" required><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $user['Address']; ?>" required><br>
        <button type="submit">Update User</button>
    </form>
</body>
</html>