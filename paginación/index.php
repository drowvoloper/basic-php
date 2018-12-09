<!--09/12/2018 Este proyecto se ha realizado siguiendo las pautas en el tutorial "Creando una paginación" dentro del curso "PHP7 y MYSQL: El Curso Completo, Práctico y Desde Cero! | Udemy" de Carlos Arturo Esparza--> 

<?php

try {
    $conexion = new PDO('mysql:host=localhost;dbname=paginacion','root','');
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
    die();
}

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$postPorPagina = 5;

# por ejemplo, si estamos en la página 3 sería 3x5=15-5=10; y nos mostraría los cinco artículos siguientes al [10]: 11,12,13,14,15
$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio,$postPorPagina");

$articulos->execute();
$articulos = $articulos->fetchAll();

//print_r($articulos);

if (!$articulos) {
    header('Location: index.php');
}

$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
$totalArticulos = $totalArticulos->fetch()['total'];

$numeroPaginas = ceil($totalArticulos / $postPorPagina);

require 'index.view.php';

?>