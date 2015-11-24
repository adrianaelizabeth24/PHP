<?php
/**
 * Created by PhpStorm.
 * User: Adriana Valenzuela, Mayra Ruiz & Roberto Ruiz
 * Date: 04/11/2015
 * Time: 11:04
 */

include "../Model/login.php";
$email = $_POST["email"];
$password = $_POST["password"];

$resp = try_login($email, $password);

echo $resp;


?>
