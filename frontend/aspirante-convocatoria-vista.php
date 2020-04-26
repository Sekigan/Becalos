<?php 

$id = $_POST['idConvocatoria'] ?? '';
echo print_r($id);


$conex = mysqli_connect('localhost', 'root', '','becas');
    $consulta = "SELECT * FROM convocatorias WHERE idConvocatoria=$id;";
    $resultado = mysqli_query($conex, $consulta);
    
    if ($resultado){
        while ($row = $resultado->fetch_array()){
          
            $numeroControlA = isset($row['numeroControlA']) ? $row['numeroControlA'] : ' ';
            $nombreConvocatoria = isset($row['nombreConvocatoria']) ? $row['nombreConvocatoria']:'';
            $convocatoriaPDF = isset($row['convocatoriaPDf']) ? $row['convocatoriaPDF'] : ' ';
            $archivosNecesariosDesc = isset($row['archivosNecesariosDesc']) ? $row['archivosNecesariosDesc'] : ' ';
            $requisitosDescrip = isset($row['requisitosDescripcion ']) ? $row['requisitosDescripcion '] : ' ';
      
        }
    }
        
       
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro Aspirante</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   

    <script src="js/dropzone.min.js"></script>

    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- iconos -->
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style.css">
   
</head>

        <div class="header">
            <div class="logo-title1">
                <img src="image/logo_magtimus.png">
                <h2>Registro de aspirante</h2>
            </div>
            <div class="menu">
                <a href="convocatorias.php"><li class="module-convocatorias">Atras</li></a>
                <a href="solicitar-asesoria.php"><li class="module-Dalumnos">Solicitar Asesoria</li></a>
                <a href="cerrar.php"><li class="module-convocatorias">Cerrar sesion</li></a>
            </div>
        </div>

    
<body>


    
    
    <form class="container formulario" style="display: flex; flex-direction: column; background-color: white; margin-top: 10px;">
    <div class="manutencion" style="color:#5584FF">
        <h2><?php echo  $nombreConvocatoria; ?></h2>
    </div>

    <body class="body container">





        <div class="container manutencion">

            <div class="container">
                <div class="div requisitos">
                    <div class="container column gray-boxes" style="width: 200px; height: 200px; margin-bottom: 50px;">
                        <span style="width: 100%;">Requisitos:</span>
                        <ul>
                        <?php echo $requisitosDescrip; ?>
                        </ul>
                    </div>
                </div>


                <div class="container manutencion" style="width: 200px; height: 250px;text-align: center;">

                    <div class="column manutencion">
                        <a href="<?php echo  $convocatoriaPDF; ?>">
                            <small class="lnr lnr-download btn ">Descargar pdf</small></a>






                    </div>

                </div>

                <div class="container necesarios gray-boxes" style="width: 200px; height: 200px;  margin-bottom: 50px;">
                    <span>Archivos necesarios:</span>
                    <ul>

                    <?php  echo $archivosNecesariosDesc; ?>
                    

                    </ul>
                    
                </div>


            </div>

        </div>
        
</form >
<div class="div container">




    <div class="container " style="margin-top: 15px;">

    </div>
    <div class="container">

        <form action="/upload-target" class="dropzone" style="width: 600px; height: 200px; margin: 10px;">
        </form>


        </form>

        <div class="container" style="width: 100%; justify-items: flex;  margin-top: 10px;">
            <button>Atras</button>
            <button style="margin-left: 10px;">Guardar</button>
        </div>
        
    </div>
</div>

    
    
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

</body>
   
</html>