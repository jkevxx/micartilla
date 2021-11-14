<?php

require_once "../../models/RegisterModel.php";

$deleteRegister = new RegisterModel();

if (isset($_POST['id'])) {
    $idRegistro = $_POST['id'];
    $delete = $deleteRegister->deleteRegister($idRegistro);

    if ($delete) {
        echo "Register Deleted";
    } else {
        echo "Register not deleted";
    }
}