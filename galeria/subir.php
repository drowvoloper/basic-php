<!--12/12/2018 Este proyecto se ha realizado siguiendo las pautas en el tutorial "Creando una Galería Dinámica" dentro del curso "PHP7 y MYSQL: El Curso Completo, Práctico y Desde Cero! | Udemy" de Carlos Arturo Esparza-->

<?php
require 'funciones.php';
$conexion = conexion('curso_galeria','root','');

if(!$conexion) {
    die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    
    $check = @getimagesize($_FILES['foto']['tmp_name']);

    if($check !== false) {
        $carpeta_destino = 'fotos/';
        $archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
        #echo $archivo_subido;
        move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);

        $statement = $conexion->prepare('
        INSERT INTO fotos (titulo, imagen, texto)
        VALUES (:titulo,:imagen,:texto)');

        $statement->execute(array(
            ':titulo' => $_POST['titulo'],
            ':imagen' => $_FILES['foto']['name'],
            ':texto' => $_POST['texto'] 
        ));

        header('Location: index.php');
    } else {
        $error = 'El archivo no es una imagen o es demasiado pesado';
    }
}

require 'views/subir.view.php';

?>