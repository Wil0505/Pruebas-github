<?php 
session_start();

if( isset($_SESSION['admin']) ){
    echo 'BIENVENIDO '.$_SESSION['admin'];
    echo '<br><a href="cerrar.php">CERRAR SESION</a>';
}else{
    header('Location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HOLA MUNDO 2.0</h1>
</body>
</html>