<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gestionar Convocatoria</title>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- iconos -->
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style.css">

    <div class="header">
        <div class="logo-title1">
            <img src="image/logo_magtimus.png">
            <h2>Gestionar Convocatoria</h2>
        </div>
        <div class="menu">
            <a href="principal-adm.php">
                <li class="module-convocatorias">Atras</li>
            </a>
            <a href="subir-convocatoria.php">
                <li class="module-modificar">Subir Convocatoria</li>
            </a>
            <a href="cerrar.php">
                <li class="module-convocatorias">Cerrar sesion</li>
            </a>
        </div>
    </div>

</head>











<div class="container" style="display: flex; flex-direction: column; background-color: white; margin-top: 10px;">
    <div class="manutencion" style="color:#5584FF">
        <h2>Nombre de la convocatorias</h2>
    </div>

    <body class="body container">





        <div class="container manutencion">

            <div class="container">
                <div class="div requisitos">
                    <div class="container column gray-boxes" style="width: 200px; height: 200px; margin-bottom: 50px;">
                        <span style="width: 100%;">Requisitos:</span>
                        <ul>
                            <li>Req 1</li>
                            <li>Req 1</li>
                            <li>Req 1</li>
                        </ul>
                    </div>
                </div>


                <div class="container manutencion" style="width: 200px; height: 250px;text-align: center;">

                    <div class="column manutencion">
                        <a href="pdf">
                            <small class="lnr lnr-download btn ">Descargar pdf</small></a>






                    </div>

                </div>

                <div class="container necesarios gray-boxes" style="width: 200px; height: 200px;  margin-bottom: 50px;">
                    <span>Archivos necesarios:</span>
                    <ul>

                        <div class="container">
                            <label for="item1">Item1</label>
                            <input type="checkbox" name="item1" id="item1" checked="" />
                        </div>
                        <div class="container">
                            <label for="item2">item2</label>
                            <input type="checkbox" name="item2" id="item2" checked="" />
                        </div>

                    </ul>
                </div>

            </div>

        </div>
</div>
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
        <div class="container" style="width: 100%; justify-content: flex; margin-top:30px;padding-left: 20px;">
            <button>Solicitar asesoría</button>
        </div>
    </div>
</div>




<script src="js/jquery.js"></script>
<script src="js/script.js"></script>


</body>

</html>