<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }
       /* /*para solo poder modificar contrasena sin habeer iniciado sesion*/
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        
        $clave = $_POST['clave'];
        $claveN = $_POST['claveN'];
        $claveN2 = $_POST['claveN2'];
        $usuario = $_POST['usuario'];
        
        
        $error = '';
        
        if (empty($clave) or empty($claveN) or empty($claveN2) or empty($usuario)){
            
            $error .= '<i>Favor de rellenar todos los campos</i>';
        }
        
        else{
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=becas', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }

            $statement = $conexion->prepare('SELECT * FROM alumnos WHERE numeroControl = :usuario LIMIT 1');
            $statement->execute(array(
                ':usuario' => $usuario
            
            ));
            $resultado = $statement->fetch();
                    
        if ($resultado == false){
            
            $error .= '<i>Este usuario no existe</i>';
        }

        /*para verificar contrasena */

        $statementC = $conexion->prepare('SELECT * FROM alumnos WHERE contrasena = :clave ');
            $statementC->execute(array(
                ':clave' => $clave
            
            ));
            $resultadoC = $statementC->fetch();
          
        if ($resultadoC == false){
            
            $error .= '<i> Contraseña equivocada </i>';
        }

        /* */
        
            if ($claveN != $claveN2){
                $error .= '<i> Las contraseñas no coinciden                        </i>';
            }
            
            if ($clave == $claveN){
                $error .= '<i> Introdusca una contraseña diferente a la actual                        </i>';
            }
        }

        
        if ($error == ''){
            $statement = $conexion->prepare('UPDATE alumnos SET contrasena = :claveN WHERE  numeroControl = :usuario');
            $statement->execute(array(
                ':usuario' => $usuario,
                ':claveN' => $claveN

            
            ));
            $resultado = $statement->fetch();
            
            $error .= '<i style="color: green;">Contrasena Actualizada Exitosamente</i>';
        }
        
    }
    require 'frontend/modificar-vista.php';

?>