<?php
session_start();

if(isset($_SESSION['usuario'])){
    
}else{
    header ('location: login.php');
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
            $pdf = $row['convocatoriaPDF'];
            $archivosNece = $row['archivosNecesariosDesc'];
        }
        
        $pdffile = base64_decode($pdf);

        echo '<div class="container-form">
        <form action="WhatsApp.php" method="post" class="form2" id="misdatos">
            
        <div class="welcome-form">
            <h2>';
        echo $nombreConvoca;
        echo'
        </h2>
        </div>
        <table >
                
        <tbody>
        
            <tr> 
                <td><div style="color: #898989; font-weight: 100;font-size: 12px;" ><h1 >Requisitos</h1></div>
                <textarea  name="message" id="message"  placeholder=';echo $requisitos; echo'style="box-sizing: border-box;height: 150px;
                width: 200px;font: 16px;min-height: 150px;max-height: 150px;max-width: 205px;min-width: 205px;"></textarea></td>
                
                <td><a href=';$pdffile;echo'><small class="lnr lnr-download btn ">Descargar pdf</small></a>
                </td>
                

                <td><div style="color: #898989; font-weight: 100;font-size: 12px;" ><h1 >Archivos necesarios</h1></div>
                <textarea  name="message" id="message"  placeholder=';echo $archivosNece;echo'style="box-sizing: border-box;height: 150px;
                width: 200px;font: 16px;min-height: 150px;max-height: 150px;max-width: 210px;min-width: 210px;"></textarea></td>
                
            </tr>
            
            </tbody>
    </table>
    
    <div class="welcome-form">
    <h2><a href="solicitar-asesoria.php"><button  id="solicitar" name="solicitar">Solicitar Asesoria<label class="lnr lnr-chevron-right" style= "left: 25px;"></label></button> </h2>
    <h2></h2><h2></h2><h2></h2><h2></h2>
    <h2><a href="aspirante-convocatoria.php"><button method:"guardar"  id="guardar" name="guardar">Guardar<label class="lnr lnr-chevron-right"></label></button> </h2>
    <h2></h2>
    </div> 
    </form>

            
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>';
    }
