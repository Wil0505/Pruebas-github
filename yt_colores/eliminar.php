<?php

include_once 'conexion.php';

$id = $_GET['id'];

$sql_eliminar = 'DELETE FROM colores WHERE id=?';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute(array($id));

//Cerrar la conexion a la base de datos
$sentencia_eliminar = null;
$pdo = null;

//Redirigir al index para que muestre los datos reciente agregados
header('location:index.php');