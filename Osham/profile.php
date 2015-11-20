<!doctype html>
<html>
<head>
    <title>
        Profile
    </title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Adriana Valenzuela, Mayra Ruiz & Roberto Ruiz
 * Date: 04/11/2015
 * Time: 11:04
 */
$email = $_POST["email"];
$userName = $_POST["userName"];
$age = $_POST["age"];
$birthday = $_POST["birthday"];
$gender = $_POST["gender"];
$profilePicture = $_POST["profilePicture"];
$coverPicture = $_POST["coverPicture"];

// Create
$conn = new mysqli('localhost', 'root','','osham');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result=$conn->query("select * from users where email = '$email' ");
$row = $result->fetch_assoc();

$result->free();
$conn->close();

?>
</body>
</html>