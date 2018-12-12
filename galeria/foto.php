<!--12/12/2018 Este proyecto se ha realizado siguiendo las pautas en el tutorial "Creando una Galería Dinámica" dentro del curso "PHP7 y MYSQL: El Curso Completo, Práctico y Desde Cero! | Udemy" de Carlos Arturo Esparza-->

<?php

require 'funciones.php';

$conexion = conexion('curso_galeria','root','');
if (!$conexion) {
    die();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

if (!$id) {
    header('Location: index.php');
}

$statement = $conexion->prepare('SELECT * FROM fotos WHERE id = :id');
$statement->execute(array(':id' => $id));

$foto = $statement->fetch();

if (!$foto) {
    header('Location: index.php');
}

require 'views/foto.view.php';

?>