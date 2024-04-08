<?php
// Include the database connection
include 'connection.php';

// Check if form is submitted
if(isset($_POST['submit_admin'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Perform admin authentication (replace with your authentication logic)
    $admin_email = "admin";
    $admin_pass = "admin";

    if ($email === $admin_email && $pass === $admin_pass) {
        // Redirect to adminsuccesfull.php upon successful authentication
        header("Location: adminsuccesfull.php");
        exit;
    } else {
        // Redirect back to admin.php with error message upon authentication failure
        header("Location: admin.php?error=1");
        exit;
    }
}
?>
