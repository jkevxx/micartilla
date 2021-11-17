<?php
require_once '../../models/VaccineModel.php';

$consultVaccine = new VaccineModel();

$search = $_POST['search'];
$idUsuario = $_POST['idUsuario'];

// // echo $idUsuario;
if (!empty($search)) {
    $consult = $consultVaccine->searchVaccineUser($search, $idUsuario);
    // $jsonstring = json_encode($consult);
    echo $consult;

} else {
    $consult = $consultVaccine->consultVaccineUser($idUsuario);
    echo $consult;

}