<?php
session_start();

if( isset($_SESSION['admin']) ){
    echo 'BIENVENIDO '.$_SESSION['admin'];
    echo '<br><a href="cerrar.php">CERRAR SESION</a>';
}else{
    header('Location:registro.php');
}