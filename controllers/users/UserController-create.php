<?php

// require_once "../../config/Conexion.php";
require_once "../../models/UserModel.php";
session_start();

$createUser = new UserModel();
$resultados = $createUser->getIdLogin();
// $id = $resultados['idLogin'];

$date = $_POST['fecha'];
$formatDate = explode('/', $date);
$newFormatDate = $formatDate[2] . "-" . $formatDate[1] . "-" . $formatDate[0];

$insert = $createUser->createUser($_POST['nombre'], $_POST['apellido'], $_POST['sexo'], $newFormatDate, $resultados);

if ($insert) {
    echo 'ok';
    $_SESSION['user'] = $_POST['nombre'];
    die();
} else {
    echo 'error';
}