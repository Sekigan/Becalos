<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Solicitud Asesoria</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   

    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- iconos -->
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    
    <div class="container">
        <div class="header">
            <div class="logo-title1">
                <img src="image/logo_magtimus.png">
                <h2>Solicitud Asesoria</h2>
            </div>
            <div class="menu">
                <a href="aspirante-convocatoria.php"><li class="module-convocatorias">Atras</li></a>
                <a href="cerrar.php"><li class="module-convocatorias">Cerrar sesion</li></a>
            </div>
        </div>

    </div>

    <div class="container-form3">
    
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form1">
            
            <div class="user line-input1">
            <span class="lnr lnr-user"></span>
               <input type="text" placeholder="Nombre" name= "nombre"  readonly>
             </div>  

            <div class="user line-input1">
            <span class="lnr lnr-user"></span>
               <input type="text" placeholder="Apellido Paterno" name= "apellidoP"  readonly>
             </div> 
                  
            <div class="user line-input1">
            <span class="lnr lnr-user"></span>
               <input type="text" placeholder="Apellido Materno" name= "apellidoM"  readonly>
            </div> 
            
            <div class="user line-input1">
            <span class="lnr lnr-graduation-hat"></span>
               <input type="text" placeholder="Numero de Control" name= "usuario"  readonly>
            </div> 
            
            <div class="user line-input1">
            <span class="lnr lnr-graduation-hat"></span>
               <input type="text" placeholder="Semestre" name= "semestre"  readonly>
            </div> 

            <div class="user line-input1">
            <span class="lnr lnr-graduation-hat"></span>
               <input type="text" placeholder="Carrera" name= "carrera"  readonly>
            </div>

            <!-- iconos --> 
            <!-- iconos en https://linearicons.com/free -->
             <div class="user line-input1">
                <span class="lnr lnr-envelope"></span> 
                        <!-- lnr lnr-"nombre del icono">-->
                <input type="text" placeholder="Correo Electronico" name="mail">
             </div>
            
             <div class="user line-input1">
               <span class="lnr lnr-phone-handset"></span>
               <input type="text" placeholder="Número Telefónico" name="tel">
             </div>


            <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <button type="submit">Guardar<label class="lnr lnr-chevron-right"></label></button>
        </form>
    </div>
    
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

</body>
</html>