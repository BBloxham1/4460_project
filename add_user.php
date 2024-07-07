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
    <form action="add_user_action.php" method="post">
    Category: <select name='category'>
				<option value='student' $A >Student</option>
				<option value='admin' $B >Admininistrator</option>
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
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>
        <button type="submit">Add User</button>
    </form>
</body>
</html>