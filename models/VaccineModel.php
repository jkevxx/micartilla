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

    public function consultVaccine($search)
    {
        $sql = "SELECT * FROM vacunas WHERE Nvacuna LIKE '$search%' ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $json[] = array(
                'idVacuna' => $row['idVacuna'],
                'Nvacuna' => $row['Nvacuna'],
                'sintomas' => $row['sintomas'],
                'numDosis' => $row['numDosis'],
            );
        }
        $jsonstring = json_encode($json);

        return $jsonstring;
    }

    public function readVaccine()
    {
        $sql = "SELECT * FROM vacunas ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $json[] = array(
                'idVacuna' => $row['idVacuna'],
                'Nvacuna' => $row['Nvacuna'],
                'sintomas' => $row['sintomas'],
                'numDosis' => $row['numDosis'],
            );
        }
        $jsonstring = json_encode($json);

        return $jsonstring;
    }

    public function searchVaccineUser($search, $idUsuario)
    {
        $sql = "SELECT idVacuna, Nvacuna, sintomas FROM vacunas
        INNER JOIN registros ON idVacuna = id_vacuna
        INNER JOIN usuarios ON idUsuario = id_usuario
        WHERE id_usuario = '$idUsuario' AND Nvacuna LIKE '$search%'
        GROUP BY idVacuna;";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $json[] = array(
                'idVacuna' => $row['idVacuna'],
                'Nvacuna' => $row['Nvacuna'],
                'sintomas' => $row['sintomas'],
            );
        }
        $jsonstring = json_encode($json);

        return $jsonstring;

    }

    public function consultVaccineUser($idUsuario)
    {
        $sql = "SELECT idVacuna, Nvacuna, sintomas FROM vacunas
        INNER JOIN registros ON idVacuna = id_vacuna
        INNER JOIN usuarios ON idUsuario = id_usuario
        WHERE id_usuario = '$idUsuario'
        GROUP BY idVacuna;";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $json[] = array(
                'idVacuna' => $row['idVacuna'],
                'Nvacuna' => $row['Nvacuna'],
                'sintomas' => $row['sintomas'],
            );
        }
        $jsonstring = json_encode($json);

        return $jsonstring;
    }

}