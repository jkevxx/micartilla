<?php

require_once "../../models/RegisterModel.php";

$createVaccine = new RegisterModel();

$fecha = $_POST['fecha'];
$idVacuna = $_POST['id_vacuna'];
$idUsuario = $_POST['id_usuario'];

$insert = $createVaccine->createRegister($fecha, $idVacuna, $idUsuario);

if ($insert) {
    echo 'create';
} else {
    echo 'not create';
}