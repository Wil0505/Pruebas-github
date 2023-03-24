<?php
//Ejecuta la consulta a la base de datos y devuelve un array que se guarda en la variable $resultado.
include_once 'conexion.php';
//LEER
$sql_leer = 'SELECT * FROM colores';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();

//var_dump($resultado);

//AGREGAR
if($_POST){
    $color = $_POST['color'];
    $descripcion = $_POST['descripcion'];
//Metodo para agregar datos a la base de datos
    $sql_agregar = 'INSERT INTO colores (color, descripcion) VALUES (?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($color,$descripcion));

//Cerrar la conexion a la base de datos
$sentencia_agregar = null;
$pdo = null;

//Redirigir al index para que muestre los datos reciente agregados
header('location:index.php');
}

if($_GET){
    $id = $_GET['id'];
    $sql_unico = 'SELECT * FROM colores WHERE id=?';
    $gsent_unico = $pdo->prepare($sql_unico);
    $gsent_unico->execute(array($id));
    $resultado_unico = $gsent_unico->fetch();

    //var_dump($resultado_unico);
}


?>

<!-- Guardar en una tabla el array obtenido (Usando Bootstrap) -->
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>

    <!-- Creo contenedor -->
    <div class="container mt-5">
        <div class="row">
            
            <div class="col-md-6">
            <!-- Consumo el array ($resultado) y guardarlo individualmente en la variable $dato -->
            <?php foreach($resultado as $dato): ?>
            <!-- Pinto de cada color y Muestro los datos del array en cada fila -->
            <div 
            class="alert alert-<?php echo $dato['color'] ?> text-uppercase" role="alert">
                <!-- Muestro los datos del array en cada fila -->
                <?php echo $dato['color'] ?>
                -
                <?php echo $dato['descripcion'] ?>

                <a href="eliminar.php?id=<?php echo $dato['id'] ?>" class="float-right ml-3">
                    <i class="fa-solid fa-trash-can"></i>
                </a>

                <a href="index.php?id=<?php echo $dato['id'] ?>"
                class="float-right">
                    <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                </a>
            </div>
                <!-- Cierro el forecach que recorre el array -->
            <?php endforeach ?>

            </div>
            <!-- formulario para agregar y mostrar los elementos -->
            <div class="col-md-6">
            <?php if(!$_GET): ?>
                <h2>AGREGAR ELEMENTOS</h2>
                <form method="POST">
                <input type="text" class="form-control" name="color">
                <input type="text" class="form-control mt-3" name="descripcion">
                <button class="btn btn-primary mt-3">Agregar</button>
                </form>
                <?php endif ?>

                <?php if($_GET): ?>
                <h2>EDITAR ELEMENTOS</h2>
                <form method="GET" action='editar.php'>
                <input type="text" class="form-control" name="color" value="<?php echo $resultado_unico['color'] ?>">
                <input type="text" class="form-control mt-3" name="descripcion" value="<?php echo $resultado_unico['descripcion'] ?>">
                <input type="hidden" name="id" value="<?php echo $resultado_unico['id'] ?>">
                <button class="btn btn-primary mt-3">Agregar</button>
                </form>
                <?php endif ?>

            </div>
        </div>
            
    </div>

    <h1></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

<?php
//Cierro la conexion a la base de datos
$pdo = null;
$gsent = null;

?>