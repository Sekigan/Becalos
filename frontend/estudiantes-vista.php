<?php

$usuario =  $_SESSION['usuarioA'];
//aqui en lugar de $usuario seria el num de control del alumno seleccionado en el buscador

$alumno = $_GET['variable'];
$conex = mysqli_connect('localhost', 'root', '', 'becas');
$consulta = "SELECT * FROM alumnos WHERE numeroControl=$alumno";
$resultado = mysqli_query($conex, $consulta);
if ($resultado) {
    while ($row = $resultado->fetch_array()) {
        $nombre = $row['nombre'];
        $apellidoP = $row['apellidoP'];
        $apellidoM = $row['apellidoM'];
        $numeroControl = $row['numeroControl'];
        $semestre = $row['semestre'];
        $carrera = $row['carrera'];
        $mailAlumno = $row['mailAlumno'];
        $telefonoAlumno = $row['telefonoAlumno'];
    }
}

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Alumno encontrado</title>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="css/jquery-ui.min.css" />


    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- iconos -->
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="tabla1.css">

    <!--     TimePicki     -->

    <!-- Bootstrap core CSS -->
    <link href="TimePicki/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="TimePicki/css/timepicki.css" rel="stylesheet">

    <!--     TimePicki     -->

    <!--     Sweet Alert     -->

    <script src="js/sweetalert.min.js"></script>
    <link href="css/sweetalert.css" rel="stylesheet" type="text/css" />

    <!--     Sweet Alert     -->
</head>

<body>

    <div class="container">
        <div class="header">
            <div class="logo-title1">
                <img src="image/logo_magtimus.png">
                <h2>Alumno Encontrado</h2>
            </div>
            <div class="menu">
                <a href="principal-adm.php">
                    <li class="module-principal-adm">Atrás</li>
                </a>
                <a href="cerrar.php">
                    <li class="module-convocatorias">Cerrar Sesión</li>
                </a>
            </div>
        </div>

    </div>

    <div class="container-form7">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form3" id="misdatos">
            <table>
                <thead>
                    <tr>
                        <th style="width:50%;">Alumno: <?php echo $nombre; ?> <?php echo $apellidoP; ?> <?php echo $apellidoM; ?></th>
                        <th style="width:50%;"></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>
                            <p>Número de control</p>
                            <input type="text" placeholder=<?php echo $numeroControl; ?> name="numC" readonly>
                        </td>

                        <td>
                            <p>Semestre</p>
                            <input width=23 type="text" placeholder=<?php echo $semestre; ?> name="semestre" readonly>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <p>Número teléfonico</p>
                            <input type="text" placeholder=<?php echo $telefonoAlumno; ?> name="telefono" readonly>
                        </td>

                        <td>
                            <p>Mail</p>
                            <input type="text" placeholder=<?php echo $mailAlumno; ?> name="mail" readonly>
                        </td>
                    </tr>
                    <thead>
                        <tr>
                            <th style="width:50%;padding: 10px">Aspirante a:</th>
                            <th style="width:50%;padding: 10px"></th>
                        </tr>
                    </thead>
                    <?php

                    $conex = mysqli_connect('localhost', 'root', '', 'becas');

                    $consulta = "SELECT `convocatorias`.`nombreConvocatoria` FROM `aspirantes`,`convocatorias` WHERE `aspirantes`.`idConvocatoria`=`convocatorias`.`idConvocatoria` AND `aspirantes`.`alumno_numeroControl`=$numeroControl";
                    $resultado = mysqli_query($conex, $consulta);
                    if ($resultado) {
                        while ($row = $resultado->fetch_array()) {
                            $nombreConv = $row['nombreConvocatoria'];
                    ?>
                            <tr>
                                <td>
                                    <p>Nombre convocatoria</p>
                                    <input type="text" placeholder=<?php echo $nombreConv; ?> name="ConvT" readonly>
                                </td>

                                <td>
                                    <p>Archivo</p>
                                    <input type="text" placeholder="Archivo" name="ArchT" readonly>
                                </td>
                                </td>
                            </tr>


                    <?php
                        }
                    }

                    ?>
                    <thead>
                        <tr>
                            <th style="width:50%;padding: 10px">Asesorías programadas:</th>
                            <th style="width:50%;padding: 10px"></th>
                        </tr>
                    </thead>
                    <?php

                    $conex = mysqli_connect('localhost', 'root', '', 'becas');

                    $consulta = "SELECT * FROM asesorias where alumno_numeroControl=$numeroControl";
                    $resultado = mysqli_query($conex, $consulta);
                    if ($resultado) {
                        while ($row = $resultado->fetch_array()) {
                            $fecha = $row['fecha'];
                            $hora = $row['hora'];
                    ?>
                            <tr>
                                <td>
                                    <p>Fecha</p>
                                    <input type="text" placeholder=<?php echo $fecha; ?> name="ConvT" readonly>
                                </td>

                                <td>
                                    <p>Hora</p>
                                    <input type="text" placeholder=<?php echo $hora; ?> name="ArchT" readonly>
                                </td>
                                </td>
                            </tr>

                    <?php
                        }
                    }

                    ?>
                </tbody>
            </table>


            <div class="welcome-form">

                <h2><a href="reportes/aspirantes.php?variable=<?php echo $numeroControl; ?>" target="_blank"><button type="button" id="sugerir" name="sugerir">Crear Reporte<label class="lnr lnr-chevron-right"></label></button> </h2>

                <h2></h2>
                <h2></h2>
                <h2></h2>
                <h2></h2>
                <h2><a href="sugerir-asesoria.php?variable=<?php echo $numeroControl; ?>" target="_blank"><button type="button" id="sugerir" name="sugerir">Sugerir Asesoría<label class="lnr lnr-chevron-right"></label></button> </h2>
                <h2></h2>
            </div>
        </form>


    </div>


    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>



</body>

</html>