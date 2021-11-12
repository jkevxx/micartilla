<?php

require_once "../../models/RegisterModel.php";

$consultRegister = new RegisterModel();

$idV = $_POST['idV'];
$idU = $_POST['idU'];

// echo $idV;
// echo $idU;

$consult = $consultRegister->consultRegister($idV, $idU);

echo $consult;