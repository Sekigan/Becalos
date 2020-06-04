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
    <link rel="stylesheet" href="tabla2.css">
   
</head>

<body> 

    <div class="container">
        <div class="header">
            <div class="logo-title1">
                <img src="image/logo_magtimus.png">
                <h2>Registro de aspirante</h2>
            </div>
            <div class="menu">
                <a href="convocatorias.php"><li class="module-convocatorias">Atras</li></a> 
                <a href="solicitar-asesoria.php"><li class="module-Dalumnos">Solicitar Asesoria</li></a>
                <a href="cerrar.php"><li class="module-convocatorias">Cerrar Sesión</li></a>
            </div>
        </div>

    </div>
     

    <div class="container-form">
        <form action="WhatsApp.php" method="post" class="form2" id="misdatos">
            
        <div class="welcome-form">
        <h2>
        Jovenes escribiendo el Futuro
        </h2>
        </div>

        <table >
                
                <tbody>
                
                    <tr> 
                        <td><div style="color: #898989; font-weight: 100;font-size: 12px;" ><h1 >Requisitos</h1></div>
                        <textarea  name="message" id="message"  placeholder="Requisitos" style="box-sizing: border-box;height: 150px;
                        width: 200px;font: 16px;min-height: 150px;max-height: 150px;max-width: 205px;min-width: 205px;"></textarea></td>
                        
                        <td><a href=$pdffile><small class="lnr lnr-download btn ">Descargar pdf</small></a>
                        </td>

                        <td><div style="color: #898989; font-weight: 100;font-size: 12px;" ><h1 >Archivos necesarios</h1></div>
                        <textarea  name="message" id="message"  placeholder="Archivos necesarios" style="box-sizing: border-box;height: 150px;
                        width: 200px;font: 16px;min-height: 150px;max-height: 150px;max-width: 210px;min-width: 210px;"></textarea></td>
                        
                    </tr>
                    
                    </tbody>
            </table>

            
            <div class="welcome-form">
                <h2><a href="solicitar-asesoria.php"><button  id="solicitar" name="solicitar">Solicitar Asesoria<label class="lnr lnr-chevron-right" style= "left: 25px;"></label></button> </h2>
                <h2></h2><h2></h2><h2></h2><h2></h2>
                <h2><a href="aspirante-convocatoria.php"><button method:"guardar"  id="guardar" name="guardar">Guardar<label class="lnr lnr-chevron-right"></label></button> </h2>
                <h2></h2>
            </div> 
        </form>

            
    </div>

<script>
    
</script>

</body> 
    

   
</html>