<?php
/**
 * Created by PhpStorm.
 * User: robil_000
 * Date: 23/11/2015
 * Time: 23:07
 */

function check_signup($email, $password){
    $conn = new mysqli('localhost', 'root', '', 'osham');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query("select * from users where email = '$email' ");
    $row = $result->fetch_assoc();
    if (empty($row["email"])) {
        $qr = "Insert into users(email, password) values('$email', $password)";
        $conn->query($qr);
        session_start();
        $_SESSION['isLoggedIn'] = true;

        $ret = "ok";
    } else {
        $ret = "El email ya existe";
    }
    $result->free();
    $conn->close();
    return $ret;
}

?>