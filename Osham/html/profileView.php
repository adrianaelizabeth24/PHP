<!DOCTYPE html>
<html>
<head>
	<title>
		Perfil
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="authors" content="Adriana Valenzuela, Mayra Ruíz, Roberto Ruíz">
	<meta name="property" content="ITESM CAMPUS MONTERREY">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="log.css" />
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans:600' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
$emailUsuario = $_SESSION['email'];

$conn = new mysqli("localhost","root","","osham");
if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
$results = $conn->query("Select * from profile where email = '$emailUsuario'");

if($row = $results->fetch_assoc())
{
	//$row = $results->fetch_assoc();
	$mail = $row["email"];
	$username = $row["userName"];
	$age= (int)$row["age"];
	$birthday = $row["birthday"];
	$gender = $row["gender"];
	$profile = $row["profilePicture"];
	$cover = $row["coverPicture"];
	$biography = $row["biography"];
}
else
{
	$mail = "";
	$username = "";
	$age= 0;
	$birthday = "";
	$gender = "";
	$profile = "";
	//$cover = "";
	//$biography = "";
}
$results->free();
$conn->close();


echo("
			<div id= \"dimension\">
				<div id=\"principal\">
					  <ul class=\"nav nav-tabs\">
					  		<li class=\"active\" style=\"width:100%\"><h3>Biografía</h3></li>
					  </ul>
					  <div id=\"input\">
					  	<br/><br/>
						<input type=\"text\" class=\"form-control\" name=\"userName\" value=\"'$username'\" style=\"width:300px;height:40px;color:#646464;font-size:1.3em\" required/>
						<br/><br/>
						<input type=\"text\" class=\"form-control\" name=\"email\" value=\"'$mail'\"  style=\"width:300px;height:40px;color:#646464;font-size:1.3em\" required/>
						<br/><br/>
						<input type=\"text\" class=\"form-control\" name=\"age\" value=\"'$age'\"  style=\"width:300px;height:40px;color:#646464;font-size:1.3em\" required/>
						<br/><br/>
						<input type=\"text\" class=\"form-control\" name=\"birthday\" value=\"'$birthday'\" style=\"width:300px;height:40px;color:#646464;font-size:1.3em\" required/>
						<br/><br/>
						<input type=\"text\" name=\"gender\" value=\"'$gender'\"  style=\"width:300px;height:40px;color:#646464;font-size:1.3em\" />
						<br/><br/>
												<img src=\"../$profile\" width='100' height='100'>
						<br/><br/>
												<input class=\"btn btn-default\" type=\"submit\" id=\"Editar\" name=\"Guardar\" value=\"Guardar\" />
						<br/></br/><br/>
					</div>
				</div>
			</div>");

?>

</body>
</html>