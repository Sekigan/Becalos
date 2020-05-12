

<?php
require_once('modelo/Convocatoria.php');


session_start();
if (isset($_SESSION['usuarioA'])) {

      require_once 'frontend/subir-convocatoria-vista.php';


      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $entidadConvocatoria = new Convocatorias();


            $entidadConvocatoria->numeroControlA = $_SESSION['usuarioA'];
            $entidadConvocatoria->nombreConvocatoria = $_POST["nombreConvo"];
            $entidadConvocatoria->requisitos = $_POST["requisitos"];
            $entidadConvocatoria->archivosNecesarios = $_POST["archivosNecesarios"];
            $entidadConvocatoria->convocatoriaPDF = base64_encode(file_get_contents($_FILES["pdf"]["tmp_name"]));

            $entidadConvocatoria->Registrar($entidadConvocatoria);
      }
      /*
      Requisito 1
Requisito 2
Requisito 3
Requisito 4*/
} else {
      require_once 'login.php';
}
