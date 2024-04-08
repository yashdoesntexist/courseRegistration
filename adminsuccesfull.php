<?php
include "student.php";
?>

<?php
session_start();
include("connection.php");

// Handle form submission for adding a new student
if(isset($db,$_POST['add_student'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $bday = $_POST['bday'];
    $pass = $_POST['pass'];

    try {
        // Check if the email already exists
        $stmt_check_email = $db->prepare("SELECT * FROM student WHERE email = ?");
        $stmt_check_email->execute([$email]);
        $existing_user = $stmt_check_email->fetch();

        if($existing_user) {
            echo "Email already exists. Please use a different email.";
        } else {
            // Prepare the SQL statement for adding a new student
            $stmt_add_student = $db->prepare("INSERT INTO student (fname, lname, email, number, bday, pass) VALUES (?, ?, ?, ?, ?, ?)");
            // Bind parameters
            $stmt_add_student->bindParam(1, $fname);
            $stmt_add_student->bindParam(2, $lname);
            $stmt_add_student->bindParam(3, $email);
            $stmt_add_student->bindParam(4, $number);
            $stmt_add_student->bindParam(5, $bday);
            $stmt_add_student->bindParam(6, $pass);

            // Execute the query to add the new student
            $stmt_add_student->execute();

            // Redirect back to admin page after adding the student

            header("Location: adminsuccesfull.php");
            exit;
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
<h1>Welcome Admin! Add New Student</h1>

<!-- Add Student Form -->
<form action="adminsuccesfull.php" method="post">
    <label>First Name:
        <input type="text" name="fname" required>
    </label>
    <br>
    <label>Last Name:
        <input type="text" name="lname" required>
    </label>
    <br>
    <label>Email:
        <input type="email" name="email" required>
    </label>
    <br>
    <label>Phone Number:
        <input type="text" name="number" required>
    </label>
    <br>
    <label>Birth Date:
        <input type="date" name="bday" required>
    </label>
    <br>
    <label>Password:
        <input type="password" name="pass" required>
    </label>
    <br>
    <button type="submit" name="add_student">Add Student</button>
</form>
</body>
</html>


<!-- edit user -->




<!-- List of Students -->
<h2>List of Students</h2>
<ul>
    <?php $students = $db->query("SELECT * FROM student")->fetchAll(PDO::FETCH_ASSOC); ?>
    <?php foreach ($students as $student) { ?>
        <li>
            <!-- Display student details -->
            <?php echo $student['fname'] . ' ' . $student['lname']; ?> (<?php echo $student['email']; ?>)

            <!-- Edit button -->
            <button onclick="editStudent(<?php echo $student['id']; ?>)">Edit</button>

            <!-- Form for editing student -->
            <form id="editForm_<?php echo $student['id']; ?>" action="adminsuccesfull.php" method="post" style="display: none;">
                <input type="hidden" name="edit_student" value="<?php echo $student['id']; ?>">
                <input type="text" name="fname" value="<?php echo $student['fname']; ?>" required>
                <input type="text" name="lname" value="<?php echo $student['lname']; ?>" required>
                <input type="email" name="email" value="<?php echo $student['email']; ?>" required>
                <input type="text" name="number" value="<?php echo $student['number']; ?>" required>
                <input type="date" name="bday" value="<?php echo $student['bday']; ?>" required>
                <input type="password" name="pass" value="<?php echo $student['pass']; ?>" required>
                <button type="submit">Save</button>
            </form>
        </li>
    <?php } ?>
</ul>

<script>
    // Function to toggle display of edit form
    function editStudent(studentId) {
        var editForm = document.getElementById('editForm_' + studentId);
        if (editForm.style.display === 'none') {
            editForm.style.display = 'block';
        } else {
            editForm.style.display = 'none';
        }
    }
</script>
</body>
</html>

<?php
session_start();
include("connection.php");

// Handle form submission for adding a new student
if(isset($_POST['add_student'])) {
    // Code for adding a new student
    // ...
}

// Handle form submission for editing an existing student
if(isset($_POST['edit_student'])) {
    $id = $_POST['edit_student'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $bday = $_POST['bday'];
    $pass = $_POST['pass'];

    try {
        // Prepare the SQL statement for updating the student
        $stmt_edit_student = $db->prepare("UPDATE student SET fname=?, lname=?, email=?, number=?, bday=?, pass=? WHERE id=?");
        // Bind parameters
        $stmt_edit_student->bindParam(1, $fname);
        $stmt_edit_student->bindParam(2, $lname);
        $stmt_edit_student->bindParam(3, $email);
        $stmt_edit_student->bindParam(4, $number);
        $stmt_edit_student->bindParam(5, $bday);
        $stmt_edit_student->bindParam(6, $pass);
        $stmt_edit_student->bindParam(7, $id);

        // Execute the query to update the student
        $stmt_edit_student->execute();

        // Redirect back to admin page after editing the student
        header("Location: adminsuccesfull.php");
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
<h1>Welcome Admin! Manage Students</h1>

<!-- Add Student Form -->
<h2>Add New Student</h2>
<form action="adminsuccesfull.php" method="post">
    <!-- Form fields for adding a new student -->
    <!-- ... -->
</form>

<!-- List of Students -->
<h2>List of Students</h2>
<ul>
    <?php $students = $db->query("SELECT * FROM student")->fetchAll(PDO::FETCH_ASSOC); ?>
    <?php foreach ($students as $student) { ?>
        <li>
            <!-- Display student details -->
            <?php echo $student['fname'] . ' ' . $student['lname']; ?> (<?php echo $student['email']; ?>)
            <br>

            <!-- Edit button -->
            <button onclick="editStudent(<?php echo $student['id']; ?>)">Edit</button>

            <!-- Form for editing student -->
            <form id="editForm_<?php echo $student['id']; ?>" action="adminsuccesfull.php" method="post" style="display: none;">
                <input type="hidden" name="edit_student" value="<?php echo $student['id']; ?>">
                <input type="text" name="fname" value="<?php echo $student['fname']; ?>" required>
                <input type="text" name="lname" value="<?php echo $student['lname']; ?>" required>
                <input type="email" name="email" value="<?php echo $student['email']; ?>" required>
                <input type="text" name="number" value="<?php echo $student['number']; ?>" required>
                <input type="date" name="bday" value="<?php echo $student['bday']; ?>" required>
                <input type="password" name="pass" value="<?php echo $student['pass']; ?>" required>
                <button type="submit">Save</button>
            </form>
        </li>
    <?php } ?>
</ul>

<script>
    // Function to toggle display of edit form
    function editStudent(studentId) {
        var editForm = document.getElementById('editForm_' + studentId);
        if (editForm.style.display === 'none') {
            editForm.style.display = 'block';
        } else {
            editForm.style.display = 'none';
        }
    }
</script>
</body>
</html>
