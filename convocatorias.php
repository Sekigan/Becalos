<?php

require 'frontend/convocatorias-vista.php';
echo '      
<form action="aspirante-convocatoria.php" method="POST" class="form1">
            <table>
                <thead>
                    <tr>
                        <th>
                            <li class="module-Dalumnos">Convocatoria</li>
                        </th>
                        <th>
                            <li class="module-Dalumnos">Registrar como Aspirante</li>
                        </th>
                    </tr>
                </thead>';


$conex = mysqli_connect('localhost', 'root', '', 'becas');
$consulta = "SELECT * FROM convocatorias";
$resultado = mysqli_query($conex, $consulta);
if ($resultado) {
    while ($row = $resultado->fetch_array()) {
        $nombre = $row['nombreConvocatoria'];
        $id = $row['idConvocatoria'];

        echo '<tr>
    <td>
    <input type="hidden" >
    <li>';
        echo $nombre;
        echo ' </li>
    
            </td>
        
            <td>
                        <a href="aspirante-convocatoria.php"  >
                        
                    <button name="id" value="';
        echo $id;
        echo  '" >Registrar
                        <label class="lnr lnr-chevron-right"></label>
                    </button>
                    </a>
                   
                </form>
                
            </td>';
    }
}
