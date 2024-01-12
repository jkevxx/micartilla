<?php

require_once "../../config/Conexion.php";

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

  public function createUser($nombre, $apellidos, $sexo, $fechaNacimiento, $id)
  {
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->sexo = $sexo;
    $this->fechaNacimiento = $fechaNacimiento;
    $this->id = $id;
    $sql = "INSERT INTO usuarios (nombre, apellidos, sexo, fechaNacimiento, id_login) VALUES (?,?,?,?,?)";
    $create = $this->conexion->prepare($sql);
    $data = array($this->nombre, $this->apellidos, $this->sexo, $this->fechaNacimiento, $this->id);
    $stmt = $create->execute($data);
    $idLogin = $this->conexion->lastInsertId();

    if ($stmt) {
      // return $idLogin;
      return $idLogin;
    } else {
      print_r($stmt->errorInfo());
      return false;
    }
  }

  // public function getIdLogin()
  // {
  //     $sql = "SELECT MAX(idLogin) as idLogin FROM login LIMIT 1";
  //     // $query = $this->conexion->prepare($sql);
  //     // $query->execute();
  //     $result = $this->conexion->query($sql);
  //     $row = $result->fetch(PDO::FETCH_ASSOC);
  //     // $result = $query->fetchAll(PDO::FETCH_ASSOC);
  //     // $result = arrayId[0]->idLogin;
  //     $id = $row['idLogin'];
  //     return $id;
  // }

  public function getIdLogin($username)
  {
    $sql = "SELECT idLogin FROM login WHERE username = '$username'";
    $result = $this->conexion->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $id = $row['idLogin'];
    return $id;
  }

  public function updateUser($id, $nombre, $apellidos, $sexo, $fechaNacimiento)
  {
    $sql = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', sexo='$sexo', fechaNacimiento='$fechaNacimiento' WHERE idUsuario='$id' ";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    if ($stmt) {
      return true;
    } else {
      print_r($stmt->errorInfo());
      return false;
    }
  }

  public function requestUser($idUsuario)
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

  public function deleteUser($idUsuario)
  {
    $sql = "DELETE FROM usuarios WHERE idUsuario = '$idUsuario'";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    if ($stmt) {
      return true;
    } else {
      print_r($stmt->errorInfo());
      return false;
    }
  }
}
