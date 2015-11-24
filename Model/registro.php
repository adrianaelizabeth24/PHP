<html>
<head></head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Adriana Valenzuela, Mayra Ruiz & Roberto Ruiz
 * Date: 04/11/2015
 * Time: 11:04
 */

$code = $_GET["code"];
$conn = new mysqli('localhost', 'root', '', 'osham');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("select * from tempusers where code = '$code'");
$row = $result->fetch_assoc();
if (isset($row["email"])) {
    echo "Entro";
    $email = $row["email"];
    $password = $row["password"];
    include("getId.php");
    $id = getMaxId();
    $result->free();

    $result = $conn->query("insert into users values('$id','$email','$password')");

    $conn->close();
    header("location:html/profile.html");
} else {
    echo '<a href=\'login.html\' ><h1>Usuario o password incorrectos, vuelva a intentarlo</h1> </a>';

    echo "bien";
}
?>
</body>
</html>
