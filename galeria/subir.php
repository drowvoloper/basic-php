<?php
require 'funciones.php';
$conexion = conexion('curso_galeria','root','');

if(!$conexion) {
    die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    
    $check = @getimagesize($_FILES['foto']['tmp_name']);

    if($check !== false) {
        $carpeta_destino = '/opt/lampp/htdocs/proyectos-personales/basic-php/galeria/fotos';
        $archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
        echo $archivo_subido;
        #chown($_FILES['foto']['tmp_name'],'www-data');
        move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);

        $statement = $conexion->prepare('
        INSERT INTO fotos (titulo, imagen, texto)
        VALUES (:titulo,:imagen,:texto)');

        $statement->execute(array(
            ':titulo' => $_POST['titulo'],
            ':imagen' => $_POST['foto']['name'],
            ':texto' => $_POST['texto'] 
        ));

        #header('Location: index.php');
    } else {
        $error = 'El archivo no es una imagen o es demasiado pesado';
    }
}

require 'views/subir.view.php';

?>