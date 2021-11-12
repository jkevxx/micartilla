<?php

require_once "../../models/RegisterModel.php";

$createVaccine = new RegisterModel();

$insert = $createVaccine->createRegister($_POST['fecha'], $_POST['id_vacuna'], $_POST['id_usuario']);

if ($insert) {
    echo 'ok';
} else {
    echo 'error';
}
