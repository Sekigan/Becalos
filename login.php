<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }

    $error = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        
        
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=becas', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
        
        $statement = $conexion->prepare('SELECT * FROM alumnos WHERE numeroControl = :usuario AND contrasena = :clave'
        );
        
        $statement->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave
        ));
            
        $resultado = $statement->fetch();
        
        if ($resultado !== false){
            $_SESSION['usuario'] = $usuario;
            header('location: datos-alumno.php');
        }else{
            $error .= '<i> Verifique su Usuario y/o Contraseña </i>';
        }
    }
    
require 'frontend/login-vista.php';


?>