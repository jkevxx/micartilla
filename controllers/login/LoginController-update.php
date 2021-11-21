<?php

require_once "../../config/Conexion.php";
require_once "../../models/UserLogin.php";

$conexion = new Conexion();
$conexion = $conexion->getConexion();

$username = $_POST['username'];
$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];

if (!empty($oldPassword) && !empty($newPassword)) {
    $sql = 'SELECT * FROM login WHERE username ="' . $username . '"';
    $query = $conexion->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (is_array($result)) {
        if (count($result) > 0 && password_verify($oldPassword, $result['password'])) {

            $encryptedPass = password_hash($newPassword, PASSWORD_DEFAULT, ['cost' => 10]);

            $updatePass = new UserLogin();
            $result = $updatePass->updatePassword($username, $encryptedPass);
            if ($result) {
                echo 'ok';
            } else {
                echo 'Error consult';
            }
        } else {
            echo "Verifica tu contraseña anterior";
        }
    } else {
        echo "Error";
    }
}