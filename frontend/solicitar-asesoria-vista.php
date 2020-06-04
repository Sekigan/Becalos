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

    //id conv
    require_once 'conexion.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    
    $sql = $conexion->prepare("SELECT `idConvocatoria`, `numeroControlA`, `nombreConvocatoria`, `convocatoriaPDF`, `archivosNecesariosDesc`, `requisitosDescripcion` FROM `convocatorias` WHERE `idConvocatoria`= :id");
    $sql->execute(array(
        ':id' => $id
    ));

    foreach ($sql as $row) {


        $idConvoca = $row['idConvocatoria'];
        $numeroControlA = $row['numeroControlA'];
        $nombreConvoca = $row["nombreConvocatoria"];
        $requisitos = $row['requisitosDescripcion'];
        $pdf = $row['convocatoriaPDF'];
        $archivosNece = $row['archivosNecesariosDesc'];
    }
    echo $nombreConvoca;
    
    }
    //
    
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Solicitud Asesoría</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   
    <link rel="stylesheet" href="css/jquery-ui.min.css"/>
    

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
    <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
    
    <!--     Sweet Alert     -->
</head>

<body>
    
    <div class="container">
        <div class="header">
            <div class="logo-title1">
                <img src="image/logo_magtimus.png">
                <h2>Solicitud Asesoría</h2>
            </div>
            <div class="menu">
                <a href="convocatorias.php"><li class="module-convocatorias">Atrás</li></a>
                <a href="cerrar.php"><li class="module-convocatorias">Cerrar Sesión</li></a>
            </div>
        </div>

    </div>

    <div class="container-form5">
        <form action="WhatsApp.php" method="post" class="form2" id="misdatos">
            <table >
                <thead>
                    <tr>
                        <th style="width:50%;">Agendar Asesoría</th>
                        <th style="width:50%;"></th>
                    </tr>
                </thead>
                <tbody>
                
                    <tr1> 
                        <td><p>Numero de control</p>
                        <input type="text" placeholder=<?php echo $numeroControl; ?>  name= "numC" readonly></td>
                        
                        <td><p>Semestre</p>
                        <input width=23 type="text" placeholder=<?php echo $semestre; ?> name= "semestre" readonly></td>
                        
                    </tr1>

                    <tr>
                    <td><p>Número teléfonico</p>
                    <input type="text" placeholder=<?php echo $telefonoAlumno;?> name= "telefono" readonly></td>
                    
                    <td><p>Mail</p>
                    <input type="text" placeholder=<?php echo $mailAlumno;?> name= "mail" readonly> </td>
                    </tr>

                <tr>
                    <td><p><label>Calendario</label></p>
                    <input type="text" readonly name="txtfecha" id="txtfecha"/></td>
                    
                    <td><p><label>Hora</label></p>
                    <input id="timepicker1" type="text" readonly name="timepicker1"/></td>
                    
                </tr>

                </tbody>
            </table>
        

                <!-- mensaje -->
        
            <div class="user line-input1">    
                <textarea  name="message" id="message"  placeholder="Mensaje"></textarea>
            </div> 
            
            <div class="welcome-form">
                <h3>Eviar por:</h3>
            </div>
            
            <div class="welcome-form">
                <h2><button type="submit" id="correo">Mail<label class="lnr lnr-chevron-right"></label></button> </h2>
                <!-- <h2><a href="api.whatsapp.com/send?phone=+5218446084225&text=<php echo $nombre > " id="link"><button type="submit" id="wsp">WhatsApp<label class="lnr lnr-chevron-right"></label></button> </h2> -->
                <h2><button type="submit" id="wsp" name="enviar" value="Enviar mensaje" >WhatsApp<label class="lnr lnr-chevron-right"></label></button> </h2>

                <h2><a href="http://m.me/2019ESM" target="_blank" ><button type="button">Messenger<label class="lnr lnr-chevron-right"></label></button></a> </h2>
            </div> 
        </form>

            
    </div>
    <!--     TimePicki     -->

    <script src="TimePicki/js/jquery.min.js"></script>
    <script src="TimePicki/js/timepicki.js"></script>
        <script>
            $('#timepicker1').timepicki({show_meridian:false,start_time: ["07", "00", "AM"],min_hour_value: 7,
                max_hour_value:16,step_size_minutes:15,disable_keyboard_mobile: true});
        </script>
    
    <!--     TimePicki     -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

    <script type="text/javascript" src="js/jquery-ui.js"></script>
    
        

    <script>
            /*$(function () {
                
                $("#txtfecha").datepicker()({
                    dateFormat: "yy-mm-dd"
                });

                //aqui vamos a poner un evento del boton enviar mail
                //para que cuando desde click tome los datos del formulario y los mandes por ajax
                //se me fue el submit
                $("#correo").click(function() {
                    alert('entro');
                    event.preventDefault();
                });



            });*/
            $(document).ready(function () {

                //Ya lo corregi
                $("#txtfecha").datepicker({ dateFormat: "DD dd-MM-yy", minDate: 0,
                            beforeShowDay: function(date) {
                            var day = date.getDay();
                            return [(day != 0 && day != 6), ''];
                            }
                        });

                //Ahora el button
                $("#correo").click(function() {
                    //Aqui vamos a enviar los datos a...
                    event.preventDefault();
                    //instale un plugin para vsc donde ya de ta la estructura de ajax con solo escribir ajax..
                        $.ajax({
                            type: "post",
                            url: "correo.php",
                            data: $('#misdatos').serialize(),
                            success: function (response) {
                                //Aqui vamos a recibir nuestra respuetsa del servidor (funcion que retorna un dato)
                                //console.log(response);
                                swal ( "Correo enviado exitosamente!" ,  "" ,  "success" )
                                
                            },
                            error: function (response) {
                                //Aqui si por alguna razon nos marca error vamos a ver el por que!
                                //console.log(response);
                                swal ( "Oops!" ,  "Hubo un error al enviar el correo" ,  "error" )
                            }
                        });

                });
               
                //WhatsApp 
                /*
                $("#wsp").click(function(event) {
                    var miurl = $("#link").attr('href');
                    var link = $('<a href="http://'+ miurl +'" />');
                    link.attr('target','_blank');
                    window.open(link.attr('href'));
                    event.preventDefault();
                });*/

            });
</script>

<!-- mensajes 
<SCRIPT LANGUAGE="JavaScript">
function envia(pag){ 
document.form.action= pag 
document.form.submit() 
} 
</script> -->

</body>
</html>