<!doctype html>
<html>
<head>
    <title>
        Error
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
$password = $_POST["password"];
// Create
$conn = new mysqli('localhost', 'root','','osham');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result=$conn->query("select * from users where email = '$email' ");
$row = $result->fetch_assoc();
if (empty($row["email"])) {
    echo '<a href=\'login.html\' ><h1>Usuario o password incorrectos, vuelva a intenerarlo</h1> </a>';
} else {
    if ($row["password"] != $password) {
        echo '<a href=\'login.html\'><h1>Usuario o password incorrectos, vuelva a intenerarlo</h1></a>';
    } else {
        session_start();
        $_SESSION['isLoggedIn'] = true;
        header("location:html/profile.html");
    }
}
$result->free();
$conn->close();

?>
</body>
</html>