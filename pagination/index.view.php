<!--09/12/2018 Este proyecto se ha realizado siguiendo las pautas en el tutorial "Creando una paginación" dentro del curso "PHP7 y MYSQL: El Curso Completo, Práctico y Desde Cero! | Udemy" de Carlos Arturo Esparza--> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paginación con PHP</title>

    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <h1>Articulos</h1>
        <section class="articulos">
            <ul>
                <?php foreach ($articulos as $articulo): ?>
                    <li><?php echo $articulo ['id'] . '.- ' . $articulo['articulo'] ?></li>
                <?php endforeach ?>
            </ul>
        </section>

        <section class="paginacion">
            <ul>
            <!--botón "Anterior"-->
                <?php if ($pagina == 1): ?>
                    <li class="disabled">&laquo</li>
                <?php else: ?>
                    <li><a href="?pagina=<?php echo $pagina - 1 ?>">&laquo</a></li> 
                <?php endif; ?>
            <!--FIN botón "Anterior"-->

            <!--Paginación-->
                <?php

                for ($i=1; $i <= $numeroPaginas; $i++) {
                    if($pagina == $i) {
                        echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
                    } else {
                        echo "<li><a href='?pagina=$i'>$i</a></li>";
                    }
                }
                ?>
            <!--FIN Paginación-->

            <!--botón "Siguiente"-->
                <?php if ($pagina == $numeroPaginas): ?>
                    <li class="disabled">&raquo</li>
                <?php else: ?>
                    <li><a href="?pagina=<?php echo $pagina + 1 ?>">&raquo</a></li> 
                <?php endif; ?>
            <!--FIN botón "Siguiente"-->
            </ul>
        </section>
    </div>
</body>
</html>