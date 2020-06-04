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
       if($resultado == true){
        $statementC = $conexion->prepare('SELECT * FROM alumnos WHERE contrasena = :clave and numeroControl =:usuario ');
            $statementC->execute(array(
                ':clave' => $clave,
                ':usuario' => $usuario
            
            ));
            $resultadoC = $statementC->fetch();
          
        if ($resultadoC == false){
            
            $error .= '<i> Contraseña equivocada </i>';
        }
        }
        /* */
        
            if ($claveN != $claveN2){
                $error .= '<i> Las contraseñas no coinciden                        </i>';
            }
            
            if ($clave == $claveN){
                $error .= '<i> Introdusca una contraseña diferente a la actual                        </i>';
            }

            if (strlen($claveN) < 8){
                $error .= '<i> La contraseña debe tener al menos 8 caracteres                        </i>';
             }

            if (strlen($claveN) > 20){
                $error .= '<i> La contraseña no puede tener más de 20 caracteres                        </i>';
            }

            if (!preg_match('`[a-z]`',$claveN)){
                $error .= '<i> La contraseña debe tener al menos una letra minúscula                        </i>';
            }
            
            if (!preg_match('`[A-Z]`',$claveN)){
                $error .= '<i> La contraseña debe tener al menos una letra mayúscula                        </i>';
            }
            
            if (!preg_match('`[0-9]`',$claveN)){
                $error .= '<i> La contraseña debe tener al menos un caracter numérico                        </i>';
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
