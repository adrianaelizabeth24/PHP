<?php
/**
 * Created by PhpStorm.
 * User: Adriana
 * Date: 23/11/2015
 * Time: 16:25
 */

function insertaProfile($nombreCompletoProfile,$emailUsuario)
{
    $conn = new mysqli('localhost', 'root', '', 'osham');
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return 0;
    }
    $instruccion = "update profile set profilePicture = '$nombreCompletoProfile' where email = '$emailUsuario'";
    if (!$conn->query($instruccion)) {
        echo "Table insertion failed: (" . $conn->errno . ") " . $conn->error;
        return 0;
    }
    $conn->close();
    return 1;

}