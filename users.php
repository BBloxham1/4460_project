<?php
// Connect to database
$conn = new mysqli('localhost:8889', 'root', 'root', 'course_registration');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM User";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Users</h2>
    <a href="add_user.php">Add User</a>
    <table>
        <tr>
            <th>UserID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>PhoneNumber</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['UserID']}</td>
                        <td>{$row['FirstName']}</td>
                        <td>{$row['LastName']}</td>
                        <td>{$row['PhoneNumber']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['Address']}</td>
                        <td>
                            <a href='edit_user.php?id={$row['UserID']}'>Edit</a>
                            <a href='delete_user.php?id={$row['UserID']}'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No users found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>