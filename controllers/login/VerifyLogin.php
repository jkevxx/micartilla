<?php
session_start();

require_once "../../config/Conexion.php";

$conexion = new Conexion();
$conexion = $conexion->getConexion();

if (empty($_POST['user']) && empty($_POST['password'])) {
    echo "Datos vacios";
} else {
    $sql = 'SELECT * FROM login WHERE username ="' . $_POST['user'] . '" OR email = "' . $_POST['user'] . '"';
    $query = $conexion->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    // var_dump($result);
    if (count($result) > 0 && password_verify($_POST['password'], $result['password'])) {
        // $_SESSION['user'] = $result['username'];
        echo 'ok';
        $_SESSION['user'] = $_POST['user'];
        // header('location: ../../views/dashboard.php');
    } else {
        echo "Usuario o contraseña incorrecta";
    }
}