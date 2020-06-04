<?php
session_start();

if (isset($_SESSION['usuario'])) {
} else {
    header('location: login.php');
}

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

        $archivosNece = $row['archivosNecesariosDesc'];
    }

    echo '<form class="form2" action="registroaspirante.php" method="post" enctype="multipart/form-data">';

    echo ' <input type="hidden" name="usuario" id="usuario" value="';
    echo  $_SESSION['usuario'];
    echo '" />';
    echo ' <input type="hidden" name="idConvocatoria" id="idConvocatoria" value="';
    echo $idConvoca;
    echo '" />';

    echo '<div class="container-form6" style="top: 59%;">
                
                    
                    <div class="welcome-form">
                        <h2>';
    echo $nombreConvoca;
    echo '
                        </h2>
                    </div>
                    <table >
                            
                        <tbody>
                        
                            <tr> 
                                <td>';
    echo '<div class="container column gray-boxes" style="box-sizing: border-box;height: 150px;
                                width: 200px;font: 16px;min-height: 150px;max-height: 150px;max-width: 205px;min-width: 205px;">';
    echo '<div style="color: #898989; font-weight: 100;font-size: 12px;" ><h1 >Requisitos</h1></div>';
    echo '<ul>';



    echo $requisitos . "\n";

    echo '</ul>';
    echo '               </div>';

    echo '</td>
                                
                                <td><a href=' . "archivosConvo/" . $nombreConvoca . ".pdf" . '><small class="lnr lnr-download btn ">Descargar pdf</small></a>
                                </td>
                                

                                <td>';
    echo '<div class="container column gray-boxes" style="box-sizing: border-box;height: 150px;
                                width: 210px;font: 16px;min-height: 150px;max-height: 150px;max-width: 230px;min-width: 230px;">';
    echo '<div style="color: #898989; font-weight: 100;font-size: 12px;" ><h1 >Archivos necesarios</h1></div>';
    echo '<ul>';



    echo $archivosNece;

    echo '</ul>';
    echo '               </div>';

    echo '</td>
                                
                            </tr>
                            
                        </tbody>
                    </table>
            
                </form >';
    echo '
                        <div class="container " style="margin-top: 15px;">

                            ';
    echo '<div class="container" ">

                                <form action="/upload-target" class="dropzone" style="width: 600px; height: 200px; margin: 10px;">
                                </form>
                            </div>
                        </div>
                        <div class="welcome-form">
                            <h2><a href="solicitar-asesoria.php"><button  id="solicitar" name="solicitar" value="';
    echo $id;
    echo  '">Solicitar Asesoría<label class="lnr lnr-chevron-right" style= "left: 25px;"></label></button> </h2>
                            <h2></h2><h2></h2><h2></h2><h2></h2>
                            <h2><button class="btn btn-primary" id="btnGuardar">Guardar<label class="lnr lnr-chevron-right"></label></button> </h2>
                            <h2></h2>
                        </div> 
                        
        
                
        </form>
                
            </div>
        

            <script src="js/jquery.js"></script>
            <script src="js/script.js"></script>';
}
echo var_dump($_SESSION);
