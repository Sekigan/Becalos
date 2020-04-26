<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Covocatorias</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="stylesheet" href="tabla.css">
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style.css">
    
    
</head>
<body>
    
<div class="container">
        <div class="header">
            <div class="logo-title1">
                <img src="image/logo_magtimus.png">
                <h2> Covocatorias </h2>
            </div>
            <div class="menu">
                <a href="datos-alumno.php"><li class="module-Dalumnos">Datos del Alumno</li></a>
                <a href="convocatorias.php"><li class="module-convocatorias">Covocatorias</li></a>
                <a href="cerrar.php"><li class="module-convocatorias">Cerrar sesion</li></a>
            </div>
        </div>
</div>

    <div class="container-form3">
    
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form1">
        <table>
			<thead>
				<tr>
					<th><li class="module-Dalumnos">Convocatoria</li></th>  <th><li class="module-Dalumnos">Registrar como Aspirante</li></th>
				</tr>
			</thead>

			<?php

    $conex = mysqli_connect('localhost', 'root', '','becas');
    $consulta = "SELECT * FROM convocatorias";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado){
        while ($row = $resultado->fetch_array()){
            $nombre = $row['nombre'];
            ?>
            <tr>
				<td> <li><?php echo $nombre; ?> </li> </td> <td> <a href="aspirante-convocatoria.php"><button type="button">Registrar<label class="lnr lnr-chevron-right"></label></button> </td>
            </tr>

<?php
        }
    }
    
?>
			
		</table>
        </form>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
    


</body>
</html>