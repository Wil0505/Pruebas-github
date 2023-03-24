<?php

$usuario = 'root';
$contraseña = '';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=paginacion', $usuario, $contraseña);
    //echo 'Conectado';
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}