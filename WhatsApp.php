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

if(isset($_POST['enviar'])){

    $mensaje = $_POST['message'];
    $fecha = $_POST['txtfecha'];
    $hora = $_POST['timepicker1'];
    

    header ("location: https://api.whatsapp.com/send?phone=+5218446084225&text= Mi nombre es *$nombre $apellidoP $apellidoM* alumno del Instituto Tecnológico de Saltillo, mi *Número de control* es $numeroControl y mi *Correo electrónico* $mailAlumno . He solicitado una asesoría para el día *$fecha* a las *$hora* y he escrito el siguiente mensaje desde la plataforma Becas ITS : _$mensaje._");
   
}

?>
