<?php 


/* para solo permitir a usuarios tipo alumno acceda a esta pantalla o impedir que se ingrese sin iniciar sesion*/
session_start();

if(isset($_SESSION['usuario'])){
    
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


    //actualiza mail cuando se escribe un correo pero el telefono se deja igual cuando el telefono esta en blanco o contenga datos
    if($mailAlumno <> NULL and $telefonoAlumno == NULL){
        $conex = mysqli_connect('localhost', 'root', '','becas');
        $consulta = "SELECT * FROM alumnos WHERE numeroControl=$usuario";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado){
            while ($row = $resultado->fetch_array()){
                
                $numeroC = $row['numeroControl'];
                
                $mail = $row['mailAlumno'];
                $telefono = $row['telefonoAlumno'];
                
        
            }
        }
        /* errores */

        if (!filter_var($mailAlumno, FILTER_VALIDATE_EMAIL)) {
        $error .= '<i>Formato de correo invalido. </i>';
        } else{

        $statement = $conexion->prepare('UPDATE alumnos SET mailAlumno = :mailAlumno, telefonoAlumno = :telefono WHERE  numeroControl = :usuario');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':mailAlumno' => $mailAlumno,
            ':telefono' => $telefono

        ));
        $resultado = $statement->fetch();
                
        $error .= '<i style="color: green;">Correo Actualizado Exitosamente. </i>';
    }
    }
    
    //correo y telefono al mismo tiempo teniendo datos en ambos y estando en blanco ambos
