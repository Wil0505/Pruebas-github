<?php

include_once '../yt_colores/conexion.php';

//echo password_hash("wcontreras", PASSWORD_DEFAULT)."\n";

$usuario_nuevo = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];

//Verificar si un usuario existe
$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuario_nuevo));
$resultado = $sentencia->fetch();

var_dump($resultado);

if($resultado){
    echo '<br>Este usuario ya existe';
    die();
}

//Hash de contraseña
$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

echo '<pre>';
var_dump($usuario_nuevo);
var_dump($contrasena);
var_dump($contrasena2);
echo '</pre>';

if (password_verify($contrasena2, $contrasena)) {
    echo 'La contraseña es válida! <br>';

    //Metodo para agregar datos a la base de datos
    $sql_agregar = 'INSERT INTO usuarios (nombre, contrasena) VALUES (?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);

    if( $sentencia_agregar->execute(array($usuario_nuevo,$contrasena))){
        echo 'Agregado<br>';
    }else{
        echo 'Error<br>';
    }

    //Cerrar la conexion a la base de datos
    $sentencia_agregar = null;
    $pdo = null;

//Redirigir al index para que muestre los datos reciente agregados
//header('location:index.php');

} else {
    echo 'La contraseña no es válida.';
}