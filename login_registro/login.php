<!--10/12/2018 Este proyecto se ha realizado siguiendo las pautas en el tutorial "Creando un Inicio de Sesión y Registro de Usuarios" dentro del curso "PHP7 y MYSQL: El Curso Completo, Práctico y Desde Cero! | Udemy" de Carlos Arturo Esparza-->

<?php session_start();

#comprobamos si la sesión está activa:
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
} 

$errores = '';

#comprobamos si los datos se han enviado:
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = hash('sha512', $password);

    try {
        $conexion = new PDO('mysql:host=localhost;dbname=practica_login','root','');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password'); 
    $statement->execute(array(
        ':usuario' => $usuario,
        ':password' => $password
    ));
    $resultado = $statement->fetch();
    #var_dump($resultado);

    if($resultado !== false) {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    } else {
        $errores .= "<li>Los datos introducidos no son correctos</li>";
    }
}

require 'views/login.view.php';

?>