<?php
include "student.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        .course-tile {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 10px;
            width: 300px;
            display: inline-block;
            vertical-align: top;
        }
        .course-title {
            font-weight: bold;
        }
        .register-btn {
            background-color: #6c9100;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .view-courses-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<h1 style="align-items: center">Welcome to Student Dashboard</h1>

<!-- PHP code to fetch course data from database -->
<?php
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "studentreg";

    $db = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch course data from database
    $sql = "SELECT * FROM course";
    $result = $db->query($sql);

    // Display course tiles
    if ($result->rowCount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="course-tile">
                <h2 class="course-title"><?php echo $row['course_title']; ?></h2>
                <p><?php echo $row['course_description']; ?></p>
                <button class="register-btn">Register</button>
            </div>
            <?php
        }
    } else {
        echo "No courses available";
    }

    // Button to view courses registered by the student
    ?>
    <button class="view-courses-btn" onclick="showRegisteredCourses()">View Registered Courses</button>
    <?php

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<script>
    // Function to show registered courses
    function showRegisteredCourses() {
        // Redirect to a PHP page that displays the courses registered by the student
        window.location.href = 'view_registered_courses.php';
    }
</script>

</body>
</html>
