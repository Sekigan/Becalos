<?php 

session_start();

    if(isset($_SESSION['usuarioA'])){
        require 'frontend/principal-vista-adm.php';
    }else{
        header ('location: login-adm.php');
    }
        
       
        
?>