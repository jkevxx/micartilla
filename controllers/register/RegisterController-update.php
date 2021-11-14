<?php

require_once "../../models/RegisterModel.php";

$updateRegister = new RegisterModel();

$idRegistro = $_POST['idRegister'];
$fecha = $_POST['fecha'];

echo $fecha;
$update = $updateRegister->updateRegister($idRegistro, $fecha);

if ($update) {
    echo "update";
} else {
    echo "not update";
}