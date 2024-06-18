<!-- ESTABLISHING DATABASE CONNECTIVITY HERE  -->
<?php
$servername = "localhost:3306";
$username = "root";
$dbpassword = "";
$dbname = "smstest";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("unable to connect" . $conn->connect_error);
}
?>