<?php

require_once "../../models/UserModel.php";
$updateUser = new UserModel();

$date = $_POST['fecha'];

$formatDate = explode('/', $date);
$newFormatDate = $formatDate[2] . "-" . $formatDate[1] . "-" . $formatDate[0];

if (!empty($_POST['id'])) {

    $insert = $updateUser->updateUser($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['sexo'], $newFormatDate);
    if ($insert) {
        echo 'ok';
        // $_SESSION['user'] = $_POST['nombre'];
        // die();
    } else {
        echo 'error';
    }
} else {
    echo 'failed';
}