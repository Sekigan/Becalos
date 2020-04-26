<?php session_start();

    if(isset($_SESSION['usuarioA'])) {
        header('location: principal-adm.php');
    }else{
        header('location: tipo-usuario.php');
    }


?>