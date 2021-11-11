<?php
require_once '../../models/DashboardModel.php';

$consultVaccine = new DashboardModel();

$search = $_POST['search'];

if (!empty($search)) {
    $consult = $consultVaccine->consultVaccine($search);
    // $jsonstring = json_encode($consult);
    echo $consult;

} else {
    $consult = $consultVaccine->readVaccine();
    echo $consult;

}