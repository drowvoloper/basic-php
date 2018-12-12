<!--12/12/2018 Este proyecto se ha realizado siguiendo las pautas en el tutorial "Creando una Galería Dinámica" dentro del curso "PHP7 y MYSQL: El Curso Completo, Práctico y Desde Cero! | Udemy" de Carlos Arturo Esparza-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Galería</title>
</head>
<body>
    <header>
        <div class="contenedor">
            <h1 class="titulo">Subir foto</h1>
        </div>
    </header>

    <div class="contenedor">
        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario">
    
        <label for="foto">Selecciona tu foto</label>
        <input type="file" name="foto" id="foto">

        <label for="titulo">Título de la foto</label>
        <input type="text" name="titulo" id="titulo">

        <label for="texto">Descripción</label>
        <textarea name="texto" id="texto" placeholder="Sobre la foto"></textarea>

        <?php if(isset($error)): ?>

            <p class="error"><?php echo $error; ?></p>
        <?php endif ?>

        <input type="submit" value="Subir Foto" class="submit">
    </form>
    </div>

    <footer>
        <div class="copyright">Creado por @drowvoloper</div>
    </footer>
</body>
</html>