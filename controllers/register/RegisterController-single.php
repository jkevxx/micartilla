<?php

require_once "../../models/RegisterModel.php";

$consultRegister = new RegisterModel();

$idR = $_POST['id'];

// echo $idR;
// echo $idU;

$consult = $consultRegister->consultOnlyRegister($idR);

echo $consult;
