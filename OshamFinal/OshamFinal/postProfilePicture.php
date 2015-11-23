<!doctype html>
<html>
<head>
    <title>
        Profile
    </title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Adriana Valenzuela, Mayra Ruiz & Roberto Ruiz
 * Date: 04/11/2015
 * Time: 11:04
 */
session_start();
$emailUsuario = $_SESSION['email'];

$nombreDirectorio = "img/";
$profilePicture = $_FILES["profilePicture"]["name"];
$nombreCompletoProfile = $nombreDirectorio . $profilePicture;
if (is_file($nombreCompletoProfile)){
    $idUnico = time();
    $profilePicture = $idUnico . "-" . $profilePicture;
}
// El archivo introducido supera el limite de tamaño permitido
else if ($_FILES['profilePicture']['error'] == UPLOAD_ERR_FORM_SIZE){
    $maxsize = $_REQUEST['MAX_FILE_SIZE'];
    $errores["profilePicture"] =
        "El tamaño del archivo supera el limite permitido ($maxsize bytes)!";
    $error = true;
}
// No se ha introducido ningun archivo
else if ($_FILES['profilePicture']['name'] == "")
    $profilePicture = '';
// Create


$conn = new mysqli('localhost', 'root','','osham');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$instruccion = "update profile set profilePicture = '$nombreCompletoProfile' where email = '$emailUsuario'";
if(!$conn->query($instruccion)){
    echo "Table insertion failed: (" . $conn->errno . ") " . $conn->error;
}
$conn->close ();

move_uploaded_file ($_FILES['profilePicture']['tmp_name'],
    $nombreDirectorio . $profilePicture);

header("location:html/profileView.php");

/*move_uploaded_file ($_FILES['co']['tmp_name'],
    $nombreDirectorio . $coverPicture);  */

?>
</body>
</html>