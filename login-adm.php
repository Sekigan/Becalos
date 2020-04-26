<?php session_start();

if(isset($_SESSION['usuarioA'])) {
    header('location: index-adm.php');
}

$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
    $usuario = $_POST['usuarioA'];
    $clave = $_POST['clave'];
    
    
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=becas', 'root', '');
        }catch(PDOException $prueba_error){
            echo "Error: " . $prueba_error->getMessage();
        }
    
    $statement = $conexion->prepare('SELECT * FROM administradores WHERE numeroControlA = :usuarioA AND contrasena = :clave'
    );
    
    $statement->execute(array(
        ':usuarioA' => $usuario,
        ':clave' => $clave
    ));
        
    $resultado = $statement->fetch();
    
    if ($resultado !== false){
        $_SESSION['usuarioA'] = $usuario;
        header('location: principal-adm.php');
    }else{
        $error .= '<i> Verifique su Usuario y/o Contraseña </i>';
    }
}

require 'frontend/login-adm-vista.php';

?>