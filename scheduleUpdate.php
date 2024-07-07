<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="courseAdd.php">Add Course</a> |
    <a href="viewSchedule.php">My Schedule</a> |
    
    <h3>Update a course</h1>
    <form method='post' action='scheduleUpdate.php'>
            Select course: 
            <select name="courses">
                <option>Course1</option>
                <option>Course2</option>
                <option>Course3</option>
                <option>Course4</option>
            </select>
            Semester: <input type='text' name='Semester'>
            Section: <input type='text' name='Section'>
            <input type='submit' value='Update'>
	</form>
</body>
</html>