<?php 


/* para solo permitir a usuarios tipo alumno acceda a esta pantalla o impedir que se ingrese sin iniciar sesion*/
session_start();

if(isset($_SESSION['usuario'])){
    require 'frontend/datos-alumno-vista.php';
}else{
    header ('location: login.php');
}

/* para solo permitir a usuarios tipo alumno acceda a esta pantalla */

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
   
    $usuario =  $_SESSION['usuario'];   
    $mailAlumno = $_POST['mailAlumno'];
    $telefonoAlumno = $_POST['telefonoAlumno'];
    
    
    $error = '';
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=becas', 'root', '');
    }catch(PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
    }
    if($mailAlumno <> NULL){
    
    $statement = $conexion->prepare('UPDATE alumnos SET mailAlumno = :mailAlumno WHERE  numeroControl = :usuario');
    $statement->execute(array(
        ':usuario' => $usuario,
        ':mailAlumno' => $mailAlumno

    ));
    $resultado = $statement->fetch();
    
    if($resultado === true){
    $error .= '<i style="color: green;">Su Correo Electronico se ha Actualizado Exitosamente</i>';
    }else{
        $error .= '<i style="color: red;">verifique los datos</i>';
    }

    }else{
        exit($mailAlumno);
    }
    /*telefonoAlumno */
    if($telefonoAlumno <> NULL){
    $statement = $conexion->prepare('UPDATE alumnos SET telefonoAlumno = :telefonoAlumno WHERE  numeroControl = :usuario');
    $statement->execute(array(
        ':usuario' => $usuario,
        ':telefonoAlumno' => $telefonoAlumno

    ));
    $resultado = $statement->fetch();
    
    if($resultado === true){
        $error .= '<i style="color: green;">Su Correo Telefono se ha Actualizado Exitosamente</i>';
        }else{
            $error .= '<i style="color: red;">verifique los datos</i>';
        }
    /*telefonoAlumno */
    }else{
        exit($telefonoAlumno);
    }
}

require 'frontend/datos-alumno-vista.php';


?>