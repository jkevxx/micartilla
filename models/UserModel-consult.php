<?php
//Se hizo este archivo porque la dirección del arvhivo UserModel no funcionaba
require_once "../config/Conexion.php";

class UserModel extends Conexion
{
  private $nombre;
  private $apellidos;
  private $sexo;
  private $fechaNacimiento;
  private $id;
  private $conexion;
  public function __construct()
  {
    // parent::__construct();
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->getConexion();
  }

  public function setConexion($conexion)
  {
    $this->conexion = $conexion;
  }

  public function getConexion()
  {
    return $this->conexion;
  }

  public function readUser($idUsuario)
  {
    $sql = "SELECT idUsuario, nombre, apellidos, sexo, fechaNacimiento FROM usuarios WHERE idUsuario = '$idUsuario'";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
      return $result;
    } else {
      print_r($stmt->errorInfo());
      return false;
    }
  }

  public function readAllUsers($username)
  {
    $sql = "SELECT idUsuario, nombre, apellidos FROM usuarios INNER JOIN login ON idLogin = id_login WHERE username = '$username' OR email = '$username';";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
      return $result;
    } else {
      print_r($stmt->errorInfo());
      return false;
    }
  }
}
