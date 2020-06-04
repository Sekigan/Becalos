<?php
require_once('modelo/Database.php');
class Aspirante
{

	private $pdo;

	public $idAspirante;
	public $idConvoca;
	public $alumno_numeroControl;
	public $archivosNombre;
	public $ubicacionTMP;


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

			$stm = $this->pdo->prepare("SELECT CONCAT(`alumnos`.`nombre`,' ',`alumnos`.`apellidoP`,' ',`alumnos`.`apellidoM`) as Nombre_Alumno,
												`convocatorias`.`nombreConvocatoria`,
												CONCAT(`administradores`.`nombre`,' ',`administradores`.`apellidoP`,' ',`administradores`.`apellidoM`) as Nombre_Administrador,
												`administradores`.`mailAdmin` as Correo
												 FROM alumnos, convocatorias, aspirantes, administradores									
												where aspirantes.alumno_numeroControl=alumnos.numeroControl and 
													aspirantes.idConvocatoria=convocatorias.idConvocatoria and
													convocatorias.numeroControlA=administradores.numeroControlA
													");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try {
			$stm = $this->pdo->prepare("SELECT * FROM aspirantes WHERE id = ?");

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
				->prepare("DELETE FROM aspirantes WHERE id = ?");

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE aspirantes SET
						.clave = ?,
						estatus.descripcion = ?
				    WHERE estatus.id = ?";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->clave,
					$data->descripcion,
					$data->id
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

			$sql = "INSERT INTO aspirantes (idAspirante, idConvocatoria, alumno_numeroControl ,idArchivo)
		        VALUES (?, ?, ?, null)";

			$this->pdo->prepare($sql)->execute(
				array(
					$data->idAspirante,
					$data->idConvoca,
					$data->alumno_numeroControl,
				)
			);
		} catch (EXCEPTION $e) {
			if ($e) {
				$_SESSION['errMsg'] = 1;
			}
		}
	}
	public function guardarPDF($nombre, $ubicaciontmp)
	{
		if (!file_exists('archivosAspirantes')) {
			mkdir('archivosAspirantes', 0777, true);
			if (file_exists('archivosAspirantes')) {
				if (move_uploaded_file($ubicaciontmp, 'archivosAspirantes/' . $nombre . '.pdf')) {
					echo "archivo guardado";
				} else {
					echo "archivo no guardado";
				}
			}
		} else {
			if (move_uploaded_file($ubicaciontmp, 'archivosAspirantes/' . $nombre . '.pdf')) {
				echo "archivo guardado";
			} else {
				echo "archivo no guardado";
			}
		}
	}
}
