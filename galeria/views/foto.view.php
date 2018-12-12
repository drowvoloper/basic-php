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
            <h1 class="titulo">Foto: 
                <?php if (!empty($foto['titulo'])) {
                    echo $foto['titulo'];
                } else {
                    echo $foto['imagen'];
                }
                ?>
            </h1>
        </div>
    </header>

    <div class="contenedor">
        <div class="foto">
            <img src="fotos/<?php echo $foto['imagen']; ?>" alt="">
            <p> <?php echo $foto['texto']; ?></p>
            <a href="index.php" class="regresar"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>

            Volver a la galería</a>
        </div>
    </div>

    <footer>
        <div class="copyright">Creado por @drowvoloper</div>
    </footer>
</body>
</html>