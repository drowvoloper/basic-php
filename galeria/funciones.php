<!--12/12/2018 Este proyecto se ha realizado siguiendo las pautas en el tutorial "Creando una Galería Dinámica" dentro del curso "PHP7 y MYSQL: El Curso Completo, Práctico y Desde Cero! | Udemy" de Carlos Arturo Esparza-->

<?php

function conexion($baseDeDatos,$usuario,$pass){

    try {
        $conexion = new PDO("mysql:host=localhost;dbname=$baseDeDatos",$usuario,$pass);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }

}

?>