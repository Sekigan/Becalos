<?php session_start();

if(isset($_SESSION['usuarioA'])) {
    header('location: index-adm.php');
}
  /*  /*para solo poder modificar contrasena sin habeer iniciado sesion*/




if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        
    $clave = $_POST['clave'];
    $claveN = $_POST['claveN'];
    $claveN2 = $_POST['claveN2'];
    $usuario = $_POST['usuarioA'];
    
    
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

        $statement = $conexion->prepare('SELECT * FROM administrador WHERE numeroControlA = :usuarioA LIMIT 1');
        $statement->execute(array(
            ':usuarioA' => $usuario
        
        ));
        $resultado = $statement->fetch();
      
    if ($resultado == false){
        
        $error .= '<i>Este usuario no existe</i>';
    }


    /*para verificar contrasena */

    $statementC = $conexion->prepare('SELECT * FROM administrador WHERE contrasena = :clave ');
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
            $error .= '<i> Introdusca una contraseña diferente a la actual </i>';
        }
    }

    
    if ($error == ''){
        $statement = $conexion->prepare('UPDATE administrador SET contrasena = :claveN WHERE  numeroControlA = :usuarioA');
        $statement->execute(array(
            ':usuarioA' => $usuario,
            ':claveN' => $claveN

        
        ));
        $resultado = $statement->fetch();
        
        $error .= '<i style="color: green;">Contrasena Actualizada Exitosamente</i>';
    }
}
require 'frontend/modificar-adm-vista.php';

?>