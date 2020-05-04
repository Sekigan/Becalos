<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once 'repo.php'; ?>

</head>



<div class="container-fluid box" style="width:500px;">
    <h3><?php echo ($entidadConvocatoria->idConvocatoria != null ? 'Modificando Registros de Convocatoria' : 'Agregando Convocatoria'); ?></h3>
    <ol class="breadcrumb">
        <li>Sistema Informático - ITSaltillo</li>
        <li><a href="?c=estatus&gui=estatus">Salir</a></li>
    </ol>
    <form id="frmEstatus" action="?c=convocatoria&a=Guardar" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="txtId" id="txtId" value="<?php echo $entidadConvocatoria->idConvocatoria; ?>" />
            <table class="table-responsive table-striped table-condensed" align="center">
                <tr>
                    <td>
                        <label>Nombre de la convocatoria</label>
                    </td>
                    <td>
                        <?php
                        echo ($entidadConvocatoria->idConvocatoria > 0
                            ? "<input type='text' name='txtNombre' id='txtNombre' value='$entidadConvocatoria->nombreConvocatoria' class='form-control' placeholder='Ingrese el nombre de la convoca' >"
                            : "<input type='text' name='txtNombre' id='txtNombre' value='$entidadConvocatoria->nombreConvocatoria' class='form-control' placeholder='Ingrese el nombre de la convocatoria' required autofocus>");
                        ?>

                    </td>
                </tr>












                <tr>
                    <td><label>Archivos Necesarios</label></td>
                    <td><input type="text" style="width: 200px; height: 200px; margin-bottom: 50px;" name="txtArchivosN" id="txtArchivosN" value="<?php echo $entidadConvocatoria->archivosNecesariosDesc; ?>" class="form-control" placeholder="Ingrese la descripcion" required></td>
                </tr>
                <tr>
                    <td><label>Requisitos</label></td>
                    <td><input type="text" style="width: 200px; height: 200px; margin-bottom: 50px;" name="txtRequisitos" id="txtRequisitos" value="<?php echo $entidadConvocatoria->requisitosDescripcion; ?>" class="form-control" placeholder="Ingrese los requisitos" required></td>
                </tr>


            </table>

            <hr />

            <div class="text-right">
                <button class="btn btn-primary" id="btnGuardar">Guardar</button>
            </div>
            <div align="center">
                <?php if ($_SESSION['errMsg'] == 1) {
                    echo "<h4><font color='red'>No se ingreso el registro, revise sus datos!!</font></h4>";
                } ?>
            </div>

    </form>