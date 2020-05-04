<?php session_start();
require_once 'modelo/convocatorias.php';
$entidadConvocatoria = new Convocatorias();

require_once 'frontend/shwgestionar-convocatoria-vista.php';




$_SESSION['errMsg'] = 0;

require_once('modelo/Database.php');

$controlador = new ControladorConvocatoria();

// logica del controlador

// Obtenemos el controlador que queremos cargar
$controlador  = new ControladorConvocatoria();
$accion       = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

call_user_func(array($controlador, $accion));






class ControladorConvocatoria
{

      private $modelo;

      public function __CONSTRUCT()
      {
            $this->modelo = new Convocatorias();
      }

      public function Index()
      {
            // require_once 'frontend/principal-vista-adm.php';
      }

      public function Crud()
      {
            $entidadConvocatoria = new Convocatorias();

            if (isset($_REQUEST['id'])) {
                  $entidadConvocatoria = $this->modelo->Obtener($_REQUEST['id']);
            }


            require_once 'frontend/updConvocatorias.php';
      }

      public function Guardar()
      {

            $entidadConvocatoria = new Convocatorias();
            $entidadConvocatoria->idConvocatoria = $_REQUEST['txtId'];
            $entidadConvocatoria->numeroControlA = $_SESSION['usuarioA'];
            $entidadConvocatoria->nombreConvocatoria = $_REQUEST['txtNombre'];
            $entidadConvocatoria->requisitos = $_REQUEST["txtRequisitos"];
            $entidadConvocatoria->archivosNecesarios = $_REQUEST["txtArchivosN"];

            if ($entidadConvocatoria->idConvocatoria > 0) {
                  $this->modelo->Actualizar($entidadConvocatoria);
                  //header('Location: ./controlador.php?gui=estatus');
            } else {
                  $this->modelo->Registrar($entidadConvocatoria);
                  if ($_SESSION['errMsg'] == 0) {
                        $this->Crud();
                  } else {
                        // require_once './vista/headerHTML.php';
                        require_once 'gestionar-convocatoria.php';
                  }
            }
      }

      public function Eliminar()
      {
            $this->modelo->Eliminar($_REQUEST['id']);
            require_once 'gestionar-convocatoria.php';
      }
}
