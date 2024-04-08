<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "studentreg";

try {
    $db = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
