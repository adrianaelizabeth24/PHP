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
function resetPassword($email,$userName,$age,$birthday,$gender)
{
    $conn = new mysqli('localhost', 'root', '', 'osham');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $instruccion ="update profile set email='$email',userName='$userName',age='$age',birthday='$birthday',gender='$gender' where email='$email'";

    if($conn->query($instruccion) === TRUE){
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
