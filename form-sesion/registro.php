<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>REGISTRAR USUARIOS</h3>
    <form action="agregar_usuario.php" method="POST">
    <input type="text" name="nombre_usuario" placeholder="Ingrese el usuario">
    <input type="text" name="contrasena" placeholder="Ingrese la contraseña">
    <input type="text" name="contrasena2" placeholder="Ingrese nuevamente la contraseña">
    <button type="submit">GUARDAR</button>
    </form>

    <h3>LOGIN</h3>
    <form action="login.php" method="POST">
    <input type="text" name="nombre_usuario" placeholder="Ingrese el usuario">
    <input type="text" name="contrasena" placeholder="Ingrese la contraseña">
    <button type="submit">GUARDAR</button>
    </form>

</body>
</html>