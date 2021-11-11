<?php

require_once "../config/Conexion.php";

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

    public function readVaccine()
    {
        $sql = "SELECT idVacuna, Nvacuna, sintomas, numDosis FROM vacunas";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            print_r($stmt->errorInfo());
            return false;
        }
    }

    public function readOneVaccine($id)
    {
        $sql = "SELECT Nvacuna, sintomas, numDosis FROM vacunas WHERE idVacuna = $id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            print_r($stmt->errorInfo());
            return false;
        }
    }

}