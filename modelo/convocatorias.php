<?php
require_once('modelo/Database.php');
class Convocatorias
{

    private $pdo;

    public $idConvocatoria;
    public $numeroControlA;
    public $nombreConvocatoria;
    public  $convocatoriaPDF;
    public $archivosNecesarios;
    public $requisitos;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM `convocatorias`");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM convocatorias WHERE idConvocatoria = ?");

            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $stm = $this->pdo
                ->prepare("DELETE FROM `convocatorias` WHERE idConvocatoria = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE `convocatorias` SET
						convocatorias.numeroControlA = ?,
                        convocatorias.nombreConvocatoria = ?,
                        convocatorias.convocatoriaPDF = ?,
                        convocatorias.archivosNecesariosDesc = ?,
                        convocatorias.requisitosDescripcion = ?
						 WHERE convocatorias.idConvocatoria = ?";
            $this->pdo->prepare($sql)->execute(
                array(
                    $data->numeroControlA,
                    $data->nombreConvocatoria,
                    $data->convocatoriaPDF,
                    $data->archivosNecesarios,
                    $data->requisitos,
                    $data->idConvocatoria
                )
            );
        } catch (EXCEPTION $e) {
            $error = $e->getMessage();
            echo "<h2>" . $error . "</h2>";
            die($e->getMessage());
        }
    }

    public function Registrar($data)
    {

        $_SESSION['errMsg'] = 0;

        try {

            $sql = "INSERT INTO convocatorias(idConvocatoria, numeroControlA, nombreConvocatoria, convocatoriaPDF,archivosNecesariosDesc, requisitosDescripcion) VALUES (' ', ?, ?,NULL,?,?)";

            $this->pdo->prepare($sql);



            $this->pdo->prepare($sql)->execute(
                array(
                    $data->numeroControlA,
                    $data->nombreConvocatoria,
                    $data->archivosNecesarios,
                    $data->requisitos
                )
            );
        } catch (EXCEPTION $e) {
            if ($e) {
                $_SESSION['errMsg'] = 1;
            }
        }
    }
}
