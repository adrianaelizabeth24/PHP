<html>
<head>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Adriana
 * Date: 21/11/2015
 * Time: 1:26
 */
function resetPassword($email,$password)
{
    $conn = new mysqli('localhost', 'root', '', 'osham');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if($conn->query("update users set password = '$password' where email = '$email'") === TRUE){
        print("New record created successfully");
    }
    else {
        print("error");
    }
    $conn->close();
}

?>
</body>
</html>
