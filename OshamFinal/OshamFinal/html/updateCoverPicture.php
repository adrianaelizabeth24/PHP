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
    <link rel="stylesheet" href="log.css" />
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:600' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div id="dimension">
    <div id="principal">
        <ul class="nav nav-tabs">
            <li class="active" style="width:100%"><h3>Cambiar foto de portada</h3></li>
        </ul>
        <div id="input">
            <form enctype="multipart/form-data" action="../postcoverPicture.php" method="post">
                <br/><br/>
                Imagen de perfil <input type="file" name="coverPicture">
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