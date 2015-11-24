<?php
/**
 * Created by PhpStorm.
 * User: Adriana Valenzuela, Mayra Ruiz & Roberto Ruiz
 * Date: 04/11/2015
 * Time: 11:04
 */

function try_login($email, $password)
{
    $conn = new mysqli('localhost', 'root', '', 'osham');
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query("select * from users where email = '$email' ");
    $row = $result->fetch_assoc();
    if (!empty($row["email"]) && $row["password"] == $password) {
        session_start();
        return "login";
        $_SESSION['isLoggedIn'] = true;
    }
    $result->free();
    $conn->close();
}
?>
