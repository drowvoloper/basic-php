<!--10/12/2018 Este proyecto se ha realizado siguiendo las pautas en el tutorial "Creando una paginación" dentro del curso "PHP7 y MYSQL: El Curso Completo, Práctico y Desde Cero! | Udemy" de Carlos Arturo Esparza-->

<?php session_start();

session_destroy();
$_SESSION = array();

header('Location: login.php');

?>