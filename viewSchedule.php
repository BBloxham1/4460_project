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
    <a href="scheduleUpdate.php">Update Schedule</a> |

    <h1>My Class Schedule</h1>
    
    <pre>
        Course: IS 4487 - Business Analytics
        Units: 3.00 
        Semester: Fall 2024
        Section: 002
        Instructor: Stanford Pugsley

        <form action='deleteCourse.php' method='post'>
            <input type='hidden' name='delete' value='yes'>
            <input type='hidden' name='isbn' value='$row[isbn]'>
            <input type='submit' value='DELETE COURSE'>
        </form>

        Course: IS 4460 - Web Based Applications
        Units: 3.00 
        Semester: Fall 2024
        Section: 001
        Instructor: Chong Oh

        <form action='deleteCourse.php' method='post'>
            <input type='hidden' name='delete' value='yes'>
            <input type='hidden' name='isbn' value='$row[isbn]'>
            <input type='submit' value='DELETE COURSE'>
        </form>

        Course: IS 4445 - Cloud Computing
        Units: 3.00 
        Semester: Fall 2024
        Section: 001
        Instructor: Adam Frisbee

        <form action='deleteCourse.php' method='post'>
            <input type='hidden' name='delete' value='yes'>
            <input type='hidden' name='isbn' value='$row[isbn]'>
            <input type='submit' value='DELETE COURSE'>
        </form>
    </pre>
</body>
</html>