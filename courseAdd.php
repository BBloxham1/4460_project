<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="viewSchedule.php">My Schedule</a> |
    <a href="scheduleUpdate.php">Update Schedule</a> |
    
    <h3>Add a course</h1>
    <form method='post' action='addCourse.php'>
			<pre>
				CourseID: <input type='text' name='courseid'>
				Title: <input type='text' name='title'>
				Semester: <input type='text' name='Semester'>
				Year: <input type='text' name='year'>
				<input type='submit' value='Add Course'>
			</pre>
		</form>
</body>
</html>