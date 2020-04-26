<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Principal ADM</title>
    
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
                <h2>Inicio Administrador</h2>
            </div>
            <div class="menu">
                <a href="subir-convocatoria.php"><li class="module-login active">Subir Convocatoria</li></a>
                <a href="gestionar-convocatoria.php"><li class="module-modificar">Gestionar Convocatoria</li></a>
                <a href="cerrar.php"><li class="module-convocatorias">Cerrar sesion</li></a>
            </div>
        </div>

    </div>

    <div class="container-form4">
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="welcome-form"><h1>Bienvenido a </h1><h2>Becas ITS</h2></div>
            <div class="welcome-form"><h1>Ha iniciado sesion como </h1><h2>Administrador</h2></div>
        </form>

    </div>
    
            
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

</body>
</html>