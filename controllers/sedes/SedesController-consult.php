<?php
require_once '../../models/SedesModel.php';

$consultSede = new SedesModel();

$search = $_POST['search'];

if (!empty($search)) {
    $consult = $consultSede->consultSede($search);
    // $jsonstring = json_encode($consult);
    echo $consult;

} else {
    $consult = $consultSede->readSede();
    echo $consult;

}