<?php

include 'student.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
<div class="form">
    <form style="padding: 50px; background-color: white" action="insert.php" method="post">
        <fieldset style="text-align: center">
            <legend style="background-color: #00671c; color: white; font-size: 30px">Student Registration Form</legend>
            <br>

            <label>First Name :
                <input type="text" name="fname" size="50px" autofocus placeholder="Your first name here" required>
            </label>
            <br><br>

            <label>Last Name :
                <input type="text" name="lname" size="50px" autofocus placeholder="Your last name here" required>
            </label>
            <br><br>

            <label>Phone Number :
                <input type="number" name="number" size="50px" autofocus placeholder="Your phone number here" required>
            </label>
            <br><br>

            <label>Email ID :
                <input type="text" name="email" size="50px" autofocus placeholder="This will be your username" required>
            </label>
            <br><br>

            <label>Birth Date :
                <input type="date" name="bday" size="50px" autofocus placeholder="Your name here" required>
            </label>
            <br><br>

            <label>Password :
                <input type="password" name="pass" size="50px" autofocus placeholder="May be your pet name" required>
            </label>
            <br><br>


            <input type="submit" name="submit_register" style="background-color: #6c9100; font-size: 20px" title="submit">
        </fieldset>
    </form>
</div>
</body>
</html>

