<!DOCTYPE html>
<html>
<head>
    <title>
        Foto de Perfil
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="authors" content="Adriana Valenzuela, Mayra Ruíz, Roberto Ruíz">
    <meta name="property" content="ITESM CAMPUS MONTERREY">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/log.css" />
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
<div id="top-bar">
    <div id="top-left">
        <a href="index.html"><img src="../Assets/images/oshamfashion.png" width="200" height="50"></a>
    </div>
    <div id="top-right">
        <ul>
            <li>
                <a href="profileView.php"><i id="class=" fa fa-users" style="color:#ffffff; font-size:24px"></i></a>
            </li>
            &nbsp;
            <li>
                <a href="config.html"><i class="fa fa-cog" style="color:#ffffff; font-size:24px"></i></a>
            </li>
            &nbsp;
            <li>
                <a href="signout.php"><i class="fa fa-sign-out" style="color:#ffffff; font-size:24px"></i></a>
            </li>
        </ul>
    </div>
</div>
<div id="dimension">
    <div id="principal">
        <ul class="nav nav-tabs">
            <li class="active" style="width:100%"><h3>Cambiar foto de perfil</h3></li>
        </ul>
        <div id="input">
            <form enctype="multipart/form-data" action="../Controller/postProfilePicture.php" method="post">
            <br/><br/>
                Imagen de perfil <input type="file" name="profilePicture">
                <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
            <br/><br/>
            <input class="btn btn-default" type="submit" id="entrar" name="entrar" value="Cambiar" />
            <br/></br/><br/>
                </form>
        </div>
    </div>
</div>
</body>
</html>