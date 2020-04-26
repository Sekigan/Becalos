<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADM Modificar Contraseña</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    
<div class="container-form">
        <div class="header">
            <div class="logo-title">
                <img src="image/logo_magtimus.png" alt="">
                <h2>Modificar Contraseña Admin </h2>
            </div>
            <div class="menu">
                <a href="login-adm.php"><li class="module-login">Login</li></a>
                <a href="modificar-adm.php"><li class="module-modificar">Modificar Contraseña</li></a>
            </div>
        </div>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="welcome-form"><h1>Bienvenido a </h1><h2>Becas ITS</h2></div>

            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Numero de control" name="usuarioA">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="clave">
            </div>            
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Nueva Contraseña" name="claveN">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Confirmar Contraseña" name="claveN2">
            </div>
            
            <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <div class="welcome-form">
<h2><a href="login-adm.php"><button type="button">Cancelar<label class="lnr lnr-chevron-right"></label></button></h2> 
<h2><button type="submit">Modificar<label class="lnr lnr-chevron-right"></label></button> </h2>
</div>  
               
    </form>
    </div>

    
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>