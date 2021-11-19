<?php

require_once "../../models/UserModel.php";
$deleteUser = new UserModel();

$idUsuario = $_GET['id'];

if (!empty($idUsuario)) {
    $userDeleted = $deleteUser->deleteUser($idUsuario);
    if ($userDeleted) {
        header('Location: ../../views/users.php');
    } else {
        echo "Error consult";
    }
} else {
    echo "Empty Data";
}