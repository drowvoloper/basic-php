<!--10/12/2018 Este proyecto se ha realizado siguiendo las pautas en el tutorial "Creando un Inicio de Sesión y Registro de Usuarios" dentro del curso "PHP7 y MYSQL: El Curso Completo, Práctico y Desde Cero! | Udemy" de Carlos Arturo Esparza-->

<?php session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: contenido.php');
} else {
    header('Location: registro.php');
}

?>