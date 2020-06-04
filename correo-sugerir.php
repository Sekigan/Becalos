<?php
/* para solo permitir a usuarios tipo alumno acceda a esta pantalla o impedir que se ingrese sin iniciar sesion*/
session_start();

if(isset($_SESSION['usuarioA'])){
    
}else{
    header ('location: login-adm.php');
}
/* identificar el usuario que inicio sesion*/
$admin =  $_SESSION['usuarioA'];
/* identificar el usuario que inicio sesion*/


$conexa = mysqli_connect('localhost', 'root', '','becas');
    $consultaa = "SELECT * FROM administradores WHERE numeroControlA=$admin";
    $resultadoa = mysqli_query($conexa, $consultaa);
    if ($resultadoa){
        while ($row = $resultadoa->fetch_array()){
            $nombreA = $row['nombre'];
            $apellidoPA = $row['apellidoP'];
            $apellidoMA = $row['apellidoM'];
            $numeroControlA = $row['numeroControlA'];
            $mailAdmin = $row['mailAdmin'];
            $telefonoAdmin = $row['telefonoAdmin'];
            $departamento = $row['departamento'];
     
        }
    }
        if($departamento==0){
        $depto="Servicios Escolares Oficina de Seguro Facultativo y Becas";
        }
        
        if($departamento==1){
            $depto="Coordinación de Lenguas Extranjeras";
        }

/* llama al mensaje*/
$mensaje = $_POST['message'];
$fecha = $_POST['txtfecha'];
$hora = $_POST['timepicker1'];
$correoA = $_POST['correoA'];
$telefonoA = $_POST['telefonoA'];
$url="http://localhost/Becas-master/solicitar-asesoria.php";

$bodyCA = "Publicado por: " . $nombreA . " " . $apellidoPA . " " . $apellidoMA . 
"<br>Departamento: " . $depto . "<br>Correo: " . $mailAdmin . "<br>Teléfono: " . $telefonoAdmin . 
"<br>Mensaje: " . $mensaje . "<br>" . 
"<br>Para dudas o aclaraciones contacte al administrador o solicite una asesoría " . "<html> <body> <a href='" . $url . "' target='_blank'>haciendo clic en este enlace.</a> </body> </html> " ;

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
$mail->Host = 'smtp.gmail.com'; 'smtp.live.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "proyectobecasits@gmail.com";
$mail->Password = "15050922";
$mail->setFrom('proyectobecasits@gmail.com',  $depto);
$mail->addAddress($correoA, 'Nombre del destino');
$mail->Subject = 'Podemos ayudarte?';
$mail->Body = $bodyCA;
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
	header ('location: sugerir-asesoria.php');
}
?>
