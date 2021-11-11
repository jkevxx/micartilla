<?php

require_once "../../models/VaccineModel.php";

$createVaccine = new VaccineModel();

$insert = $createVaccine->createRegisterVaccine($_POST['fecha'], $_POST['id_vacuna'], $_POST['id_usuario']);

if ($insert) {
    echo 'ok';
} else {
    echo 'error';
}