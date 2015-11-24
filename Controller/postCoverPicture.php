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
$coverPicture = $_FILES['coverPicture']['name'];
$nombreCompletoCover = $nombreDirectorio . $coverPicture;
if (is_file($nombreCompletoCover)){
    $idUnico = time();
    $coverPicture = $idUnico . "-" . $coverPicture;
}
// El archivo introducido supera el limite de tamaño permitido
else if ($_FILES['coverPicture']['error'] == UPLOAD_ERR_FORM_SIZE){
    $maxsize = $_REQUEST['MAX_FILE_SIZE'];
    $errores["coverPicture"] =
        "El tamaño del archivo supera el limite permitido ($maxsize bytes)!";
    $error = true;
}
// No se ha introducido ningun archivo
else if ($_FILES['coverPicture']['name'] == "")
    $coverPicture = '';

include("../Model/queryPostCoverPicture.php");
$boleano = insertaCover($nombreCompletoCover,$emailUsuario);
if($booleano == 1) {
    move_uploaded_file($_FILES['coverPicture']['tmp_name'],
        $nombreDirectorio . $coverPicture);

    header("location:../View/profileView.php");

}
/*move_uploaded_file ($_FILES['co']['tmp_name'],
    $nombreDirectorio . $coverPicture);  */

?>
</body>
</html>