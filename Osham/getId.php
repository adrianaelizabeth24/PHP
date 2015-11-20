<?php
/**
 * Created by PhpStorm.
 * User: Adriana
 * Date: 14/11/2015
 * Time: 14:37
 */
function getMaxId()
{
    $conn = new mysqli('localhost','root','','osham');
    if($conn->connect_error)
    {
        die("Connection failed: " .$conn->connect_error);
    }
    $result = $conn->query("select MAX(id) from  users");
    $row = $result->fetch_assoc();

    $id = (int)$row + 1;
    $result->free();
    $conn->close();

    return $id;

}

?>