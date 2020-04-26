<?php session_start();

if (isset($_SESSION['usuarioA'])) {
      require 'frontend/subir-convocatoria-vista.php';
} else {
      header('location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $error = '';
      try {
            $conexion = new PDO('mysql:host=localhost;dbname=becas', 'root', '');
      } catch (PDOException $prueba_error) {
            echo "Error: " . $prueba_error->getMessage();
      }

      try {

            $admin = $_SESSION['usuarioA'];
            $nombreConvo = $_POST['nombreConvo'];
            $requisitos = $_POST['requisitos'];
            $archivosNecesarios = $_POST['archivosNecesarios'];
            $name       = base64_encode(file_get_contents(addslashes($_FILES['pdf']['tmp_name'])));
            
            
            
                  $statement = $conexion->prepare('INSERT INTO `convocatorias`(`idConvocatoria`, `numeroControlA`, `nombreConvocatoria`, `convocatoriaPDF`, `archivosNecesariosDesc`, `requisitosDescripcion`) 
                                                      VALUES (NULL, :usuarioA, :nombreConvoca, :pdf,:archivosNece, :requisitos');
                  $statement->bindParam(':usuarioA', $admin);
                  $statement->bindParam(':nombreConvoca', $nombreConvo);
                  $statement->bindParam(':pdf', $name, PDO::PARAM_LOB);
                  $statement->bindParam(':archivosNece', $archivosNecesarios);
                  $statement->bindParam(':requisitos', $requisitos);

                  $resultado = $statement->fetch();
                  
                  if ($resultado == 1) {
                        $error .= '<i style="color: green;">Su Correo Electronico se ha Actualizado Exitosamente</i>';
                  } else {
                        $error .= '<i style="color: red;">verifique los datos</i>';
                  }
            
      } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage() . "\n");
            exit($e);
      }
}
