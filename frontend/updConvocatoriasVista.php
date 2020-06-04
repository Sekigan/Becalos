<!DOCTYPE html>
<html lang="en">

<?php require_once 'repo.php'; ?>



<head>
    <meta charset="UTF-8">
    <title>Gestionar Convocatoria</title>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
    <link rel="stylesheet" href="tabla.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- iconos -->
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<div class="container-form2">
    <div class="header">

        <div class="logo-title1">
            <img src="image/logo_magtimus.png">
            <h2>Gestionar Convocatoria</h2>
        </div>

        <div class="menu">
            <a href="principal-adm.php">
                <li class="module-convocatorias">Atrás</li>
            </a>
            <a href="subir-convocatoria.php">
                <li class="module-modificar">Subir Convocatoria</li>
            </a>
            <a href="cerrar.php">
                <li class="module-convocatorias">Cerrar Sesión</li>
            </a>
        </div>
    </div>
</div>


<div style="margin-top: 90px; padding-bottom: 5px; " class="container">

    <form id="frmConvocatorias" class="container formulario" action="?c=convocatoria&a=Guardar" method="post" enctype="multipart/form-data">
        <div class="container">
            <input type="hidden" name="txtId" id="txtId" value="<?php echo $entidadConvocatoria->idConvocatoria; ?>" />

            <div class="container">
                <span class="BoldText"> Edita tu Convocatoria!</span>
            </div>

            <body class="body container">
                <div class="container ">
                    <div class="container">
                        <div class="div requisitos">
                            <div class="container column gray-boxes" style="width: 200px; height: 200px; margin-bottom: 50px;">
                                <span style="width: 100%;">Requisitos:</span>
                                <ul>
                                    <textarea name="txtRequisitos" id="txtRequisitos" class="textArea">
                            <?php echo $entidadConvocatoria->requisitosDescripcion; ?>
                            </textarea>
                                </ul>
                            </div>
                        </div>



                        <div class="container manutencion" style="width:200px; height: 250px;text-align: center;">

                            <div class="column manutencion">
                                <?php
                                echo ($entidadConvocatoria->idConvocatoria > 0
                                    ? "<input type='text' name='txtNombre' class='nombreConvo' style='color: navy' id='txtNombre' value='$entidadConvocatoria->nombreConvocatoria' class='form-control' placeholder='Ingrese el nombre' >"
                                    : "<input type='text' name='txtNombre' class='nombreConvo' style='color: navy' id='txtNombre' value='$entidadConvocatoria->nombreConvocatoria' class='form-control' placeholder='Ingrese el nombre' required autofocus>");
                                ?>

                            </div>

                        </div>

                        <div class="container  gray-boxes" style="width: 200px; height: 200px;  margin-bottom: 50px;">
                            <span>Archivos necesarios:</span>
                            <ul>

                                <textarea name="txtArchivosN" id="txtArchivosN" class="textArea">
                                <?php echo $entidadConvocatoria->archivosNecesariosDesc; ?>
                        </textarea>

                            </ul>
                        </div>

                    </div>

                </div>



                <input type="file" name="pdf" id="pdf" enctype="multipart/form-data" style="width: 600px; height: 200px; margin: 10px; border-radius: 25px; color: #282638;">

                <hr />




                <?php require_once 'header.php'; ?>

                <div class="welcome-form">

                    <div class="text-right">
                        <a href="?c=estatus&gui=estatus"><button class="btn btn-primary" id="btnCancelar">Cancelar<label class="lnr lnr-chevron-right"></label></button>
                        <button class="btn btn-primary" id="btnGuardar">Guardar <label class="lnr lnr-chevron-right"></label></button>
                    </div>
                </div>



                <div align="center">
                    <?php if ($_SESSION['errMsg'] == 1) {
                        echo "<h4><font color='red'>No se ingreso el registro, revise sus datos!!</font></h4>";
                    } ?>
                </div>

    </form>