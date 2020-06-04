<?php 

session_start();

if(isset($_SESSION['usuarioA'])){
    
}else{
    header ('location: login-adm.php');
}






require 'frontend/sugerir-asesoria-vista.php';


        
?>