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
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
        #top-bar{
            width:100%;
            height: 50px;
            background-color: #780A78;
        }
        #top-right{

            margin-left: 85%;
            margin-top: -50px;
        }
        div>ul{
            list-style: none;
        }
        ul>li{
            display: inline;
        }
        a:hover i{
            color:#D29FE3;
        }

    </style>
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
    $cover = "";
    $biography = "";
}
$results->free();
$conn->close();


echo("		<div id=\"top-bar\">
			<div id=\"top-left\">
			<a href=\"index.html\"><img src=\"oshamfashion.png\" width=\"200\" height=\"50\"></a>
			</div>
			<div id=\"top-right\">
				<ul>
					<li>
						<a href=\"profileView.php\"><i id=\"class=\"fa fa-users\" style=\"color:#ffffff; font-size:24px\"></i></a>
					</li>
					&nbsp;
					<li>
						<a href=\"config.html\"><i class=\"fa fa-cog\" style=\"color:#ffffff; font-size:24px\"></i></a>
					</li>
					&nbsp;
					<li>
						<a href=\"signout.php\"><i class=\"fa fa-sign-out\" style=\"color:#ffffff; font-size:24px\"></i></a>
					</li>
				</ul>
			</div>
		</div>
<div id= \"dimension\">
				<div id=\"principal\">
					  <ul class=\"nav nav-tabs\">
					  		<li class=\"active\" style=\"width:100%\"><h3>Biografía</h3></li>
					  </ul>
					  <div id=\"input\">
				<form enctype=\"multipart/form-data\" action=\"../Controller/profileUpdate.php\" method=\"post\">
                <br/><br/>
                <input type=\"text\" class=\"form-control\" name=\"userName\" value='$username' style=\"width:300px;height:40px;color:#646464;font-size:1.3em\" required/>
                <br/><br/>
                <input type=\"text\" class=\"form-control\" name=\"email\" value='$mail' style=\"width:300px;height:40px;color:#646464;font-size:1.3em\" required/>
                <br/><br/>
                <input type=\"number\" class=\"form-control\" name=\"age\" value='$age' style=\"width:300px;height:40px;color:#646464;font-size:1.3em\" required/>
                <br/><br/>
                <input type=\"date\" class=\"form-control\" name=\"birthday\" value='$birthday' style=\"width:300px;height:40px;color:#646464;font-size:1.3em\" required/>
                <br/><br/>
                <input type=\"text\" name=\"gender\" value='$gender' style=\"width:300px;height:40px;color:#646464;font-size:1.3em\" required/>
                <br/><br/>
                <textarea name=\"bio\" class=\"form-control\" style=\"width:300px; color:#646464; font-size:1.3em\">$biography</textarea>
                <br/><br/>
                <input class=\"btn btn-default\" type=\"submit\" id=\"entrar\" name=\"Guardar\" value=\"Guardar\" />
                <br/><br/>
                <input class=\"btn btn-default\" type=\"reset\" id=\"entrar\" name=\"Guardar\" value=\"Cancelar\" />
                <br/></br/><br/>

            </form>
        </div>
    </div>
    </div>");
?>
</body>
</html>
