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

    <?php require_once 'repo.php'; ?>

</head>
<div class="container-form4">
    <table class="table  table-striped  table-hover" id="tabla" border="0">
        <thead>
            <tr>
                <th style="width:20%; background-color: #5DACCD; color:#fff; text-align:center;">Convocatoria</th>
                <th style="width:74%; background-color: #5DACCD; color:#fff"></th>
                <th style="width:8%; background-color: #5DACCD; color:#fff"></th>
                <th style="width:8%; background-color: #5DACCD; color:#fff"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entidadConvocatoria->Listar() as $r) : ?>
                <tr>
                    <td><?php echo $r->nombreConvocatoria; ?></td>
                    <td></td>
                    <td>
                        <a class="btn btn-warning" href="?c=convocatoria&a=Crud&gui=convocatoria&id=<?php echo $r->idConvocatoria; ?>">Editar</a>
                    </td>
                    <td>


                        <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar el registro <?php echo $r->nombreConvocatoria . ' ' . $r->idConvocatoria; ?>?');" href="?c=convocatoria&a=Eliminar&id=<?php echo $r->idConvocatoria; ?>">Eliminar</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </body>
    <script src="repositorio/datatables/datatable.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>




</html>