<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Regístrate</title>
</head>
<body>
    <div class="contenedor">
        <h1 class="titulo">Regístrate</h1>
        <hr class="border">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login" class="formulario">

        <div class="form-group">
            <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
        </div>

        <div class="form-group">
            <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password" placeholder="Contraseña">
        </div>

        <div class="form-group">
            <i class="icono izquierda fa fa-lock"></i><input type="password" name="password2" class="password_btn" placeholder="Repetir contraseña"> 

            <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
        </div>

        <?php if(!empty($errores)): ?>
            <div class="error">
                <ul>
                    <?php echo $errores; ?>
                </ul>
            </div>
        <?php endif; ?>
    </form>

    <p class="texto-registrate">
        ¿Ya tienes cuenta?
        <a href="login.php">Iniciar sesión</a>
    </p>

    </div>
</body>
</html>