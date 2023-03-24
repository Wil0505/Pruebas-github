<?php

include_once 'conexion.php';

//Llamar a todos los articulos
$sql = 'SELECT * FROM articulos';
$sentencia = $pdo->prepare($sql);
$sentencia->execute();

$resultado = $sentencia->fetchAll();

//var_dump($resultado);

$art_x_pag =3;

//Contar articulos de la base de datos
$total_articulos_db = $sentencia->rowCount();
//echo $total_articulos_db;
$paginas = $total_articulos_db/3;
$paginas = ceil($paginas);
//echo $paginas;

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container my-5">

    <h1 class="mb-3">PAGINACION</h1>

    <?php

    if(!$_GET){
        header('Location:index.php?pagina=1');
    }
    if($_GET['pagina']>$paginas || $_GET['pagina']<=0){
        header('Location:index.php?pagina=1');
    }

    $iniciar = ($_GET['pagina']-1)*$art_x_pag;
    //echo $iniciar;

    $sql_articulos = 'SELECT * FROM articulos LIMIT :iniciar ,:narticulos';
    $sentencia_articulos = $pdo->prepare($sql_articulos);
    $sentencia_articulos->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
    $sentencia_articulos->bindParam(':narticulos', $art_x_pag, PDO::PARAM_INT);
    $sentencia_articulos->execute();

    $resultado_articulos = $sentencia_articulos->fetchAll();

    ?>

    <?php foreach($resultado_articulos as $articulo): ?>

    <div class="alert alert-dark" role="alert">
        <?php echo $articulo['titulo'] ?>
    </div>

    <?php endforeach ?>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled':'' ?>"><a class="page-link" 
            href="index.php?pagina=<?php echo $_GET['pagina']-1 ?>">
            Anterior
            </a>
            </li>

            <?php for($i=0;$i<$paginas;$i++): ?>

            <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>"><a class="page-link" 
            href="index.php?pagina=<?php echo $i+1 ?>"> 
            <?php echo $i+1 ?>
            </a>
            </li>

            <?php endfor ?>

            <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled':'' ?>"><a class="page-link"
            href="index.php?pagina=<?php echo $_GET['pagina']+1 ?>">
            Siguiente
            </a>
            </li>
        </ul>
    </nav>

    </div>
  </body>
</html>
