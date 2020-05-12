<?php
require_once('./modelo/Convocatoria.php');




class ControladorConvocatoria
{

      private $modelo;

      public function __CONSTRUCT()
      {
            $this->modelo = new Convocatorias();
      }

      public function Index()
      {
            require_once 'repo.php';
            require_once './frontend/shwgestionar-convocatoria-vista.php';
      }

      public function Crud()
      {
            $entidadConvocatoria = new Convocatorias();

            if (isset($_REQUEST['id'])) {
                  $entidadConvocatoria = $this->modelo->Obtener($_REQUEST['id']);
            }
            require_once 'repo.php';
            require_once './frontend/updConvocatoriasVista.php';
      }

      public function Guardar()
      {

            $entidadConvocatoria = new Convocatorias();
            $entidadConvocatoria->idConvocatoria = $_REQUEST['txtId'];
            $entidadConvocatoria->numeroControlA = $_SESSION['usuarioA'];
            $entidadConvocatoria->nombreConvocatoria = $_REQUEST['txtNombre'];
            $entidadConvocatoria->requisitos = $_REQUEST["txtRequisitos"];
            $entidadConvocatoria->archivosNecesarios = $_REQUEST["txtArchivosN"];
            $entidadConvocatoria->convocatoriaPDF = base64_encode(file_get_contents($_FILES["pdf"]["tmp_name"]));

            if ($entidadConvocatoria->idConvocatoria > 0) {
                  $this->modelo->Actualizar($entidadConvocatoria);
                  header('Location: ./controlador.php?gui=convocatoria');
            } else {
                  $this->modelo->Registrar($entidadConvocatoria);
                  if ($_SESSION['errMsg'] == 0) {
                        $this->Crud();
                  } else {
                        require_once 'repo.php';
                        require_once './frontend/updConvocatoriasVista.php';
                  }
            }
      }

      public function Eliminar()
      {
            $this->modelo->Eliminar($_REQUEST['id']);
            header('Location: ./controlador.php?gui=convocatoria');
      }
}
