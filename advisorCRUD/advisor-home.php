<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Advisor Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="courseAdd.php">Add Course</a> |
    <a href="scheduleUpdate.php">Update Schedule</a> |
    <a href="info_update.php">Update Information</a> |
    <a href="authenticate.php">Logout</a> |

    <h1>Welcome</h1>

    <div class="container-md">
        <h2>STUDENT</h2>
        <div class="col-sm-4">
            <a href="movie-update.php?title=$row[title]" class="btn btn-primary">Add Student</a>
            <a href="movie-delete.php?title=$row[title]" class="btn btn-primary">Update Student</a>
            <a href="movie-delete.php?title=$row[title]" class="btn btn-primary">Student List</a>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php

$page_roles = array('advisor');

require_once 'login.php';
require_once 'checksession.php';



?>