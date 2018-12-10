<!--10/12/2018 Este proyecto se ha realizado siguiendo las pautas en el tutorial "Creando un Inicio de Sesión y Registro de Usuarios" dentro del curso "PHP7 y MYSQL: El Curso Completo, Práctico y Desde Cero! | Udemy" de Carlos Arturo Esparza-->

<?php session_start();

#comprobamos si la sesión está activa
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
} 

#comprobamos si los datos se enviaron:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    //echo "$usuario . $password . $password2";

    $errores = '';

    if(empty($usuario) or empty($password) or empty($password2)) {
        $errores .= '<li>Por favor, rellena todos los datos correctamente</li>';
    } else {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=practica_login','root','');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $statement = $conexion->prepare('SELECT *FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $usuario));
        $resultado = $statement->fetch();

        if ($resultado !== false) {
            $errores .= '<li>El nombre de usuario ya existe</li>';
        }

        $password = hash('sha512', $password);
        $password2 = hash('sha512', $password2);  
        
        if ($password != $password2) {
            $errores .= '<li>Las contraseñas no son iguales</li>';
        }
    }

    if ($errores == '') {
        $statement = $conexion->prepare('INSERT INTO usuarios (id,usuario,pass) VALUES (null, :usuario, :pass)');
        $statement->execute(array(':usuario' => $usuario, ':pass' => $password));

        header('Location: login.php');
    }
}

require 'views/registro.view.php';

?>