/*
    if($mailAlumno <> NULL and $telefonoAlumno <> NULL){
        $conex = mysqli_connect('localhost', 'root', '','becas');
        $consulta = "SELECT * FROM alumnos WHERE numeroControl=$usuario";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado){
            while ($row = $resultado->fetch_array()){
                
                $numeroC = $row['numeroControl'];
                
                $mail = $row['mailAlumno'];
                $telefono = $row['telefonoAlumno'];
                
        
            }
        }

        if (!filter_var($mailAlumno, FILTER_VALIDATE_EMAIL)) {
            $error .= '<i>Formato de correo invalido. </i>';
            
        } elseif (strlen($telefonoAlumno) != 10){
            $error .= '<i> Formato de telefono invalido introduca un numero con 10 digitos.                        </i>';
        }
        else{
    
        $statement = $conexion->prepare('UPDATE alumnos SET mailAlumno = :mailAlumno, telefonoAlumno = :telefonoAlumno WHERE  numeroControl = :usuario');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':mailAlumno' => $mailAlumno,
            ':telefonoAlumno' => $telefonoAlumno

        ));
        $resultado = $statement->fetch();
                
        $error .= '<i style="color: green;">Correo y Telefono Actualizados Exitosamente. </i>';
        }
        }
    */

    
    
    //Actualiza solo telefono cuando correo esta en blanco o tenga datos
    if($telefonoAlumno <> NULL and $mailAlumno == NULL){
        $conex = mysqli_connect('localhost', 'root', '','becas');
        $consulta = "SELECT * FROM alumnos WHERE numeroControl=$usuario";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado){
            while ($row = $resultado->fetch_array()){
                
                $numeroC = $row['numeroControl'];
                
                $mail = $row['mailAlumno'];
                $telefono = $row['telefonoAlumno'];
                
        
            }
        }

        
        if (strlen($telefonoAlumno) != 10){
            $error .= '<i> Formato de telefono invalido introduca un numero con 10 digitos.                        </i>';
        }else{

        $statement = $conexion->prepare('UPDATE alumnos SET mailAlumno = :mail, telefonoAlumno = :telefonoAlumno WHERE  numeroControl = :usuario');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':mail' => $mail,
            ':telefonoAlumno' => $telefonoAlumno

        ));
        $resultado = $statement->fetch();
                
        $error .= '<i style="color: green;">Telefono Actualizado Exitosamente. </i>';
    }
    }

    //si ambos contienen algo
    if($mailAlumno <> NULL and $telefonoAlumno <> NULL){
    // telefono tiene algo escrito y lo escrito en correo no es un correo
    //se actualiza el telefono y muestra error del correo
    if($telefonoAlumno <> NULL and (!filter_var($mailAlumno, FILTER_VALIDATE_EMAIL))){
        $conex = mysqli_connect('localhost', 'root', '','becas');
        $consulta = "SELECT * FROM alumnos WHERE numeroControl=$usuario";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado){
            while ($row = $resultado->fetch_array()){
                
                $numeroC = $row['numeroControl'];
                
                $mail = $row['mailAlumno'];
                $telefono = $row['telefonoAlumno'];
                
        
            }
        }

        
        if (strlen($telefonoAlumno) != 10){
            $error .= '<i> Formato de telefono invalido introduca un numero con 10 digitos.                        </i>';
        }else{

        $statement = $conexion->prepare('UPDATE alumnos SET mailAlumno = :mail, telefonoAlumno = :telefonoAlumno WHERE  numeroControl = :usuario');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':mail' => $mail,
            ':telefonoAlumno' => $telefonoAlumno

        ));
        $resultado = $statement->fetch();
        $error .= '<i>Formato de correo invalido. </i>';       
        $error .= '<i style="color: green;">Telefono Actualizado Exitosamente. </i>';
    }
    }
    
    //correo tiene algo escrito y telefono no es de 10 digitos
    //se actualiza el correo y se muestra error del telefono
    if($mailAlumno <> NULL and (strlen($telefonoAlumno) != 10)){
        $conex = mysqli_connect('localhost', 'root', '','becas');
        $consulta = "SELECT * FROM alumnos WHERE numeroControl=$usuario";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado){
            while ($row = $resultado->fetch_array()){
                
                $numeroC = $row['numeroControl'];
                
                $mail = $row['mailAlumno'];
                $telefono = $row['telefonoAlumno'];
                
        
            }
        }
        /* errores */

        if (!filter_var($mailAlumno, FILTER_VALIDATE_EMAIL)) {
        $error .= '<i>Formato de correo invalido. </i>';
        } else{

        $statement = $conexion->prepare('UPDATE alumnos SET mailAlumno = :mailAlumno, telefonoAlumno = :telefono WHERE  numeroControl = :usuario');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':mailAlumno' => $mailAlumno,
            ':telefono' => $telefono

        ));
        $resultado = $statement->fetch();
        $error .= '<i> Formato de telefono invalido introduca un numero con 10 digitos. </i>';        
        $error .= '<i style="color: green;">Correo Actualizado Exitosamente. </i>';
    }
    }

    //si ambos son correctos
    if((strlen($telefonoAlumno) == 10) and (filter_var($mailAlumno, FILTER_VALIDATE_EMAIL))){
        $conex = mysqli_connect('localhost', 'root', '','becas');
        $consulta = "SELECT * FROM alumnos WHERE numeroControl=$usuario";
        $resultado = mysqli_query($conex, $consulta);
        if ($resultado){
            while ($row = $resultado->fetch_array()){
                
                $numeroC = $row['numeroControl'];
                
                $mail = $row['mailAlumno'];
                $telefono = $row['telefonoAlumno'];
                
        
            }
        }

        
        $statement = $conexion->prepare('UPDATE alumnos SET mailAlumno = :mailAlumno, telefonoAlumno = :telefonoAlumno WHERE  numeroControl = :usuario');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':mailAlumno' => $mailAlumno,
            ':telefonoAlumno' => $telefonoAlumno

        ));
        $resultado = $statement->fetch();
                
        $error .= '<i style="color: green;">Correo y Telefono Actualizados Exitosamente. </i>';
    }
    
}
    
}

require 'frontend/datos-alumno-vista.php';


?>