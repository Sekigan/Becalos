<?php
/* para solo permitir a usuarios tipo alumno acceda a esta pantalla o impedir que se ingrese sin iniciar sesion*/
session_start();

if(isset($_SESSION['usuario'])){
    
}else{
    header ('location: login.php');
}
/* identificar el usuario que inicio sesion*/
$usuario =  $_SESSION['usuario'];
/* identificar el usuario que inicio sesion*/



$conex = mysqli_connect('localhost', 'root', '','becas');
    $consulta = "SELECT * FROM alumnos WHERE numeroControl=$usuario";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado){
        while ($row = $resultado->fetch_array()){
            $nombre = $row['nombre'];
            $apellidoP = $row['apellidoP'];
            $apellidoM = $row['apellidoM'];
            $numeroControl = $row['numeroControl'];
            $semestre = $row['semestre'];
            $carrera = $row['carrera'];
            $mailAlumno = $row['mailAlumno'];
            $telefonoAlumno = $row['telefonoAlumno'];
            
     
        }
    }
/* llama al mensaje*/
$mensaje = $_POST['message'];
$fecha = $_POST['txtfecha'];
$hora = $_POST['timepicker1'];


$body = "Numero de control: " . $numeroControl ."<br>Correo: " . $mailAlumno . "<br>Teléfono: " . 
$telefonoAlumno . "<br>Mensaje: " . $mensaje . "<br>El alumno " . $nombre . " " . $apellidoP . " " . 
$apellidoM . " solicito programar una asesoría para el dia " . $fecha . " a las " . $hora ;

//Aqui podemos recibir de ajax nuestros datos 
//Como los datos que vienen de ajax van a venir asi mas o menos [array] => 'name': miname, 'apellildo': apellido... etc
// los vamos a reccibir asi

//Aqui si gustas puedes validar
//$name = $_POST['name'];

//entonces una vez recibido los datos ya haces lo que hace el archivo, mail o guardar etc.. y por ejemplo cuando guardes 
//al momento de terminar el insert puedes retornar un 1 por ejemplo así: return json_enconde (mi-variable);

/* */
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/OAuth.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->isSMTP();
/*     */

/*  $mensaje = $_POST['message'];   */
/*
Enable SMTP debugging
0 = off (for production use)
1 = client messages
2 = client and server messages
*/
$mail-> SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com'; 'smtp.live.com'; 'Smtp.mail.yahoo.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "proyectobecasits@gmail.com";
$mail->Password = "15050922";
$mail->setFrom('proyectobecasits@gmail.com',  $numeroControl);
$mail->addAddress('calvillodispmoviles@gmail.com', 'Nombre del destino');
$mail->Subject = 'Asesoría';
$mail->Body = $body;
$mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
$mail->IsHTML(true);
$mail->SMTPOptions = array(
	'ssl' => array(
	'verify_peer' => false,
	'verify_peer_name' => false,
	'allow_self_signed' => true
	)
	);
	
if (!$mail->send())
{
	echo "Error al enviar el E-Mail: ".$mail->ErrorInfo;
}
else
{
	header ('location: solicitar-asesoria.php');
}
?>
