<!DOCTYPE HTML>
<Html>
<head>
    <title>

    </title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Adriana
 * Date: 10/11/2015
 * Time: 14:04
 */
$email = $_POST["user"];
$pass1 = $_POST["password"];
$pass2 = $_POST["passwordConfirm"];

include("../Model/existeCorreo.php");
$varBoleana = existeCorreo($email);


if($varBoleana) {

    if ($pass1 != $pass2) {
        echo "<h1>los passwords no son iguales</h1>";
    } else {

        $numero = crypt($email,'."#$%&/()');
        include("../Model/usuarioTemporal.php");
        insertarUsuarioTemporal($email,$pass1,$numero);

        require("../PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php");
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp-mail.outlook.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "oshamosham@outlook.com";
        $mail->Password = "proyectoPHP123";
        $mail->setFrom("oshamosham@outlook.com", 'Osham Fashion Community');
        $mail->addReplyTo("oshamosham@outlook.com", 'Osham Fashion Community');
        $mail->addAddress($email, 'Usuario');
        $mail->Subject = 'Register to Osham Fashiom Community';
        $mail->isHTML(true);
        $link = "http://localhost:63342/Osham/Model/registro.php?code=$numero";
        $mail->Body = "Hola, querido usuario, si solicitaste registarte en nuestra comunidad,
                           sigue el siguiente link para hacer el registro : <a href='$link'>Registro Aqui</a>
                           si no ignora este mail";
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
        else {
            header("location:../View/mailSent.html");
        }
    }
}
else{
    echo "<h1>El correo está registrado </h1>";
}
?>
</body>
</Html>
