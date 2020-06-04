<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Principal ADM</title>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <script src="buscar/jquery.js"></script>
    <script src="buscar/jquery.dataTables.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- iconos -->
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="buscar/estilo.css">
    <link rel="stylesheet" href="buscar/styles.css">

</head>
<body id >
    <div class="container">
        <div class="header" id="h">
            <div class="logo-title1">
                <img src="image/logo_magtimus.png">
                <h2>Inicio Administrador</h2>
            </div>
            <div class="menu">
                
                <a href="subir-convocatoria.php"><li class="module-subir">Subir Convocatoria</li></a>
                <a href="./controlador.php?gui=Convocatoria"><li class="module-modificar">Gestionar Convocatoria</li></a>
                <a href="cerrar.php"><li class="module-convocatorias">Cerrar Sesión</li></a>
                
            </div>
                 
        </div>
        
        <div class="header2" id="h2">
            <div class="header-top">
                <div class="navegacion">
                    <div class="menu2">
                        <li ><div class="buscar">
                                    <input type="search" id="inputBusqueda" class="buscar_texto" placeholder="Buscar">
                                        <a href="" class="boton">
                                    <i class="icon-buscar"></i></a>
                        </div></li>
                    </div>
                </div>
            </div>
            <div class="search" id="search">
			<table class="search-table" id="searchTable">
				<thead>
					<tr>
						<td></td>
					</tr>
				</thead>
				<tbody>
					
					<?php

                        $conex = mysqli_connect('localhost', 'root', '','becas');
                        
                        $consulta = "SELECT * FROM alumnos ";
                        $resultado = mysqli_query($conex, $consulta);
                        if ($resultado){
                            while ($row = $resultado->fetch_array()){
								$nombre = $row['nombre'];
								$numeroControl = $row['numeroControl'];
								$apellidoP = $row['apellidoP'];
								$apellidoM = $row['apellidoM'];
                                ?>
                                <tr>
                                    <td><a href="estudiantes.php?variable=<?php echo $numeroControl; ?>"> <?php  echo $numeroControl . " " . $nombre . " " . $apellidoP . " " . $apellidoM ; ?></a></td>
                                    
                                </tr>
                                

                    <?php
                                }
                        }
        
                    ?>
                    
				</tbody>
			</table>
		</div>
        </div>
        

    </div>

        
        

    <div class="container-form4" style= "max-width: 600px;" id="f4">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="welcome-form">
                <h1>Bienvenido a </h1>
                <h2>Becas ITS</h2>
            </div>
            <div class="welcome-form">
                <h1>Ha iniciado sesión como </h1>
                <h2>Administrador</h2>
            </div>
        </form>

    </div>


    
    <script src="buscar/buscador.js"></script>
</body>

</html>