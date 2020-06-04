<?php 


/* para solo permitir a usuarios tipo alumno acceda a esta pantalla o impedir que se ingrese sin iniciar sesion*/
session_start();

if(isset($_SESSION['usuario'])){
    
}else{
    header ('location: login.php');
}

/* para solo permitir a usuarios tipo alumno acceda a esta pantalla */

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
    $mensaje = $_POST['message'];
    $fecha = $_POST['txtfecha'];
    $hora = $_POST['timepicker1'];
    
    $alumno_numeroControl = $_POST['numC'];

    //idAspirante
    //idConvocatoria
    //admin_numeroControl
    

    $error = '';
    
    
}


require 'frontend/solicitar-asesoria-vista.php';


        
?>