<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lotus";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!--$servername = "sql108.infinityfree.com";-->
<!--$username = "if0_38327574";-->
<!--$password = "x1uc48cowLW";-->
<!--$dbname = "if0_38327574_lotus";-->
