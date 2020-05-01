<?php session_start();
if (isset($_SESSION['usuarioA'])) {

      require_once 'frontend/subir-convocatoria-vista.php';


      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo var_dump($_POST);
            require_once 'conexion.php';
            $error = '';
            $admin = $_SESSION['usuarioA'];

            $nombreConvo = $_POST["nombreConvo"];
            $requisitos = $_POST["requisitos"];
            $archivosNecesarios = $_POST["archivosNecesarios"];


            //$archivo = file_get_contents($_FILES["pdf"]["tmp_name"]);

            echo var_dump($_FILES["pdf"]["name"]);
            //$file = file_get_contents($_FILES["pdf"]["tmp_name"]);
            $b64Doc = base64_encode(file_get_contents($_FILES["pdf"]["tmp_name"]));



            $sql = "INSERT INTO convocatorias(idConvocatoria, numeroControlA, nombreConvocatoria, convocatoriaPDF,archivosNecesariosDesc, requisitosDescripcion) VALUES (NULL, :idAdmin, :nombreCon,:pdf, :archivos,:requisitos)";

            $statement = $conexion->prepare($sql);

            $statement->bindParam(':idAdmin', $admin, PDO::PARAM_INT);
            $statement->bindParam(':nombreCon', $nombreConvo, PDO::PARAM_STR);
            $statement->bindParam(':pdf', $b64Doc, PDO::PARAM_LOB);
            $statement->bindParam(":archivos", $archivosNecesarios, PDO::PARAM_STR);
            $statement->bindParam(':requisitos', $requisitos, PDO::PARAM_STR);

            $statement->execute();
      }
      /*
      Requisito 1
Requisito 2
Requisito 3
Requisito 4*/
} else {
      require_once 'login.php';
}
