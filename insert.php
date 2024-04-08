<?php
session_start();
include("connection.php");

// Registration Process
if(isset($db,$_POST['submit_register'])) {
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
            // Prepare the SQL statement for registration
            $stmt_register = $db->prepare("INSERT INTO student (fname, lname, email, number, bday, pass) VALUES (?, ?, ?, ?, ?, ?)");
            // Bind parameters
            $stmt_register->bindParam(1, $fname);
            $stmt_register->bindParam(2, $lname);
            $stmt_register->bindParam(3, $email);
            $stmt_register->bindParam(4, $number);
            $stmt_register->bindParam(5, $bday);
            $stmt_register->bindParam(6, $pass);

            // Execute the registration query
            $stmt_register->execute();

            // Redirect to login page after a short delay with a pop-up message
            echo "<script>
                    setTimeout(function() {
                        alert('Registration successful');
                        window.location.href = 'login.php';
                    }, 100);
                </script>";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Login Process
if(isset($_POST['submit_login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Query to check if the email and password match
    $stmt = $db->prepare("SELECT * FROM student WHERE email = ? AND pass = ?");
    $stmt->execute([$email, $pass]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // If a user is found, start the session and redirect to student.php
    if($user) {
        $_SESSION['user_id'] = $user['id']; // Assuming 'id' is the primary key of the 'student' table
        header("Location: course.php");
        exit;
    } else {
        echo "Invalid email or password. Please try again.";
    }
}
?>
