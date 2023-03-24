<?php

//Convertir datos a formato json
header('Content-Type: application/json');

if($_GET['moneda'] == 'euro' || $_GET['moneda'] == 'dolar'){

    include_once 'conexion.php';

    $sql = 'SELECT * FROM '.$_GET['moneda'];
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute();
    $datos = $sentencia->fetchAll();

}else{
    echo 'Solicitud no procesada';
}

echo json_encode($datos);