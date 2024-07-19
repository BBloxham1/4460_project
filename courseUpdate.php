<?php

$page_roles = array('student', 'advisor');

require_once '../authentication/login.php';
require_once '../authentication/checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['updatecourse'])){
	
    $enrollid = $_POST['enrollid'];
    
    $query = "SELECT * FROM Enrollment where enrollid = $enrollid";
    
    $result = $conn->query($query); 
    if(!$result) die($conn->error);
    
    if($result->num_rows > 0){  //there is more than 0 row
    
        while($row = $result->fetch_array(MYSQLI_ASSOC)){	
            
    echo <<<_END
            
            <h2>Update $row[CourseID]</h2>
            <form method='post' action='courseUpdate.php'>
            <pre>
                Semester: <input type='text' value='$row[semester]' name='semester'>
                Year: <input type='text' value='$row[year]' name='year'>
                Section: <input type='text' value='$row[section]' name='section'>
    
                <input type='submit' value='Update'>
                <input type='hidden' name='enrollid' value='$row[enrollid]'>
                <input type='hidden' name='update' value='yes'>
            
            </pre>
            </form>
        
    _END;
        }
    }else{
        echo "No data found <br>";
    }
    
    }
    
    if(isset($_POST['update'])){
        
        $semester = $_POST['semester'];
        $year = $_POST['year'];
        $section = $_POST['section'];

        //$query = "Update Enrollment set semester='$semester', year='$year', section='$section' WHERE enrollid=$enrollid";
        
        $result = $conn->query($query); 
        if(!$result) die($conn->error);
        
        header("Location: studentschedule.php?userid='$username'");
            
    }
    
    $conn->close();
    
    
    
    
    
    
    


?>