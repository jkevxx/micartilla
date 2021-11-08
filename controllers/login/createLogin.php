<?php

// require_once "../../config/Conexion.php";
require_once "../../config/Conexion.php";
require_once "../../models/UserLogin.php";

$conexion = new Conexion();
$conexion = $conexion->getConexion();

session_start();

$sql = 'SELECT * FROM login WHERE username ="' . $_POST['user'] . '" OR email = "' . $_POST['user'] . '"';
$query = $conexion->prepare($sql);
$query->execute();
$result = $query->fetchColumn(); // cuenta los registros existentes

if ($result > 0) {
    echo 'El usuario o correo ya están registrados';
} else {
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 10]);

    $createLogin = new UserLogin();
    $insert = $createLogin->createLogin($_POST['user'], $_POST['email'], $pass);

    if ($insert) {
        // header('location: ../../views/dashboard.php');
        echo 'ok'; // para verificar si era true, se ocupó para un evento (e)
        $_SESSION['user'] = $_POST['user']; //se crea la sesión si regresa true
        die();
    } else {
        echo "Error";
    }

}
