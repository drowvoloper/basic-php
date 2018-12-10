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