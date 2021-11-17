<?php

// require_once "../../config/Conexion.php";
require_once "../../models/UserModel.php";
session_start();

$requestUser = new UserModel();

$idUsuario = $_GET['idUsuario'];

// echo $idUsuario;

$result = $requestUser->requestUser($idUsuario);

if (is_array($result)) {
    echo 'ok';
    $_SESSION['idUsuario'] = $_GET['idUsuario'];
    header('location: ../../views/dashboard.php');

} else {
    echo "error consult";
}