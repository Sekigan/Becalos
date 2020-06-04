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



if(isset($_POST['enviar'])){
    
    $mensaje = $_POST['message'];
    $fecha = $_POST['txtfecha'];
    $hora = $_POST['timepicker1'];
    $numC = $_POST['alumnonumC'];

    $conex = mysqli_connect('localhost', 'root', '','becas');
    $consulta = "SELECT * FROM alumnos WHERE numeroControl=$numC";
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
            $wsp = "+521" . $telefonoAlumno;
     
        }
    }

    header ("location: https://api.whatsapp.com/send?phone=$wsp&text=Publicado por: *$nombreA $apellidoPA $apellidoMA* trabajador(a) del departamento de *$depto* en el Instituto Tecnológico de Saltillo, mi *Correo electrónico* es $mailAdmin . He escrito el siguiente mensaje desde la plataforma Becas ITS : _$mensaje._ Con motivo de resolver tus dudas hemos sugerido solicitar una asesoría para el día *$fecha* a las *$hora*.");
    
    
   
}

?>