<?php
/**
 * Created by PhpStorm.
 * User: Adriana
 * Date: 14/11/2015
 * Time: 12:09
 */

function insertarUsuarioTemporal($mail,$password,$code)
{
    $conn = new mysqli('localhost', 'root', '', 'osham');

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if($conn->query("insert into tempusers values('$mail','$password','$code')") === TRUE){
        print("New record created successfully");
    }
    else {
        print("error");
    }
    $conn->close();
}
?>