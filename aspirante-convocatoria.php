<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    require_once 'frontend/aspirante-convocatoria-vista.php';

    $id = $_POST['id'];








    $requisitos = [];
    $archivosNece = [];









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
    };
    $pdffile = base64_decode($pdf);
    echo '<body class="body container">';
    echo "<form class='container formulario' style='display: flex; flex-direction: column; background-color: white; margin-top: 20px;>";
    echo "<div class='convocatorias' >";
    echo '<h1 style="color:#5584FF; margin-top: 20px;">';
    echo $nombreConvoca;
    echo '</h1>';
    echo '</div>';


    echo '         <div class="container manutencion">';
    echo '<div class="container">';
    echo '<div class="div requisitos">';
    echo '<div class="container column gray-boxes" style="width: 200px; height: 200px; margin-bottom: 50px;">';
    echo '<span style="width: 100%;">Requisitos:</span>';
    echo '<ul>';



    echo $requisitos . "\n";

    echo '</ul>';
    echo '               </div>';
    echo '</div>';
    echo '<div class="container manutencion" style="width: 200px; height: 250px;text-align: center;">';

    echo '<div class="column manutencion">';
    echo '<a href=';
    echo $pdffile;
    echo '>';
    echo '<small class="lnr lnr-download btn ">Descargar pdf</small></a>';
    echo '</div>
</div>';
    echo ' <div class="container necesarios gray-boxes" style="width: 200px; height: 200px;  margin-bottom: 50px;">
<span>Archivos necesarios:</span>
<ul>';
    echo $archivosNece;
    echo '                         </ul>
                   
</div>


</div>

</div>


</form >
<div class="div container">
';
    echo '
<div class="container " style="margin-top: 15px;">

</div>
';
    echo '<div class="container">

<form action="/upload-target" class="dropzone" style="width: 600px; height: 200px; margin: 10px;">
</form>


</form>

<div class="container" style="width: 100%; justify-items: flex;  margin-top: 10px;">
    <button>Atras</button>
    <a href="principal.php">
    <button style="margin-left: 10px;">Guardar</button>
    </a>
</div>

</div>
</div>



<script src="js/jquery.js"></script>
<script src="js/script.js"></script>

';
    echo var_dump($pdffile);
}
