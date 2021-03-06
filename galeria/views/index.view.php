<!--12/12/2018 Este proyecto se ha realizado siguiendo las pautas en el tutorial "Creando una Galería Dinámica" dentro del curso "PHP7 y MYSQL: El Curso Completo, Práctico y Desde Cero! | Udemy" de Carlos Arturo Esparza-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Galería</title>
</head>
<body>
    <header>
        <div class="contenedor">
            <h1 class="titulo">Mi Galería en PHP y MySQL</h1>
        </div>
    </header>

    <section class="fotos">
        <div class="contenedor">
           
            <?php foreach($fotos as $foto): ?>
                <div class="thumb">
                    <a href="foto.php?id=<?php echo $foto['id']; ?>">
                        <img src="fotos/<?php echo $foto['imagen']; ?>" alt="">
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </section>

    <div class="paginacion">
        <?php if ($pagina_actual > 1): ?>
            <a href="index.php?p=<?php echo $pagina_actual -1; ?>" class="izquierda"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Página Anterior</a>
        <?php endif ?>
        <?php if ($total_paginas != $pagina_actual): ?>
            <a href="index.php?p=<?php echo $pagina_actual +1; ?>" class="derecha">Página Siguiente<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        <?php endif ?>
    </div>

    <footer>
        <div class="copyright">Creado por @drowvoloper</div>
    </footer>
</body>
</html>