<?php 

/* identificar el usuario que inicio sesion*/
$usuario =  $_SESSION['usuario'];
/* identificar el usuario que inicio sesion*/


$conex = mysqli_connect('localhost', 'root', '','becas');
    $consulta = "SELECT * FROM alumnos WHERE numeroControl=$usuario";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado){
        while ($row = $resultado->fetch_array()){
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Datos del Alumno</title>
    
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
                <h2>Datos del Alumno</h2>
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
            
            <div class="user line-input1">
            <span class="lnr lnr-user"></span>
               <input type="text" placeholder=<?php echo $nombre; ?>  name= "nombre"  readonly>
             </div>  

            <div class="user line-input1">
            <span class="lnr lnr-user"></span>
               <input type="text" placeholder=<?php echo $apellidoP; ?>  name= "apellidoP"  readonly>
             </div> 
                  
            <div class="user line-input1">
            <span class="lnr lnr-user"></span>
               <input type="text" placeholder=<?php echo $apellidoM; ?>  name= "apellidoM"  readonly>
            </div> 
            
            <div class="user line-input1">
            <span class="lnr lnr-graduation-hat"></span>
               <input type="text" placeholder=<?php echo $numeroControl; ?>  name= "usuario"  readonly>
            </div> 
            
            <div class="user line-input1">
            <span class="lnr lnr-graduation-hat"></span>
               <input type="text" placeholder=<?php echo $semestre; ?>  name= "semestre"  readonly>
            </div> 
            <?php if($carrera==0){?>
                    <div class="user line-input1">
                    <span class="lnr lnr-graduation-hat"></span>
                     <input type="text" placeholder="Electrica"  name= "carrera"  readonly>
                    </div>
            <?php }?>
            <?php if($carrera==1){?>
                    <div class="user line-input1">
                    <span class="lnr lnr-graduation-hat"></span>
                     <input type="text" placeholder="Electronica"  name= "carrera"  readonly>
                    </div>
            <?php }?>
            <?php if($carrera==2){?>
                    <div class="user line-input1">
                    <span class="lnr lnr-graduation-hat"></span>
                     <input type="text" placeholder="Gestion"  name= "carrera"  readonly>
                    </div>
            <?php }?>
            <?php if($carrera==3){?>
                    <div class="user line-input1">
                    <span class="lnr lnr-graduation-hat"></span>
                     <input type="text" placeholder="Industrial"  name= "carrera"  readonly>
                    </div>
            <?php }?>
            <?php if($carrera==4){?>
                    <div class="user line-input1">
                    <span class="lnr lnr-graduation-hat"></span>
                     <input type="text" placeholder="Materiales"  name= "carrera"  readonly>
                    </div>
            <?php }?>
            <?php if($carrera==5){?>
                    <div class="user line-input1">
                    <span class="lnr lnr-graduation-hat"></span>
                     <input type="text" placeholder="Mecanica"  name= "carrera"  readonly>
                    </div>
            <?php }?>
            <?php if($carrera==6){?>
                    <div class="user line-input1">
                    <span class="lnr lnr-graduation-hat"></span>
                     <input type="text" placeholder="Mecatronica"  name= "carrera"  readonly>
                    </div>
            <?php }?>
            <?php if($carrera==7){?>
                    <div class="user line-input1">
                    <span class="lnr lnr-graduation-hat"></span>
                     <input type="text" placeholder="Sistemas"  name= "carrera"  readonly>
                    </div>
            <?php }?>
            


                

            
             
            <div class="user line-input1">
            <span class="lnr lnr-graduation-hat"></span>
               <input type="text" placeholder=<?php echo $carrera; ?>  name= "carrera"  readonly>
            </div>

            <!-- iconos --> 
            <!-- iconos en https://linearicons.com/free -->
            <?php if($mailAlumno == NULL) {?>
             <div class="user line-input1">
                <span class="lnr lnr-envelope"></span> 
                        <!-- lnr lnr-"nombre del icono">-->
                <input type="text" placeholder="Ingrese su mail"   name="mailAlumno">
            </div>
            <?php }else{?>
                <div class="user line-input1">
                <span class="lnr lnr-envelope"></span> 
                        <!-- lnr lnr-"nombre del icono">-->
                <input type="text" placeholder=<?php echo $mailAlumno; ?>  name="mailAlumno">
            </div>
            <?php }?>

            
            <?php if($telefonoAlumno == NULL) {?>
             <div class="user line-input1">
                <span class="lnr lnr-envelope"></span> 
                        <!-- lnr lnr-"nombre del icono">-->
                <input type="text" placeholder="Ingrese su telefono"  name="telefonoAlumno">
            </div>
            <?php }else{?>
                <div class="user line-input1">
                <span class="lnr lnr-envelope"></span> 
                        <!-- lnr lnr-"nombre del icono">-->
                <input type="text" placeholder=<?php echo $telefonoAlumno; ?>  name="telefonoAlumno">
            </div>
            <?php }?>


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
