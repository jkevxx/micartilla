<?php

require_once "../../config/Conexion.php";

class VaccineModel extends Conexion
{
    private $conexion;
    public function __construct()
    {
        parent::__construct();
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

    public function createRegisterVaccine($fecha, $id_vacuna, $id_usuario)
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

}