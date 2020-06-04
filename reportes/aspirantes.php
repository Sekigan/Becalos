    <?php
    require('./fpdf.php');


    class PDF extends FPDF
    {

        function Header()
        {
            //$this->Image($file,$x,$y,$w,$h)
            $this->Image('img1.png', 10, 6, 50);
            $this->Image('img2.png', 150, 6, 20);
            $this->Cell(80);
            //$this->Cell()
            $this->Cell(25, 15, "Instituto Tecnologico De Saltillo", 0, 0, 'C');
            $this->Ln(20);
        }
        // Cargar los datos
        function LoadData()
        {
            //obtener registros intermedios
            $conex = mysqli_connect('localhost', 'root', '', 'becas');
            $sql = "SELECT CONCAT(`alumnos`.`nombre`,' ',`alumnos`.`apellidoP`,' ',`alumnos`.`apellidoM`) as Nombre_Alumno,
												`convocatorias`.`nombreConvocatoria`,
												CONCAT(`administradores`.`nombre`,' ',`administradores`.`apellidoP`,' ',`administradores`.`apellidoM`) as Nombre_Administrador,
												`administradores`.`mailAdmin` as Correo
												 FROM alumnos, convocatorias, aspirantes, administradores									
												where aspirantes.alumno_numeroControl=alumnos.numeroControl and 
													aspirantes.idConvocatoria=convocatorias.idConvocatoria and
													convocatorias.numeroControlA=administradores.numeroControlA and
                                                    aspirantes.alumno_numeroControl = 15050970"; #aqui va tu numero de control
            $data = mysqli_query($conex, $sql);



            return $data;
        }
        // Tabla coloreada
        function FancyTable($header, $data)
        {
            // Colores, ancho de línea y fuente en negrita
            $this->SetFillColor(40, 38, 56);
            $this->SetTextColor(255);
            $this->SetDrawColor(40, 0, 0);
            $this->SetLineWidth(.3);
            $this->SetFont('', '', 10);
            //$this->SetFont('',)
            // Cabecera
            $w = array(60, 60, 60);
            for ($i = 0; $i < count($header); $i++) $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
            $this->Ln();
            // Restauración de colores y fuentes
            $this->SetFillColor(224, 235, 255);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Datos
            $fill = false;

            foreach ($data as $row) {
                $alumno = $row['Nombre_Alumno'];
                $this->Cell($w[0], 6, $row['nombreConvocatoria'], 'LR', 0, 'C', $fill);
                $this->Cell($w[1], 6, $row['Nombre_Administrador'], 'LR', 0, 'C', $fill);
                $this->Cell($w[2], 6, $row['Correo'], 'LR', 0, 'C', $fill);
                $this->Ln();
                $fill = !$fill;
            }
            // Línea de cierre
            $this->Cell(array_sum($w), 0, '', 'T');
        }
    }

    $pdf = new PDF();
    // Títulos de las columnas
    $tabla = array('Convocatoria', 'Administrador', 'Correo');
    // Carga de datos
    $data = $pdf->LoadData();
    $pdf->SetFont('Arial', '', 14);
    $pdf->AddPage();
    $pdf->FancyTable($tabla, $data);
    $pdf->Output();
