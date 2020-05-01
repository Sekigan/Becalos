<?php
    
    try{
         $conexion = new PDO('mysql:host=localhost;dbname=becas', 'root', '');
         $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         
    }catch(PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
    }


?>