<?php
// Include the header
include 'student.php';
?>


<h1 style="background-color: green">This page is intended for admin work only please go back if you are not an admin</h1>
<form style=" padding: 50px; background-color: white" action="adminin.php" method="post">
    <fieldset style="text-align: center">
        <legend style=" background-color: #00671c; color: white; font-size: 30px">Welcome admin </legend>
        <br>


        <label>Email ID :
            <input type="text" name="email" size="50px" autofocus placeholder="only for admin" required></label>
        <br><br>



        <label>Password :
            <input type="password" name="pass" size="50px" autofocus placeholder="one we asked you to remember" required></label>
        <br><br>




        <input type="submit" name="submit_admin" style="background-color: #6c9100; font-size: 20px" title="Register">
    </fieldset>
</form>