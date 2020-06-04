<?php
require_once('modelo/Aspirantes.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entidadAspirante = new Aspirante();


    $entidadAspirante->alumno_numeroControl = $_POST['usuario'];
    $entidadAspirante->idConvoca = $_POST['idConvocatoria'];


    $entidadAspirante->Registrar($entidadAspirante);
    require_once 'frontend/principal-vista.php';
}
    /*
      Requisito 1
Requisito 2
Requisito 3
Requisito 4*/