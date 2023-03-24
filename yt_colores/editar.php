<?php
//Metodo GET

//echo 'editar.php?id=1&color=success&descripcion=Este es un color verde';
//echo '<br>';

$id = $_GET['id'];
$color = $_GET['color'];
$descripcion = $_GET['descripcion'];

//echo $id;
//echo '<br>';
//echo $color;
//echo '<br>';
//echo $descripcion;

include_once 'conexion.php';

$sql_editar = 'UPDATE colores SET color = ?, descripcion = ? WHERE id=?';
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar->execute(array($color,$descripcion,$id));

//Cerrar la conexion a la base de datos
$sentencia_editar = null;
$pdo = null;

//Redirigir al index para que muestre los datos reciente agregados
header('location:index.php');

