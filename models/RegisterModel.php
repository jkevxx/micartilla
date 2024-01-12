<?php

require_once "../../config/Conexion.php";

class RegisterModel extends Conexion
{
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

  public function createRegister($fecha, $id_vacuna, $id_usuario)
  {
    $sql = "INSERT INTO registros (fecha, id_vacuna, id_usuario) VALUES (?,?,?)";
    $query = $this->conexion->prepare($sql);
    $data = array($fecha, $id_vacuna, $id_usuario);
    $stmt = $query->execute($data);

    if ($stmt) {
      // return $idLogin;
      return true;
    } else {
      print_r($stmt->errorInfo());
      return false;
    }
  }

  public function consultRegister($id_vacuna, $id_usuario)
  {
    $sql = "SELECT idRegistro, fecha FROM registros WHERE id_usuario = '$id_usuario' AND id_vacuna = '$id_vacuna';";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();

    $json = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $json[] = array(
        'idRegistro' => $row['idRegistro'],
        'fecha' => $row['fecha'],
      );
    }
    $jsonstring = json_encode($json);

    return $jsonstring;
  }

  public function deleteRegister($idRegistro)
  {
    $sql = "DELETE FROM registros WHERE idRegistro = '$idRegistro'";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    if ($stmt) {
      // return $idLogin;
      return true;
    } else {
      print_r($stmt->errorInfo());
      return false;
    }
  }

  public function consultOnlyRegister($id)
  {
    $sql = "SELECT fecha, idRegistro FROM registros WHERE idRegistro = '$id';";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();

    $json = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $json[] = array(
        'fecha' => $row['fecha'],
        'idRegistro' => $row['idRegistro'],
      );
    }
    $jsonstring = json_encode($json);

    return $jsonstring;
  }

  public function updateRegister($idRegistro, $newFecha)
  {
    $sql = "UPDATE registros SET fecha=? WHERE idRegistro=? ";
    $query = $this->conexion->prepare($sql);
    $fecha = array($newFecha, $idRegistro);
    $stmt = $query->execute($fecha);
    if ($stmt) {
      // return $idLogin;
      return true;
    } else {
      print_r($stmt->errorInfo());
      return false;
    }
  }
}
