<?php
/**
 * Created by PhpStorm.
 * User: robil_000
 * Date: 23/11/2015
 * Time: 23:03
 */


include "../Model/signup.php";
$email = $_POST["user"];
$password = $_POST["password"];
$passConf = $_POST["passwordConfirm"];
$resp = "";
if(!strcmp($email, "")){
    $resp = "Por favor, escriba un email correcto";
} else if(!strcmp($password, "")) {
    $resp = "Por favor, escriba una contraseña valida";
}else if(strcmp($password, $passConf)){
    $resp = "Las contraseñas no son iguales";
} else {
    $resp = check_signup($email, $password);
}

echo $resp;

?>