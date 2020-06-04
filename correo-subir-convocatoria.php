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
    
    /* Mensaje */
    $url="http://localhost/Becas-master/convocatorias.php";

    $bodyC = "La convocatoria " . $nombreConvocatoria . "ahora esta disponible en la platofarma." . 
    "<br>Publicado por: " . $nombreA . " " . $apellidoPA . " " . $apellidoMA . 
    "<br>Departamento: " . $depto . 
    "<br>Correo: " . $mailAdmin . "<br>Teléfono: " . $telefonoAdmin . "<br>" . 
    "<br>Si desea ver esta y más convocatorias disponibles " . "<html> <body> <a href='" . $url 
    . "' target='_blank'>haga clic en este enlace.</a> </body> </html> ";
    
    
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/OAuth.php';

    $conex = mysqli_connect('localhost', 'root', '','becas');
    $consulta = "SELECT * FROM alumnos";
    $resultado = mysqli_query($conex, $consulta);
    
    $mailAlumno = [];
    
    if ($resultadoa)
    {
        foreach ($resultado as $row) 
        {

        
                
                $mailAlumno = $row['mailAlumno'];
                $telefonoAlumno = $row['telefonoAlumno'];
                
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
                $mail->addAddress( $mailAlumno , 'Nombre del destino');

                $mail->Subject = 'Nueva convocatoria disponible';
                $mail->Body = $bodyC;
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
                    echo '<script>
                            alert("Correo enviado exitosamente!");
                          </script>';
                }
        }
                    
    }
?>
