<?php
// Include the header
include 'student.php';
?>


<form style="padding: 50px; background-color: white" action="insert.php" method="post">
    <fieldset style="text-align: center">
        <legend style="background-color: #00671c; color: white; font-size: 30px">Login to your UFV account </legend>
        <br>

        <label>Email ID :
            <input type="text" name="email" size="50px" autofocus placeholder="your email" required>
        </label>
        <br><br>

        <label>Password :
            <input type="password" name="pass" size="50px" autofocus placeholder="one we asked you to remember" required>
        </label>
        <br><br>

        <input type="submit" name="submit_login" style="background-color: #6c9100; font-size: 20px" title="Login">
    </fieldset>
</form>
